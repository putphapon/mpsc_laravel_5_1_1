<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MpscShops extends Model
{
    //
    protected $table = 'mpsc_shops';

    protected $fillable = [
        'shops_name',
        'shops_image',
        'shops_link'
    ];
}
