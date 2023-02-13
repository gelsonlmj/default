<?php 

namespace App\Helper;

class Util
{

    /*public static function clearText($text, $regexp = '/[^0-9az-AZ]/', $replace = "")
    {
        return preg_replace($regexp, $replace, $text);
    }*/

    public static function convertDecimalToDatabase($value)
    {
        return str_replace(",", ".", str_replace(".", "", $value));
    }
}