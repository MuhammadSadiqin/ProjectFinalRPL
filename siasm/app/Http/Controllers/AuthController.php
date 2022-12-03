<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function register()
    {
        return view('register');
    }

    public function authenticating(Request $request)
    {        
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            if(Auth::user()->role_id == 1){
                return redirect('dashboard');
            }

            if(Auth::user()->role_id == 2){
                return redirect('pengajuan');
            }
        };
        

       
        // if (Auth::attempt($credentials)) {
        //     // cek apakah user status = active
        //     if(Auth::user()->status != 'active'){
        //         Auth::logout();
        //         $request->session()->invalidate();
        //         $request->session()->regenerateToken();
        
        //         Session::flash('status','failed');
        //         Session::flash('massage','kapeu aktif ile');
        //         return redirect('/login');
        //     }

            
    }

    //     Session::flash('status','failed');
    //     Session::flash('massage','login invalid');
    //      return redirect('/login');
    // }

    public function logout(Request $request)
    {
        Auth::logout();
 
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('login');

    }

    public function registerProcess(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|unique:users|max:255',
            'password' => 'required|max:255',
            'nim' => 'required',
            'jurusan' => 'required',
            'prodi' => 'required',
        ]);

        $request['password'] =  Hash::make($request->password);
        $user = User::create($request->all());

        Session::flash('status','success');
        Session::flash('massage','kabereh daftar. tinggai kapreh ipeu aktif le admin');
        return redirect('register');
        
    }
}
