<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MpscScholarCategory extends Model
{
    //
    protected $table = 'mpsc_scholar_categories';

    protected $fillable = [
        'scholar_category_name'
    ];
}
