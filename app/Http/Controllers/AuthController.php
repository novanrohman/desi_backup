<?php

namespace App\Http\Controllers;

use App\Models\TamuSatgas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;




class AuthController extends Controller
{
    public function register()
    {
        return view('landing.register');
    }
    public function tamu()
    {
        return view('pengunjung.tamu');
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'nim' => 'required|string|max:20|unique:tamu_satgas',
            'email' => 'required|string|email|max:100',
            'password' => 'required|string|max:100',
            'prodi' => 'required|string|max:100',
        ]);
        
        $data = $request->all();
        $data['password'] = bcrypt($data['password']);
        $user = tamuSatgas::create($data);
        event(new Registered($user));
        
        
        // $user = new TamuSatgas();
        // $user -> nama = $request->nama;
        // $user -> nim = $request-> nim;
        // $user -> email = $request-> email;
        // $user -> password = Hash::make($request->password);
        // $user -> prodi = $request-> prodi;
        
        // $user->save();
        // dd($user);
        
        
        return back()-> with('success', 'Register successfully');
    }
    
    public function login()
    {
        return view('landing.login');
    }

    public function prosesLogin(Request $request)
        {
            $credentials = $request->validate([
                'email' => ['required','email'],
                'password' => ['required'],

            ]);

            if (Auth::attempt($credentials) == true) {
                $request->session()->regenerate();
                return redirect('/tamu');
            // if (Auth::attempt($credentials)) {
            //     // Authentication successful
            //     $request->session()->regenerate();
                // return redirect()->intended('/index');
            } else {
            //     // Authentication failed
                return redirect('/login');
                // dd($credentials);
            }
        }
        // return back()->with('error', 'email or Password salah');

        public function processLogout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }
}
