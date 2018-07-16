<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Horoscopegroup extends Model
{
    public function signs()
    {
        return $this->hasMany(Sign::class);
    }

    public function horoscopes()
    {
        return $this->hasMany(Horoscope::class);
    }
}
