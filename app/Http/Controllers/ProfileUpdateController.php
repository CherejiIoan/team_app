<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Status;
use Illuminate\Http\Request;

class ProfileUpdateController extends Controller
{
public function showUpdateForm($token)
{
    // Găsiți utilizatorul cu token-ul dat
    $user = User::where('update_token', $token)->first();

    if (!$user) {
        return abort(404);
    }

    $statuses = Status::all();
    dd($statuses);
    return view('update_profile_form', compact('user','statuses'));
}

public function updateProfile(Request $request, $token)
{
    // Validați și actualizați datele de profil
    // ...
    
    // Ștergeți token-ul după ce datele au fost actualizate
    $user = User::where('update_token', $token)->first();
    if ($user) {
        $user->update(['update_token' => null]);
    }
    $statuses = Status::all();
    
    // Redirecționați utilizatorul către o pagină de succes
    // ...
}

}
