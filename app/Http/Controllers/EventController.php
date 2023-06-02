<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventController extends Controller
{
    public function create() {
        return view('events.create');
    }

    public function edit($id = null) {
        if($id == null) {
            return view('events.myevents');
        }
    }
}
