<?php

namespace App\Http\Services;

use App\Consts\Common;
use App\Models\Demand;

class DemandService
{
    protected static $instance;

    protected function __construct()
    {
    }

    public static function getInstance()
    {
        if (empty(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }




}
