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
    <link href="./css/styles.css" rel="stylesheet">
</head>
<body>
    <!-- Header Start-->
    <?php include './header.html';?>
    <!-- Header End -->
    <main class="no-sidebar">
        <a href="./django-cbv/" class="card">
            <div class="card-simple">
                <div class="caption"> <h2>Django Class Based View Tutorial</h2> </div>
            </div>
        </a>
        <a href="./django-bootstrap/" class="card">
            <div class="card-simple">
                <div class="caption"> <h2>Bootstrapping with Django</h2> </div>
            </div>
        </a>
    </main>
    <!-- Footer -->
    <?php include './footer.html';?>
    <script src="./js/livereload.js"></script>
</body>
</html>