<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MpscTitle extends Model
{
    //
    protected $table = 'mpsc_titles';

    protected $fillable = [
        'title_name',
        'title_image'
    ];
}
