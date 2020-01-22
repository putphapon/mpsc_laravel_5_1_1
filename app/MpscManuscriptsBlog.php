<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MpscManuscriptsBlog extends Model
{
    //
    protected $table = 'mpsc_manuscripts_blogs';

    protected $fillable = [
        'manuscripts_blog_name',
        'manuscripts_blog_detail',
        'manuscripts_blog_image',
        'manuscripts_category_id',
        'manuscripts_blog_tag',
        'manuscripts_blog_link'
    ];
}
