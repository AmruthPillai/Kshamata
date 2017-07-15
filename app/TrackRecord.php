<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrackRecord extends Model
{

    protected $dates = ['created_at', 'updated_at'];

    public function woman()
    {
        return $this->belongsTo(Woman::class);
    }
}
