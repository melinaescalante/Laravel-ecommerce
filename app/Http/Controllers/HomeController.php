<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Purchase;
use DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        return view('index');
    }
    public function about()
    {
        return view('about');
    }
    public function contact()
    {
        return view('blog');
    }
    public function users()
    {
        return view('users');
    }
    public function cart()
    {
        return view('cart.index');
    }
    public function dashboard()
    {
        $user = auth()->user();
        if ($user->email !== 'meliescalantee@gmail.com') {
            return redirect()->route('home');
        }
        $userPurchase = Purchase::select('games')->where('status', '=', 'confirmada')->get();
        if (count($userPurchase) > 0) {
                    $games = Game::all();
            $idsGamesNotSaled = [];
            $gamesNotSaled = [];
            json_decode($userPurchase);
            $allGames = [];
            foreach ($userPurchase as $purchase) {
                $allGames = array_merge($allGames, json_decode($purchase["games"]));
            }
            foreach ($games as $game) {

                $try = in_array($game->id_game, $allGames);
                if (!$try) {
                    array_push($idsGamesNotSaled, $game->id_game);
                    $gameInfo = Game::find($game->id_game);
                    array_push($gamesNotSaled, $gameInfo);
                }
            }
            $gameCounts = array_count_values($allGames);
            $mostSoldGameTimes = array_search(max($gameCounts), $gameCounts);
            $lessSoldGameTimes = array_search(min($gameCounts), $gameCounts);
            $mostSoldGame = Game::find($mostSoldGameTimes);
            $lessSoldGame = Game::find($lessSoldGameTimes);
            return view('dashboard', ['purchases' => $userPurchase , 'mostSold' => $mostSoldGame, 'lessSold' => $lessSoldGame , 'mostSoldGameTimes' => $gameCounts[$mostSoldGameTimes] , 'lessSoldGameTimes' => $gameCounts[$lessSoldGameTimes] , 'gamesNotSaled' => $gamesNotSaled ]);
        }else{
            return view('dashboard');
        }
    }
}
