<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Advert;
use App\Models\GlobalRating;
use App\Models\ratings;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index($user)
    {
        $user = User::findOrFail($user);
        $adverts = $user->adverts;
        $averageRating = $user->ratings()->avg('rating');
        $ratings = $user->ratings;
        $globalRatingRecord = GlobalRating::first();

        if ($globalRatingRecord) {
            $globalAverageRating = $globalRatingRecord->average_rating;
        } else {
            $globalAverageRating = 0.00; // alebo nejaká iná predvolená hodnota
        }
        return view('profile', [
            'user' => $user,
            'adverts' => $adverts,
            'averageRating' => $averageRating,
            'ratings' => $ratings,
            'globalAverageRating' => $globalAverageRating,
        ]);
    }
    public function getAverageRating($userId)
    {
        $averageRating = Ratings::where('user_id', $userId)->avg('rating');

        // Uložte hodnotu priemeru hodnotenia do databázy
        User::where('id', $userId)->update(['average_rating' => $averageRating]);

        return response()->json(['success' => true, 'averageRating' => $averageRating]);
    }


    public function addRating(Request $request, $userId)
    {
        $request->validate([
            'rating' => 'required|integer|min:0|max:5',
        ]);

        $ratedByUser = auth()->user();

        // Aktualizácia alebo vytvorenie hodnotenia
        $rating = Ratings::updateOrCreate(
            ['user_id' => $userId, 'rated_by_user_id' => $ratedByUser->id],
            ['rating' => $request->input('rating')]
        );

        // Výpočet priemeru hodnotení pre všetkých používateľov
        $globalAverageRating = Ratings::avg('rating');

        // Uložte hodnotu priemeru hodnotenia do tabuľky pre globálne hodnoty
        GlobalRating::updateOrCreate([], ['average_rating' => $globalAverageRating]);

        return response()->json(['success' => true, 'rating' => $rating->rating, 'averageRating' => $globalAverageRating]);
    }

    public function updateProfile(Request $request)
    {
        // Získanie aktuálneho prihláseného používateľa
        $user = auth()->user();

        // Validácia vstupných údajov
        $request->validate([
            'name' => 'nullable|string|max:255',
            'phone_number' => 'nullable|string|max:20',
            'district' => 'nullable|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Aktualizácia hodnôt iba v prípade, ak nová hodnota nie je prázdny reťazec
        $user->name = $request->filled('name') ? $request->input('name') : $user->name;
        $user->phone_number = $request->filled('phone_number') ? $request->input('phone_number') : $user->phone_number;
        $user->district = $request->filled('district') ? $request->input('district') : $user->district;

        // Spracovanie fotky, ak bola poslaná
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photoPath = $photo->store('profile_photos', 'public'); // Uloženie súboru a získanie cesty
            $user->photo = $photoPath;
        }

        // Vymazanie fotky, ak je požadované
        if ($request->has('delete_photo') && $request->input('delete_photo') == 1) {
            // Vymazanie existujúcej fotky
            if ($user->photo) {
                Storage::disk('public')->delete($user->photo);
                $user->photo = null; // Nastavenie na null, aby neukazovalo neexistujúci súbor
            }
        }

        // Uloženie zmien
        $user->save();

        $adverts = Advert::latest()->take(6)->get();
        return view('home', compact('adverts'));
    }


public function editProfile()
    {
        //$this->authorize('update', $advert);

        return view('editProfile', [
            'user' => auth()->user(),
        ]);
    }

}
