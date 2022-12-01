<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Session;

class AdminController extends Controller
{
    public function showLogin() {
        return view('login');
    }

    public function adminLogin(Request $request) {
        $user = User::where("email", "=", $request->email)->first();
        if ($user){
            if (Hash::check($request->pw, $user -> password)){
                if ($user -> role == "admin"){
                    $request->session()->put('id', $user -> admin_id);
                    $request->session()->put('email', $user -> email);
                    $request->session()->put('role', $user -> role);
                    $request->session()->put('first_name', $user -> first_name);
                    $request->session()->put('last_name', $user -> last_name);

                    return redirect('/dashboard');
                }else{
                    return redirect("/")->with('fail', 'Not an admin account!');
                }
            }else{
                return redirect("/login")->with('fail', 'Incorrect password!');
            }
        }else{
            return redirect("/login")->with('fail', 'No account is registered to the email!');
        }

    }

    public function adminLogout(){
        if (Session::has('id')){
            Session::pull('id');
            Session::pull('email');
            Session::pull('role');
            Session::pull('first_name');
            Session::pull('last_name');
            return redirect('/dashboard');
        }
    }

}
