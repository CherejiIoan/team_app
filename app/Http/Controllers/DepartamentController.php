<?php

namespace App\Http\Controllers;

use App\Models\Posturi;
use Illuminate\Http\Request;
use App\Models\Departament;

class DepartamentController extends Controller
{
    public function index()
    {
        $departamente = Departament::all();
        $allFunctions = Posturi::all();

        return view('departamente.index', compact('departamente','allFunctions'));
        
    }

    public function create()
    {
        return view('departamente.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nume' => ['required', 'string', 'max:255'],
            'functions' => ['array'],
        ]);
    
        $departament = Departament::create([
            'nume' => $request->nume,
        ]);
    
        $departament->functions()->sync($request->functions); // Sincronizează relația many-to-many
    



        return redirect()->route('departamente.index')->with('success', 'Departamentul a fost adăugat cu succes.');
    }

    public function show(Departament $departament)
    {
        return view('departamente.show', compact('departament'));
    }

    public function edit(Departament $departament)
    {
        return view('departamente.edit', compact('departament'));
    }

    public function update(Request $request, string $id)
    {
        $departament = Departament::findOrFail($id);
    
        $validatedData = $request->validate([
            'nume' => 'required|max:255',
            'functions' => ['array'],
        ]);
    
        $departament->update([
            'nume' => $validatedData['nume'],
        ]);
    
        // Actualizează relația Many-to-Many între departament și posturi
        $departament->functions()->sync($validatedData['functions']);
    
        return redirect()->route('departamente.index')->with('success', 'Departamentul a fost actualizat cu succes!');
    }

    public function destroy($id)
    {
        $departament = Departament::findOrFail($id);

        $departament->delete();
    
        return redirect()->route('departamente.index')
            ->with('success', 'Departamentul a fost șters cu succes.');
    }
}
