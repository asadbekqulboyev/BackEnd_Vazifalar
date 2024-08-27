<?php
function getAllMessage(){
    $result = [];
    if (is_file('message.txt')){
        $getFile = file_get_contents('message.txt');
        $result = explode("\n", $getFile);
    }
    return $result;
};
getAllMessage();