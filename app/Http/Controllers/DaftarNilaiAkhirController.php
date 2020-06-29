<?php

namespace App\Http\Controllers;

use App\DaftarNilaiAkhir;
use Illuminate\Http\Request;
use App\Group;
class DaftarNilaiAkhirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DaftarNilaiAkhir::all();
        // dd($data);
        return view('nilai.daftar_nilaiAkhir', compact('data'));
    }

    public function getData()
    {
        $data = DaftarNilaiAkhir::all();
        // dd($data);
        return datatables()->of($data)
        ->addColumn('action', function($row){
            $btn = '<a href="'.route('list.anggota',$row->id_kelompok).
            '" class="btn btn-info"><i class="fas fa-list"></i></a>';
            return $btn;
        })
        ->addIndexColumn()
        ->rawColumns(['action'])
        ->make(true);
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
        $daftarnilaiakhir=DaftarNilaiAkhir::create($request->all());
        return response()->json($daftarnilaiakhir, 200);
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
     * @param  \App\DaftarNilaiAkhir  $daftarNilaiAkhir
     * @return \Illuminate\Http\Response
     */
    public function show(DaftarNilaiAkhir $daftarNilaiAkhir)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DaftarNilaiAkhir  $daftarNilaiAkhir
     * @return \Illuminate\Http\Response
     */
    public function edit(DaftarNilaiAkhir $daftarNilaiAkhir)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DaftarNilaiAkhir  $daftarNilaiAkhir
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DaftarNilaiAkhir $daftarNilaiAkhir)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DaftarNilaiAkhir  $daftarNilaiAkhir
     * @return \Illuminate\Http\Response
     */
    public function destroy(DaftarNilaiAkhir $daftarNilaiAkhir)
    {
        //
    }
}
