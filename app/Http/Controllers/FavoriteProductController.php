<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Advert;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\FavoriteProduct;
use Illuminate\Support\Facades\Redirect;

class FavoriteProductController extends Controller
{
    /*
    public function addToFavorites($advertId)
    {
        $user = auth()->user();

        if (!$user->favoriteProducts()->where('advert_id', $advertId)->exists()) {
            $user->favoriteProducts()->create([
                'user_id' => $user->id,
                'advert_id' => $advertId,
            ]);
        }

        return redirect()->back()->with('success', 'Produkt bol pridaný do obľúbených.');
    }
    */

    public function showFavorites()
    {
        $user = auth()->user();
        $favoriteProducts = $user->favoriteProducts;

        // Získajte id všetkých obľúbených reklám
        $advertIds = $favoriteProducts->pluck('advert_id');

        // Načítajte reklamy, ktoré majú príslušné advert_id
        $adverts = Advert::whereIn('id', $advertIds)->get();

        return view('favorites', [
            'adverts' => $adverts,
            'favoriteProducts' => $favoriteProducts,
        ]);
    }
    /*
    public function deleteFavorite($id)
    {
        $advert = Advert::findOrFail($id);
        $user = auth()->user();

        $favoriteProduct = FavoriteProduct::where('user_id', $user->id)
            ->where('advert_id', $advert->id)
            ->first();

        if ($favoriteProduct) {
            $favoriteProduct->delete();
        }

        return redirect()->back();
    }
    */

    public function addToFavorites($advertId)
    {
        $user = auth()->user();

        if (!$user->favoriteProducts()->where('advert_id', $advertId)->exists()) {
            $user->favoriteProducts()->create([
                'user_id' => $user->id,
                'advert_id' => $advertId,
            ]);
        }

        return response()->json(['success' => true, 'message' => 'Produkt bol pridaný do obľúbených.']);
    }

    public function deleteFavorite($id)
    {
        $advert = Advert::findOrFail($id);
        $user = auth()->user();

        $favoriteProduct = FavoriteProduct::where('user_id', $user->id)
            ->where('advert_id', $advert->id)
            ->first();

        if ($favoriteProduct) {
            $favoriteProduct->delete();
        }

        return response()->json(['success' => true, 'message' => 'Produkt bol odstránený z obľúbených.']);
    }

    public function toggleFavorite($advertId)
    {
        $user = auth()->user(); // Získaj aktuálneho prihláseného používateľa
        $advert = Advert::find($advertId); // Nájdi inzerát podľa ID

        if (!$user || !$advert) {
            return response()->json(['success' => false, 'message' => 'Nesprávna žiadosť']);
        }

        // Skontroluj, či je inzerát už v obľúbených pre daného používateľa
        $isFavorite = $user->favoriteProducts()->where('advert_id', $advertId)->exists();

        // Ak je v obľúbených, odstráň ho, inak pridaj
        if ($isFavorite) {
            $favoriteProduct = FavoriteProduct::where('user_id', $user->id)
                ->where('advert_id', $advert->id)
                ->first();

            if ($favoriteProduct) {
                $favoriteProduct->delete();
            }
            $message = 'Inzerát odstránený z obľúbených.';
        } else {
            $user->favoriteProducts()->create([
                'user_id' => $user->id,
                'advert_id' => $advertId,
            ]);
            $message = 'Inzerát pridaný do obľúbených.';
        }

        return response()->json(['success' => true, 'message' => $message]);
    }

}


