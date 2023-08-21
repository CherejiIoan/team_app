<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeUser;
use App\Models\Posturi;
use App\Models\Status;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        $users->transform(function ($user) {
            $user->formatted_zi_de_nastere = date('d/m/Y', strtotime($user->zi_de_nastere));
            return $user;
        });
        $allFunctions = Posturi::all();
        $statuses = Status::all();
        return view('utilizatori.index', compact('users', 'allFunctions', 'statuses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    { {
            $validatedData = $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'telefon' => ['required', 'numeric', 'digits_between:9,12'],
                'zi_de_nastere' => ['required', 'date', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
                'status_id' => ['required'],
                'functions' => ['array'],
                'user_role' => ['required'],
            ]);

            $zi_de_nastere = date('Y-m-d', strtotime($request->zi_de_nastere));

            $user = User::create([
                'name' => $validatedData['name'],
                'telefon' => $validatedData['telefon'],
                'zi_de_nastere' => $zi_de_nastere,
                'email' => $validatedData['email'],
                'password' => Hash::make($validatedData['password']),
                'status_id' => $validatedData['status_id'],
                'user_role' => $validatedData['user_role'],
            ]);

            $user->functions()->sync($request->functions); // Sincronizează relația many-to-many
            Mail::to($user->email)->send(new WelcomeUser($user));
            return redirect()->back()->with('success', 'Utilizatorul a fost creat cu succes!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'telefon' => ['required', 'numeric', 'digits_between:9,12'],
            'zi_de_nastere' => ['required', 'date', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class . ',email,' . $user->id],
        ];

        // Verificați dacă utilizatorul dorește să schimbe parola
        if (!empty($request->password)) {
            $rules['password'] = ['required', 'confirmed', Rules\Password::defaults()];
        }

        // $validatedData = $request->validate($rules);

        $zi_de_nastere = date('Y-m-d', strtotime($request->zi_de_nastere));

        $user->update([
            'name' => $request->name,
            'telefon' => $request->telefon,
            'zi_de_nastere' => $zi_de_nastere,
            'email' => $request->email,
            'user_role' => $request->user_role,
            'status_id' => $request->status_id,
        ]);

        // Actualizeaza parola utilizatorului doar dacă este completată în formular
        if (!empty($request->password)) {
            $user->update([
                'password' => Hash::make($request->password),
            ]);
        }




        $user->functions()->sync($request->input('functions', []));

        $user->status_id = $request->status_id;


        $user->save();
        //  dd($request->all()); 
        // Log::info('Mesaj de informare pentru depanare', ['request_data' => $request->all(), 'user_id' => $user->id]);


        return redirect()->route('utilizatori.index')->with('success', 'Utilizatorul a fost modificat cu succes!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Ștergem utilizatorul
        $utilizator = User::findOrFail($id);
        $utilizator->delete();

        // Redirecționăm înapoi la lista de utilizatori cu un mesaj de succes
        return redirect()->route('utilizatori.index')->with('success', 'Utilizatorul a fost șters cu succes.');
    }
}