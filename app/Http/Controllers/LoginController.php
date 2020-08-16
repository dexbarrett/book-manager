<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function show()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $email = $request->get('email');
        $password = $request->get('pwd');
        $remember = $request->boolean('remember');

        if (Auth::attempt(['email' => $email, 'password' => $password], $remember)) {
            return redirect()->intended(route('dashboard'));
        }

        return redirect()->route('login')
            ->withInput($request->only(['email']))
            ->withErrors([__('auth.failed')]);
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }

    public function dashboard()
    {
        return view('dashboard');
    }
}
