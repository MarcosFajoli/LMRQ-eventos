<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Event;
use App\Models\Modality;
use App\Models\User;

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
        $eventUser = User::where('id', $event->user_id)->first()->toArray();

        return view('events.showone', ['event' => $event, 'eventUser'=> $eventUser]);
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
        $user = auth()->user();

        $event->user_id = $user->id; 
        $event->name = $request->name;
        $event->date = $request->date;
        $event->description = $request->description;
        $event->modal_id = $request->modal_id;
        $event->created_at = $datenow;

        $event->save();

        return redirect('/eventos/'.$event->user_id);

    }

    public function dashboard() {
        $user = auth()->user();

        $events = $user->events;

        return view('dashboard', ['events' => $events]);
    }
}
