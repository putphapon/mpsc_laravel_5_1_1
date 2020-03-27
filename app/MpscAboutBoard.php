<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MpscAboutBoard extends Model
{
    //
    protected $table = 'mpsc_about_board';

    protected $fillable = [
        'about_board_name',
        'about_board_image'
    ];
}
