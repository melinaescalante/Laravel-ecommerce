<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        $allUsersWithPurchases = DB::table('users')
            ->leftJoin('users_have_purchases', 'users.id', '=', 'users_have_purchases.user_id')
            ->select('users.*', 'users_have_purchases.*')
            ->groupBy('users.id')
            ->get();


        return view('users', [
            'users' => $allUsersWithPurchases,
        ]);
    }
    public function profile(Request $request)
    {
        $userAuth = auth()->id();
        $userData = User::findOrFail($userAuth);
        return view('auth.profile', [
            'userData' => $userData,
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
    public function editProcessName(Request $request){
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

