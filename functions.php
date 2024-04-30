<?php

function randomString($stringLen){
    $characters = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $newString = '';

    for($i=0; $i<$stringLen ; $i++){
        $character = rand(0,strlen($characters)-1);
        $newString .= $characters[$character];
    }
    return $newString;
}