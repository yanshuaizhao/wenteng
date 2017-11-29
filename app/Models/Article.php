<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'wt_article';

    const STATUS_SHOW = 1;
    const STATUS_HIDE = 0;
}
