<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Validator;
use App\Services\Auth\UserRegistrationService;
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
    protected $redirectTo = '/profile';

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
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        return view('auth.register', [
            'bands' => \App\Models\Band::all()
        ]);
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
            'ticket_code' => ['required', 'string'],
            'ticket_secret' => ['required', 'string'],
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
    protected function create(array $data, $ticket, $receivingBatchId)
    {
        $user =  User::create([
            'name' => $ticket->owner_name,
            'username' => time(),
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'band_id' => $ticket->band_id,
            'batch_id' => $receivingBatchId ?: null,
        ]);

        if($ticket->type == 'instructor')
        {
            $ticket->band->owners()->attach($user->id);
        }

        return $user;
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        $registrationService = new UserRegistrationService();

        if($data = $registrationService->validateTicket($request->all())) {
            if(isset($data['invalidTicket'])) return back()->with($data);
        }

        event(new Registered(
            $user = $this->create(
                $request->all(),
                $data['ticket'],
                $data['receivingBatchId'])
        ));

        $registrationService->handleAfterRegistration($data['ticket']);

        $this->guard()->login($user);

        return $this->registered($request, $user)
            ?: redirect($this->redirectPath());
    }
}
