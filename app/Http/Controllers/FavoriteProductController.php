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
    public function addToFavorites($advertId)
    {
        $user = auth()->user();

        if (!$user->favoriteProducts()->where('advert_id', $advertId)->exists()) {
           // $favoriteProduct = new FavoriteProduct(['advert_id' => $advertId]);
           // $user->favoriteProducts()->save($favoriteProduct);
            $user->favoriteProducts()->create([
                'user_id' => $user->id,  // Použite $user->id, nie len $user
                'advert_id' => $advertId,
            ]);
        }

        return redirect()->back()->with('success', 'Produkt bol pridaný do obľúbených.');
    }

    public function showFavorites()
    {
        /*
        $user = auth()->user();
        $favoriteProducts = $user->favoriteProducts;
        return view('favorites', [
            'favoriteProducts' => $favoriteProducts,
        ]);
        */

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

}


