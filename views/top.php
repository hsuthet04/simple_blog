

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple blog</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/custom.css">
</head>
<body>
<?php
    session_start();
    include_once "system/session.php";
    include_once "system/postgenerator.php";
    include_once "system/membership.php";
    include_once "views/nav.php";
?>