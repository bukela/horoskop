<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    public function horoscopes()
    {
        return $this->belongsToMany(Horoscope::class);
    }

    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }
}
