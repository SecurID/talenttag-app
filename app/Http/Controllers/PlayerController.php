<?php

namespace App\Http\Controllers;

use App\Imports\PlayersImport;
use App\Models\Event;
use App\Models\EventPlayer;
use App\Models\Player;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    public function add(Request $request, $event_id)
    {
        $event = Event::find($event_id);
        return view('players.add', [
            'event' => $event,
        ]);
    }

    public function view(Request $request, $id)
    {
        $player = Player::find($id);

        return view('players.view', [
            'player' => $player
        ]);
    }
    public function index()
    {
        return Player::all();
    }

    public function store(Request $request, $event_id)
    {
        $validated = $request->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'birthdate' => ['required'],
            'email' => ['required', 'email', 'max:254'],
            'phone' => ['required'],
            'street' => ['required'],
            'housenumber' => ['required'],
            'city' => ['required'],
            'zip' => ['required'],
            'club' => ['required'],
            'position' => ['required'],
            'accepted_disclaimer' => ['required'],
        ]);

        if($validated['accepted_disclaimer'] == "on") {
            $validated['accepted_disclaimer'] = 1;
        }

        $player = Player::create($validated);

        EventPlayer::create([
            'event_id' => $event_id,
            'player_id' => $player->id,
        ]);

        return view('players.success');
    }

    public function show(Player $player)
    {
        return $player;
    }

    public function update(Request $request, Player $player)
    {
        $request->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required', 'email', 'max:254'],
            'phone' => ['required'],
            'street' => ['required'],
            'housenumber' => ['required'],
            'city' => ['required'],
            'zip' => ['required'],
            'club' => ['required'],
            'position' => ['required'],
            'accepted_disclaimer' => ['required'],
        ]);

        $player->update($request->validated());

        return $player;
    }

    public function destroy(Player $player)
    {
        $player->delete();

        return response()->json();
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx'
        ]);

        $file = $request->file('file');

        // Import the file into the database
        \Maatwebsite\Excel\Facades\Excel::import(new PlayersImport, $file);

        // Redirect the user back and show a success message
        return back()->with('success', 'Users imported successfully.');
    }
}
