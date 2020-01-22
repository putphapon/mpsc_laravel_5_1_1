<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MpscManuscriptsCategory extends Model
{
    //
    protected $table = 'mpsc_manuscripts_categories';

    protected $fillable = [
        'manuscripts_category_name',
        'manuscripts_category_detail',
        'manuscripts_category_image'
    ];
}
