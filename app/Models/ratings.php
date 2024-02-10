<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ratings extends Model
{
    protected $fillable = ['user_id', 'rated_by_user_id', 'rating'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function ratedByUser()
    {
        return $this->belongsTo(User::class, 'rated_by_user_id');
    }

}


