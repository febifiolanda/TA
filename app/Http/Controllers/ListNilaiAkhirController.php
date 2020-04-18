<?php

namespace App\Http\Controllers;

use App\ListNilaiAkhir;
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
            $data = ListNilaiAkhir::all();
            // dd($data);
            return view('nilai.list_nilaiAkhir', compact('data'));
    
    }
    public function getData()
    {
        $data = ListNilaiAkhir::all();
        // dd($data);
        return datatables()->of($data)
        ->addColumn('action', function($row){
            $btn = '<a href="'.route('group.anggota',$row->id_kelompok).'" class="btn btn-info"><i class="fas fa-list"></i></a>';
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
        $listNilaiAkhir=ListNilaiAkhir::create($request->all());
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
     * @param  \App\ListNilaiAkhir  $listNilaiAkhir
     * @return \Illuminate\Http\Response
     */
    public function show(ListNilaiAkhir $listNilaiAkhir)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ListNilaiAkhir  $listNilaiAkhir
     * @return \Illuminate\Http\Response
     */
    public function edit(ListNilaiAkhir $listNilaiAkhir)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ListNilaiAkhir  $listNilaiAkhir
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ListNilaiAkhir $listNilaiAkhir)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ListNilaiAkhir  $listNilaiAkhir
     * @return \Illuminate\Http\Response
     */
    public function destroy(ListNilaiAkhir $listNilaiAkhir)
    {
        //
    }
}
