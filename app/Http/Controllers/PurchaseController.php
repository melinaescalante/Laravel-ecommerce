<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use Illuminate\Http\Request;
use App\Models\Game;
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
    public function addCart(int $id,Request $request)
    {

      
var_dump($id);
        $game = Game::findOrFail($id);

        $purchaseData = [
            'user_id' => auth()->id(),
            'status' => 'pendiente',    // Estado por defecto
            'amount' => $game->price,
            'release_date' => now(),
            'games' => json_encode([$id]),
        ];
        $purchase = Purchase::create($purchaseData);
        return redirect()
            ->route('games')
            ->with('feedback', [
                'message' => 'El juego se agregó correctamente al carrito.',

                'alert' => 'success',
            ]);
    }
}
