<?php

namespace App\Helpers;

class Helper {
    static function str_starts_with($haystack, $needles = []) {
        foreach($needles as $needle)
            if (str_starts_with($haystack, $needle))
                return true;
        return false;
    }

    static function str_ends_with($haystack, $needles = []) {
        foreach($needles as $needle)
            if (str_ends_with($haystack, $needle))
                return true;
        return false;
    }

    static function str_contains($haystack, $needles = []) {
        foreach($needles as $needle)
            if (str_contains($haystack, $needle))
                return true;
        return false;
    }
}