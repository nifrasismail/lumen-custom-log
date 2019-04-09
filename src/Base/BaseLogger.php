<?php
/**
 * Created by PhpStorm.
 * User: nifras
 * Date: 4/9/19
 * Time: 10:46 PM
 */

namespace Nifrasismail\Logger\Base;


use Monolog\Handler\StreamHandler;
use Monolog\Logger;

class BaseLogger extends Logger
{
    public function __construct($path, $name = "logger")
    {
        parent::__construct($name);
        $this->pushHandler(new StreamHandler(storage_path($path)));
    }

    public function debug($message, array $context = array())
    {
        if (env('APP_DEBUG')) {
            parent::debug($message, $context);
        }
    }
}
