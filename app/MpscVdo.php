<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MpscVdo extends Model
{
    //
    protected $table = 'mpsc_vdos';

    protected $fillable = [
        'vdo_name',
        'vdo_detail',
        'vdo_link'
    ];
}
