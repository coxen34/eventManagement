<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->date('event_date');
            $table->time('start_time');
            // $table->time('end_time');
            $table->string('street');
            $table->string('zipcode');
            $table->string('locality');
            $table->string('country');
            $table->text('description');
            $table->enum('category', ['Art and Culture', 'Sports', 'Concerts', 'Gastronomy','Beauty-Fashion','Health-Wellness','Family-Friendly']);
            $table->decimal('price', 5, 2);
            $table->integer('max_capacity')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
