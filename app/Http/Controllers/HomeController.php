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
    public function dashboard(){
        $user = auth()->user();
        if ($user->email !== 'meliescalantee@gmail.com') {
            return redirect()->route('home');
        }
        $userPurchase=Purchase::select('games')->get();
        json_decode($userPurchase);
        $allGames = [];
        foreach ($userPurchase as $purchase) {
            $allGames = array_merge($allGames, json_decode($purchase["games"]));
        }
        $gameCounts = array_count_values($allGames);
        $mostSoldGameTimes = array_search(max($gameCounts), $gameCounts);
        $lessSoldGameTimes = array_search(min($gameCounts), $gameCounts);
        // var_dump($mostSoldGame);
        $mostSoldGame=Game::find($mostSoldGameTimes);
        $lessSoldGame=Game::find($lessSoldGameTimes);
        return view('dashboard',['purchases'=>$userPurchase, 'mostSold'=>$mostSoldGame,'lessSold'=>$lessSoldGame, 'mostSoldGameTimes'=>$gameCounts[$mostSoldGameTimes],'lessSoldGameTimes'=>$gameCounts[$lessSoldGameTimes]]);
    }
}
