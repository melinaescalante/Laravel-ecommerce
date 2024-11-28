<?php

namespace App\Http\Controllers;
use App\Models\Game;
use App\Models\Genre;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GamesController extends Controller
{
    public function index(Request $request)
    {
        $gamesQuery = Game::with(['rating', 'genres']);
        $searchParams = [
            'buscador' => $request->query('buscador'),
            'rating' => $request->query('rating')
        ];
        if ($searchParams['buscador']) {
            $gamesQuery->where('title', 'like', '%' . $searchParams['buscador'] . '%');
        }
        if ($searchParams['rating']) {
            $gamesQuery->where('rating_fk', '=', $searchParams['rating']);
        }
        $allGames = $gamesQuery->simplePaginate(5)->withQueryString();

        return view('games.index', [
            'games' => $allGames,
            'searchParams'=>$searchParams,
            'ratings'=>Rating::all()
        ]);
    }
    public function view($id)
    {
        $game = Game::find($id);
        return view('games.view', ['game' => $game]);
    }
    public function addCart(Request $request)
    {
    
        $input = $request->id;
        $order = Game::create($input);

        return to_route('games')->with('feedback', [
            'message' => 'El juego se añadido correctamente.',
            'alert' => 'success',
        ]);
    }

    public function createForm()
    {
        return view('games.create-form', ['genres' => Genre::orderBy('name')->get(), 'ratings' => Rating::all()]);
    }
    public function createProcess(Request $request)
    {
     
        $request->validate(
            [
                'title' => 'required|min:3|max:255',
                'price' => 'required|numeric',
                'release_date' => 'required',
                'synopsis' => 'required',
                'company' => 'required',
                'rating_fk' => 'required',
                // 'cover' => 'size:5120',
            ],
            ['title.required' => 'El titulo debe tener un valor', 'price.required' => 'El precio debe tener un valor', 'release_date.required' => 'La fecha de estreno debe tener un valor', 'synopsis.required' => 'La sinopsis debe tener un valor', 'company.required' => 'La compañia debe tener un valor'],
        );

        $input = $request->all();
        if ($request->hasFile('cover')) {
            $input['cover'] = $request->file('cover')->store('covers', 'public');
        }
        $games = Game::create($input);
        $games->genres()->attach($input['genre_id']);
        return redirect()
            ->route('games')
            ->with('feedback', [
                'message' => 'El juego   <b> ' . e($input['title']) . ' </b>   se agregó correctamente.',

                'alert' => 'success',
            ]);
    }
    public function editForm(int $id)
    {
        return view('games.edit-form', [
            'ratings' => Rating::all(),
            'genres' => Genre::orderBy('name')->get(),
            'game' => Game::findOrFail($id),
        ]);
    }
    public function editProcess(int $id, Request $request)
    {
        $request->validate(
            [
                'title' => 'required|min:3|max:255',
                'synopsis' => 'required',
                'company' => 'required',
                'price' => 'required|numeric',
                'release_date' => 'required',
            ],
            ['title.required' => 'El titulo debe tener un valor', 'price.required' => 'El precio debe tener un valor', 'release_date.required' => 'La fecha de estreno debe tener un valor', 'synopsis.required' => 'La sinopsis debe tener un valor', 'company.required' => 'La compañia debe tener un valor'],
        );
        $input = $request->except(['_token', '_method']);
        $game = Game::findOrFail($id);
        $old_cover = $game->cover;
     
        // $old_cover_description = $game->cover_description;
        if ($request->hasFile('cover')) {
            $input['cover'] = $request->file('cover')->store('/covers', 'public');
            if (isset($old_cover)) {
                # code...
                Storage::disk('public')->delete($old_cover);
            }
        }
       
        $game->update($input);
        $game->genres()->sync($request->input('genre_id'));
        return redirect()
            ->route('games')
            ->with('feedback', [
                'message' => 'El juego <b>' . e($input['title']) . '</b> se editó correctamente.',
                'alert' => 'success',
            ]);
    }
    public function deleteProcess(int $id, Request $request)
    {
        $game = Game::findOrFail($id);
        $game->genres()->detach();
        $game->delete();
        return redirect()
            ->route('games')
            ->with('feedback', [
                'message' => 'El juego <b> ' . e($game->title) . ' </b> se borró correctamente.',
                'alert' => 'success',
            ]);
    }
}
