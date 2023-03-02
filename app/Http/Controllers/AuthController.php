<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\User;
// use Hash;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

// use Illuminate\Contracts\Session\Session;


class AuthController extends Controller
{

    public function index()
    {
        return view('auth.login');
    }


    public function registration()
    {
        return view('auth.register');
    }


    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();
            // $success['token'] =  $authUser->createToken('MyAuthApp')->plainTextToken;
            return redirect()->intended('todos');
        }

        // return redirect("/")->withErrors(['email' => 'Your Credentials could not be verified ']);
        throw ValidationException::withMessages([
            'email' => 'Your credentials could not be verified'
        ]);
    }


    public function postRegistration(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $data = $request->all();
        $check = $this->create($data);

        return redirect("/")->withSuccess('Great! please login.');
    }




    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => bcrypt($data['password']),

      ]);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function logout() {
        Session::flush();
        Auth::logout();

        return Redirect('/');
    }
}
