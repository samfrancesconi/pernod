<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Log;

class EventController extends Controller {

    public function show($slug)
    {
        //$current_event = Event::where('slug', $slug)->firstOrFail();

        return view('app');
    }
}
