<?php


function setSession($key,$value){
        $_SESSION[$key]=$value;

}
function checkSession($key){
    //print_r($_SESSION);
    return isset($_SESSION[$key]);
}

function getSession($key){
    //print_r($key);
    return $_SESSION[$key];
}
