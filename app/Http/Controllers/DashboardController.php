<?php

namespace App\Http\Controllers;

use App\Models\Eveniment;
use App\Models\EvenimentUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $evenimente = Eveniment::all();
        $evenimentUser = EvenimentUser::all();
        
        $evenimente->transform(function ($eveniment) {
            $eveniment->formatted_data_eveniment = date('d/m/Y', strtotime($eveniment->data_eveniment));
            return $eveniment;
        });
        $user = Auth::user();
        $posturiUtilizator = $user->functions;
        return view('dashboard', compact('evenimente','user','posturiUtilizator'));
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
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function confirmareDisponibilitate($eveniment_id, $disponibil)
    {
        // dd($eveniment_id, $disponibil);
        $user_id = Auth::id(); // ID-ul utilizatorului autentificat
    
        // Caută înregistrarea corespunzătoare în tabela eveniment_users
        $evenimentUser = EvenimentUser::where('eveniment_id', $eveniment_id)
            ->where('user_id', $user_id)
            ->first();
    
        if ($evenimentUser) {
            $evenimentUser->confirmare_disponibilitate = ($disponibil === 'true');
            $evenimentUser->save();
        } else {
            // Dacă nu există o înregistrare, creează una nouă
            EvenimentUser::create([
                'eveniment_id' => $eveniment_id,
                'user_id' => $user_id,
                'confirmare_disponibilitate' => ($disponibil === 'true'),
            ]);
        }
       
        return redirect()->route('dashboard')->with('success', 'Disponibilitate confirmată cu succes.');
    }
}
