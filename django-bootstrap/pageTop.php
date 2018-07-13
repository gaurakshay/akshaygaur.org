<?php
// Require https
if ($_SERVER['HTTPS'] != "on") {
    $url = "https://". $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
    header("Location: $url");
    exit;
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> ??? </title>
    <link rel="icon" type="image/x-icon" href="../img/favicon-48.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- ===============================FONTS================================== -->
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans&amp;subset=devanagari,latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Rajdhani:400&amp;subset=devanagari&text=Akshay%20Gaur" rel="stylesheet">
    <!-- ================================= CSS ================================= -->
    <link href="../css/base.css" rel="stylesheet">
    <link href="../css/small.css" rel="stylesheet">
    <link href="../css/medium.css" rel="stylesheet">
    <link href="../css/large.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/monokai-sublime.css">
    <link rel="stylesheet" href="../css/treeview-dark.css">
    <!-- <link href="../css/prism-tn.css" rel="stylesheet">
    <link href="../css/prism-treeview-dark.css" rel="stylesheet"> -->
</head>
<body>
    <!-- Header Start-->
    <header class="header">
        <h3> header </h3>
        <!-- <a href="http://www.akshaygaur.org"><h1>Akshay Gaur</h1></a> -->
    </header>
    <!-- Header End-->
    <!-- Navigation Start -->
    <?php include_once('./sidebar.html')?>
    <!-- Navigation End -->