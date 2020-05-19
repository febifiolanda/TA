<?php

namespace App\Http\Controllers;
use App\Periode;
use App\Laporan;
use App\DaftarPenilaianPenguji;
use Illuminate\Http\Request;

class DaftarPenilaianPengujiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DaftarPenilaianPenguji::all();
        // dd($data);
        return view('nilai.input_nilai', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getData()
    {
        $data = Laporan::all();
        // dd($data);
        return datatables()->of($data)
        ->addColumn('action', function($row){
            $btn = '<a href="'.route('list.anggota1',$row->id_kelompok).'" class="btn btn-info"><i class="fas fa-list"></i></a>';
            return $btn;
        })
        ->addIndexColumn()
        ->rawColumns(['action'])
        ->make(true);
    }
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
        $rules= [
            'judul'=>'required|min:6'
        ];
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return response()->json($validator->errors(), 400);
        }
        $daftarpenialianpenguji=DaftarPenilaianPenguji::create($request->all());
        return response()->json($daftarpenialianpenguji, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DaftarPenilaianPenguji  $daftarPenilaianPenguji
     * @return \Illuminate\Http\Response
     */
    public function show(DaftarPenilaianPenguji $daftarPenilaianPenguji)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DaftarPenilaianPenguji  $daftarPenilaianPenguji
     * @return \Illuminate\Http\Response
     */
    public function edit(DaftarPenilaianPenguji $daftarPenilaianPenguji)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DaftarPenilaianPenguji  $daftarPenilaianPenguji
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DaftarPenilaianPenguji $daftarPenilaianPenguji)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DaftarPenilaianPenguji  $daftarPenilaianPenguji
     * @return \Illuminate\Http\Response
     */
    public function destroy(DaftarPenilaianPenguji $daftarPenilaianPenguji)
    {
        //
    }
}
