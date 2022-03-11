<?php
declare(strict_types=1);

namespace App;

use Illuminate\Foundation\Application as IlluminateApplication;

class Application extends IlluminateApplication
{
    protected $appPath = __DIR__;
}
