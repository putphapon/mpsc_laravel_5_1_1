<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MpscAboutObjective extends Model
{
    //
    protected $table = 'mpsc_about_objective';

    protected $fillable = [
        'about_objective_subject',
        'about_objective_detial'
    ];
}
