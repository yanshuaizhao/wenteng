<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tdk extends Model
{
    protected $table = 'wt_tdk';

    const STATUS_SHOW = 1;
    const STATUS_HIDE = 0;

    const UPDATED_AT ='utime';
    const CREATED_AT = 'ctime';

    public $timestamps = false;

    protected function getDateFormat()
    {
        return 'U';
    }
}
