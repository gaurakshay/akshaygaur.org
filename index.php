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
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <!-- Testing.
                <?php echo ("THIS IS PHP BABY"); ?> -->
                <div class="header">
                    <h1>Akshay's Blog</h1>
                </div>
                <div class="navbar">
                    <h2>NAVBAR</h2>
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
                    <img src="assets/django-1-initial.png" width="1000" alt="Default welcome screen"><br>

                    <p> Now that we have got our basic project up and running, we can start with
                    an application. To start and application, fire up the terminal (make sure
                    you are in the directory where manage.py resides) and type the following
                    command:</p>
                    <p class="terminal">
                    $ python manage.py startapp students
                    </p>
                    <p> If you look at the folder structure again, you will find that a new
                    folder was added:

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
                    As a sanity check, we want to see the model on our website. For
                    that, there is a very handy "admin" site that is provided by the
                    framework. To view the admin site, the url that you want to
                    go to is "127.0.0.1:8000/admin" (you should have your server
                    running in the background as discussed earlier). You will see
                    a login screen:<br>
                    <img src="assets/django-2-admin-login.png" width="1000" alt="Admin Login Screen"><br>
                    At this point, since we don't have an admin account setup in the
                    project, we will create one. To do that, just type the following
                    in the terminal:
                    </p>
                    <p class="terminal">
                    $ python manage.py createsuperuser --username akshay --email 
                    gaur.akshay@gmail.com&emsp;(Make sure you run this where
                    you have the manage.py file).
                    </p>
                    <p> You will be asked to provide the password for this admin account
                    which will create the admin account.<br>
                    Once you are done making the account, use the username and password
                    to login to the admin interface we visited earlier.<br>

                    <img src="assets/django-3-admin-cred.png" width="300" alt="Entering Credentials"><br>
                    <img src="assets/django-4-admin-screen.png" width="1000" alt="Admin Screen"><br>
                    Here you can see what things you can do. We can see that we can add
                    groups and users in this interface. BUT WAIT!!! Where is our model
                    that we added earlier? Where are my departments???<br>
                    To be able to see our models in this interface, we need to register
                    them in the project.<br>
                    To add our "Department" model so that we can access it in the admin
                    model, we need to go to students/admin.py class and register it there.
                    </p>
                    <p class="terminal">
                    from django.contrib import admin<br>
                    <br>
                    # Add this:<br>
                    from students.models import Department<br>
                    admin.site.register(Department)<br>
                    </p>
                    <p> And that's it! Now, if you go back to the admin screen, you should
                    see you model!<br>
                    <img src="assets/django-5-admin-departments.png" width="400" alt="Admin Screen with Departments"><br>
                    If you click on the add link, you will be taken to "Add Department"
                    screen:<br>
                    <img src="assets/django-6-add-dept.png" width="400" alt="Admin Screen with Departments"><br>
                    Here, you can see that django automatically guesses the field names
                    from the model entries that we made earlier (d_name, d_code, d_chair).
                    Since they don't look very good, we will change them. Just add the
                    keyword "verbose_name" followed by the name that you would like to be
                    displayed on the admin site like so:
                    </p>
                    <p class="terminal">
                    d_name = models.CharField(max_length=200, verbose_name="Department Name")<br>
                    d_code = models.CharField(max_length=5, primary_key=True, verbose_name="Department Code")<br>
                    d_chair = models.CharField(max_length=200, verbose_name="Department Chair")<br>
                    </p>
                    <p>
                    After saving these changes, let us refresh the page that we were on before:<br>
                    <img src="assets/django-7-dept-name.png" width="400" alt="Fixed Department Names"><br>
                    Let us add a department as a model. Enter name, code and chair as you see fit.
                    I added them and then clicked on the save button provided.<br>
                    **NOTE** In the screenshot, the department is listed as "Department object (CS)" which is wrong. It should have said "Computer Science"
                    instead. This is because I was incorrectly using __unicode__ to return the string representation of the object which was the case
                    with python 2. Going forward with python 3, the only method that needs to be written for the string representation of the object is
                    __str__. <a href="https://docs.djangoproject.com/en/1.10/topics/python3/#str-and-unicode-methods">  Details here. </a><br>
                    <img src="assets/django-8-dept-obj.png" width="400" alt="Successful department entry"><br>
                    If you click on the department object you can see its details. You can aldo
                    edit the object's details if you want to.<br>
                    <img src="assets/django-9-dept-details.png" width="400" alt="Department's details."><br>

                    Now, we will create our other models along with department model. So, go back to
                    our students/models.py file and add the following model classes:

                    <p>
                    <p class="terminal">
                    1        &emsp;&emsp;class Course(models.Model):<br>
                    2        &emsp;&emsp;&emsp;&emsp;"""<br>
                    3        &emsp;&emsp;&emsp;&emsp;This model will store the details about coursespresent in the system.<br>
                    4        &emsp;&emsp;&emsp;&emsp;Primary key for this model is a combination of course code and department code (compound key)<br>
                    5        &emsp;&emsp;&emsp;&emsp;"""<br>
                    6        &emsp;&emsp;&emsp;&emsp;class Meta:<br>
                    7        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;"""<br>
                    8        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Compound key is defined by the keyword unique_together.<br>
                    9        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;"""<br>
                    10        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;db_table = "courses"<br>
                    11        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;unique_together = (('department', 'c_code'), )<br>
                    12        <br>
                    13        &emsp;&emsp;&emsp;&emsp;department = models.ForeignKey(Department, on_delete=models.CASCADE, verbose_name="Department Code")<br>
                    14        &emsp;&emsp;&emsp;&emsp;c_code = models.IntegerField(verbose_name="Course Code")<br>
                    15        &emsp;&emsp;&emsp;&emsp;c_name = models.CharField(max_length=200, verbose_name="Course Name")<br>
                    16        &emsp;&emsp;&emsp;&emsp;c_seats = models.IntegerField(verbose_name="Number of Seats")<br>
                    17        &emsp;&emsp;&emsp;&emsp;c_desc = models.CharField(blank=True, verbose_name="Course Description")<br>
                    18        <br>
                    19        &emsp;&emsp;&emsp;&emsp;def __str__(self):<br>
                    20        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;"""<br>
                    21        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;String representation of the object.<br>
                    22        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;"""<br>
                    23        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;return self.d_name<br>
                    24        <br>
                    25        <br>
                    26        &emsp;&emsp;class Student(models.Model):<br>
                    27        &emsp;&emsp;&emsp;&emsp;"""<br>
                    28        &emsp;&emsp;&emsp;&emsp;This model will store students' details.<br>
                    29        &emsp;&emsp;&emsp;&emsp;Primary key will be students' id.<br>
                    30        &emsp;&emsp;&emsp;&emsp;"""<br>
                    31        &emsp;&emsp;&emsp;&emsp;class Meta:<br>
                    32        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;db_table = "students"<br>
                    33        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;ordering = ['s_id']<br>
                    34        &emsp;&emsp;<br>
                    35        &emsp;&emsp;&emsp;&emsp;s_id = models.IntegerField(primary_key=True, verbose_name="Student ID") <br>
                    36        &emsp;&emsp;&emsp;&emsp;s_first_name = models.CharField(max_length=200, verbose_name="First Name") <br>
                    37        &emsp;&emsp;&emsp;&emsp;s_last_name = models.CharField(max_length=200, verbose_name="Last Name") <br>
                    38        &emsp;&emsp;&emsp;&emsp;s_pic = models.ImageField(upload_to='student_pics', blank=True, verbose_name="Student's pic") <br>
                    39        &emsp;&emsp;&emsp;&emsp;course = models.ManyToManyField(Course, blank=True, verbose_name="Courses") <br>
                    40        <br>
                    41        &emsp;&emsp;&emsp;&emsp;def __str__(self):<br>
                    42        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;"""<br>
                    43        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;String representation of the student object.<br>
                    44        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;"""<br>
                    45        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;return "{0} {1}".format(self.s_first_name, self.s_last_name)<br>
                    </p>
                    <p>
                    There are a few thing to unpack here. Lets go through them one by one: <br>
                    Line 11: When our primary key is a combination of more than one attributes, we define a
                    compound key. To do so in django, we define it in the Meta class with the keyword
                    "unique_together".<br>
                    Line 13: A foreign key dependency is defined as models.ForeignKey
                    with argument having the model that the foreign key requires.<br>
                    Line 38: This is an implementation of FileField where the image is uploaded
                    to the "student_pics" folders. Django requires installation of Pillow to
                    work with images. So if not installed already, now would be a good time to
                    do soi ($ pip install pillow).<br>
                    Line 39: A many-to-many relationship is defined like this in Django.<br>

                    We also need to define where "student_pics" folder will reside. This is
                    defined with the help of MEDIA_URL and MEDIA_ROOT concepts. With the help
                    of these two variables, you can define where to store the media in the project
                    structure and also, how to form the urls in order to serve the media content.<br>
                    To define this, go to the end of your settings.py file and add the following:
                    </p>
                    <p class="terminal">
                    MEDIA_URL = '/assets/'<br>
                    MEDIA_ROOT = os.path.join(BASE_DIR, '&lt;any&gt;', '&lt;path&gt;', '&lt;you&gt;', '&lt;want&gt;')
                    </p>
                    <p>
                    BASE_DIR will be defined in the beginning of your settings.py file and corresponds to:<br>
                    &emsp;&emsp;tutorial/ &emsp;&emsp; &emsp;&emsp;&emsp;&emsp;&lt;---------- This is where BASE_DIR points to <br>
                    &emsp;&emsp;&emsp;&emsp; manage.py<br>
                    &emsp;&emsp;&emsp;&emsp; tutorial/<br>
                    &emsp;&emsp;&emsp;&emsp; &emsp;&emsp; __init__.py<br>
                    &emsp;&emsp;&emsp;&emsp; &emsp;&emsp; settings.py<br>
                    &emsp;&emsp;&emsp;&emsp; &emsp;&emsp; urls.py<br>
                    &emsp;&emsp;&emsp;&emsp; &emsp;&emsp; wsgi.py<br>
                    &emsp;&emsp;&emsp;&emsp; students/<br>
                    &emsp;&emsp;&emsp;&emsp; &emsp;&emsp; admin.py<br>
                    &emsp;&emsp;&emsp;&emsp; &emsp;&emsp; apps.py<br>
                    &emsp;&emsp;&emsp;&emsp; &emsp;&emsp; __init__.py<br>
                    &emsp;&emsp;&emsp;&emsp; &emsp;&emsp; migrations/<br>
                    &emsp;&emsp;&emsp;&emsp; &emsp;&emsp; models.py<br>
                    &emsp;&emsp;&emsp;&emsp; &emsp;&emsp; tests.py<br>
                    &emsp;&emsp;&emsp;&emsp; &emsp;&emsp; views.py<br>
                    I will set it as : <br>
                    MEDIA_ROOT = os.path.join(BASE_DIR, 'assets', 'media')<br>
                    This way, I can store all my assets such as images, javascript files, css files(will deal with
                    them later) in one place. My folder structure will now look like:<br>
                    &emsp;&emsp;tutorial/<br>
                    &emsp;&emsp;&emsp;&emsp; assets/<br>
                    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp; media/<br>
                    &emsp;&emsp;&emsp;&emsp; manage.py<br>
                    &emsp;&emsp;&emsp;&emsp; tutorial/<br>
                    &emsp;&emsp;&emsp;&emsp; &emsp;&emsp; __init__.py<br>
                    &emsp;&emsp;&emsp;&emsp; &emsp;&emsp; settings.py<br>
                    &emsp;&emsp;&emsp;&emsp; &emsp;&emsp; urls.py<br>
                    &emsp;&emsp;&emsp;&emsp; &emsp;&emsp; wsgi.py<br>
                    &emsp;&emsp;&emsp;&emsp; students/<br>
                    &emsp;&emsp;&emsp;&emsp; &emsp;&emsp; admin.py<br>
                    &emsp;&emsp;&emsp;&emsp; &emsp;&emsp; apps.py<br>
                    &emsp;&emsp;&emsp;&emsp; &emsp;&emsp; __init__.py<br>
                    &emsp;&emsp;&emsp;&emsp; &emsp;&emsp; migrations/<br>
                    &emsp;&emsp;&emsp;&emsp; &emsp;&emsp; models.py<br>
                    &emsp;&emsp;&emsp;&emsp; &emsp;&emsp; tests.py<br>
                    &emsp;&emsp;&emsp;&emsp; &emsp;&emsp; views.py<br>

                    <br>
                    At this point, because we added two new models, we need to prepare our migrations
                    and execute them:
                    </p>
                    <p class="terminal">
                    $ python manage.py makemigrations students<br>
                    $ python manage.py migrate
                    </p>

                    <p>
                    We also need to register our models so that we can see them in the admin
                    interface, so we will add them in our students/admin.py file:
                    </p>
                    <p class="terminal">
                    from django.contrib import admin<br>
                    <br>
                    # Add this:<br>
                    from students.models import Department, Course, Student<br>
                    admin.site.register(Department)<br>
                    admin.site.register(Course)<br>
                    admin.site.register(Student)<br>
                    </p>

                    <p> Your admin site should now look like this:<br>
                    <img src="assets/django-10-admin-with-course-stud.png" width="500" alt="Admin site with Department, Course and Student objects listed."><br>

                    I went ahead and added an entry each for course and student:<br>
                    <img src="assets/django-11-course-entry.png" width="500" alt="Sample course entry."><br>
                    <img src="assets/django-12-student-entry.png" width="500" alt="Sample student entry."><br>
                    So now that we have saved our student with its pic, where is it? If you
                    remember, we defined the MEDIA_URL as tutorial/assets/media/. Now, when
                    we defined our model, we set the "upload_to" parameter in our students'
                    picture attribute as 'student_pics'. So, our pics will be uploaded to
                    'tutorial/assets/media/student_pics'. Please take a moment and check
                    if the picture was uploaded to the correct folder.

                </div>
                <div class="footer">
                    <h4>Contact me at gaur{dot}akshay{at}gmail{dot}com if you found this
                        helpful or if you have any suggestions to improve.</h4>
                </div>
        </div>
    </body>
</html>
