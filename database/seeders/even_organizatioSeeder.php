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
        
        $eventIds = range(1, 50);

        
        $organizationIds = range(1, 10);

        foreach ($eventIds as $eventId) {
            $event = Event::find($eventId);

            if ($event) {
                $organizations = Organization::whereIn('id', $organizationIds)->get();

                
                $event->organizations()->attach($organizations);
            }
        }
    }
}

