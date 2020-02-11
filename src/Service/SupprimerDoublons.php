<?php

namespace App\Service;

class SupprimerDoublons
{
    public static function unique($arr)
    {
        $arr = array_map('implode', $arr, array_fill(0, count($arr), '|'));
        $arr = array_unique($arr);
        $arr = array_map('explode', array_fill(0, count($arr), '|'), $arr);
        return $arr;
    }
}
