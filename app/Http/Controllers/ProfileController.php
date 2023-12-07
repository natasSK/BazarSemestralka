<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index($user)
    {
        $user = User::findOrFail($user);      //prehlada userov na indexe danom cez prehliadač
        $adverts = $user->adverts;
        return view('profile', [
            'user' => $user,
            'adverts' => $adverts,
        ]);
    }
}
