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

        return redirect()->route('events.showEvents');
    }


    public function showEvents()
    {
        // Ordenados por fecha desc 
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
            // Manejar el caso en el que el evento no existe, por ejemplo, redirigir con un mensaje de error
            return redirect()->route('events.index')->with('error', 'El evento no se encontró.');
        }

        // Continúa con el proceso de agregar organizador

        $organizerId = $request->input('organizerId');

        // Buscar la organización en función del ID
        $organizer = Organization::find($organizerId);

        if ($organizer) {
            // Verifica si la organización ya está asociada al evento para evitar duplicados
            if (!$event->organizations->contains($organizer->id)) {
                // Agrega el organizador al evento
                $event->organizations()->attach($organizer->id);
            }
        }

        // Redirige de vuelta a la página de edición del campo
        return redirect()->route('events.editField', ['eventId' => $event->id, 'field' => '$fieldName']);
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

        // Elimina el organizador asociado al evento
        $event->organizations()->detach($organizerId);

        return redirect()->route('events.showEventWithOrganizers', ['eventId' => $event->id]);
    }

    public function updateField(Request $request, $eventId)
    {
        $event = Event::find($eventId);

        // Obten el nombre del campo que se está actualizando
        $field = $request->input('field');

        // Actualiza el valor del campo con el nuevo valor del formulario
        $event->{$field} = $request->input('value');


        $event->save();

        return redirect()->route('events.showEventWithOrganizers', ['eventId' => $event->id]);
    }
}
