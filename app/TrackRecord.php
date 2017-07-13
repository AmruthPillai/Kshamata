<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Mpociot\Firebase\SyncsWithFirebase;

class TrackRecord extends Model
{
    use SyncsWithFirebase;

    protected $fillable = ['employer_name', 'salary', 'location'];
}
