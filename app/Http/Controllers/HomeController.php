<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user                           = Auth::user();
        $referred_users                 = User::where('referrer_id',$user->id)->get();
        $referred_users_last_14days     = User::getReferredUsersInTime(5,$user)->count();


        if($user->role->name==="admin"){
            return view('admin.index',[
                'users'=>User::where('role_id',1)->get(),
            ]);
        }

        return view('home',[
            'user'                          =>$user,
            'referrer_users'                =>$referred_users,
            'referred_users_last_14days'    =>$referred_users_last_14days,
            'referred_users_count'           =>$referred_users->count(),
        ]);
    }
}
