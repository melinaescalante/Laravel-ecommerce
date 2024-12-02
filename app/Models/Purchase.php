<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;
    protected $table = 'users_have_purchases';
    protected $primaryKey = 'purchase_id';
    //Permite recibir estos campos
    protected $fillable = ['user_id', 'status', 'amount', 'release_date', 'games'];
    public function casts()
    {
        return ['release_date' => 'date'];
    }

}
