<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image as Image;
use Storage;
use File;
// use Image;

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
    public function add(){
        if(!empty($request->foto)){
            $file =$request->file('foto');
            $extension=strtolower($file->GetClientOriginalExtension());
            $filename=$request->name .'.'. $extension;
            Storage::put('image/users/'.$filename,File::get($file));
            $file_server=Storage::get('image/users/'.$filename);
            $img=Image::make($file_server)->resize(141,141);
            $img->save(base_path('public/imamges/users'.$filename));
        }




        // $post = Dosen::all();
        // return view('post.add', compact('dosen'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function save(Request $request)
    {
    //validasi data
    $this->validate($request, [
    	'foto'	=> 'nullable|image|mimes:jpg,png,jpeg,webp'
    ]);

    //menyimpan ke table posts kemudian redirect page 

    $post = Dosen::create(['foto' => $request->foto]);
    return redirect(route('post.add'));
        }

    public function updateAvatar(Request $request, $id_dosen)
    {
        $dosen = Dosen::where('id_dosen',$id_dosen)->first();

        $this-> validate($request,
        [
            'foto'	=> 'required |mimes:jpg,png,jpeg,webp'
        ]);

        $file = $request->file('foto');

        $extension = strtolower($file->getClientOriginalExtension());
        $filename = $dosen->nama . '.' . $extension;
        Storage::put('images/users/' . $filename, File::get($file));
        $file_server = Storage::get('images/users/' . $filename);
        // $file_server = Storage::get('public/uploads/avatar/' . $filename);
        $img = Image::make($file_server)->resize(141, 141);
        $img->save(base_path('public/images/users/' . $filename));
        
        
        $dosen->foto=$filename;
        // $dosen->updated_by=Auth::user()['id_users'];
        $dosen->save();
        
        return redirect('/profile')
        ->with('alert-success','Avatar has been changed!');
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
