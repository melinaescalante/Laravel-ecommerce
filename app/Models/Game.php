<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;
    protected $table = 'games';
    protected $primaryKey = 'id_game';
    //Permite recibir estos campos
    protected $fillable = ['title', 'price', 'synopsis', 'release_date', 'company', 'rating_fk', 'cover', 'cover_description'];
    public function casts()
    {
        return ['release_date' => 'date'];
    }
    public function rating()
    {
        return $this->belongsTo(Rating::class, 'rating_fk', 'rating_id');
    }
    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'games_have_genres', 'game_fk', 'genre_fk', 'id_game');
    }
    public function getImage()
    {
        return asset('storage/' . $this->cover);
    }
//     public function users()
// {
//     return $this->belongsToMany(User::class, 'users_have_purchases', 'game_fk', 'user_fk')
//                 ->withPivot('amount');
// }

}
