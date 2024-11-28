<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function index()
    {
        $allUsers = Purchase::all();
var_dump($allUsers);
        return view('users', [
            'users' => $allUsers,
        ]);
    }
}
