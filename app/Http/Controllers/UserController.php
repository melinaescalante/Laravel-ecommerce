<?php

namespace App\Http\Controllers;
use App\Models\Game;
use App\Models\User;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        // Valida el email del usuario
        if ($user->email !== 'meliescalantee@gmail.com') {
            return redirect()->route('home');
        }
        $users = User::all();
        $allUsersWithPurchases = DB::table('users')
            ->leftJoin('users_have_purchases', 'users.id', '=', 'users_have_purchases.user_id')
            ->select('users.*', 'users_have_purchases.*')
            // ->groupBy('users.id')
            ->get();

        // $allUsersWithPurchases->update(['games'=>json_decode($allUsersWithPurchases->games)]);
// var_dump($allUsersWithPurchases)
        return view('users', [
            'users' => $users,
            'userWithPurchases' => $allUsersWithPurchases
        ]);
    }

    public function profile(Request $request)
    {
        $userAuth = auth()->id();
        $userData = User::findOrFail($userAuth);
        $purchasesWithGames = [];
        // Obtiene las compras del usuario
        $userWithPurchases = DB::table('users')
            ->leftJoin('users_have_purchases', 'users.id', '=', 'users_have_purchases.user_id')
            ->select('users.*', 'users_have_purchases.*')
            ->where('users.id', '=', $userAuth)
            ->get();

        $purchasesWithGames = $userWithPurchases->map(function ($purchase) {

            $gameIds = json_decode($purchase->games) ?? [];

            $gamesGrouped = collect($gameIds)->countBy();

            $games = Game::whereIn('id_game', array_keys($gamesGrouped->toArray()))->get();

            $gamesWithQuantities = $games->map(function ($game) use ($gamesGrouped) {
                $quantity = $gamesGrouped[$game->id_game] ?? 0;

                return [
                    'game' => $game,
                    'quantity' => $quantity,
                    'total_price' => $game->price * $quantity,
                ];
            });
                
                return [
                    'purchase' => $purchase,
                    'games' => $gamesWithQuantities,
                ];
      
        });


        return view('auth.profile', [
            'userData' => $userData,
            'purchases' => $purchasesWithGames, // Procesadas correctamente
        ]);
    }

    public function editProcessEmail(Request $request)
    {
        $userAuth = auth()->id();
        $userData = User::findOrFail($userAuth);
        $input = $request->input('email');
        $userData->update([
            'email' => $input,

        ]);
        return redirect()
            ->route('profile')
            ->with('feedback', [
                'message' => 'El email se editó correctamente.',
                'alert' => 'success',
            ]);
    }
    public function editProcessName(Request $request)
    {
        $userAuth = auth()->id();
        $userData = User::findOrFail($userAuth);
        $input = $request->input('full_name');
        $userData->update([
            'name' => $input,

        ]);
        return redirect()
            ->route('profile')
            ->with('feedback', [
                'message' => 'El nombre se editó correctamente.',
                'alert' => 'success',
            ]);
    }
    public function editForm()
    {
        return view('auth.edit-email-form');
    }
    public function editNameForm()
    {
        return view('auth.edit-name-form');

    }
}

