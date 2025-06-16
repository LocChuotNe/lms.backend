<?php

namespace App\Common;

class Helpers
{
    public static function formatDate($date)
    {
        return \Carbon\Carbon::parse($date)->format('d/m/Y');
    }

    public static function generateSlug($string)
    {
        return strtolower(str_replace(' ', '-', $string));
    }
}