<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title> Akshay Gaur </title>
  <link rel="icon" href="icon.png" type="image/png" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- ===============================FONTS================================== -->
  <link href="https://fonts.googleapis.com/css?family=Inconsolata" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Noto+Sans&amp;subset=devanagari,latin-ext" rel="stylesheet">
  <!-- ================================= CSS ================================= -->
  <link href="../css/style.css" rel="stylesheet">
  <link href="../css/header-footer.css" rel="stylesheet">
  <link href="../css/prism-tn.css" rel="stylesheet">
  <link href="../css/prism-treeview.css" rel="stylesheet">

</head>
<body>
  <!-- Header -->
  <?php include('../header.html');?>
<!-- Main Body -->
<main class="container-fluid" id="content">
    <div class="row">
      <!-- Navigation -->
      <?php include('./sidebar.html');?>
      <!-- Content -->
      <div class="col-sm-9">
        <div class="container-fluid">
            Now that we have seen various views, lets take a break and talk about templates for a bit.
            <br>
            <br>
            <a class="plain" href="https://docs.djangoproject.com/en/2.0/topics/templates/">
              <h3> Templates </h3>
            </a>
        </div>
      </div>
      <div class="col-sm-1">

      </div>
    </div>
  </main>
  <!-- footer -->
  <?php include('../footer.html');?>
  <!-- ===============================JS ================================ -->
  <script src="../js/prism-tn.js"></script>
  <script src="../js/prism-treeview.js"></script>
  <script src="../js/jquery-3.3.1.min.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../dist/js/bootstrap.min.js"></script>
  <script>
      $(document).ready(function () {
          $('a[href="\\.\\/django-1.php"]').attr("class", "nav-link");
          $('a[href="\\.\\/django-10.php"]').attr("class", "nav-link active");
      })
  </script>
</body>

</html>