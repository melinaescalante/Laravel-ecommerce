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
        // var_dump($allUsers);
        return view('users', [
            'users' => $allUsers,
        ]);
    }
    public function addCart(int $id, Request $request)
    {
        $userId = auth()->id();
        $sourcePage = $request->input('source_page');
        $gamesEncode = [];
        $newGames = [];
        $game = Game::findOrFail($id);
        $purchasePendant = Purchase::where('user_id', '=', $userId)
            ->where('status', '=', 'pendiente')->first();
        if ($purchasePendant) {
            $newGames = json_decode($purchasePendant->games);
            array_push($newGames, $id);
            $gamesEncode = json_encode($newGames);
            $purchasePendant->update([
                'games' => json_encode($newGames),
                'amount' => $purchasePendant->amount + $game->price,
            ]);
        } else {

            $purchaseData = [
                'user_id' => auth()->id(),
                'status' => 'pendiente',
                'amount' => $game->price,
                'release_date' => now(),
                'games' => $gamesEncode ? $gamesEncode : json_encode([$id])
            ];
            $purchase = Purchase::create($purchaseData);
        }
        if ($sourcePage == 'cart') {
            return redirect()
                ->route('cart.index')
                ->with('feedback', [
                    'message' => 'El juego se agregó correctamente al carrito.',
                    'alert' => 'success',
                ]);
        } elseif ($sourcePage == 'games') {
            return redirect()
                ->route('games')
                ->with('feedback', [
                    'message' => 'El juego se agregó correctamente al carrito desde la página principal.',
                    'alert' => 'success',
                ]);
        }
    }
    public function removeFromCart(int $id, Request $request)
    {
        $userId = auth()->id();
        $game = Game::findOrFail($id);
        $gamesEncode = [];
        if ($userId) {
            $purchasePendant = Purchase::where('user_id', '=', $userId)
                ->where('status', '=', 'pendiente')->firstOrFail();
            $gamesCurrent = json_decode($purchasePendant->games, true);
            if (count($gamesCurrent) > 1) {

                $foundGame = array_search($id, $gamesCurrent);
                if ($foundGame !== false) {
                    unset($gamesCurrent[$foundGame]);
                }
                $gamesEncode = json_encode($gamesCurrent);
            } else {
                $gamesEncode = [];
            }
            $purchasePendant->update([
                'games' => $gamesEncode,
                'amount' => $purchasePendant->amount - $game->price,
            ]);
            // var_dump($gamesCurrent);
            if ( $gamesEncode== []) {
                $purchasePendant->delete();
                return redirect()
                    ->route('cart.index')
                    ->with('feedback', [
                        'message' => 'Se ha eliminado tu carrito.',
                        'alert' => 'warning',
                    ]);

            }

        }
        return redirect()
            ->route('cart.index')
            ->with('feedback', [
                'message' => 'El juego se eliminó correctamente del carrito.',
                'alert' => 'success',
            ]);

    }
    public function viewCart()
    {
        $userId = auth()->id();
        $purchasePendant = [];
        $gamesWithQuantities = [];
        $games = [];
        $purchasePendant = Purchase::where('user_id', '=', $userId)
            ->where('status', '=', 'pendiente')->first();
        if ($purchasePendant) {
            $gameIds = json_decode($purchasePendant->games) ?? [];

            $gamesGrouped = collect($gameIds)->countBy();


            $gamesGroupedArray = $gamesGrouped->toArray();
            $games = Game::whereIn('id_game', array_keys($gamesGroupedArray))

                ->get();
            $gamesWithQuantities = [];
            $totalAmount = 0;
            foreach ($games as $game) {
                $quantity = $gamesGroupedArray[$game->id_game];
                $subtotal = $game->price * $quantity;
                $totalAmount += $subtotal;

                $gamesWithQuantities[] = [
                    'game' => $game,
                    'quantity' => $quantity,
                    'total_price' => $subtotal,
                ];
            }
            $purchasePendant->update([
                'amount' => $totalAmount,
            ]);
        } else {
            $purchasePendant = [];

        }
        return view('cart.index', [
            'purchasePendant' => $purchasePendant,
            'games' => $games,
            'gamesWithQuantities' => $gamesWithQuantities

        ]);
    }
}
