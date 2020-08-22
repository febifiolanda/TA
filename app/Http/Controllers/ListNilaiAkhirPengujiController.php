<?php

namespace App\Http\Controllers;

use App\Group;
use App\Periode;
use App\Magang;
use App\Profile;
use App\Mahasiswa;
use App\NilaiAkhir;
use App\Instansi;
use App\DetailGroup;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class ListNilaiAkhirPengujiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Group::all();
            // dd($data);
            return view('nilai.list_nilaiAkhir', compact('data'));
    }
    public function getDataPenguji()
    {
        $dosen =  Auth::user()->dosen()
        ->leftJoin('users', 'dosen.id_users', 'users.id_users')
        ->leftJoin('roles', 'users.id_roles', 'roles.id_roles')
        ->select('dosen.id_dosen', 'dosen.id_users', 'users.id_users', 'dosen.nama',
        'dosen.foto', 'roles.id_roles', 'roles.roles', 'dosen.no_hp', 'dosen.email', 
        'dosen.nip')
        ->first();
        $group = Group::where('id_dosen',$dosen->id_dosen)->get();
        $data = DB::table('kelompok_detail')
                    ->leftJoin('kelompok','kelompok_detail.id_kelompok','kelompok.id_kelompok')
                    ->leftJoin('mahasiswa','kelompok_detail.id_mahasiswa','mahasiswa.id_mahasiswa')
                    ->whereIn('kelompok_detail.status_join',['create','diterima'])
                    ->where('kelompok.id_dosen',$dosen->id_dosen)
                    ->select('mahasiswa.id_mahasiswa','mahasiswa.nama as nama_mahasiswa','mahasiswa.nim','kelompok.nama_kelompok')
        ->get();
            return datatables()->of($data)
            ->addColumn('action', function($row){
                $dosen =  Auth::user()->dosen()
                ->leftJoin('users', 'dosen.id_users', 'users.id_users')
                ->leftJoin('roles', 'users.id_roles', 'roles.id_roles')
                ->select('dosen.id_dosen', 'dosen.id_users', 'users.id_users', 'dosen.nama',
                'dosen.foto', 'roles.id_roles', 'roles.roles', 'dosen.no_hp', 'dosen.email', 
                'dosen.nip')
                ->first();
                $cekdisable = NilaiAkhir::where('id_mahasiswa',$row->id_mahasiswa)
                ->where('created_by',$dosen->id_users)
                ->select('created_by')
                ->first();
                $disable = $cekdisable!=null? "disabled" : " ";
                $btn = '<a href="'.route('detail-nilaimahasiswa-penguji',$row->id_mahasiswa).
                '" class="btn btn-info  ' . $disable . '"><i class="fas fa-list"></i></a>';
                return $btn;
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }

    public function indexAnggota()
    {
            return view('nilai.daftar_nilaiAkhir');
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rules= [
            'judul'=>'required|min:6'
        ];
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return response()->json($validator->errors(), 400);
        }
        $listNilaiAkhir=Group::create($request->all());
        return response()->json($listNilaiAkhir, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $periode=Periode::where(['status'=>'open'])->first();
        foreach($request->id_aspek_penilaian as $key => $value)
        {
            $model = new NilaiAkhir;
            $model->id_aspek_penilaian = $value;
            $model->nilai = $request->nilai[$key];
            $model->id_periode = $periode->id_periode;
            $model->id_kelompok_penilai=$request->id_kelompok_penilai;
            $model->id_mahasiswa = $request->id_mahasiswa;
            $model->isDeleted= 0;
            $model->created_by= $request->id_users;;
            $model->save();
        }
        return response()->json(['message' => 'Nilai added successfully.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $nilai=NilaiAkhir::find($id);
        if(is_null($nilai)){
            return response()->json(['messege'=>'record not found', 400]);
        }
        $nilai->update($request->all());
        return response()->json($nilai, 200); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function show($id_kelompok){
        $kelompok = Group::where('kelompok.id_kelompok',$id_kelompok)
        ->with('dosen','periode')
        ->join('magang', 'magang.id_kelompok','=','kelompok.id_kelompok')
        ->join('instansi','instansi.id_instansi','=','magang.id_instansi')
        ->first();
        // $applyNilai =DB::table('kelompok')
        // ->join('periode', 'periode.id_periode', '=', 'kelompok.id_periode')
        // ->join('dosen', 'dosen.id_dosen', '=', 'kelompok.id_dosen')
        // ->select('periode.tahun_periode', 'dosen.nama','instansi.nama', 'dosen.id_users')
        // ->join('instansi', 'instansi.id_users', '=', 'dosen.id_users')
        // -> select ('*')
        // ->get();

        return $kelompok;
       
    }

    public function detailNilai(){
        return view('nilai.detail_inputNilai',compact( 'kelompok','applyNilai'));
    }
}
