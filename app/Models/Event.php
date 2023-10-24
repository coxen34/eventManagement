<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    public function organizations()
    {
        return $this->belongsToMany(Organization::class, 'event_organization');
    }
    public static function getAllEvents()
    {
        return self::all();
    }
}
