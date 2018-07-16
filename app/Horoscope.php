<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Horoscope extends Model
{
    public function sign() {
        return $this->belongsTo(Sign::class);
    }

    public function horoscopegroup() {
        return $this->belongsTo(Horoscopegroup::class);
    }

    public function schedules()
    {
        return $this->belongsToMany(Schedule::class);
    }

    public function types()
    {
        return $this->belongsToMany(Type::class);
    }

    public function scopeSearch($query, $search) {
        
        return $query->where('title', 'LIKE', "%$search%");
        
                    // ->orWhere('horoscopegroup_id', 'LIKE', "%$search%");
    }
}
