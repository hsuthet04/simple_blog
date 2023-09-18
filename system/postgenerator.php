<?php
require_once "system/DB_Hacker.php";
function insertPost($title, $type, $writer, $content, $imglink,$subject) {
    $created_at = getTimenow();
    $db = dbconnect();
    // Fix the SQL query syntax
    $qry = "INSERT INTO post (title, type, subject ,writer, content, imglink,created_at)
            VALUES ('$title', $type,$subject, '$writer', '$content', '$imglink','$created_at')";
    $result = mysqli_query($db, $qry);
    // Check if the query was successful
    return $result;
}

function updatePost($title, $type, $writer, $content, $imglink,$id,$subject){
        $db=dbconnect();
        $qry="UPDATE post SET title='$title',type=$type,subject=$subject,writer='$writer',
        content='$content',imglink='$imglink' WHERE id=$id";
    $result=mysqli_query($db,$qry);
    if($result){
        header("Location:showallpost.php");
    }else{
        echo "<script>alert('Post Insert fail')</script>";
    }

}


function getAllPost($type,$start){
    $qry="";
    $db=dbconnect();
    if($type==1){
        
        $qry="SELECT * FROM post WHERE type=$type LIMIT $start,10";
    }else{
        $qry="SELECT * FROM post LIMIT $start,10";
    }
    $result=mysqli_query($db,$qry);
    return $result;
}

function getSinglePost($pid){
    $db=dbconnect();
    $qry="SELECT * FROM post WHERE id=$pid";
    $result=mysqli_query($db,$qry);
    return $result;
}

function getFilterPost($subject,$type){
    $db=dbconnect();
    $qry="SELECT * FROM post WHERE subject=$subject AND type=$type";
    $result=mysqli_query($db,$qry);
    return $result;
}

function getAllSubject(){
        $db=dbconnect();
        $qry="SELECT * FROM subject";
        $result=mysqli_query($db,$qry);
        return $result;

}

function getPostCount(){
    $db=dbconnect();
    $qry="SELECT * FROM post";
    $result=mysqli_query($db,$qry);
    return mysqli_num_rows($result);
    

}