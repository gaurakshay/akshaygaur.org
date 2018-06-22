<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <link rel="icon" type="image/x-icon" href="./img/favicon-48.ico">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Testing bootstrap customization with sass">
  <meta name="author" content="Akshay Gaur">

  <title>Akshay Gaur</title>

  <!-- Custom Bootstrap -->
  <link href="./css/base.css" rel="stylesheet">
  <link href="./css/style.css" rel="stylesheet">
</head>

<body style="padding-top: 100px;">
  <!-- Header -->
  <?php include('./header.html'); ?>
  <main class="container-fluid" style="padding-left: 5em;">
    <div class="row">
      <div class="col-sm-3">
        <div class="card" style="width: 18rem;">
          <img class="card-img-top" src="./img/django-logo-negative.png" alt="Django logo">
          <div class="card-body">
            <h5 class="card-title">Django Tutorial</h5>
            <p class="card-text">Learn Django using Class Based Views (CBV)!.</p>
            <a href="./django/django-1.php" class="btn btn-primary">Start</a>
          </div>
        </div>
      </div>
    </div>
  </main>
  <!-- Footer -->
  <?php include('./footer.html'); ?>
  <script src="./js/jquery-3.3.1.min.js"></script>
  <script src="./js/popper.min.js"></script>
  <script src="./js/bootstrap.min.js"></script>
</body>

</html>