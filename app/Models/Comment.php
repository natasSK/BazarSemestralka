<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'author_id',
        'user_id',
        'text',
        'name',
        'published_at',
        'recommendation',
        // Doplniť ďalšie fillable stĺpce podľa potreby, napr. 'user_photo'
    ];

    protected $dates = ['published_at']; // Definícia pre typ dátumu pre published_at stĺpec

    // Vzťahy k iným modelom
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}
