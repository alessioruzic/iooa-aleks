<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Carbon\Carbon;
use App\GostKategorija;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
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
        $user = User::create([
            'name' => $data['name'],
            'surname' => $data['surname'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'oib' => $data['oib'],
            'dateBorn' => $data['dateBorn'],
            'api_token' => Str::random(60),
        ]);

        $userBorn = new Carbon($user->dateBorn); //Sprema u $guestBorn datum rođenja gosta
        $dateToday = new Carbon(now()); // u $dateToday sprema današnji datum
		$godine_gosta = $dateToday->diffInYears($userBorn); // izračunava razliku u godinama i sprema u $guest_years
		$gost_kategorije = GostKategorija::all();  //dohvaća sve cijene gostiju ovisno o godinama
		foreach($gost_kategorije as $years){ // petlja, prolazi kroz sve cijene
			if(($years->godina_pocetak <= $godine_gosta) && ($years->godina_kraj >= $godine_gosta)){ //uspoređuje
				$user->kategorijaId = $years->id; //dodjeljuje vanji kljuc ovisno koju cijenu plaća gost na temelju godina
                $user->save(); // sprema gosta
			}
        }
        
        return $user;
    }
}
