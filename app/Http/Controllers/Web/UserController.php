<?php

namespace App\Http\Controllers\Web;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        return view("user.index");
    }

    public function login(Request $request){
        if(!Auth::attempt($request->only(['email', 'password']))){
            return redirect()->back()->withErrors(["Usuario ou senha invalidos"]);
        }

        return to_route("series.index");
    }

    public function logout(){
        Auth::logout();
        return to_route("login");
    }

    public function create(Request $request){
        return view("user.create");
    }

    public function store(Request $request){
        $data = $request->except(['_token']);
        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);
        Auth::login($user);
        return to_route('series.index');
    }
}
