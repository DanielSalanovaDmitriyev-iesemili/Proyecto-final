<?php

namespace App\Models;

use GuzzleHttp\Psr7\Message;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;


class Game extends Model implements TranslatableContract
{
    use Translatable;
    use HasFactory;

    //Campos que son rellenables
    public $fillable=["name", "description", "img", "pegi", "price", "state", "published_at"];

    //Campos que pueden ser traducidos
    public $translatedAttributes = ["description"];

    //Relaciones entre los modelos
    public function categories () {
        return $this->belongsToMany(Category::class);
    }

    public function users () {
        return $this->belongsToMany(User::class)->withPivot('is_purchased', 'comment');
    }

    public function plataforms () {
        return $this->belongsToMany(Plataform::class);
    }

    public function comments () {
        return $this->hasMany(Comment::class);
    }

    //Comprobar si un objeto esta vacio

    public function checkIfEmpty($obj){
        foreach ($obj as $item){
            return false;
        }

        return true;
    }

    //Scopes

    public function scopeFilterPlataform ($query, $plataformId){
        return $query->whereHas('plataforms', function ($query) use ($plataformId){
            $query->where('id', $plataformId);
        });
    }

    public function scopeFilterGenre ($query, $genreId){
        return $query->whereHas('categories', function ($query) use ($genreId){
            $query->where('id', $genreId);
        });
    }

    public function scopeFilterState ($query, $state){
        return $query->where('state', $state);
    }

    public function scopeFilterName ($query, $string){
        return $query->where('name','LIKE', '%' . $string . '%');
    }
}
