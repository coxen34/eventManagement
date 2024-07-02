<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Event;
use App\Models\Organization;

class DatabaseSeeder extends Seeder
{
    
    public function run(): void
    {
    
        Event::factory(50)->create();
        Organization::factory(10)->create();
        $this->call(even_organizatioSeeder::class);
    }
}
