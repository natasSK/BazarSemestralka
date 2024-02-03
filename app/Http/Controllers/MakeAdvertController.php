<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class MakeAdvertController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function create()
    {
        return view('create');
    }

    public function store()
    {
        $data = \request()->validate([
            'image' => ['image'],
            'title' => ['required', 'string', 'max:255'],
            'place' => ['required', 'string', 'max:255'],
            'price' => ['required', 'integer'],
            'short_desc' => ['required', 'string', 'max:255'],
        ]);

        // \App\Models\Advert::create($data); //TODO Dodať fotku a dlhy popis
        auth()->user()->adverts()->create([
            'title' => $data['title'],
            'place' => $data['place'],
            'price' => $data['price'],
            'short_desc' => $data['short_desc'],
        ]);

        $user = auth()->user();
        $adverts = auth()->user()->adverts;
        return view('profile')->with(['user' => $user, 'adverts' => $adverts]);
    }
}
