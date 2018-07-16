<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sign extends Model
{
    public function horoscope_group() {
        return $this->belongsTo(HoroscopeGroup::class);
    }

    public function horoscope() {
        return $this->belongsTo(Horoscope::class);
    }
}
