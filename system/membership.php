<?php

require_once "system/DB_Hacker.php";
function registerUser($username,$email,$password){
    if(usernameCheck($username) && emailCheck($email) && passwordCheck($password)){
        return insertUser($username,$email,$password);
    }else{
        return "fail";
    }
}

function loginUser($email,$password){
    if(emailCheck($email) && passwordCheck($password)){
        return userLogin($email,$password);
    }else{
        return "auth fails";
    }
}
function usernameCheck($username){
//char>6
//a-z A-Z 0-9
    if(strlen($username)>=6){
        $bol=preg_match('/^[\w]+$/',$username);
        return $bol;
    }else{
        return false;
    }
}

function emailCheck($email){
//@.com
//chr>15
    if(strlen($email)>=15){
        $bol=preg_match('/[a-zA-Z0-9]+@[a-z]+\.[a-z]{2,4}+$/',$email);
        return $bol;
    }else{
        return false;
} 
}
// $bol=emailCheck("luluLULU1@gmaill.com");
// echo $bol?"true":"false";

function passwordCheck($password){
//small,capital letter
//special chr
//digit num
    if(strlen($password)>=6){
        $bol=preg_match('/[a-z]/',$password);//^(?=.*[a-z])(?=.*[A-Z])+$
         return $bol;
    }else{
        return false;
}
}
// $bol=passwordCheck("lulu@gmail.com");
// echo $bol?"true":"false";

