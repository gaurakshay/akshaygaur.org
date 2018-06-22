<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title> Akshay Gaur </title>
  <link rel="icon" type="image/x-icon" href="../img/favicon-48.ico">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- ===============================FONTS================================== -->
  <!-- <link href="https://fonts.googleapis.com/css?family=Inconsolata" rel="stylesheet"> -->
  <!-- <link href="https://fonts.googleapis.com/css?family=Noto+Sans&amp;subset=devanagari,latin-ext" rel="stylesheet"> -->
  <!-- ================================= CSS ================================= -->
  <link href="../css/base.css" rel="stylesheet">
  <link href="../css/style.css" rel="stylesheet">
  <link href="../css/prism-tn.css" rel="stylesheet">
  <link href="../css/prism-treeview-dark.css" rel="stylesheet">

</head>
<body>
  <!-- Header -->
  <?php 
    $header = file_get_contents('../header.html');
    echo str_replace("django/", "", $header);
  ?>
<!-- Main Body -->
<main class="container-fluid" id="content">
    <div class="row">
      <!-- Navigation Start -->
      <?php include './sidebar.html';?>
      <!-- Navigation End -->
      <!-- Content -->
      <div class="col-sm-9">
        <div class="container-fluid content" style="padding-top: 70px;">
