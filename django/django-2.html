<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title> Akshay Gaur </title>
        <link rel="icon" href="../icon.png" type="image/png" />
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
                    <a href="http://www.akshaygaur.org"><h1>Akshay's Blog (under construction)</h1></a>
                </div>
                <div class="navbar">
                    Django Tutorial<br>
                    &emsp;&gt;<a href="django-1.php"> Setup </a><br>
                    &emsp;&gt;<a href="django-2.php"> App and Models </a><br>
                    &emsp;&gt;<a href="django-3.php"> Admin Module </a><br>
                    &emsp;&gt;<a href="django-4.php"> Media Root </a><br>
                    &emsp;&gt;<a href="django-5.php"> Template View </a><br>
                    &emsp;&gt;<a href="django-6.php"> List View </a><br>
                    &emsp;&gt;<a href="django-7.php"> Details View - 1 </a><br>
                    &emsp;&gt;<a href="django-8.php"> Details View - 2 </a><br>
                </div>
                <div class="content">
                    <p>
                    To start and application, fire up the terminal (make sure
                    you are in the directory where manage.py resides) and type the following
                    command:</p>
                    <p class="terminal">
                    $ python manage.py startapp students
                    </p>
                    <p> If you look at the folder structure again, you will find that a new
                    folder was added:<br>

                    &emsp;&emsp; manage.py<br>
                    &emsp;&emsp; tutorial/<br>
                    &emsp;&emsp; &emsp;&emsp; __init__.py<br>
                    &emsp;&emsp; &emsp;&emsp; settings.py<br>
                    &emsp;&emsp; &emsp;&emsp; urls.py<br>
                    &emsp;&emsp; &emsp;&emsp; wsgi.py<br>
                    &emsp;&emsp; students/<br>
                    &emsp;&emsp; &emsp;&emsp; admin.py<br>
                    &emsp;&emsp; &emsp;&emsp; apps.py<br>
                    &emsp;&emsp; &emsp;&emsp; __init__.py<br>
                    &emsp;&emsp; &emsp;&emsp; migrations/<br>
                    &emsp;&emsp; &emsp;&emsp; models.py<br>
                    &emsp;&emsp; &emsp;&emsp; tests.py<br>
                    &emsp;&emsp; &emsp;&emsp; views.py<br>

                    Don't worry about the migrations folder, we will get to it in just a minute.
                    <br>
                    RECAP: We created a project named tutorial. Ran a server to see that the
                    project is serving the pages. Then, we created an application which is the
                    logical equivalent of a subset of your web application with a specific 
                    function. In this case, we will use the students app to manage the students
                    in our system. <br>

                    Now, lets create a model for our app.<br>
                    <b>What is a model?</b><br>
                    A model is a representation of an entity that we will store in a database.
                    So, for instance, if we created a model for a car, we would want to store
                    how many doors it has, what is engine capacity, horsepower that it generates,
                    maximum torque, its purchase price etc. You can most certainly imagine 
                    many more attributes for this entity that you would want to store.
                    Creating a model allows us to save these details about the entity in the
                    database.<br>
                    For our application, we want to store students as entities. The details
                    that will be required in an actual production environment would depend
                    on the requirements. For us though, we will keep is simple. We will store
                    the following attributes for the students:</p>
                    <ul>
                        <li> First Name. (Example: John)</li>
                        <li> Last Name (Example: Doe)</li>
                        <li> ID (Example: #1)</li>
                        <li> Picture (If the student has a pic)</li>
                        <li> Address </li>
                        <li> Phone Number </li>
                        <li> Enrolled Courses (The courses the student has registered for)</li>
                    </ul>

                    <p>
                    We would also like to define an entity named course which would have the
                    following attributes (keeping it simple, could have a lot of details
                    apart from these details):
                    </p>
                    <ul>
                        <li> Department </li>
                        <li> Code </li>
                        <li> Name </li>
                        <li> Seats </li>
                        <li> Description </li>
                    </ul>

                    <p>Finally, we would like to store our departments as a separate entity:</p>
                    <ul>
                        <li> Code </li>
                        <li> Name </li>
                        <li> Chair </li>
                    </ul>

                    <p>
                    Now, we need write the code to define these models so that our project
                    understands what each entity can store and there is any relationship
                    between the entities. <br>

                    Open up the models.py model in students folder and define the department
                    model:

                    </p>
                    <p class="terminal">
                    1&emsp;&emsp;class Department(models.Model):<br>
                    2    &emsp;&emsp;&emsp;&emsp;"""<br>
                    3    &emsp;&emsp;&emsp;&emsp;This model will store the details about our department.<br>
                    4    &emsp;&emsp;&emsp;&emsp;Primary key for this model is department code.<br>
                    5    &emsp;&emsp;&emsp;&emsp;"""<br>
                    6    &emsp;&emsp;&emsp;&emsp;class Meta:<br>
                    7    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;db_table = "departments"<br>
                    8    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;ordering = ['d_name']<br>
                    9    &emsp;&emsp;<br>
                    10    &emsp;&emsp;&emsp;&emsp;d_name = models.CharField(max_length=200)<br>
                    11    &emsp;&emsp;&emsp;&emsp;d_code = models.CharField(max_length=5, primary_key=True)<br>
                    12    &emsp;&emsp;&emsp;&emsp;d_chair = models.CharField(max_length=200)<br>
                    13    &emsp;&emsp;<br>
                    14    &emsp;&emsp;&emsp;&emsp;def __str__(self):<br>
                    15    &emsp;&emsp;&emsp;&emsp;"""<br>
                    16    &emsp;&emsp;&emsp;&emsp;String representation of the department.<br>
                    17    &emsp;&emsp;&emsp;&emsp;This will be used mainly when we print<br>
                    18    &emsp;&emsp;&emsp;&emsp;a department object.<br>
                    19    &emsp;&emsp;&emsp;&emsp;"""<br>
                    20    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;return self.d_name<br>
                    </p>

                    <p> 
                    Now we will try to understand what we did in defining the model for the
                    department:<br>
                    Line 1: Declared the model name, and that it will inherit from the standard
                    django model as defined in models.Model. <br>
                    Lines 2-5: Comments. <br>
                    Lines 6-8: We defined some meta information about the model. Namely,
                    "db_table" tells django to store the model in a table named "departments".
                    If we didn't define this, the table name in our database would be some
                    thing that would not be fun to read. Then, we also defined what is the
                    default order of this model. Note that these commands will be translated
                    to corresponding db commands (SQL commands). <br>
                    Lines 10-12: We defined the actual attributes of this model. They will all
                    be <a href="https://docs.djangoproject.com/en/2.0/ref/models/fields/#charfield">
                        character fields </a> (a default type provided by django framework). We also
                    defined the length of these fields.<br>
                    &emsp; Also note that we defined a primary key for the model by passing a
                    keyword argument "primary_key=True" in the d_code attribute.<br>
                    Lines 14-20: We defined a string representation for the model whenever the
                    system needs to represent an object model as a string for myriad reasons.<br><br>


                    So now that we have the model with us, how do we start saving it in the database?<br>
                    For that, first we need to tell django where to start storing the data itself. I am assume
                    here that the database that we will use in the following sections is already created.
                    If you don't want to use postgres as your db of choice, that is fine as well. <br>

                    First, let us go to our settings.py file in our 'tutorial' folder and find 'DATABASES'
                    entry. It would look something like this: <br>
                    </p>
                    <p class="terminal">
                    DATABASES = {<br>
                    &emsp;&emsp;'default': {<br>
                    &emsp;&emsp;&emsp;&emsp;'ENGINE': 'django.db.backends.sqlite3',<br>
                    &emsp;&emsp;&emsp;&emsp;'NAME': os.path.join(BASE_DIR, 'db.sqlite3'),<br>
                    &emsp;&emsp;}<br>
                    }<br>
                    </p>
                    <p>
                    What this means is that as default, django sets up a sqlite3 database
                    in the base directory of the project and the name of the database is
                    db.sqlite3. We are going to change it to postgres (or some other db,
                    it is up to you).
                    </p>

                    <p class="terminal">
                    DATABASES = {<br>
                    &emsp;&emsp;'default': {<br>
                    &emsp;&emsp;&emsp;&emsp;'ENGINE': 'django.db.backends.postgreql',<br>
                    &emsp;&emsp;&emsp;&emsp;'NAME': 'tutorial_db',<br>
                    &emsp;&emsp;&emsp;&emsp;'USER': '&lt;username&gt;', <br>
                    &emsp;&emsp;&emsp;&emsp;'PASSWORD': '&lt;password&gt;',<br>
                    &emsp;&emsp;&emsp;&emsp;'HOST': 'localhost', <br>
                    &emsp;&emsp;&emsp;&emsp;'PORT': '5432', <br>
                    &emsp;&emsp;}<br>
                    }<br>
                    </p>
                    <p> We are mostly done here. We just need to tell the project about this
                    new 'students' application of ours. In the settings file that we are in,
                    find 'INSTALLED_APPS" and add our application name to the existing list:
                    </p>


                    <p class="terminal">
                    INSTALLED_APPS = [<br>
                    &emsp;&emsp;'django.contrib.admin',<br>
                    &emsp;&emsp;'django.contrib.auth',<br>
                    &emsp;&emsp;'django.contrib.contenttypes',<br>
                    &emsp;&emsp;'django.contrib.sessions',<br>
                    &emsp;&emsp;'django.contrib.messages',<br>
                    &emsp;&emsp;'django.contrib.staticfiles',<br>
                    &emsp;&emsp;'students', &lt;----- add your app name here.<br>
                    ]
                    </p>

                    <p>
                    Now we will ask manage.py to prepare the db queries that it needs
                    to make in order to create the required tables in the db that
                    we provided it the path to in "DATABASES" settings.<br>
                    To do that, we run the following:
                    </p>
                    <p class="terminal">
                    $ python manage.py makemigrations students
                    </p>
                    <p>
                    This will create all the necessary db queries to setup our db.
                    Now we will execute those queries using:
                    </p>
                    <p class='terminal'>
                    $ python manage.py migrate
                    </p>
                    <p>
                    You should see messages where it applies all the migrations in
                    the db successfully.<br>

                </div>
                <div class="footer">
                    <h4>Contact me at gaur{dot}akshay{at}gmail{dot}com if you found this
                        helpful or if you have any suggestions to improve.</h4>
                </div>
        </div>
    </body>
</html>
