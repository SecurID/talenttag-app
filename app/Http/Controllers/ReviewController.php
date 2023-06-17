<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Rating;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function view(Request $request)
    {
        $events = Event::all();
        return view('reviews.view', [
            'events' => $events,
        ]);
    }

    public function single(Request $request, $id)
    {
        $event = Event::find($id);
        return view('reviews.single', [
            'event' => $event,
        ]);
    }
}
