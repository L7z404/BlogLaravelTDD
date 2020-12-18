<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
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
    protected $redirectTo = '/home';

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
        // mio
        $mensajes = array(
            'name.required' => 'Campo nombre requerido',
            'name.max' => 'Campo nombre demasiado largo',

            'email.required' => 'Campo email requerido',
            'email.max' => 'Campo email demasiado largo',
            'email.unique' => 'El email ya existe en nuestra base de datos',
            'email.email' => 'El email debe ser un email válido',

            'alias.required' => 'Campo alias requerido',
            'alias.min' => 'Campo alias demasiado corto',
            'alias.max' => 'Campo alias demasiado largo',
            'alias.unique' => 'El alias ya existe en nuestra base de datos',

            'web.max' => 'Campo web es demasiado largo',

            'password.required' => 'Campo password requerido',
            'password.confirmed' => 'Los campos password no coinciden',
            'password.regex' => 'La contraseña debe tener un minimo de 8 caracteres, 1 numero, 1 mayuscula y 1 minuscula'
        );
        //mio

        return Validator::make($data, [
            'name' => 'required|string|max:190',
            'email' => 'required|string|email|max:190|unique:users',
            //Propio
            'alias' => 'required|string|min:3|unique:users',
            'web' => 'max:20',
            //Propio
            'password' => 'required|string|min:8|confirmed',
            'password' => array('required','string','confirmed', 'regex:/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/')

        ], $mensajes);
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
            'name' => $data['name'],
            'email' => $data['email'],
            //propio
            'alias' => $data['alias'],
            'web' => $data['web'],
            //propio
            'password' => Hash::make($data['password']),
        ]);
    }
}
