<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Advert;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdvertController extends Controller
{

    public function index($advert)
    {
        $advert = Advert::findOrFail($advert);
        $user = User::findOrFail($advert->user_id);
        return view('advert', [
            'advert' => $advert,
            'user' => $user,
        ]);
    }

    public function edit(Advert $advert)
    {
        $this->authorize('update', $advert);

        return view('edit', compact('advert'));
    }

    public function update(Advert $advert)
    {
        $this->authorize('update', $advert);

        $data = request()->validate([
            'photo' => ['image'],
            'title' => ['required', 'string', 'max:255'],
            'place' => ['required'],
            'price' => ['required', 'integer'],
            'short_desc' => ['required', 'string', 'max:30'],
            'category' => ['required'],
            'type' => ['required'],
            'description' => ['required', 'string', 'max:2000'],
        ]);

        $advert->update($data);

        // Spracovanie fotky, ak bola poslaná
        if (request()->hasFile('photo')) {
            $photo = request()->file('photo');
            $photoPath = $photo->store('advert_photos', 'public'); // Uloženie súboru a získanie cesty
            $advert->photo = $photoPath;
        }

        // Vymazanie fotky, ak je požadované
        $advert->photo = (request()->has('delete_photo') && request()->input('delete_photo') == 1) ? null : $advert->photo;

        $advert->save();

        return view('advert')->with(['advert' => $advert, 'user' => User::findOrFail($advert->user_id)]);
    }


    public function delete(Advert $advert)
    {

        $this->authorize('delete', $advert);
        $advert->delete();

        $user = User::findOrFail($advert->user_id);
        $adverts = $user->adverts;

        return view('profile')->with(['adverts' => $adverts, 'user' => User::findOrFail($advert->user_id)]);


        //return view('profile')->with(['adverts' => $advert, 'user' => User::findOrFail($advert->user_id)]);
    }

    public function search(Request $request)
    {
        $title = $request->input('string');
        $minPrice = $request->input('cenaOd');
        $maxPrice = $request->input('cenaDo');
        $type = $request->input('type');
        $category = $request->input('category');
        $place = $request->input('place');

        $adverts = Advert::query();

        if (!empty($title)) {
            $adverts->where('title', 'like', '%' . $title . '%');
        }

        if (!empty($minPrice)) {
            $adverts->where('price', '>=', $minPrice);
        }

        if (!empty($maxPrice)) {
            $adverts->where('price', '<=', $maxPrice);
        }

        if ($type != "Nevybrane") {
            $adverts->where('type', $type)->get();
        }

        if ($category != "Nevybrane") {
            $adverts->where('category', $category)->get();
        }

        if ($place != "Nevybrane") {
            $adverts->where('place', $place)->get();
        }


        $result = $adverts->get();

        return view('search', ['adverts' => $result]);
    }


}
