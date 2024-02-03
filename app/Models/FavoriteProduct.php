<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// FavoriteProduct.php
class FavoriteProduct extends Model
{
    protected $fillable = ['user_id', 'advert_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function advert()
    {
        return $this->belongsTo(Advert::class);
    }

    public static function isFavorite($userId, $advertId)
    {
        return static::where('user_id', $userId)
            ->where('advert_id', $advertId)
            ->exists();
    }
}

