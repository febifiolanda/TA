<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image as Image;
use Storage;
use File;
use App\User;
use App\Rules\MatchOldPassword;
// use Image;

use App\Profile;

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
        //dd(\Auth::user());
        $dosen =  Auth::user()->dosen()
        ->leftJoin('users', 'dosen.id_users', 'users.id_users')
        ->leftJoin('roles', 'users.id_roles', 'roles.id_roles')
        ->select('dosen.id_dosen', 'dosen.id_users', 'users.id_users', 'dosen.nama',
         'dosen.foto','roles.id_roles', 'roles.roles', 'dosen.no_hp', 'dosen.email',
         'dosen.nip')
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

    $post = Profile::create(['foto' => $request->foto]);
    return redirect(route('post.add'));
        }

    public function updateAvatar(Request $request, $id_dosen)
    {
        $dosen = Profile::where('id_dosen',$id_dosen)->first();

        $this-> validate($request,
        [
            'foto'	=> 'required |mimes:jpg,png,jpeg,webp'
        ]);

        $file = $request->file('foto');

        $extension = strtolower($file->getClientOriginalExtension());
        // $filename = $dosen->nama . '.' . $extension;
        $filename = "PhotoProfile-".$dosen->id_users."-".time().".".$file->getClientOriginalExtension();
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
        $this->validate($request, [
            'nama' => 'required|string|max:191',
            // 'username' => 'required|string|unique:users|max:191',
            // 'password' => 'required|min:6|max:191',
            'email' => 'required|email|max:191',
            'no_hp' => 'required|max:25',
            'nip' => 'required|max:25',
            'foto' => 'nullable|image|mimes:jpg,png,jpeg',
        ],
        [
            'nama.required' => 'can not be empty !',
            // 'username.required' => 'can not be empty !',
            // 'username.unique' => 'username has already been taken !',
            // 'password.max' => 'password is to long !',
            'email.required' => 'can not be empty !',
            'email.unique' => 'Email has already been taken !',
            'no_hp.required' => 'can not be empty !',
            'nip.required' => 'can not be empty !',
        ]);
        $id_users = $request->id_users;
        $dosen = Dosen::where('id_dosen',$id_users)->first();
        $dosen->nama = $request->nama;
        $dosen->no_hp = $request->no_hp;
        $dosen->email = $request->email;
        $dosen->nip = $request->nip;
        $dosen->save();
        return response()->json(['message' => 'Admin added successfully.']);
    }

    public function changePassword(Request $request)
    {
        // $this->validate($request, [
        //     'password' => 'required|min:6|max:191'
        // ],
        // [
        //     'password.min' => 'password is too short !',
        //     'password.max' => 'password is too long !',
        // ]);
        // $data = User::where ('id_users',$id_users)->first();
        // $data->password = Hash::make($request->password);
        // $data->save();
        // return response()->json(['message'=>'Password updated successfully.']);
        $request->validate([
            
            'new_password' => ['required','min:6','max:191'],
            'new_confirm_password' => ['same:new_password'],
        ]);
   
       $user =  User::find(\Auth::user()->id_users);

    //    dd($user);
        $user->update(['password'=> \Hash::make($request->new_password)]);
   
        // dd('Password change successfully.');

        return redirect('dashboard');
         
    }
        

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $profile=Profile::find($id);
        if(is_null($profile)){
            return response()->json(['message' => 'Data updated successfully.']);
        }
       
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
        $dosen = Profile::findOrFail($id);
        return view('profile.edit_profil', compact('dosen'));
        return response()->json(['message' => 'Data updated successfully.']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_dosen)
    {
        $this->validate($request, [
            'nama' => 'required|string|max:191',
            // 'username' => 'required|string|max:191',
            'email' => 'required|email|max:191',
            'no_hp' => 'required|max:25',
            'nip' => 'required|max:25',
            // 'foto' => 'nullable|image|mimes:jpg,png,jpeg',
        ],
        [
            'nama.required' => 'can not be empty !',
            // 'username.required' => 'can not be empty !',
            // 'username.unique' => 'username has already been taken !',
            'email.required' => 'can not be empty !',
            'no_hp.required' => 'can not be empty !',
            'nip' => 'can not be empty !',
        ]);

        $dosen = Profile::where('id_dosen',$id_dosen)->first();
        $dosen->nama = $request->nama;
        $dosen->no_hp = $request->no_hp;
        $dosen->email = $request->email;
        $dosen->nip = $request->nip;
        $dosen->save();
        
        return response()->json(['message' => 'Data updated successfully.']);
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
