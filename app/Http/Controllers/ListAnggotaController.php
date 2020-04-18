<?php

namespace App\Http\Controllers;

use App\ListAnggota;
use Illuminate\Http\Request;

class ListAnggotaController extends Controller
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
        $laporan=Laporan::create($request->all());
        return response()->json($laporan, 200);
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
        $laporan=Laporan::create($request->all());
        return response()->json($laporan, 200); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ListAnggota  $listAnggota
     * @return \Illuminate\Http\Response
     */
    public function show(ListAnggota $listAnggota)
    {
        $laporan=Laporan::find($id);
        if(is_null($laporan)){
            return response()->json(['messege'=>'record not found', 400]);
        }
        return response()->json(Laporan::find($id), 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ListAnggota  $listAnggota
     * @return \Illuminate\Http\Response
     */
    public function edit(ListAnggota $listAnggota)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ListAnggota  $listAnggota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ListAnggota $listAnggota)
    {
      
        $rules= [
            'judul'=>'required|min:6'
        ];
        $validator= Validator::make($request->all(), $rules);
        if($validator->fails()){
            return response()->json($validator->errors(), 400);
        }
        $laporan=Laporan::find($id);
        if(is_null($laporan)){
            return response()->json(['messege'=>'record not found', 400]);
        }
        $laporan->update($request->all());
        return response()->json($laporan, 200); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ListAnggota  $listAnggota
     * @return \Illuminate\Http\Response
     */
    public function destroy(ListAnggota $listAnggota)
    {
        $laporan=Laporan::find($id);
        if(is_null($laporan)){
            return response()->json(['messege'=>'record not found', 400]);
        }
        $laporan->delete();
        return response()->json(null, 204);
    }
    }
}
