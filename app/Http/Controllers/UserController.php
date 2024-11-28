<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        $allUsersWithPurchases = DB::table('users')
        ->leftJoin('users_have_purchases', 'users.id', '=', 'users_have_purchases.user_id')
        ->select('users.*', 'users_have_purchases.*') 
        ->whereNotNull('users_have_purchases.amount') // Filtra compras donde el campo 'amount' no sea null
        ->whereNotNull('users_have_purchases.status')
        ->whereNotNull('users_have_purchases.user_id')
        ->whereNotNull('users_have_purchases.games')
        ->whereNotNull('users_have_purchases.release_date')
        ->whereNotNull('users_have_purchases.purchase_id')
        ->get();
        echo '<pre>';
        var_dump($allUsersWithPurchases);
        echo '</pre>';

        return view('users', [
            'users' => $allUsersWithPurchases,
        ]);
    }
}
