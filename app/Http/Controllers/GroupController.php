<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group;
use App\Dosen;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\DetailGroup;


class GroupController extends Controller
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
        $dosen =  Auth::user()->dosen()
                            ->leftJoin('users', 'dosen.id_users', 'users.id_users')
                            ->leftJoin('roles', 'users.id_roles', 'roles.id_roles')
                            ->select('dosen.id_dosen', 'dosen.id_users', 'users.id_users', 'dosen.nama', 'dosen.foto','roles.id_roles', 'roles.roles', 'dosen.no_hp', 'dosen.email', 'dosen.nip')
                            ->first();
        return view('kelompok.kelompok', compact('data','dosen'));   
    }


    public function getData()
    {
        $dosen =  Auth::user()->dosen()
        ->leftJoin('users', 'dosen.id_users', 'users.id_users')
        ->leftJoin('roles', 'users.id_roles', 'roles.id_roles')
        ->select('dosen.id_dosen', 'dosen.id_users', 'users.id_users', 'dosen.nama',
         'dosen.foto','roles.id_roles', 'roles.roles', 'dosen.no_hp', 'dosen.email',
        'dosen.nip')
        ->first();
        $data = Group::where('tahap', 'diterima')
        ->where('kelompok.id_dosen','=',$dosen->id_dosen)
        ->join('kelompok_detail','kelompok_detail.id_kelompok','kelompok.id_kelompok')
        ->where('kelompok_detail.status_keanggotaan','Ketua')
        ->join('mahasiswa','mahasiswa.id_mahasiswa','kelompok_detail.id_mahasiswa')
        ->select('mahasiswa.nama as nama_ketua','kelompok.*')
        ->get();
        // dd($data);
        return datatables()->of($data)
        ->addColumn('action', function($row){
            $btn = '<a href="'.url('/detail_kelompok_baru',$row->id_kelompok).
            '" class="btn btn-info"><i class="fas fa-list"></i></a>';
            return $btn;
        })
        ->addIndexColumn()
        ->rawColumns(['action'])
        ->make(true);
    }

    public function detailkelompok($id_kelompok){

        $data = DB::table("magang")->where('magang.id_kelompok',$id_kelompok)
        ->join('kelompok_detail','kelompok_detail.id_kelompok','magang.id_kelompok')
        ->where(function($q) {
            $q->where('kelompok_detail.status_join', 'create')
            ->orWhere('kelompok_detail.status_join', 'diterima');
        })
        // ->groupBy('id_mahasiswa')
        ->join('mahasiswa','mahasiswa.id_mahasiswa','kelompok_detail.id_mahasiswa')
        // ->addIndexColumn()
        // ->make(true)

        ->get();

        $instansi = DB::table('magang')->where('magang.id_kelompok',$id_kelompok)
        ->join('instansi','instansi.id_instansi','magang.id_instansi')
        ->first();

        return response()->json([
            'status'=>'success',
            'instansi'=> $instansi,
            'data' => $data
        ],200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_kelompok)
    {
        $dosen =  Auth::user()->dosen()
        ->leftJoin('users', 'dosen.id_users', 'users.id_users')
        ->leftJoin('roles', 'users.id_roles', 'roles.id_roles')
        ->select('dosen.id_dosen', 'dosen.id_users', 'users.id_users', 'dosen.nama', 'dosen.foto','roles.id_roles', 'roles.roles', 'dosen.no_hp', 'dosen.email', 'dosen.nip')
        ->first();
        return view('kelompok.detail_kelompok_baru',compact('dosen'));
    }

   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_kelompok)
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
    public function update(Request $request, $id_kelompok)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_kelompok)
    {
        //
    }

    public function api_showDetail($id_kelompok)
    {
      

        $ketua=DetailGroup::where('id_kelompok',$id_kelompok)
        ->leftJoin('mahasiswa','kelompok_detail.id_mahasiswa', '=','mahasiswa.id_mahasiswa')
        ->where('status_keanggotaan','ketua')
        ->get();
       
        $anggota=DetailGroup::where('id_kelompok',$id_kelompok)
        ->leftJoin('mahasiswa','kelompok_detail.id_mahasiswa', '=','mahasiswa.id_mahasiswa')
        ->where('status_keanggotaan','anggota')
        ->get();

        return response()->json([
            'status'=>'success',
            'ketua'=>$ketua,
            'anggota'=>$anggota
        ],200);
    }
}
