<?php
/*
 * Author: Abdullah Al Faruk
 * Website: www.farukexpress.com
 * */
function generateKey($action){
    if($action == "gkey"){
        $letter = strtoupper("abcdefghijklmnopqrstuvwxyz");
        $orginalKey = "abcdefghijklmnopqrstuvwxyz{$letter}1234567890";
        $orginalKey = str_split($orginalKey);
        shuffle($orginalKey);
        return join("", $orginalKey);
    }
}

function displayVal($data){
    printf("value=\"%s\"", $data);
}

function scrambleData($key, $data){
    $letter = strtoupper("abcdefghijklmnopqrstuvwxyz");
    $orginalData = "abcdefghijklmnopqrstuvwxyz{$letter}1234567890";
    $datalen = strlen($data);
    $gData = "";

    for($i = 0; $i<$datalen; $i++){
        $currentChar = $data[$i];
        $pos = strpos($orginalData, $currentChar);

        if($pos != false){
            $gData .= $key[$pos];
        }else{
            $gData .= $currentChar;
        }
    }

    return $gData;
}

function decodeData ($key, $data){
    $letter = strtoupper("abcdefghijklmnopqrstuvwxyz");
    $orginalData = "abcdefghijklmnopqrstuvwxyz{$letter}1234567890";
    $datalen = strlen($data);
    $gData = "";

    for($i = 0; $i<$datalen; $i++){
        $currentChar = $data[$i];
        $pos = strpos($key, $currentChar);

        if($pos != false){
            $gData .= $orginalData[$pos];
        }else{
            $gData .= $currentChar;
        }
    }
    //$gData .= ($pos)
    return $gData;
}