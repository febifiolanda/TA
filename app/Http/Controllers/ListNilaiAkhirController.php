<?php

namespace App\Http\Controllers;

use App\Group;
use App\Periode;
use App\Dosen;
use App\Mahasiswa;
use App\Instansi;
use App\DetailGroup;
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
        $data = Group::with('periode')->get();
        // dd($data);
        return datatables()->of($data)
        ->addColumn('action', function($row){
            $btn = ' <a href="'.route('nilaiakhir-detail',$row->id_kelompok).'" class="btn btn-info"><i class="fas fa-eye"></i></a>';
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
        //
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
        //
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
        $kelompok = Group::where('id_kelompok',$id_kelompok)->with('dosen.instansi','periode')
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
