<?php

if (!isset($argv[1]) || !isset($argv[2]) || isset($argv[3])) {
    echo "Invalid input" . PHP_EOL;
    return;
}

function encrypt($shift, $word)
{
    if ($shift > 37) {
        return "Invalid shift. Pick an integer between 0-37";
    }

    $alphabet = str_split("abcdefghijklmnopqrstuvwxyz");
    $ciphered_string = "";
    foreach (str_split($word) as $string) {
        if (in_array($string, $alphabet)) {
            $position = array_search($string, $alphabet) + $shift;
            if ($position > sizeof($alphabet) - 1) {
                $position = $position - sizeof($alphabet);
            }
            $ciphered_string .= $alphabet[$position];
        } else {
            $ciphered_string .= $string;
        }
    }
    return $ciphered_string;
}

echo encrypt($argv[1], $argv[2]) . PHP_EOL;