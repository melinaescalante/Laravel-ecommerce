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
    public function addCart(int $id, Request $request)
    {
        $userId = auth()->id();
        $gamesEncode = [];
        $newGames = [];
        echo '<pre>';
        $game = Game::findOrFail($id);
        if ($userId) {
            $purchasePendant = Purchase::where('user_id', '=', $userId)
                ->where('status', '=', 'pendiente')->firstOrFail();
            $newGames = json_decode($purchasePendant->games);
            array_push($newGames, $id);
            $gamesEncode = json_encode($newGames);
            // var_dump($newGames);
            $purchasePendant->update([
                'games' => json_encode($newGames),
                'amount' => $purchasePendant->amount + $game->price,
            ]);
        } else {

            $purchaseData = [
                'user_id' => auth()->id(),
                'status' => 'pendiente',    // Estado por defecto
                'amount' => $game->price,
                'release_date' => now(),
                'games' => $gamesEncode ? $gamesEncode : json_encode([$id])
            ];
            $purchase = Purchase::create($purchaseData);
        }
        // echo '<pre>';

        return redirect()
            ->route('games')
            ->with('feedback', [
                'message' => 'El juego se agregó correctamente al carrito.',

                'alert' => 'success',
            ]);
    }
    public function viewCart()
    {
        $userId = auth()->id();
        $purchasePendant = Purchase::where('user_id', '=', $userId)
            ->where('status', '=', 'pendiente')->firstOrFail();
        if ($purchasePendant) {
            $gameIds = json_decode($purchasePendant->games) ?? [];

            $gamesGrouped = collect($gameIds)->countBy();

            
            $gamesGroupedArray = $gamesGrouped->toArray();
            $games = Game::whereIn('id_game', array_keys($gamesGroupedArray))
            
            ->get();

   
            $gamesWithQuantities = $games->map(function ($game) use ($gamesGroupedArray) {
                $quantity = $gamesGroupedArray[$game->id_game];
                return [
                    'game' => $game,
                    'quantity' => $quantity,
                    'total_price' => $game->price * $quantity,
                ];
            });
            var_dump($gameIds);
            echo '<pre>';

            var_dump($gamesGrouped);
            echo '</pre>';
            echo '<pre>';

            var_dump($gamesGroupedArray);
            echo '</pre>';
            echo '<pre>';

            var_dump($games);
            echo '</pre>';
        }
            // return view('cart', ['gamesWithQuantities' => []]);
            // $games = Game::findMany(json_decode($purchasePendant->games));
            // var_dump($purchasePendant);
            echo '<pre>';
            echo '</pre>';
            

            return view('cart.index', [
                'purchasePendant' => $purchasePendant,
                'games' => $games,
                'gamesWithQuantities' => $gamesWithQuantities
                
            ]);
    }
}
