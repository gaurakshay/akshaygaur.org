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
    <title> Akshay Gaur </title>
    <link rel="icon" type="image/x-icon" href="./img/favicon-48.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- ===============================FONTS================================== -->
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans&amp;subset=devanagari,latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Rajdhani:400&amp;subset=devanagari&text=Akshay%20Gaur" rel="stylesheet">
    <!-- ================================= CSS ================================= -->
    <link href="./css/test.css" rel="stylesheet">
    
    <!-- <script src="./js/live.js"></script> -->
</head>
<body>
    <!-- Header Start-->
    <?php include './header.html';?>
    <!-- Header End -->
    <main class="no-sidebar">
        <a href="./django/">
            <div class="card-simple">
                <div class="thumb"></div>
                <!-- <img src="../img/django-logo-negative.png" alt="Django logo"> -->
                <div class="caption"> Django CBV README </div>
            </div>
        </a>
    </main>
    <!-- Footer -->
    <?php include './footer.html';?>
</body>
</html>