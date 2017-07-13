<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Mpociot\Firebase\SyncsWithFirebase;

class TrackRecord extends Model
{
    use SyncsWithFirebase;

    protected $dates = ['created_at', 'updated_at'];

    public function woman()
    {
        return $this->belongsTo(Woman::class);
    }
}
