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
            Now, we will create our other models along with department model. So, go back to our students/models.py file and add the
            following model classes:

          </p>
          <pre class="line-numbers"><code class="language-python">class Course(models.Model):
            """
            This model will store the details about courses
            present in the sytem.
            Primary key for this model is a combination of
            course code and department code (compound key)
            """
            class Meta:
                db_table = 'courses'
                # Compound key is defined by the keyword 'unique_together'
                unique_together = (('department', 'c_code'), )
        
            department = models.ForeignKey(Department, on_delete=models.CASCADE, verbose_name="Department Name")
            c_code = models.IntegerField(verbose_name="Course Code")
            c_name = models.CharField(max_length=200, verbose_name="Course Name")
            c_seats = models.IntegerField(verbose_name="Number of Seats")
            c_desc = models.TextField(blank=True, verbose_name="Course Description")
        
            def __str__(self):
                """
                String representation of the object.
                """
                return self.c_name
        
        
        class Student(models.Model):
            """
            This model will store students' details.
            Primary key will be the students' id.
            """
        
            class Meta:
                db_table = 'students'
                ordering = ['s_id']
        
            s_id = models.IntegerField(primary_key=True, verbose_name="Student ID")
            s_first_name = models.CharField(max_length=200, verbose_name="First Name")
            s_last_name = models.CharField(max_length=200, verbose_name="Last Name")
            s_pic = models.ImageField(upload_to='student_pics', blank=True, verbose_name="Student's pic")
            course = models.ManyToManyField(Course, blank=True, verbose_name="Courses")
        
            def __str__(self):
                """
                String representation of the student object.
                """
                return "{0} {1}".format(self.s_first_name, self.s_last_name)</code></pre>
          <p>
            There are a few thing to unpack here. Lets go through them one by one:
            <br>
            <strong>Line 11:</strong> When our primary key is a combination of more than one attributes, we define a compound key.
            To do so in django, we define it in the Meta class with the keyword "unique_together".
            <br>
            <strong>Line 13:</strong> A foreign key dependency is defined as models.ForeignKey with argument having the model that
            the foreign key requires.
            <br>
            <strong>Line 38:</strong> This is an implementation of FileField where the image is uploaded to the "student_pics" folders.
            Django requires installation of Pillow to work with images. So if not installed already, now would be a good
            time to do soi ($ pip install pillow).
            <br>
            <strong>Line 39:</strong> A many-to-many relationship is defined like this in Django.
            <br> We also need to define where "student_pics" folder will reside. This is defined with the help of MEDIA_URL and
            MEDIA_ROOT concepts. With the help of these two variables, you can define where to store the media in the project
            structure and also, how to form the urls in order to serve the media content.
            <br> To define this, go to the end of your settings.py file and add the following:
          </p>
          <pre><code class="language-python">MEDIA_URL = '/assets/'
        MEDIA_ROOT = os.path.join(BASE_DIR, '&lt;any&gt;', '&lt;path&gt;', '&lt;you&gt;', '&lt;want&gt;')</code></pre>
          <p>
            BASE_DIR will be defined in the beginning of your settings.py file and corresponds to:
            <br>
            <pre><code class="language-treeview">tutorial/  &lt;----------------- This is the BASE_DIR.
        |-- manage.py*
        |-- students/
        |   |-- admin.py
        |   |-- apps.py
        |   |-- __init__.py
        |   |-- migrations//
        |   |-- models.py
        |   |-- tests.py
        |   `-- views.py
        `-- tutorial/
            |-- __init__.py
            |-- settings.py
            |-- urls.py
            `-- wsgi.py</code></pre> I will set it as :
            <br>
            <pre><code class="language-python">MEDIA_ROOT = os.path.join(BASE_DIR, 'assets', 'media')</code></pre> This way, I can store all my assets such as images, javascript files, css files(will deal with js and css later)
            in one place. Now, at this point, the folders will not be created but when they are (we don't need to worry about
            creating folders, Django will take make them when required), the folder structure will look like:
            <br>
            <pre><code class="language-treeview">tutorial//
        |-- assets//
        |   `-- media//
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
            `-- wsgi.py</code></pre> At this point, because we added two new models, we need to prepare our migrations and execute them:
          </p>
          <pre><code class="language-bash">(venv) $ python manage.py makemigrations students
        (venv) $ python manage.py migrage</code></pre>
          <p>
            We also need to register our models so that we can see them in the admin interface, so we will add them in our students/admin.py
            file:
          </p>
          <pre><code class="language-python">from django.contrib import adminfrom django.contrib import admin
        from students.models import Department, Course, Student  # Import our models.
        
        # Register them.
        admin.site.register(Department)
        admin.site.register(Course)
        admin.site.register(Student)</code></pre>
          <p> Your admin site should now look like this:
            <br>
            <img src="../img/django-10-admin-with-course-stud.png" width="500" alt="Admin site with Department, Course and Student objects listed.">
            <br> I went ahead and added an entry each for course and student:
            <br>
            <img src="../img/django-11-course-entry.png" width="500" alt="Sample course entry.">
            <br>
            <img src="../img/django-12-student-entry.png" width="500" alt="Sample student entry.">
            <br> So now that we have saved our student with its pic, where is it? If you remember, we defined the MEDIA_URL as
            tutorial/assets/media/. Now, when we defined our model, we set the "upload_to" parameter in our students' picture
            attribute as 'student_pics'. So, our pics will be uploaded to 'tutorial/assets/media/student_pics'. Please take
            a moment and check if the picture was uploaded to the correct folder.
            <br> My folder structure looks like this after creating a student with a pic:
            <pre><code class="language-treeview">tutorial//
        |-- assets//
        |   `-- media//
        |       `-- student_pics//
        |           `-- akshay.jpg
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
            `-- wsgi.py</code></pre>
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
          $('a[href="\\.\\/django-4.php"]').attr("class", "nav-link active");
      })
  </script>
</body>

</html>