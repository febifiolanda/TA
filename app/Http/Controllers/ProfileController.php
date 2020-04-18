<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dosen;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     return response()->json(Dosen::get(),200);
    // }
    public function index()
    {
        $dosen = Dosen::leftJoin('users', 'dosen.id_users', 'users.id_users')
                            ->leftJoin('roles', 'users.id_roles', 'roles.id_roles')
                            ->select('dosen.id_dosen', 'dosen.id_users', 'users.id_users', 'dosen.nama', 'roles.id_roles', 'roles.roles', 'dosen.no_hp', 'dosen.email', 'dosen.nip')
                            ->first();
        return view('profile.profile', compact('dosen'));
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
        $profile=Dosen::create($request->all());
        return response()->json($profile, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $profile=Dosen::find($id);
        if(is_null($profile)){
            return response()->json(['messege'=>'record not found', 400]);
        }
        return response()->json(Dosen::find($id), 200);
        // $data = Dosen::find($id);
        // // return($data);
        // return response()->json([
        //     'status'=>'success',
        //     'result'=>$data
        // ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dosen = Dosen::findOrFail($id);
        return view('profile.edit_profil', compact('dosen'));
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
        // return($request);
        // $data = Dosen::find($id);
        // $data->nama = $request->nama;
        // $data->nip = $request->nip;
        // $data->save();
        
        // return response()->json([
        //     'status'=>'success',
        //     'result'=>$data
        // ]);
        $dosen = Dosen::find($id);
        $dosen->nama = $request->nama;
        $dosen->nip = $request->nip;
        $dosen->email = $request->email;
        $dosen->no_hp = $request->no_hp;
    
        $dosen->save();

        return redirect('profile'); 
    }
    public function updateAvatar(Request $request, $id)
    {
        $dosen = Dosen::findOrFail($id);

        $file = $request->file('foto');

        $extension = strtolower($file->getClientOriginalExtension());
        $filename = $dosen->nama . '.' . $extension;
        Storage::put('public/uploads/avatar/' . $filename, File::get($file));
        $file_server = Storage::get('public/uploads/avatar/' . $filename);
        // $file_server = Storage::get('public/uploads/avatar/' . $filename);
        $img = Image::make($file_server)->resize(141, 141);
        $path = public_path('uploads/avatar' . $filename);
        $file->move('uploads/avatar',$filename);
        $dosen->foto=$filename;

        $dosen->save();
        
        return redirect('profile')
        ->with('alert-success','Avatar has been changed!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
