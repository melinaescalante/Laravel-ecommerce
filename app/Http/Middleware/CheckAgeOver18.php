<?php

namespace App\Http\Middleware;
use App\Models\Game;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAgeOver18
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $id = $request->route('id');
        // dd($id);
        $game = Game::findOrFail($id);
        if ($game->rating_fk == 4) {
            if (!session()->get('ageVerified')) {
                return to_route('games.age-verification.form',['id'=>$game->id_game]);
            }
        }
        return $next($request);
    }
}
