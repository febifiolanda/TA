<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dosen;
use App\NilaiAkhir;
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
        $dosen = Dosen::leftJoin('users', 'dosen.id_users', 'users.id_users')
        ->leftJoin('roles', 'users.id_roles', 'roles.id_roles')
        ->select('dosen.id_dosen', 'dosen.id_users', 'users.id_users', 'dosen.nama', 'dosen.foto','roles.id_roles', 'roles.roles', 'dosen.no_hp', 'dosen.email', 'dosen.nip')
        ->first();
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
    public function ubahpassword()
    {
        $dosen = Dosen::leftJoin('users', 'dosen.id_users', 'users.id_users')
                            ->leftJoin('roles', 'users.id_roles', 'roles.id_roles')
                            ->select('dosen.id_dosen', 'dosen.id_users', 'users.id_users', 'dosen.nama', 'dosen.foto','roles.id_roles', 'roles.roles', 'dosen.no_hp', 'dosen.email', 'dosen.nip')
                            ->first();
        return view('layout.ubah_password',compact('dosen'));
    }
    public function dashboard()
    {
        $dosen = Dosen::leftJoin('users', 'dosen.id_users', 'users.id_users')
                            ->leftJoin('roles', 'users.id_roles', 'roles.id_roles')
                            ->select('dosen.id_dosen', 'dosen.id_users', 'users.id_users', 'dosen.nama', 'dosen.foto','roles.id_roles', 'roles.roles', 'dosen.no_hp', 'dosen.email', 'dosen.nip')
                            ->first();
        return view('layout.dashboard',compact('dosen'));
    }
    public function detailnilai($id_mahasiswa)
    {
        $dosen = Dosen::leftJoin('users', 'dosen.id_users', 'users.id_users')
        ->leftJoin('roles', 'users.id_roles', 'roles.id_roles')
        ->select('dosen.id_dosen', 'dosen.id_users', 'users.id_users', 'dosen.nama',  'dosen.foto','roles.id_roles', 'roles.roles', 'dosen.no_hp', 'dosen.email', 'dosen.nip')
        ->first();
        $mahasiswa = DB::table('mahasiswa')->where('id_mahasiswa', $id_mahasiswa)->first();
        return view('nilai.detail_nilai',compact('dosen','id_mahasiswa','mahasiswa'));
    }
    public function detail_nilai_penguji($id_mahasiswa)
    {
        $dosen = Dosen::leftJoin('users', 'dosen.id_users', 'users.id_users')
        ->leftJoin('roles', 'users.id_roles', 'roles.id_roles')
        ->select('dosen.id_dosen', 'dosen.id_users', 'users.id_users', 'dosen.nama',  'dosen.foto','roles.id_roles', 'roles.roles', 'dosen.no_hp', 'dosen.email', 'dosen.nip')
        ->first();
       
        $mahasiswa = DB::table('mahasiswa')->where('id_mahasiswa', $id_mahasiswa)->first();
        return view('nilai.detail_nilai_penguji',compact('dosen','id_mahasiswa','mahasiswa'));
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
    public function nilai_akhir($id_mahasiswa)
    {
        $dosen = Dosen::leftJoin('users', 'dosen.id_users', 'users.id_users')
        ->leftJoin('roles', 'users.id_roles', 'roles.id_roles')
        ->select('dosen.id_dosen', 'dosen.id_users', 'users.id_users', 'dosen.nama', 'dosen.foto', 'roles.id_roles', 'roles.roles', 'dosen.no_hp', 'dosen.email', 'dosen.nip')
        ->first();
       
        $mahasiswa = DB::table('mahasiswa')->where('id_mahasiswa', $id_mahasiswa)->first();
    
        $summaryTeman = NilaiAkhir::where('id_mahasiswa',$id_mahasiswa)
        ->where('id_kelompok_penilai','1')
        ->sum('nilai');
        $countTeman = NilaiAkhir::where('id_mahasiswa',$id_mahasiswa)
        ->where('id_kelompok_penilai','1')
        ->count('id_kelompok_penilai');
        $bobotTeman = \DB::table('kelompok_penilai')
        ->where('id_kelompok_penilai','1')
        ->first();
        $resultTeman1 = $summaryTeman / $countTeman;
        $resultTeman2 = ($bobotTeman->bobot*$resultTeman1)/100;

        $summaryInstansi = NilaiAkhir::where('id_mahasiswa',$id_mahasiswa)
        ->where('id_kelompok_penilai','2')
        ->sum('nilai');
        $countInstansi =NilaiAkhir::where('id_mahasiswa',$id_mahasiswa)
        ->where('id_kelompok_penilai','2')
        ->count('id_kelompok_penilai');
        $bobotInstansi = \DB::table('kelompok_penilai')
        ->where('id_kelompok_penilai','2')
        ->first();
        $resultInstansi1 = $summaryInstansi / $countInstansi ;
        $resultInstansi2 = ($bobotInstansi ->bobot*$resultInstansi1)/100;

        $summaryPenguji = NilaiAkhir::where('id_mahasiswa',$id_mahasiswa)
        ->where('id_kelompok_penilai','3')
        ->sum('nilai');
        $countPenguji = NilaiAkhir::where('id_mahasiswa',$id_mahasiswa)
        ->where('id_kelompok_penilai','3')
        ->count('id_kelompok_penilai');
        $bobotPenguji = \DB::table('kelompok_penilai')
        ->where('id_kelompok_penilai','3')
        ->first();
        $resultPenguji1 = $summaryPenguji / $countPenguji ;
        $resultPenguji2 = ($bobotPenguji ->bobot*$resultPenguji1)/100;

        $summaryDospem = NilaiAkhir::where('id_mahasiswa',$id_mahasiswa)
        ->where('id_kelompok_penilai','4')
        ->sum('nilai');
        $countDospem = NilaiAkhir::where('id_mahasiswa',$id_mahasiswa)
        ->where('id_kelompok_penilai','4')
        ->count('id_kelompok_penilai');
        $bobotDospem = \DB::table('kelompok_penilai')
        ->where('id_kelompok_penilai','4')
        ->first();
        $resultDospem1 = $summaryDospem / $countDospem ;
        $resultDospem2 = ($bobotDospem ->bobot*$resultDospem1)/100;

        $finalResult = $resultTeman2 + $resultInstansi2 + $resultPenguji2 + $resultDospem2;

        return view('nilai.nilai_akhir',compact('dosen','id_mahasiswa','mahasiswa','summaryTeman','countTeman','bobotTeman','summaryInstansi','countInstansi',
        'bobotInstansi','resultInstansi1','resultInstansi2','summaryPenguji','countPenguji','bobotPenguji',
        'resultPenguji1','resultPenguji2','summaryDospem','countDospem','bobotDospem','resultDospem1'
        ,'resultDospem2','finalResult','resultTeman1','resultTeman2'));
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
    public function list_nilaiAkhir_penguji()
    {
        $dosen = Dosen::leftJoin('users', 'dosen.id_users', 'users.id_users')
        ->leftJoin('roles', 'users.id_roles', 'roles.id_roles')
        ->select('dosen.id_dosen', 'dosen.id_users', 'users.id_users', 'dosen.nama', 'dosen.foto', 'roles.id_roles', 'roles.roles', 'dosen.no_hp', 'dosen.email', 'dosen.nip')
        ->first();
        return view('nilai.list_nilaiAkhir_penguji',compact('dosen'));
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