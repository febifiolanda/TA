<?php

namespace App\Http\Controllers;
use App\BukuHarian;
use App\Group;
use App\Profile;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Validator;
use Illuminate\Http\Request;
use Carbon\Carbon;

class BukuHarianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $dosen =  Auth::user()->dosen()
        ->leftJoin('users', 'dosen.id_users', 'users.id_users')
        ->leftJoin('roles', 'users.id_roles', 'roles.id_roles')
        ->select('dosen.id_dosen', 'dosen.id_users', 'users.id_users', 'dosen.nama', 'dosen.foto','roles.id_roles', 'roles.roles', 'dosen.no_hp', 'dosen.email', 'dosen.nip')
        ->first();

        return view('logbook.list_kegiatan', compact('id','dosen'));
    }

    public function getData($id_mahasiswa)
    {
        $data = BukuHarian::where('id_mahasiswa',$id_mahasiswa)
        ->orderBy('created_at','DESC')
        ->get();
        return datatables()->of($data)
        ->addColumn('tanggal', function($row){
            $tanggal = Carbon::parse($row->tanggal)->format('j F Y');
            return $tanggal;
        })
        ->addColumn('action', function($row){
            $btn = '<a href="'.route('acckegiatan',['id'=>$row->id_buku_harian,'tipe'=>'terima']).
            '" class="btn-sm btn-info"><i class="fas fa-pencil"></i>Terima</a>';
            $btn = $btn.' <a href="'.route('acckegiatan',['id'=>$row->id_buku_harian,'tipe'=>'tolak']).
            '" class="btn-sm btn-danger"><i class="fas fa-pencil"></i>Tolak</a>';
            return $btn;
        })
        ->addIndexColumn()
        ->rawColumns(['tanggal','action'])
        ->make(true);
    }

    public function getDataMahasiswa()
    {    $dosen =  Auth::user()->dosen()
        ->leftJoin('users', 'dosen.id_users', 'users.id_users')
        ->leftJoin('roles', 'users.id_roles', 'roles.id_roles')
        ->select('dosen.id_dosen', 'dosen.id_users', 'users.id_users', 'dosen.nama', 'dosen.foto','roles.id_roles', 'roles.roles', 'dosen.no_hp', 'dosen.email', 'dosen.nip')
        ->first();
        $group = Group::where('id_dosen',$dosen->id_dosen)->get();
        $data = DB::table('kelompok_detail')
                    ->leftJoin('kelompok','kelompok_detail.id_kelompok','kelompok.id_kelompok')
                    ->leftJoin('mahasiswa','kelompok_detail.id_mahasiswa','mahasiswa.id_mahasiswa')
                    ->join('magang','magang.id_kelompok','kelompok_detail.id_kelompok')
                    ->join('instansi','instansi.id_instansi','magang.id_instansi')
                    ->whereIn('kelompok_detail.status_join',['create','diterima'])
                    ->where('kelompok.id_dosen',$dosen->id_dosen)
                    ->select('mahasiswa.id_mahasiswa','mahasiswa.nama as nama_mahasiswa','mahasiswa.nim','instansi.nama as nama_instansi','kelompok.nama_kelompok')
                    ->get();
       
        return datatables()->of($data)
        ->addColumn('action', function($row){
            $btn = '<a href="'.url('/list_kegiatan',$row->id_mahasiswa).'" class="btn btn-info"><i class="fas fa-list"></i></a>';
            return $btn;
        })
        ->addIndexColumn()
        ->rawColumns(['action'])
        ->make(true);
    }

    public function acckegiatan(Request $request, $id, $tipe){
        switch ($tipe) {
            case 'terima':
                //sementara kalo diterima statusnya diperiksa ya
                $status = 'diperiksa';
                break;
            default:
                //kalo ditolak diproses
                $status = 'diproses';
                break;
        }
        $bukuharian = BukuHarian::findOrFail($request->id);
        $bukuharian->status = $status;

        $bukuharian->save();
        return redirect()->route('bukuharian.index',$bukuharian->id_mahasiswa);
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
        $rules= [
            'kegiatan'=>'required|min:6'
        ];
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return response()->json($validator->errors(), 400);
        }
        $bukuharian=BukuHarian::create($request->all());
        return response()->json($bukuharian, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bukuharian=BukuHarian::find($id);
        if(is_null($bukuharian)){
            return response()->json(['messege'=>'record not found', 400]);
        }
        return response()->json(BukuHarian::find($id), 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
    public function update(Request $request, $id)
    {
        $rules= [
            'kegiatan'=>'required|min:6'
        ];
        $validator= Validator::make($request->all(), $rules);
        if($validator->fails()){
            return response()->json($validator->errors(), 400);
        }
        $bukuharian=BukuHarian::find($id);
        if(is_null($bukuharian)){
            return response()->json(['messege'=>'record not found', 400]);
        }
        $bukuharian->update($request->all());
        return response()->json($bukuharian, 200); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $bukuharian=BukuHarian::find($id);
        if(is_null($bukuharian)){
            return response()->json(['messege'=>'record not found', 400]);
        }
        $bukuharian->delete();
        return response()->json(null, 204);
    }
}
