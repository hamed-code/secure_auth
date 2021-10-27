<?php

function get_random_string($length){
    $array = array(0,1,2,3,4,5,6,7,8,9,'a','b','c','d','e','f','g','h','i','j','k','l','o','p','q','r','s','t'
    ,'u','w');
    $text = "";

    $lenght = rand(4,$length);
    for($i = 0; $i < $lenght; $i++){
        $random = rand(0,20);
        $text .= $array[$random];
    }
    return $text;
}