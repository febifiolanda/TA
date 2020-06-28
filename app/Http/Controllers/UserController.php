<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use App\Http\Controllers\Controller; 
use App\User; 
use App\Profile;
// use App\Http\Controllers\Session;
use Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth; 
use Validator;
class UserController extends Controller
{
    public $successStatus = 200;
        /** 
         * login api 
         * 
         * @return \Illuminate\Http\Response 
         */  
    public function logindosen(){
        return view('auth.login');
    }

    public function login(Request $request){
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required|string'
        ]);
        $auth = $request->only('username', 'password');
        $auth['id_roles'] = 2;

        if(Auth::attempt($auth)){
            $user = Auth::user();
            // $user->api_token = str_random(100);
            $user->save();
            // return redirect('/login')->with('error',$user);
            return redirect('/dashboard')->with('sukses','Anda Berhasil Login');
           
        }
        return redirect('/login')->with('error','Akun Belum Terdaftar');
    }
      
        public function register(Request $request) 
        { 
            $validator = Validator::make($request->all(), [ 
                'username' => 'required', 
                'password' => 'required', 
                'id_roles' => 'required',
                'isDeleted' => 'required',
                'created_by' => 'required',
                'updated_by' => 'required',

            ]);
            if ($validator->fails()) { 
                return response()->json(['error'=>$validator->errors()], 401);            
            }
            $input = $request->all(); 
            $input['password'] = bcrypt($input['password']); 
            $user = User::create($input); 
            $success['token'] =  $user->createToken('MyApp')-> accessToken; 
            $success['name'] =  $user->name;
            return response()->json(['success'=>$success], $this-> successStatus); 
                }

                public function details() 
                { 
                    $user = Auth::user(); 
                    return response()->json(['success' => $user], $this-> successStatus); 
                } 
                public function logout()
                {
                    Auth::logout();     
                    Session::flush();    
                    return redirect('login');
                }
    // public function logout(Request $request){
    //     if(Auth::guard('administrator')->check()){
    //         Auth::guard('administrator')->logout();
    //     } else if(Auth::guard('dosen')->check()){
    //         Auth::guard('dosen')->logout();
    //     } else if(Auth::guard('mahasiswa')->check()){
    //         Auth::guard('mahasiswa')->logout();
    //     } else if(Auth::guard('instansi')->check()){
    //         Auth::guard('instansi')->logout();
    //     }
    // 	return redirect('admin/login')->with('sukses','Anda Telah Logout');
    // }

}
