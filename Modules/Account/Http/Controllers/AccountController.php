<?php

namespace Modules\Account\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use App\User;
use Auth;
use Hash;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('account::index');
    }

    public function register()
    {
        return view('account::register');
    }

    public function storeUser(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'username' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required',
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'roleID' => 2
        ]);
        return redirect()->route('welcome');
    }

    public function login()
    {
        return view('account::login');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            if (Auth::user()->roleID == 1) {
                return redirect()->route('welcome');
            } else {
                return redirect()->route('welcome');
            }
        }
        return redirect()->route('login')->with('error', 'Oppes! You have entered invalid credentials');
    }

    public function userProfile()
    {
        
    }

    public function storeUserProfile(Request $request)
    {
        // User::where('email', Auth::user()->email)
        //     ->update([
        //         'name' => $request->name,
        //         'phonenumber' => $request->phonenumber,
        //         'dateofbirth' => $request->dateofbirth
        //     ]);
        // Auth::user()->phonenumber = $request->phonenumber;
        // Auth::user()->dateofbirth = $request->dateofbirth;

        // return redirect(route('editUserInfor'))->with('error', 'Oppes! You have entered invalid credentials');
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('welcome');
    }
}
