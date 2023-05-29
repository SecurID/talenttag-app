<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Rating;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function view(Request $request, $eventId)
    {
        $event = Event::find($eventId);
        return view('ratings.view', [
            'event' => $event,
        ]);
    }

    public function index()
    {
        return Rating::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'event_id' => ['required', 'integer'],
            'player_id' => ['required', 'integer'],
            'rating' => ['required'],
            'comment' => ['nullable'],
        ]);

        return Rating::create($request->validated());
    }

    public function show(Rating $rating)
    {
        return $rating;
    }

    public function update(Request $request, Rating $rating)
    {
        $request->validate([
            'event_id' => ['required', 'integer'],
            'player_id' => ['required', 'integer'],
            'rating' => ['required'],
            'comment' => ['nullable'],
        ]);

        $rating->update($request->validated());

        return $rating;
    }

    public function destroy(Rating $rating)
    {
        $rating->delete();

        return response()->json();
    }
}
