<?php

namespace App\Http\Controllers;

use App\Models\Posturi;
use Illuminate\Http\Request;



class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posturi = Posturi::all();
        return view('posturi.index', compact('posturi'));
    }

    public function create()
    {
        return view('posturi.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nume' => 'required|unique:functions|max:255',
        ]);
        
        Posturi::create($validatedData);
        return redirect()->route('posturi.index')
            ->with('success', 'Postul a fost adăugat cu succes.');
    }

    public function show(Posturi $posturi)
    {
        return view('posturi.show', compact('posturi'));
    }

    public function edit(Posturi $posturi)
    {
        return view('posturi.edit', compact('posturi'));
    }

    public function update(Request $request, Posturi $posturi)
    {
     
        $validatedData = $request->validate([
            'nume' => 'required|max:255|unique:functions,nume,' . $posturi->id,

            
        ]);
       
        $posturi->update($validatedData);
        // dd('Store method reached');
        return redirect()->route('posturi.index')->with('success', 'Postul a fost actualizat cu succes!');
    }
    

    public function destroy($id)
    {
        $posturi = Posturi::findOrFail($id);

        $posturi->delete();
    
        return redirect()->route('posturi.index')
            ->with('success', 'Postul a fost șters cu succes.');
    }
}
