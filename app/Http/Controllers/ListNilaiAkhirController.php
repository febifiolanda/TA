<?php

namespace App\Http\Controllers;

use App\Group;
use App\Periode;
use App\Magang;
use App\Dosen;
use App\Mahasiswa;
use App\NilaiAkhir;
use App\Instansi;
use App\DetailGroup;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use DB;
use Illuminate\Http\Request;

class ListNilaiAkhirController extends Controller
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
    public function getData()
    {
        $dosen =  Auth::user()->dosen()
        ->leftJoin('users', 'dosen.id_users', 'users.id_users')
        ->leftJoin('roles', 'users.id_roles', 'roles.id_roles')
        ->select('dosen.id_dosen', 'dosen.id_users', 'users.id_users', 'dosen.nama',
        'dosen.foto', 'roles.id_roles', 'roles.roles', 'dosen.no_hp', 'dosen.email', 
        'dosen.nip')
        ->first();
        $data = Group::where('id_dosen',$dosen->id_dosen)->first()
        ->detailGroup()->with('mahasiswa','group')
        ->where(function($q) {
            $q->where('kelompok_detail.status_join', 'create')
            ->orWhere('kelompok_detail.status_join', 'diterima');
        })
        ->get();
            return datatables()->of($data)
            ->addColumn('action', function($row){
                $btn = '<a href="'.route('detail-nilaimahasiswa',$row->id_mahasiswa).
                '" class="btn btn-info"><i class="fas fa-list"></i></a>';
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
           // dd($request->all());
        // // $data = $request->all();

        // // dd($data);
        // // foreach ($data['data'] as $datas) {
        //     $row = new NilaiAkhir;
        //     $row->fieldTable = $request->nameOnHtmlTextField;
        //     // $row ->id_periode = $data['id_periode'];
        //     // $row ->id_mahasiswa = $data['id_mahasiswa'];
        //     // $row ->id_aspek_penilaian = $datas['id_aspek_penilaian'];
        //     // $row ->id_kelompok_penilai = $datas['id_kelompok_penilai'];
        //     // $row ->nilai= $datas['nilai'];
        //     // $row ->created_by = $datas['created_by'];
        //     // and so on for your all columns 
        //     $row->save();   //at last save into db
        // // }
        // dd(\Auth::user());
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
            $model->created_by= 123;
            $model->save();
        }
        return response()->json($request->all(), 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Group  $listNilaiAkhir
     * @return \Illuminate\Http\Response
     */
    // public function show($id_users)
    // {
    //     $detail = Users::findOrFail($id_users);
    //     $applyNilai = \DB::table('kelompok')
    //                         ->join('kelompok_detail', 'kelompok.id_kelompok', '=', 'kelompok_detail.id_kelompok')
    //                         ->join('mahasiswa', 'kelompok_detail.id_mahasiswa', 'mahasiswa.id_mahasiswa')
    //                         ->join('users', 'dosen.id_users', 'dosen.id_dosen')
    //                         ->join('users', 'instansi.id_users', 'instansi.id_instansi')
    //                         ->join('kelompok', 'periode.id_periode', '=', 'kelompok.id_kelompok')
    //                         ->where('kelompok_detail.status_keanggotaan', 'Ketua')
    //                         ->select('dosen.nama', 'instansi.id_instansi', 'instansi.nama', 'instansi.alamat', 'periode.id_periode', 'periode.tgl_mulai','periode.tgl_selesai','daftar_lowongan.id_daftar_lowongan', 'daftar_lowongan.status')
    //                         ->where('users.id_users', $id_users)
    //                         ->get();
    //     return view('nilai.detail_nilai',compact('detail', 'applyNilai'));
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Group  $listNilaiAkhir
     * @return \Illuminate\Http\Response
     */
    public function edit(Group $listNilaiAkhir)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Group  $listNilaiAkhir
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Group $listNilaiAkhir)
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
     * @param  \App\Group  $listNilaiAkhir
     * @return \Illuminate\Http\Response
     */
    public function destroy(Group $listNilaiAkhir)
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
