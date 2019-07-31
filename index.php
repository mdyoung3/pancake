<?php

/**
 * Revenge of the Pancakes
 *
 * Marc Young
 */

function get_input()
{
    $cases = json_decode(file_get_contents("cases.json"));

    foreach($cases as $key => $case)
    {
        $flip_count = 0;

        if(strpos($case, '-') !== false)
        {
            $flip_count = flipper($case);

            printf( "Case #%d: %d\n", $key, $flip_count );
            print "\n";
        } else {
            printf( "Case #%d: %d\n", $key, $flip_count );
            print "\n";
        }
    }
}

function flipper($pancakes){
    $pancakes = str_split($pancakes);
    $first_char = $pancakes[0];

    if($first_char === '-'){
        $flips = 1;
    } else {
        $flips = 0;
    }

    for($i = 1; $i < count($pancakes); $i++){
        $pancake = $pancakes[$i];

        if($pancake === '-'){
            if($first_char === '-') {
                continue;
            }
            $flips = $flips + 2;
        }

        $first_char = $pancake;
    }

    return $flips;
}

get_input();