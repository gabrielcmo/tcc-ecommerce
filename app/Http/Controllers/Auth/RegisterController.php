<?php

namespace Doomus\Http\Controllers\Auth;

use Doomus\User;
use Doomus\Http\Controllers\Controller;
use Doomus\Http\Controllers\CartController;
use Doomus\Http\Controllers\HistoricController;
use Doomus\Http\Models\Cart;
use Doomus\Http\Models\Historic;
use Illuminate\Support\Facades\Hash;
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
    protected $redirectTo = '/';

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
            'name' => ['required', 'string', 'max:60'],
            'email' => ['required', 'string', 'email', 'max:60', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \Doomus\User
     */
    protected function create(array $data)
    {
        CartController::store();
        HistoricController::store();

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'id_cart' => Cart::all()->orderBy('id_cart', 'DESC')->first()->id_cart,
            'id_historic' => Historic::all()->orderBy('id_historic', 'DESC')->first()->id_historic,
        ]);
    }
}
