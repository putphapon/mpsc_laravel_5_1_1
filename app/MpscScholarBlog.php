<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MpscScholarBlog extends Model
{
    //
    
    protected $table = 'mpsc_scholar_blogs';

    protected $fillable = [
        'scholar_blog_name',
        'scholar_blog_author',
        'scholar_category_id',
        'scholar_blog_link'
    ];
}
