<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title> Akshay Gaur </title>
        <link rel="icon" href="icon.png" type="image/png" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- ===============================FONTS================================== -->
        <link href="https://fonts.googleapis.com/css?family=Inconsolata" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

        <!-- ================================= STYLES ================================= -->
        <link href="../css/style.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <!-- Testing.
                <?php echo ("THIS IS PHP BABY"); ?> -->
                <div class="header">
                    <h1>Akshay's Blog</h1>
                </div>
                <div class="navbar">
                    <!-- ><h4>Django</h4> -->
                    Django Tutorial<br>
                    &emsp;<a href="django-1.php"> Setup </a><br>
                    &emsp;<a href="django-2.php"> App and Models </a><br>
                    &emsp;<a href="django-3.php"> Admin Module </a><br>
                    &emsp;<a href="django-4.php"> Media Root </a><br>
                </div>
                <div class="content">
                    <h2> What is Django? </h2>
                    <p>
                    Django is a web framework that is built in Python and allows Rapid Application Development
                    (RAD). A lot of the heavyweight stuff that a developer would have to handle if the website
                    were being developed from scratch is taken care of by Django. This lets the developer focus
                    on application building instead of worrying about other stuff such as making the website
                    secure. You can find more details at <a href="https://www.djangoproject.com/"> the official
                        website </a>.
                    </p>
                    <h2> Getting started. </h2>
                    It is recommended that virtual environment be used for the following tutorial for a lot of
                    reasons but is not compulsory and can be ignored.
                    <h3> Setting everything up. </h3>
                    <b><i> Requirements (that I used for this tutorial): </i></b>
                    <ol type='i'>
                        <li> linux terminal (I am using ubuntu with Gnome terminal) </li>
                        <li> virtualenv </li>
                        <li> postgres </li>
                        <li> django </li>
                    </ol>

                    <!--
                        <p>
                        Assuming that everything is installed (please install them if not already
                        installed), start the virtual environment with a command such as this:
                        </p>
                    -->

                    <p class="terminal">
                    $ virtualenv --python=python3 venv
                    </p>

                    <p>
                    This will create a directory named venv in the present directory. All the
                    necessary files required for the virtual environment will be listed in that
                    directory. Also, we made sure that we use python 3.5+.

                    Now, to start/activate the virtual environment, all you need to do is:
                    </p>

                    <p class="terminal">
                    $ source ./venv/bin/activate
                    </p>

                    <p>

                    You should see a modified control prompt which would look like this:
                    </p>

                    <p class="terminal">
                    (venv) $ 
                    </p>

                    <p>
                    This confirms that our virtual environment is good and ready to go.
                    Now, we can start installing the stuff that we need for our django project.
                    <br>
                    First, we install django:
                    </p>
                    <p class="terminal">
                    (venv) $ pip install django
                    </p>

                    <p>
                    This will install django for us. To test that, we can run django-admin
                    --version. The result should be 2.0.6.
                    </p>

                    <p class="terminal">
                    (venv) $ django-admin --version
                    <br>
                    2.0.6
                    </p>

                    <p>
                    Now we are getting to the good stuff...
                    <br>
                    First, let us create a new project using django-admin command:
                    </p>
                    <p class="terminal">
                    $ django-admin startproject tutorial
                    </p>

                    <p>
                    This will create a folder structure that is something like this:<br>
                    tutorial/<br>
                    &emsp;&emsp; manage.py<br>
                    &emsp;&emsp; tutorial/<br>
                    &emsp;&emsp; &emsp;&emsp; __init__.py<br>
                    &emsp;&emsp; &emsp;&emsp; settings.py<br>
                    &emsp;&emsp; &emsp;&emsp; urls.py<br>
                    &emsp;&emsp; &emsp;&emsp; wsgi.py<br>
                    </p>

                    <p>
                    At this point, the project is barebones. If you want to see how this
                    barebones project looks like in the browser, you can run the following
                    command at the terminal:
                    </p>
                    <p class="terminal">
                    $ django-admin manage.py runserver<br>
                    Performing system checks...<br>
                    <br>
                    System check identified no issues (0 silenced).<br>
                    <br>
                    You have 14 unapplied migration(s). Your project may not work properly 
                    until you apply the migrations for app(s): admin, auth, 
                    contenttypes, sessions.<br>
                    Run 'python manage.py migrate' to apply them.<br>
                    <br>
                    June 04, 2018 - 18:12:08<br>
                    Django version 2.0.6, using settings 'tutorial.settings'<br>
                    Starting development server at http://127.0.0.1:8000/<br>
                    Quit the server with CONTROL-C.<br>

                    </p> 

                    <p> Don't worry about the warning about unapplied migrations. 
                    We will deal with them later. For now open up a browser (Firefox or Chrome
                    is preferred) and go to the address as listed in the output from our command
                    earlier: http://127.0.0.1:8000/. You should see a default welcome page:<br>
                    <img src="../assets/django-1-initial.png" width="1000" alt="Default welcome screen"><br>

                    <p> Now that we have got our basic project up and running, we can start with
                    an application. 
                    </p>
                </div>
                <div class="footer">
                    <h4>Contact me at gaur{dot}akshay{at}gmail{dot}com if you found this
                        helpful or if you have any suggestions to improve.</h4>
                </div>
        </div>
    </body>
</html>
