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
    <link href="../css/test.css" rel="stylesheet">
    <link href="../css/prism-tn.css" rel="stylesheet">
    <link href="../css/prism-treeview-dark.css" rel="stylesheet">
</head>
<body>
    <!-- Header Start-->
    <header class="header">
        <input type="checkbox" class="nav-toggle" id="nav-toggle"/>
        <label for="nav-toggle" class="nav-ham">
            <svg fill="white" viewBox="0 0 448 512"><path d="M442 114H6a6 6 0 0 1-6-6V84a6 6 0 0 1 6-6h436a6 6 0 0 1 6 6v24a6 6 0 0 1-6 6zm0 160H6a6 6 0 0 1-6-6v-24a6 6 0 0 1 6-6h436a6 6 0 0 1 6 6v24a6 6 0 0 1-6 6zm0 160H6a6 6 0 0 1-6-6v-24a6 6 0 0 1 6-6h436a6 6 0 0 1 6 6v24a6 6 0 0 1-6 6z"></path></svg>
        </label>
        <a href="http://www.akshaygaur.org"><h1>Akshay Gaur</h1></a>
    <!-- Header End-->
        <!-- Navigation Start -->
        <?php include_once('./sidebar.html')?>
        <!-- Navigation End -->
    </header>