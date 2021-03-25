<?php

namespace App\Http\Controllers;

// IMPORT
use Auth;
use App\User;
use Illuminate\Http\Request;

// MODEL
use App\Sector;



class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }


    public function registrasi()
    {
        $sector = Sector::orderBy('name', 'ASC')->get();
        return view('auth.register', compact('sector'));
    }

    public function postregistrasi(Request $request)
    {  
        $this->validate($request,[
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'sector_id' => 'required|integer|exists:sectors,id'
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->sector_id = $request->sector_id;
        $user->role = 1;
        $user->status = 'active';
        $user->save();

        return redirect('/');
    }

    public function postlogin(Request $request)
    {
        $this->validate($request,[
            'email' => 'required|email|max:255',
            'password' => 'required|min:8',
        ]);

        if(Auth::attempt($request->only('email','password'))){
            return redirect('/');
        }

        return redirect('/login')->with(['login_error' => 'email atau password anda salah']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }



}
