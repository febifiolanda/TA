<?php

namespace App\Http\Controllers;

use App\NilaiAkhir;
use DB;
use Response;
use Illuminate\Http\Request;

class NilaiAkhirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    public function getnilai($id_mahasiswa){

        //ini caranya disamain kayak di ListDaftarNilaiAkhirController
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

        $mah = json_decode($finalResult);

        return response()->json([
            'id_mahasiswa' => $mahasiswa->id_mahasiswa,
            'mahasiswa' => $mahasiswa,
            'nilai_teman' => number_format($resultTeman2, 2), 
            'bobot_teman' => $bobotTeman->bobot,
            'nilai_instansi' => number_format($resultInstansi2, 2), 
            'bobot_instansi' => $bobotInstansi->bobot,
            'nilai_penguji' => number_format($resultPenguji2, 2), 
            'bobot_penguji' => $bobotPenguji->bobot,
            'nilai_dospem' => number_format($resultDospem2, 2), 
            'bobot_dospem' => $bobotDospem->bobot,
            'nilai_akhir' => $mah], 200);

    
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
     * @param  \App\NilaiAkhir  $nilaiAkhir
     * @return \Illuminate\Http\Response
     */
    public function show(NilaiAkhir $nilaiAkhir)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\NilaiAkhir  $nilaiAkhir
     * @return \Illuminate\Http\Response
     */
    public function edit(NilaiAkhir $nilaiAkhir)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\NilaiAkhir  $nilaiAkhir
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NilaiAkhir $nilaiAkhir)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\NilaiAkhir  $nilaiAkhir
     * @return \Illuminate\Http\Response
     */
    public function destroy(NilaiAkhir $nilaiAkhir)
    {
        //
    }
}
