<?php

namespace App\Http\Controllers;

use App\Laporan;
use Illuminate\Http\Request;
use Validator;
use Carbon\Carbon;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Laporan::get(),200);
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
    public function getData()
    {
        $data = Laporan::with('group.periode')->get();
        // dd($data);
        return datatables()->of($data)
        ->addColumn('action', function($row){
            $btn = '<a class="btn btn-primary view-pdf" href="marsekal-rama.net/CV-Rama.pdf"></a>';
            return $btn;
        })
        ->addColumn('tgl_upload', function($row){
            $tgl_upl = Carbon::parse($row->created_at)->format('j F Y');
            return $tgl_upl;
        })
        ->addIndexColumn()
        ->rawColumns(['action','tgl_upload'])
        ->make(true);
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
     * @param  \App\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
     * @param  \App\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function edit(Laporan $laporan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
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
     * @param  \App\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
       
        $laporan=Laporan::find($id);
        if(is_null($laporan)){
            return response()->json(['messege'=>'record not found', 400]);
        }
        $laporan->delete();
        return response()->json(null, 204);
    }
}
