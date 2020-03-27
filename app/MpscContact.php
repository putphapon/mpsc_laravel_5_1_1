<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MpscContact extends Model
{
    //
    protected $table = 'mpsc_contacts';

    protected $fillable = [
        'contact_name',
        'contact_address',
        'contact_phone'
    ];
}
