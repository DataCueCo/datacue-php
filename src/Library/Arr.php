<?php

namespace DataCue\Library;

class Arr
{
    public static function isAssocArray($arr)
    {
        $index = 0;
        foreach (array_keys($arr) as $key) {
            if ($index++ != $key) {
                return false;
            }
        }
        return true;
    }
}
