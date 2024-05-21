<?php

namespace App\Utils;

class Util {
    public static function startsWith($string, $prefix) {
        return substr($string, 0, strlen($prefix)) === $prefix;
    }
}
