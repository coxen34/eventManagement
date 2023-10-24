<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\Organization;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class even_organizatioSeeder extends Seeder
{
    public function run(): void
    {
        // ID de eventos 
        $eventIds = range(1, 50);

        // ID de organizaciones 
        $organizationIds = range(1, 10);

        foreach ($eventIds as $eventId) {
            $event = Event::find($eventId);

            if ($event) {
                $organizations = Organization::whereIn('id', $organizationIds)->get();

                // método attach para agregar las organizaciones al evento
                $event->organizations()->attach($organizations);
            }
        }
    }
}

