<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Advert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MakeAdvertController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $user = auth()->user();

        $data = $request->validate([
            'photo' => ['image'],
            'title' => ['required', 'string', 'max:255'],
            'place' => ['required'],
            'price' => ['required', 'integer'],
            'short_desc' => ['required', 'string', 'max:30'],
            'category' => ['required'],
            'type' => ['required'],
            'description' => ['required', 'string', 'max:2000'],
        ]);

        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photoPath = $photo->store('advert_photos', 'public');
        }

        $advert = $user->adverts()->create([
            'title' => $data['title'],
            'place' => $data['place'],
            'price' => $data['price'],
            'short_desc' => $data['short_desc'],
            'category' => $data['category'],
            'type' => $data['type'],
            'description' => $data['description'],
            'photo' => $photoPath, // Priradenie cesty k fotke
        ]);

        $adverts = Advert::latest()->take(6)->get();
        return view('home', compact('adverts'));
    }

}
