<?php

define("DB_HOST","localhost");
define("DB_NAME","simple_blog");
define("DB_USER","root");
define("DB_PASS","");

function dbconnect(){
    $db=mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);

    if(mysqli_connect_errno()){
        echo"Database connection fail";
    }else{
        return $db;
    }
}

function insertUser($name,$email,$password){
    
    $password=encodePass($password);
    $curtime=getTimenow();

    $db=dbconnect();

    $qry="SELECT * FROM member WHERE email='$email'";
    $result=mysqli_query($db,$qry);
    
    if(mysqli_num_rows($result)>0){
        return "email is already in use";
    }else{
        $qry="INSERT INTO member (name,email,password,created_at,updated_at)
        VALUES
        ('$name','$email','$password','$curtime','$curtime')";

        $result=mysqli_query($db,$qry);
        if($result==1){
            return "register success";
        }else{
            return "register fail";
        }
    }
   
    
}

// echo insertUser("Pisi","pisi@gmail.com","246");

function userLogin($email,$password){
    $password=encodePass($password);
    $db=dbconnect();

    $qry="SELECT name FROM member WHERE email='$email' AND password='$password'";
    $result=mysqli_query($db,$qry);
    if($result){
        $username="";
    foreach($result as $str){
        $username=$str["name"];
    }
    setSession('username',$username);
    setSession("email",$email);
    return "login success";
    }else{
        return "login fail";
    }
    

}

function encodePass($pass){
    $pass=md5($pass);
    $pass=sha1($pass);
    $pass=crypt($pass,$pass);
    return $pass;

}

function getTimenow(){
    return date("Y-m-d H:m:s",time());

}