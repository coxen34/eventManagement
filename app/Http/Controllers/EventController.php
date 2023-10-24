<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Organization;

class EventController extends Controller
{

    public function index()
    {
        $events = new Event();
        return view('events.index', compact('events'));
    }
    public function create()
    {
        // Obtener la lista de organizadores
        $organizations = Organization::all();

        return view('events.create', compact('organizations'));
    }

    public function store(Request $request)
    {
        $event = new Event();


        $event->title = $request->title;
        $event->event_date = $request->event_date;
        $event->start_time = $request->start_time;
        // $event->end_time = $request->end_time;
        $event->street = $request->street;
        $event->zipcode = $request->zipcode;
        $event->locality = $request->locality;
        $event->country = $request->country;
        $event->description = $request->description;
        $event->category = $request->category;
        $event->price = $request->price;
        $event->max_capacity = $request->max_capacity;

        //Valido fecha
        /* $request->validate([
        'start_time' => 'required|date_format:H:i',
        'end_time' => 'required|date_format:H:i|after:start_time',
    ]); */

        $event->save();

        // Obtener los organizadores seleccionados del formulario
        $selectedOrganizers = $request->input('organizations', []);

        // Adjuntar los organizadores al evento
        $event->organizations()->attach($selectedOrganizers);

        
        if (!$event) {
            return redirect()->route('events.showEvents')->with('error2', 'El evento no se creó.');
        }else{
            return redirect()->route('events.showEvents')->with('success', 'El evento se ha creado.');
        }
    }


    public function showEvents()
    {
        $events = Event::orderBy('event_date', 'desc')->get();
        return view('events.showEvents', compact('events'));
    }

    public function showEventsCategory($category)
    {
        $events = Event::where('category', $category)->get();
        return view('events.showEventsCategory', compact('events', 'category'));
    }

    public function showEventWithOrganizers($eventId)
    {
        $event = Event::with('organizations')->find($eventId);

        return view('events.showEventWithOrganizers', compact('event'));
    }
    public function editField($eventId, $field)
    {
        $event = Event::find($eventId);

        // Determina el nombre del campo y su valor actual
        $fieldName = $field;
        $fieldValue = $event->{$field};

        // Obtiene la lista de organizadores disponibles
        $availableOrganizers = Organization::all(['id', 'name']);



        return view('events.editField', compact('event', 'fieldName', 'fieldValue', 'availableOrganizers'));
    }


    public function addOrganizer(Request $request, $eventId)
    {
        // Buscar el evento por ID
        $event = Event::find($eventId);

        // Verificar si el evento se encontró en la base de datos
        if (!$event) {
            return redirect()->route('events.index')->with('error', 'El evento no se encontró.');
        }

        $organizerId = $request->input('organizerId');

        // Buscar la organización en función del ID
        $organizer = Organization::find($organizerId);

        if ($organizer) {
            // Verifica si la organización ya está asociada al evento para evitar duplicados
            if (!$event->organizations->contains($organizer->id)) {
                $event->organizations()->attach($organizer->id);
                return redirect()->route('events.editField', ['eventId' => $event->id, 'field' => '$fieldName'])->with('success', 'El organizador se ha agregado al evento.');
            }else{
                return redirect()->route('events.editField', ['eventId' => $event->id, 'field' => '$fieldName'])->with('error2', 'El organizador NO se ha agregado al evento.');
            }
        }
        
    }

    public function destroy($eventId)
    {
        $event = Event::find($eventId);

        if ($event) {
            // Eliminar el evento
            $event->delete();

            // Redirigir a una página de confirmación o a donde desees
            return redirect()->route('events.showEvents')->with('success', 'Evento eliminado correctamente');
        } else {
            // Si el evento no se encontró, redirigir a una página de error o a donde desees
            return redirect()->route('events.index')->with('error', 'No se pudo encontrar el evento');
        }
    }

    public function removeOrganizer($eventId, $organizerId)
    {
        $event = Event::find($eventId);
        if ($event) {
            // Elimina el organizador asociado al evento
            $event->organizations()->detach($organizerId);

            return redirect()->route('events.showEvents')->with('success', 'Organizador eliminado del evento');
        } else {
            // Si el evento no se encontró, redirigir a una página de error o a donde desees
            return redirect()->route('events.index')->with('error', 'No se pudo encontrar el evento');
        }
        
    }

    public function updateField(Request $request, $eventId)
    {
        $event = Event::find($eventId);

        $event->title = $request->title;
        $event->event_date = $request->event_date;
        $event->start_time = $request->start_time;
        // $event->end_time = $request->end_time;
        $event->street = $request->street;
        $event->zipcode = $request->zipcode;
        $event->locality = $request->locality;
        $event->country = $request->country;
        $event->description = $request->description;
        $event->category = $request->category;
        $event->price = $request->price;
        $event->max_capacity = $request->max_capacity;
        $event->save();

        if ($event) {
            return redirect()->route('events.showEventWithOrganizers', ['eventId' => $event->id])->with('success', 'Evento modificado');
        } else {
        // Si el evento no se encontró, redirigir a una página de error o a donde desees
        return redirect()->route('events.showEventWithOrganizers')->with('error', 'No se ha podido modificar el evento');
    }
    }
}
