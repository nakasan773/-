<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Sex;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/users';

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
            'screen_name' => ['required', 'string', 'min:6', 'max:50'],
            'name' => ['required', 'string', 'min:1', 'max:15'],
            'age' => ['required', 'string', 'max:200'],
            'user_sex_id' => ['required'],
            'single_comment' => ['required', 'string', 'min:1', 'max:15'],
            'email' => ['required', 'string', 'unique:users','email'],
            'password' => ['required', 'string', 'min:6', 'max:15', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
                'screen_name' => $data['screen_name'],
                'name' => $data['name'],
                'age' => $data['age'],
                'user_sex_id' => $data['user_sex_id'],
                'single_comment' => $data['single_comment'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
        ]);
    }
}
