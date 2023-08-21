<?php

namespace App\Http\Controllers;

use App\Models\Departament;
use App\Models\Posturi;
use Illuminate\Http\Request;
use App\Models\TipEveniment;

class TipEvenimentController extends Controller
{
    public function index()
    {
        $tip_eveniment = TipEveniment::with('departamente')->get(); // Obține toate evenimentele și relațiile cu funcțiile
    // $functions = Posturi::all(); // Obține toate funcțiile din tabela functions*********
        $departamente = Departament::all(); 

    return view('tip_eveniment.index', compact('tip_eveniment', 'departamente'));

        // $evenimente = Evenimente::all();
        // return view('evenimente.index', compact('evenimente'));
    }

    public function create()
    {
        return view('tip_eveniment.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nume' => 'required|unique:tipuri_evenimente|max:255',
            'departamente' => 'array', // Validarea ca input-ul pentru departamente să fie un array
        ]);
    
        $tip_eveniment = TipEveniment::create($validatedData); // Creare eveniment
    
        // Sincronizare funcții asociate cu evenimentul creat
        if (isset($validatedData['departamente'])) {
            $tip_eveniment->departamente()->sync($validatedData['departamente']);
        }
    
        return redirect()->route('tip_eveniment.index')
            ->with('success', 'Tipul de eveniment a fost adăugat cu succes.');
    }

    public function show($id)
    {
        return view('tip_eveniment.show', compact('tip_eveniment'));
    }

    public function edit($id)
    {
        $tip_eveniment = TipEveniment::findOrFail($id);
        $departamente = Departament::all(); //
    
        $selectedDepartamentIds = $tip_eveniment->departamente->pluck('id')->toArray();

    
        return view('tip_eveniment.edit', compact('tip_eveniment', 'departamente', 'selectedDepartamentIds'));
    }

    public function update(Request $request, $id)
    {
        $tip_eveniment = TipEveniment::findOrFail($id);
    
        $tip_eveniment->nume = $request->input('nume');
        
        $selectedDepartamentIds = $request->input('departamente', []);
        $tip_eveniment->departamente()->sync($selectedDepartamentIds);
    
        $tip_eveniment->save();
    
        return redirect()->route('tip_eveniment.index')->with('success', 'Tipul de eveniment a fost actualizat cu succes.');
    }
    

    public function destroy($id)
    {
        $tip_eveniment = TipEveniment::findOrFail($id);

        $tip_eveniment->delete();
    
        return redirect()->route('tip_eveniment.index')
            ->with('success', 'Tipul de eveniment a fost șters cu succes.');
    }
}
