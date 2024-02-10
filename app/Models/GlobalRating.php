<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GlobalRating extends Model
{
    protected $table = 'global_rating';

    protected $fillable = [
        'average_rating',
    ];
}
