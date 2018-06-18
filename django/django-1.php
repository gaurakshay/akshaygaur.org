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

  <!-- mid section -->
  <main class="container-fluid" id="content">
    <div class="row">
      <!-- Navigation -->
      <?php include('./sidebar.html');?>
      <!-- content -->
      <div class="col-sm-9">
        <div class="container-fluid">
          <h2> What is Django? </h2>
          <p>
            Django is a web framework that is built in Python and allows Rapid Application Development (RAD). A lot of the heavyweight
            stuff that a developer would have to handle if the website were being developed from scratch is taken care of
            by Django. This lets the developer focus on application building instead of worrying about other stuff such as
            making the website secure. You can find more details at
            <a href="https://www.djangoproject.com/"> the official website </a>.
          </p>
          <h2> Getting started. </h2>
          It is recommended that virtual environment be used for the following tutorial for a lot of reasons but is not compulsory
          and can be ignored.
          <h3> Setting it up. </h3>

          <pre><code class="language-bash">$ virtualenv --python=python3 venv</code></pre>

          <p>
            This will create a directory named venv in the present directory. All the necessary files required for the virtual environment
            will be listed in that directory. Also, we made sure that we use python 3.5+. Now, to start/activate the virtual
            environment, all you need to do is:
          </p>

          <pre><code class="language-bash">$ source ./venv/bin/activate</code></pre>

          <p>
            You should see a modified control prompt which would look like this:
          </p>

          <pre><code class="language-bash">(venv)$</code></pre>

          <p>
            This confirms that our virtual environment is good and ready to go. Now, we can start installing the stuff that we need for
            our django project.
            <br> First, we install django:
          </p>
          <pre><code class="language-bash">(venv)$ pip install django</code></pre>
          <p>
            This will install django for us. To test that, we can run django-admin --version. The result should be 2.0.6.
          </p>

          <pre><code class="language-bash">(venv)$ django-admin --version
     2.0.6</code></pre>
          <p>
            Now we are getting to the good stuff...
            <br> First, let us create a new project using django-admin command:
          </p>
          <pre><code class="language-bash">$ django-admin startproject tutorial</code></pre>
          <p>
            This will create a folder structure that is something like this:
            <br>
          </p>
          <pre><code class="language-treeview">tutorial//
     |-- manage.py*
     `-- tutorial//
       |-- __init__.py
       |-- settings.py
       |-- urls.py
       `-- wsgi.py</code></pre>

          <p>
            At this point, the project is barebones. If you want to see how this barebones project looks like in the browser, you can
            run the following command at the terminal:
          </p>
          <pre><code class="language-bash">$ django-admin manage.py runserver<br>
     Performing system checks...
     
     System check identified no issues (0 silenced).
     
     You have 14 unapplied migration(s). Your project may not work properly 
     until you apply the migrations for app(s): admin, auth, 
     contenttypes, sessions.
     Run 'python manage.py migrate' to apply them.
     
     June 04, 2018 - 18:12:08
     Django version 2.0.6, using settings 'tutorial.settings'
     Starting development server at http://127.0.0.1:8000/
     Quit the server with CONTROL-C.</code></pre>

          <p> Don't worry about the warning about unapplied migrations. We will deal with them later. For now open up a browser
            (Firefox or Chrome is preferred) and go to the address as listed in the output from our command earlier: http://127.0.0.1:8000/.
            You should see a default welcome page:
            <br>
            <img src="../img/django-1-initial.png" width="1000" alt="Default welcome screen">
            <br>

            <p> Now that we have got our basic project up and running, we can start with an application.
            </p>
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
  <script src="../js/bootstrap.min.js"></script>
  <script>
      $(document).ready(function () {
          $('a[href="\\.\\/django-1.php"]').attr("class", "nav-link active");
      })
  </script>
</body>

</html>