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
          <p>
            To start and application, fire up the terminal (make sure you are in the directory where manage.py resides) and type the
            following command:
          </p>
          <pre><code class="language-bash">(venv) $ python manage.py startapp students</code></pre>
          <p> If you look at the folder structure again, you will find that a new folder was added:
            <br>
            <pre><code class="language-treeview">tutorial//
|-- manage.py*
|-- students//
|   |-- admin.py
|   |-- apps.py
|   |-- __init__.py
|   |-- migrations//
|   |-- models.py
|   |-- tests.py
|   `-- views.py
`-- tutorial//
  |-- __init__.py
  |-- settings.py
  |-- urls.py
  `-- wsgi.py</code></pre> Don't worry about the migrations folder, we will get to it in just a minute.
            <br> RECAP: We created a project named tutorial. Ran a server to see that the project is serving the pages. Then,
            we created an application which is the logical equivalent of a subset of your web application with a specific
            function. In this case, we will use the students app to manage the students in our system.
            <br> Now, lets create a model for our app.
            <br>
            <br>
            <h4>What is a model?</h4>
            <br> A model is a representation of an entity that we will store in a database. So, for instance, if we created a
            model for a car, we would want to store how many doors it has, what is engine capacity, horsepower that it generates,
            maximum torque, its purchase price etc. You can most certainly imagine many more attributes for this entity that
            you would want to store. Creating a model allows us to save these details about the entity in the database.
            <br> For our application, we want to store students as entities. The details that will be required in an actual production
            environment would depend on the requirements. For us though, we will keep is simple. We will store the following
            attributes for the students:</p>
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
            We would also like to define an entity named course which would have the following attributes (keeping it simple, could have
            a lot of details apart from these details):
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
            Now, we need write the code to define these models so that our project understands what each entity can store and there is
            any relationship between the entities.
            <br> Open up the models.py model in students folder and define the department model:

          </p>
          <pre class="line-numbers"><code class="language-python">from django.db import models
        
        
class Department(models.Model):
    """
    This model will store the details about our department.
    Primary key for this model is department code.
    """
    class Meta:
      db_table = "departments"
      ordering = ['d_name']

    d_name = models.CharField(max_length=200)
    d_code = models.CharField(max_length=5, primary_key=True)
    d_chair = models.CharField(max_length=200)

    def __str__(self):
      """
      String representation of the department.
      This will be used mainly when we print
      a department object.
      """
        return self.d_name</code></pre>

          <p>
            Now we will try to understand what we did in defining the model for the department:
            <br>
            <strong>Line 1:</strong> Declared the model name, and that it will inherit from the standard django model as defined
            in models.Model.
            <br>
            <strong>Lines 2-5:</strong> Comments.
            <br>
            <strong>Lines 6-8:</strong> We defined some meta information about the model. Namely, "db_table" tells django to store
            the model in a table named "departments". If we didn't define this, the table name in our database would be some
            thing that would not be fun to read. Then, we also defined what is the default order of this model. Note that
            these commands will be translated to corresponding db commands (SQL commands).
            <br> Lines 10-12: We defined the actual attributes of this model. They will all be
            <a href="https://docs.djangoproject.com/en/2.0/ref/models/fields/#charfield">
              character fields </a> (a default type provided by django framework). We also defined the length of these fields.
            <br> &emsp; Also note that we defined a primary key for the model by passing a keyword argument "primary_key=True"
            in the d_code attribute.
            <br> Lines 14-20: We defined a string representation for the model whenever the system needs to represent an object
            model as a string for myriad reasons.
            <br>
            <br> So now that we have the model with us, how do we start saving it in the database?
            <br> For that, first we need to tell django where to start storing the data itself. I am assume here that the database
            that we will use in the following sections is already created. If you don't want to use postgres as your db of
            choice, that is fine as well.
            <br> First, let us go to our settings.py file in our 'tutorial' folder and find 'DATABASES' entry. It would look
            something like this:
            <br>
          </p>
          <pre class="line-numbers"><code class="language-python">DATABASES = {
          'default': {
            'ENGINE': 'django.db.backends.sqlite3',
            'NAME': os.path.join(BASE_DIR, 'db.sqlite3'),
          }
        }</code></pre>
          <p>
            What this means is that as default, django sets up a sqlite3 database in the base directory of the project and the name of
            the database is db.sqlite3. We are going to change it to postgres (or some other db, it is up to you).
          </p>
          <pre class="line-numbers"><code class="language-python">DATABASES = {
    'default': {
      'ENGINE': 'django.db.backends.postgresql',
      'NAME': 'tutorial_db',
      'USER': 'postgres',
      'PASSWORD': 'postgres',
      'HOST': 'localhost',
      'PORT': '5432',
    }
}</code></pre>
          <p> We are mostly done here. We just need to tell the project about this new 'students' application of ours. In the
            settings file that we are in, find 'INSTALLED_APPS" and add our application name to the existing list:
          </p>
          <pre class="line-numbers"><code class="language-python">INSTALLED_APPS = [
    'django.contrib.admin',
    'django.contrib.auth',
    'django.contrib.contenttypes',
    'django.contrib.sessions',
    'django.contrib.messages',
    'django.contrib.staticfiles',
    'students',  # Add your app name here.
]</code></pre>
          <p>
            Now we will ask manage.py to prepare the db queries that it needs to make in order to create the required tables in the db
            that we provided it the path to in "DATABASES" settings.
            <br> To do that, we run the following:
          </p>
          <pre><code class="language-bash">(venv) $ python manage.py makemigrations students</code></pre>
          <p>
            This will create all the necessary db queries to setup our db. Now we will execute those queries using:
          </p>
          <pre><code class="language-bash">(venv) $ python manage.py migrate</code></pre>
          <p>
            You should see messages where it applies all the migrations in the db successfully.
            <br>
        </div>
      </div>
      <div class="col-sm-1"></div>
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
          $('a[href="\\.\\/django-2.php"]').attr("class", "nav-link active");
      })
  </script>
</body>

</html>