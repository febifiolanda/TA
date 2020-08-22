<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Users;
use App\Group;
use App\Profile;
use App\Laporan;
use App\Magang;
use App\Periode;
use Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // public function index(Request $request)
    // {
    //     $user= User::where(['api_token'=>$request->api_token])->first();

    //     return response()->json([
    //         'user' =>$user,
    //         'code' => 200,
    //     ], 200);
    // }

    public function user()
    {
        
        $user= Auth::user()->load('dosen');

        return response()->json([
            'user' =>$user,
            'message' => "succes",
        ]);
    }
    public function indexsdosen(){

        $periode = Periode::where('status', 'open')->first();
        $date = Carbon::now()->translatedFormat('l, d F Y');
        $dosen =  Auth::user()->dosen()
        ->leftJoin('users', 'dosen.id_users', 'users.id_users')
        ->leftJoin('roles', 'users.id_roles', 'roles.id_roles')
        ->select('dosen.id_dosen', 'dosen.id_users', 'users.id_users', 'dosen.nama',
         'dosen.foto','roles.id_roles', 'roles.roles', 'dosen.no_hp', 'dosen.email',
         'dosen.nip')
        ->first();

        return view('layout.dashboard', compact('periode','date', 'dosen'));
    }

    public function kelompokCount(){
        $dosen =  Auth::user()->dosen()
        ->leftJoin('users', 'dosen.id_users', 'users.id_users')
        ->leftJoin('roles', 'users.id_roles', 'roles.id_roles')
        ->select('dosen.id_dosen', 'dosen.id_users', 'users.id_users', 'dosen.nama',
         'dosen.foto','roles.id_roles', 'roles.roles', 'dosen.no_hp', 'dosen.email',
         'dosen.nip')
        ->first();

        $kelompok = Group::where('kelompok.id_dosen','=', $dosen->id_dosen)
        ->where('kelompok.tahap','=', 'diterima')
        ->count();
        return response()->json([
            'kelompok' => $kelompok,
            "message" => "succes",
        ]);
    }

    public function laporanCount(){
        $dosen =  Auth::user()->dosen()
        ->leftJoin('users', 'dosen.id_users', 'users.id_users')
        ->leftJoin('roles', 'users.id_roles', 'roles.id_roles')
        ->select('dosen.id_dosen', 'dosen.id_users', 'users.id_users', 'dosen.nama',
         'dosen.foto','roles.id_roles', 'roles.roles', 'dosen.no_hp', 'dosen.email', 
         'dosen.nip')
        ->first();
        $kelompok = Laporan::join('kelompok','laporan.id_kelompok', 'kelompok.id_kelompok')
        ->where('kelompok.id_dosen','=',$dosen->id_dosen)
        ->where('kelompok.tahap','=', 'diterima')
        ->distinct("laporan.id_kelompok")
        ->count();
        return response()->json([
            'kelompok' => $kelompok,
            "message" => "succes",
        ]);
    }

    public function indexdosen(){
        return view('/profile');
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
    public function show($id)
    {
        //
    }

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
        //
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
}
