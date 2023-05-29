<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function view(Request $request, $id)
    {
        $event = Event::find($id);
        $players = $event->players()->get();

        return view('events.view', [
            'event' => $event,
            'players' => $players,
        ]);
    }
    public function index()
    {
        return Event::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'host' => ['required'],
            'date' => ['required', 'date'],
        ]);

        return Event::create($request->validated());
    }

    public function show(Event $event)
    {
        return $event;
    }

    public function update(Request $request, Event $event)
    {
        $request->validate([
            'host' => ['required'],
            'date' => ['required', 'date'],
        ]);

        $event->update($request->validated());

        return $event;
    }

    public function destroy(Event $event)
    {
        $event->delete();

        return response()->json();
    }
}
