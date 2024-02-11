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
            $globalAverageRating = 0.00;
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

        User::where('id', $userId)->update(['average_rating' => $averageRating]);

        return response()->json(['success' => true, 'averageRating' => $averageRating]);
    }


    public function addRating(Request $request, $userId)
    {
        $request->validate([
            'rating' => 'required|integer|min:0|max:5',
        ]);

        $ratedByUser = auth()->user();

        $rating = Ratings::updateOrCreate(
            ['user_id' => $userId, 'rated_by_user_id' => $ratedByUser->id],
            ['rating' => $request->input('rating')]
        );

        $globalAverageRating = Ratings::avg('rating');

        GlobalRating::updateOrCreate([], ['average_rating' => $globalAverageRating]);

        return response()->json(['success' => true, 'rating' => $rating->rating, 'averageRating' => $globalAverageRating]);
    }

    public function updateProfile(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'name' => 'nullable|string|max:255',
            'phone_number' => 'nullable|string|max:20',
            'district' => 'nullable|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user->name = $request->filled('name') ? $request->input('name') : $user->name;
        $user->phone_number = $request->filled('phone_number') ? $request->input('phone_number') : $user->phone_number;
        $user->district = $request->filled('district') ? $request->input('district') : $user->district;

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photoPath = $photo->store('profile_photos', 'public');
            $user->photo = $photoPath;
        }

        if ($request->has('delete_photo') && $request->input('delete_photo') == 1) {
            if ($user->photo) {
                Storage::disk('public')->delete($user->photo);
                $user->photo = null;
            }
        }

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
