<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Event;
use App\Models\Modality;

class EventController extends Controller
{
    public function index() {
        return view('home');
    }

    public function showAll() {
        $search = request('search');

        if($search){
            $events = Event::where([
                ['name', 'like', '%'.$search.'%']
            ])->get();
        } else {
            $events = Event::all();
        }
        
        return view('events.showall', ['events' => $events, 'search' => $search]);
    }

    public function showOne($id) {
        $event = Event::findOrFail($id);

        return view('events.showone', ['event' => $event]);
    }

    public function create() {
        $modalities = Modality::all();

        return view('events.create', ['modalities' => $modalities]);
    }

    public function edit($id = null) {
        if($id == null) {
            return view('events.myevents');
        }
    }

    public function store(Request $request) {
        $event = new Event;

        $datenow = Carbon::now();

        $event->user_id = 1; // modificar quando fizer a lógica de login
        $event->name = $request->name;
        $event->date = $request->date;
        $event->description = $request->description;
        $event->modal_id = $request->modal_id;
        $event->created_at = $datenow;

        $event->save();

        return redirect('/eventos'.$event->user_id);

    }
}
