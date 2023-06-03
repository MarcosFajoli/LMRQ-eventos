<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function index() {
        return view('home');
    }

    public function showAll() {
        $events = Event::all();
        
        return view('allevents', ['events' => $events]);
    }

    public function create() {
        return view('events.create');
    }

    public function edit($id = null) {
        if($id == null) {
            return view('events.myevents');
        }
    }
}
