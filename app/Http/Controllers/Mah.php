<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('kelompok.detail_kelompok');
    }
    public function inputnilai_dosen()
    {
        return view('nilai.input_nilai');
    }
    public function dashboard()
    {
        return view('layout.dashboard');
    }
    public function detailnilai()
    {
        return view('nilai.detail_nilai');
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
        return view('laporan.laporan');
    }
    public function nilai_akhir()
    {
        return view('nilai.nilai_akhir');
    }
    public function login()
    {
        return view('login.login');
    }
    public function detail_inputNilai()
    {
        return view('nilai.detail_inputNilai');
    }
    public function edit_profil()
    {
        return view('profile.edit_profil');
    }
    public function list_kegiatanHarian()
    {
        return view('logbook.list_kegiatanHarian');
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
        return view('nilai.list_nilaiAkhir');
    }
   


}