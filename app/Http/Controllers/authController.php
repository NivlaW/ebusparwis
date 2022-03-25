<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Models\User;


class authController extends Controller
{
    public function formlogin(){
        if (auth::check()){
            if (Auth::user()->level == 'admin'){
                return redirect('admin/dashboard');
            }
            else{
                return redirect('resepsionis/client');
            }
        }
        return view('login');
    }

    public function login(Request $request){
        $data = request()->validate([
            'username' => 'required',
            'password' => 'required'
        ],
        [
            'username.required' => 'Username tidak boleh kosong',
            'password.required' => 'Password tidak boleh kosong'
        ]);
        if (Auth::attempt($data)){
            if (Auth::user()->level == 'admin'){
                return redirect('admin/dashboard');
            }
            else{
                return redirect('resepsionis/client');
            }
        } else {
            return view('login');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}
