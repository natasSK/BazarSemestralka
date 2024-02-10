<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\GlobalRating;
use App\Models\ratings;
use App\Models\User;
use Illuminate\Http\Request;

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
/*
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

        // Výpočet priemeru hodnotení pre daného používateľa
        $averageRating = Ratings::where('user_id', $userId)->avg('rating');

        return response()->json(['success' => true, 'rating' => $averageRating]);
    }
*/




    public function getAverageRating($userId)
    {
        $averageRating = Ratings::where('user_id', $userId)->avg('rating');

        // Uložte hodnotu priemeru hodnotenia do databázy
        User::where('id', $userId)->update(['average_rating' => $averageRating]);

        return response()->json(['success' => true, 'averageRating' => $averageRating]);
    }




/*
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
    */

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


}
