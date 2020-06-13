<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dosen;
use DB;
use App\Instansi;

class Mah extends Controller
{
    public function index()
    {
        return view('kelompok');
    }

    public function indexprofile()
    {
        return view('profile.profile');
    }
    public function detailkelompok()
    {
        $dosen = Dosen::leftJoin('users', 'dosen.id_users', 'users.id_users')
        ->leftJoin('roles', 'users.id_roles', 'roles.id_roles')
        ->select('dosen.id_dosen', 'dosen.id_users', 'users.id_users', 'dosen.nama', 'dosen.foto','roles.id_roles', 'roles.roles', 'dosen.no_hp', 'dosen.email', 'dosen.nip')
        ->first();
        return view('kelompok.detail_kelompok',compact('dosen'));
    }
    public function inputnilai_dosen()
    {
        return view('nilai.input_nilai');
    }
    public function dashboard()
    {
        $dosen = Dosen::leftJoin('users', 'dosen.id_users', 'users.id_users')
                            ->leftJoin('roles', 'users.id_roles', 'roles.id_roles')
                            ->select('dosen.id_dosen', 'dosen.id_users', 'users.id_users', 'dosen.nama', 'dosen.foto','roles.id_roles', 'roles.roles', 'dosen.no_hp', 'dosen.email', 'dosen.nip')
                            ->first();
        return view('layout.dashboard',compact('dosen'));
    }
    public function detailnilai()
    {
        $dosen = Dosen::leftJoin('users', 'dosen.id_users', 'users.id_users')
        ->leftJoin('roles', 'users.id_roles', 'roles.id_roles')
        ->select('dosen.id_dosen', 'dosen.id_users', 'users.id_users', 'dosen.nama',  'dosen.foto','roles.id_roles', 'roles.roles', 'dosen.no_hp', 'dosen.email', 'dosen.nip')
        ->first();
        return view('nilai.detail_nilai',compact('dosen'));
    }
    public function nilaipenguji()
    {
        return view('nialil.detail_nilai_penguji');
    }
    public function inputNilai_penguji()
    {
        return view('nilai.inputNilai_penguji');
    }
    public function laporan()
    {
        $dosen = Dosen::leftJoin('users', 'dosen.id_users', 'users.id_users')
        ->leftJoin('roles', 'users.id_roles', 'roles.id_roles')
        ->select('dosen.id_dosen', 'dosen.id_users', 'users.id_users', 'dosen.nama', 'dosen.foto', 'roles.id_roles', 'roles.roles', 'dosen.no_hp', 'dosen.email', 'dosen.nip')
        ->first();
        return view('laporan.laporan',compact('dosen'));
    }
    public function nilai_akhir()
    {
        $dosen = Dosen::leftJoin('users', 'dosen.id_users', 'users.id_users')
        ->leftJoin('roles', 'users.id_roles', 'roles.id_roles')
        ->select('dosen.id_dosen', 'dosen.id_users', 'users.id_users', 'dosen.nama', 'dosen.foto', 'roles.id_roles', 'roles.roles', 'dosen.no_hp', 'dosen.email', 'dosen.nip')
        ->first();
        return view('nilai.nilai_akhir',compact('dosen'));
    }
    public function login()
    {
        return view('login.login');
    }
    public function detail_inputNilai($id_kelompok)
    {
        $dosen = Dosen::leftJoin('users', 'dosen.id_users', 'users.id_users')
        ->leftJoin('roles', 'users.id_roles', 'roles.id_roles')
        ->select('dosen.id_dosen', 'dosen.id_users', 'users.id_users', 'dosen.nama',  'dosen.foto','roles.id_roles', 'roles.roles', 'dosen.no_hp', 'dosen.email', 'dosen.nip')
        ->first();
        return view('nilai.detail_inputNilai',compact('id_kelompok','dosen'));
    }
    public function edit_profil()
    {
        return view('profile.edit_profil');
    }
    public function list_kegiatanHarian()
    {
        $dosen = Dosen::leftJoin('users', 'dosen.id_users', 'users.id_users')
                            ->leftJoin('roles', 'users.id_roles', 'roles.id_roles')
                            ->select('dosen.id_dosen', 'dosen.id_users', 'users.id_users', 'dosen.nama', 'dosen.foto', 'roles.id_roles', 'roles.roles', 'dosen.no_hp', 'dosen.email', 'dosen.nip')
                            ->first();
        return view('logbook.list_kegiatanHarian',compact('dosen'));
    }
    //  public function list_kegiatan()
    // {
    //     return view('logbook.list_kegiatan');
    // }
    public function daftar_nilaiAkhir()
    {
        return view('nilai.daftar_nilaiAkhir');
    }
    public function list_nilaiAkhir()
    {
        $dosen = Dosen::leftJoin('users', 'dosen.id_users', 'users.id_users')
        ->leftJoin('roles', 'users.id_roles', 'roles.id_roles')
        ->select('dosen.id_dosen', 'dosen.id_users', 'users.id_users', 'dosen.nama', 'dosen.foto', 'roles.id_roles', 'roles.roles', 'dosen.no_hp', 'dosen.email', 'dosen.nip')
        ->first();
        return view('nilai.list_nilaiAkhir',compact('dosen'));
    }
    public function list_daftarNilaiAkhir()
    {
        $dosen = Dosen::leftJoin('users', 'dosen.id_users', 'users.id_users')
        ->leftJoin('roles', 'users.id_roles', 'roles.id_roles')
        ->select('dosen.id_dosen', 'dosen.id_users', 'users.id_users', 'dosen.nama',  'dosen.foto','roles.id_roles', 'roles.roles', 'dosen.no_hp', 'dosen.email', 'dosen.nip')
        ->first();
        return view('nilai.list_daftarNilaiAkhir',compact('dosen'));
    }
    public function logout()
    {
        return view('login.login');
    }

    public function list_kegiatan($id_kelompok)
    {
        $dosen = Dosen::leftJoin('users', 'dosen.id_users', 'users.id_users')
        ->leftJoin('roles', 'users.id_roles', 'roles.id_roles')
        ->select('dosen.id_dosen', 'dosen.id_users', 'users.id_users', 'dosen.nama', 'dosen.foto', 'roles.id_roles', 'roles.roles', 'dosen.no_hp', 'dosen.email', 'dosen.nip')
        ->first();
        return view('logbook.list_kegiatan',compact('id_kelompok','dosen'));
    }
    public function detail_kelompok_baru($id_kelompok)
    {
        $dosen = Dosen::leftJoin('users', 'dosen.id_users', 'users.id_users')
        ->leftJoin('roles', 'users.id_roles', 'roles.id_roles')
        ->select('dosen.id_dosen', 'dosen.id_users', 'users.id_users', 'dosen.nama', 'dosen.foto', 'roles.id_roles', 'roles.roles', 'dosen.no_hp', 'dosen.email', 'dosen.nip')
        ->first();
        $instansi = DB::table('magang')->where('magang.id_kelompok',$id_kelompok)
        ->join('instansi','instansi.id_instansi','magang.id_instansi')
        ->first();
        return view('kelompok.detail_kelompok_baru',compact('dosen','id_kelompok','instansi'));
    }


}