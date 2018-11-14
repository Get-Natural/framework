<?php
namespace Natural\Helpers;
/**
 *  Global helper functions
 */
class BaseHelper
{
    /**
     * Dump exit all data
     * @param $data
     */
    static function dumper($data)
    {
        echo '<pre style="background: #d3eaf9; color: #2C3E50; padding: 10px; display: block; border-radius: 3px;">';
        var_dump($data);
        echo '</pre>';
    }

    /**
     * Dump exit all data
     * @param $data
     */
    static function dump_exit($data)
    {
        echo '<pre style="background: #d3eaf9; color: #2C3E50; padding: 10px; display: block; border-radius: 3px;">';
        dump($data);
        echo '</pre>';
        exit;
    }
}

