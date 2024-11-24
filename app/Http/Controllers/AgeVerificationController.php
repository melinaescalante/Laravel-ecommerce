<?php

namespace App\Http\Controllers;
use App\Models\Game;

use Illuminate\Http\Request;

class AgeVerificationController extends Controller
{
    public function verificationForm(int $id){
        return view('games.age-verification-form',[
            'game'=>Game::findOrFail($id)
        ]);
    }
    public function verificationProcess(int $id){
        session()->put('ageVerified',true);
        return to_route('games.view',['id'=>$id]);
    }
}
