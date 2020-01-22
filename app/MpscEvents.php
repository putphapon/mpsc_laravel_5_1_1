<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MpscEvents extends Model
{
    //
    protected $table = 'mpsc_events';

    protected $fillable = [
        'events_name',
        'events_image',
        'events_date',
        'events_where',
        'events_linkReg',
        'events_linkImage'
    ];
}
