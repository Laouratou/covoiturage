<?php
namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view for the first form.
     */
    public function create1()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request for the first form.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store1(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Password::defaults()],
            'photo' => ['required', 'image'],
            'cnib' => ['required', 'image'],
            'telephone' => ['required', 'regex:/^\+226[0-9]{8}$/'],
        ]);

        $role = ($request->nature === 'conducteur') ? 'conducteur' : 'passager';

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'photo' => $request->file('photo')->store('photos', 'public'),
            'cnib' => $request->file('cnib')->store('cnib', 'public'),
            'telephone' => $request->telephone,
            'role' => $role,
        ]);

        event(new Registered($user));

        Auth::login($user);

        // Redirection après l'inscription
        return redirect($this->redirectPath());
    }

    /**
     * Display the registration view for the second form.
     */
    public function create2()
    {
        return view('auth.register2', ['nature' => 'conducteur']);
    }

    /**
     * Handle an incoming registration request for the second form.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store2(Request $request): RedirectResponse
    {
        $validator = $this->validator2($request->all());
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = $this->create($request);

        event(new Registered($user));

        Auth::login($user);

        // Redirection après l'inscription
        return redirect('/');
    }


    /**
     * Get a validator for the second form.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator2(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'confirmed', Password::defaults()],
            'photo' => ['required', 'image'],
            'photo_immatriculation' => ['required', 'image'],
            'annee_experience' => ['required', 'integer'],
            'telephone' => ['required', 'regex:/^\+226[0-9]{8}$/'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration for the second form.
     *
     * @param  Request  $request
     * @return \App\Models\User|null
     */
    protected function create(Request $request)
    {
        if ($request->hasFile('photo') && $request->hasFile('photo_immatriculation')) {
            $photo = $request->file('photo')->store('photos', 'public');
            $photo_immatriculation = $request->file('photo_immatriculation')->store('photos', 'public');
            return User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'photo' => $photo,
                'photo_immatriculation' => $photo_immatriculation,
                'annee_experience' => $request->annee_experience,
                'telephone' => $request->telephone,
                'role' => 'conducteur', // Définir le rôle ici, dans cet exemple 'conducteur' par défaut pour le formulaire 2
            ]);
        } else {
            return null;
        }
    }

    /**
     * Get the post registration redirect path.
     *
     * @return string
     */


    public function message()
    {
        $user = Auth::user();

        return view('message', compact('user'));
    }

    public function index()
    {
        // Récupérer la liste des utilisateurs avec leurs rôles
        $users = User::with('roles')->get();

        // Passer les utilisateurs à la vue
        return view('dashboard', compact('users'));
    }

}
