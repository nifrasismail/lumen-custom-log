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
    public function __construct($path, $fileName,$frequent = '', $name = "logger")
    {
        parent::__construct($name);
        $this->init($path,$fileName,$frequent);
    }

    public function debug($message, array $context = array())
    {
        if (env('APP_DEBUG')) {
            parent::debug($message, $context);
        }
    }

    public function init($path,$fileName,$frequent)
    {
        switch ($frequent){
            case Constant::$DAILY: {
                $path = $path . '/' . $fileName . '_'. date('Y-m-d') . '.log';
            }
            case Constant::$MONTHLY: {
                $path = $path . '/' . $fileName . '_'. date('Y-m') . '.log';
            }
            case Constant::$YEARLY: {
                $path = $path . '/' . $fileName . '_'. date('Y') . '.log';
            }break;
            default: {
                $path = $path . '/' . $fileName . '.log';
            }
        }

        $this->pushHandler(new StreamHandler(storage_path($path)));
    }
}
