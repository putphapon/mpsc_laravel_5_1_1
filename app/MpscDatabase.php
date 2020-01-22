<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MpscDatabase extends Model
{
    //
    protected $table = 'mpsc_databases';

    protected $fillable = [
        'database_name',
        'database_image',
        'database_link'
    ];
}
