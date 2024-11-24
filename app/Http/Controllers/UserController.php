<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('gamesPurchased')->get();
        // dd($users->toArray());
        // $users2 = User::with('gamesPurchased')->toSql();
// dd($users2);
        return view('users', [
            'users' => $users,
        ]);
    }
}
