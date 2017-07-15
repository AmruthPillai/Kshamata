<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Woman extends Model
{

    protected $dates = ['dob', 'created_at', 'updated_at'];

    /**
     * Get the track records for this woman.
     */
    public function trackRecords()
    {
        return $this->hasMany(TrackRecord::class);
    }
}
