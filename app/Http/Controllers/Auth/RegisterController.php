<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use MongoDB\Driver\Session;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;
    public function showRegistrationForm(Request $request)
    {
        if($request->has('ref')){


            session(['referrer'=> $request->ref]);

        }
        return view('auth.register');
    }

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username'  => ['required'],
            'name'      => ['required', 'string', 'max:255'],
            'email'     => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'  => ['required', 'string', 'min:8', 'confirmed'],
            'image'     => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5000',
        ]);
    }

    protected  function saveImage($image,$imageLocation){
        $file           = $image;

        $new_file       = time() . $file->getClientOriginalName();

        $file ->move($imageLocation, $new_file);
        return $new_file;
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {

        $referrer = User::where('username',session()->get('referrer'))->first();
        if($referrer){
            User::updateRefererCount($referrer->id);
        }


        return User::create([
            'username'=>   $data['username'],
            'name'     =>  $data['name'],
            'email'    =>  $data['email'],
            'image'    =>  $this->saveImage($data['image'],'images'),
            'role_id'  =>  1,
            'referrer_id' => $referrer ? $referrer->id : null,
            'password' =>  Hash::make($data['password']),
        ]);
    }
}
