<?php

namespace App\Models;

use GuzzleHttp\Psr7\Message;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    public $fillable=["name", "description", "img", "pegi", "price", "state", "published_at"];
    use HasFactory;

    public function categories () {
        return $this->belongsToMany(Category::class);
    }

    public function users () {
        return $this->belongsToMany(User::class)->withPivot('is_purchased', 'comment');
    }

    public function plataforms () {
        return $this->belongsToMany(Plataform::class);
    }
}
