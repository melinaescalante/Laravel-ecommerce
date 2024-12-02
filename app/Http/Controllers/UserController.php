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
        ->groupBy('users.id')
        ->get();
       

        return view('users', [
            'users' => $allUsersWithPurchases,
        ]);
    }
}

