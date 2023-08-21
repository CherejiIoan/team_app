<?php

namespace App\Http\Controllers;

use App\Mail\EvenimentCreat;
use App\Models\Eveniment;
use App\Models\EvenimentUser;
use App\Models\TipEveniment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class EvenimentController extends Controller
{
      /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $evenimente = Eveniment::all();
        // $eveniment = new Eveniment();
        // dd($eveniment);
        $evenimente->transform(function ($eveniment) {
            $eveniment->formatted_data_eveniment = date('d/m/Y', strtotime($eveniment->data_eveniment));
            return $eveniment;
        });
        
        return view('evenimente.index', compact('evenimente'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Eager load tipuri_evenimente pentru a le afișa în formular
        $tipuriEvenimente = TipEveniment::all();
        return view('evenimente.create', compact('tipuriEvenimente'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nume_eveniment' => ['required', 'string', 'max:255'],
            'data_eveniment' => ['required', 'date'],
            'ora_eveniment' => ['required', 'date_format:H:i'],
            'recurenta' => ['required', 'in:fara_recurenta,zilnic,saptamanal,anual'],
            'tip_eveniment_id' => ['nullable', 'exists:tipuri_evenimente,id'],
            'notite' => ['nullable', 'string'],
        ]);
    
        $data_eveniment = date('Y-m-d', strtotime($validatedData['data_eveniment']));
    
       
    
        $eveniment = new Eveniment([
            'nume_eveniment' => $validatedData['nume_eveniment'],
            'data_eveniment' => $data_eveniment,
            'ora_eveniment' => $validatedData['ora_eveniment'],
            'recurenta' => $validatedData['recurenta'],
            'tip_eveniment_id' =>$validatedData['tip_eveniment_id'],
            'notite' => $validatedData['notite'],
        ]);

        // Obține tipul de eveniment pe baza id-ului
        $tip_eveniment = TipEveniment::find($validatedData['tip_eveniment_id']);
    
        $eveniment->tipEveniment()->associate($tip_eveniment); // Asociază tipul de eveniment
    
        $eveniment->save();

        $usersAttributedToEvent = collect();

        // Parcurgem departamentele asociate tipului de eveniment
        foreach ($eveniment->tipEveniment->departamente as $departament) {
          
            // Obține funcțiile atribuite acestui departament
            $functionsInDepartament = $departament->functions;
    
            // Obține utilizatorii care au aceste funcții
            $usersInDepartment = User::whereHas('functions', function ($query) use ($functionsInDepartament) {
                $query->whereIn('functions.id', $functionsInDepartament->pluck('id'));
            })->get();
    
            // Concatenăm utilizatorii în colecția existentă
            $usersAttributedToEvent = $usersAttributedToEvent->concat($usersInDepartment);
        }
    
        foreach ($usersAttributedToEvent as $user) {
            Mail::to($user->email)->send(new EvenimentCreat($eveniment));
        }
    
        return redirect()->route('eveniment.index')->with('success', 'Evenimentul a fost creat cu succes!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return view('evenimente.show', compact('eveniment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
        $eveniment = Eveniment::findOrFail($id); 
    
        $tipuriEvenimente = TipEveniment::all();
        

        $timestampDataEveniment = strtotime($eveniment->data_eveniment);
        $formattedDataEveniment = date('d/m/Y', $timestampDataEveniment);
        $eveniment->ora_eveniment = date('H:i', strtotime($eveniment->ora_eveniment));


    
        return view('evenimente.edit', compact('eveniment', 'tipuriEvenimente','formattedDataEveniment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $eveniment = Eveniment::findOrFail($id); // Găsim obiectul Eveniment pe baza ID-ului
       

        $validatedData = $request->validate([
            'nume_eveniment' => 'required|string|max:255',
            'data_eveniment' => 'required|date',
            'ora_eveniment' => 'required|date_format:H:i',
            'recurenta' => 'required|in:fara_recurenta,zilnic,saptamanal,anual',
            'tip_eveniment_id' => 'nullable|exists:tipuri_evenimente,id',
            'notite' => 'nullable|string',
        ]);

        $validatedData['data_eveniment'] = date('Y-m-d', strtotime($validatedData['data_eveniment']));

        $eveniment->update([
            'nume_eveniment' => $validatedData['nume_eveniment'],
            'ora_eveniment' => $validatedData['ora_eveniment'],
            'recurenta' => $validatedData['recurenta'],
            'tip_eveniment_id' => $validatedData['tip_eveniment_id'],
            'notite' => $validatedData['notite'],
            'data_eveniment' => $validatedData['data_eveniment'], 
        ]);

        $eveniment->save(); // Salvăm obiectul actualizat în baza de date
    
        return redirect()->route('eveniment.index')->with('success', 'Evenimentul a fost actualizat cu succes!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $eveniment = Eveniment::findOrFail($id);
        $eveniment->delete();
        return redirect()->route('eveniment.index')->with('success', 'Evenimentul a fost șters cu succes.');
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
       
        return redirect()->route('eveniment.index')->with('success', 'Disponibilitate confirmată cu succes.');
    }
   
}
