<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group;
use App\DetailGroup;


class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Group::all();
        // dd($data);
        return view('kelompok.kelompok', compact('data'));

       
    }
    public function getData()
    {
        $data = Group::all();
        // dd($data);
        return datatables()->of($data)
        ->addColumn('action', function($row){
            $btn = '<a href="'.route('group.show',$row->id_kelompok).'" class="btn btn-info"><i class="fas fa-list"></i></a>';
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
    public function show($id_kelompok)
    {
        return view('kelompok.detail_kelompok');
    }

   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_kelompok)
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
    public function update(Request $request, $id_kelompok)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_kelompok)
    {
        //
    }

    public function api_showDetail($id_kelompok)
    {
      

        $ketua=DetailGroup::where('id_kelompok',$id_kelompok)
        ->leftJoin('mahasiswa','kelompok_detail.id_mahasiswa', '=','mahasiswa.id_mahasiswa')
        ->where('status_keanggotaan','ketua')
        ->get();
       
        $anggota=DetailGroup::where('id_kelompok',$id_kelompok)
        ->leftJoin('mahasiswa','kelompok_detail.id_mahasiswa', '=','mahasiswa.id_mahasiswa')
        ->where('status_keanggotaan','anggota')
        ->get();

        return response()->json([
            'status'=>'success',
            'ketua'=>$ketua,
            'anggota'=>$anggota
        ],200);
    }
}
