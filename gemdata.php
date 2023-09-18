<?php
require_once "system/postgenerator.php";

$data=file_get_contents("assets/gemdata.json");
$posts=$json=json_decode($data,true);
$types=[1,2];
$i=0;
$writers=["cake","choco","sushi","mochi"];
$imglinks=["clown.jpg","download(7).jpg","download(11).jpg","download(4).jpg"];
$subjects=[1,2,3,4];

foreach($posts as $post){
    $i++;
    $title=$post["title"];
    $content=$post["content"];
    $type=$types[$i%2];
    $writer=$writers[$i%4];
    $imglink=$imglinks[$i%4];
    $subject=$subjects[$i%4];
    insertPost($title, $type, $writer, $content, $imglink,$subject);
}