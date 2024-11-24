<?php

namespace App\Http\Controllers;
use App\Models\Game;
use App\Mail\GameReservationConfirmation;
use Illuminate\Support\Facades\Mail;

use Illuminate\Http\Request;

class GamesReservationController extends Controller
{
    public function resevationProcess(int $id)
    {
        Mail::to(auth()->user())->send(new GameReservationConfirmation(Game::findOrFail($id)));
   
        return to_route('games')->with('feedback', [
            'message' => 'El juego se reservado correctamente.',
            'alert' => 'success',
        ]);
    }
    public function printEmail()
    {
        return new GameReservationConfirmation(Game::findOrFail(1));
    }
}
