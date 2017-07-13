<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Mpociot\Firebase\SyncsWithFirebase;

class Woman extends Model
{
    use SyncsWithFirebase;

    protected $dates = ['dob', 'created_at', 'updated_at'];

    /**
     * Get the track records for this woman.
     */
    public function trackRecords()
    {
        return $this->hasMany(TrackRecord::class);
    }
}
