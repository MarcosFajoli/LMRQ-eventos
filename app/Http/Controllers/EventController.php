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
        $user = auth()->user();
        $hasJoined = false;

        if($user) {
            $userEvents = $user->participations->toArray();
            foreach($userEvents as $userEvent) {
                if ($userEvent['id'] == $id) {
                    $hasJoined = true;
                }
            }
        }

        return view('events.showone', ['event' => $event, 'eventUser' => $eventUser, 'hasJoined' => $hasJoined]);
    }

    public function create() {
        $modalities = Modality::all();

        return view('events.create', ['modalities' => $modalities]);
    }

    public function edit($id = null) {
        if($id == null) {
            return view('events.myevents');
        }

        $modalities = Modality::all();

        $event = Event::findOrFail($id);
        return view('events.edit', ['event' => $event, 'modalities' => $modalities]);
    }

    public function update(Request $request) {
        $user = auth()->user();
        $event = Event::findOrFail($request->id);
        if($user->id == $event->user_id){
            Event::findOrFail($request->id)->update($request->all());

            return redirect('/dashboard')->with('msg', 'Evento criado com sucesso!');
        } else {
            return redirect('/dashboard')->with('msg', 'Não foi possível editar o evento.');
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

        return redirect('/dashboard')->with('msg', 'Evento criado com sucesso!');

    }

    public function dashboard() {
        $user = auth()->user();

        $events = $user->events;

        return view('dashboard', ['events' => $events]);
    }

    public function destroy($id) {
        Event::findOrFail($id)->delete();

        return redirect('/dashboard')->with('msg', 'Evento foi deletado com sucesso.');
    }

    public function join($id) {
        $user = auth()->user();

        $user->participations()->attach($id);

        return redirect('/eventos/presencas')->with('msg', 'Participação registrada com sucesso.');
    }
    
    public function leave($id) {
        $user = auth()->user();

        $user->participations()->detach($id);

        return redirect('/eventos/presencas')->with('msg', 'Participação cancelada ao evento.');
    }

    public function showPresences() {
        $user = auth()->user();

        $eventsParticipation = $user->participations;
        return view('events.presences', ['events' => $eventsParticipation]);
    }
}
