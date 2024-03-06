<?php

function my_sin($x) {
    return sin($x);
}

function my_cos($x) {
    return cos($x);
}

function tangens($x) {
    return tan($x);
}


function my_pow($x, $y) {
    return pow($x, $y);
}

function factorial($x) {
    if ($x == 0) {
        return 1;
    } else {
        return $x * factorial($x - 1);
    }
}

function my_tg($x) {

    $sinn = sin($x);
    $coss = cos($x);
    
    if ($coss == 0) {
        return null;
    }
    
    $tang = $sinn / $coss;
    
    return $tang;
}

?>
