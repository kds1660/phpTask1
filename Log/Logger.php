<?php
namespace Log\Logger;

class Logger
{

    private static $log_file = 'Log/log.log';

    public static function log($log)
    {
        if ($log !== '') {
            $fh = fopen(self::$log_file, "a");
            fwrite($fh, date('Y-m-d H:i:s').' '.$log."\n");
            fclose($fh);
        }
    }
}
