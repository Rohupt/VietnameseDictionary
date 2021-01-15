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

    static function toRoman($number) {
        $map = array('M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400, 'C' => 100, 'XC' => 90, 'L' => 50, 'XL' => 40, 'X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1);
        $returnValue = '';
        while ($number > 0) {
            foreach ($map as $roman => $int) {
                if($number >= $int) {
                    $number -= $int;
                    $returnValue .= $roman;
                    break;
                }
            }
        }
        return $returnValue;
    }
}