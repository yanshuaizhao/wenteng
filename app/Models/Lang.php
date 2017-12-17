<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lang extends Model
{
    protected $table = 'wt_lang';

    const STATUS_SHOW = 1;
    const STATUS_HIDE = 0;

    const UPDATED_AT ='utime';
    const CREATED_AT = 'ctime';

    protected function getDateFormat()
    {
        return 'U';
    }
}
