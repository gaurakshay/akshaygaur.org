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
                    <a href="http://www.akshaygaur.org/"><h1>Akshay's Blog (under construction)</h1></a>
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
                    So far, we have looked at a very basic details view with a few
                    text fields to display. But what if we wanted to show a little
                    media along with text?
                    <br>
                    For that, we will use our student model where we stored 
                    student's pic as a model attribute. To start, let us first make
                    a list view to show the list of students in our system. So
                    open up your views.py and add the following:
                    <br>
                    <p class="terminal">
                    # Add student import
                    from students.models import Department, Student

                    # Create student list view
                    class StudentListView(ListView):<br>
                    &emsp;&emsp;&emsp;&emsp;"""<br>
                    &emsp;&emsp;&emsp;&emsp;Return list of students in the system.<br>
                    &emsp;&emsp;&emsp;&emsp;"""<br>
                    &emsp;&emsp;&emsp;&emsp;template_name = 'stud-list.html'<br>
                    &emsp;&emsp;&emsp;&emsp;model = Student<br>
                    &emsp;&emsp;&emsp;&emsp;context_object_name = 'students'<br>
                    </p>
                    <br>
                    And, create the template named 'stud-list.html' in the templates
                    folder:
                    <p class="terminal">
                    &lt;!DOCTYPE html&gt;<br>
                    &lt;html lang="en"&gt;<br>
                    &lt;head&gt;<br>
                    &emsp;&emsp;&emsp;&emsp;&lt;meta charset="UTF-8"&gt;<br>
                    &emsp;&emsp;&emsp;&emsp;&lt;title&gt;Student List&lt;/title&gt;<br>
                    &lt;/head&gt;<br>
                    &lt;body&gt;<br>
                    &emsp;&emsp;&emsp;&emsp;&lt;h2&gt;List of students&lt;/h2&gt;<br>
                    &emsp;&emsp;&emsp;&emsp;&lt;br&gt;&lt;br&gt;&lt;br&gt;<br>
                    &emsp;&emsp;&emsp;&emsp;{% for student in students %}<br>
                    &emsp;&emsp;&emsp;&emsp;Student ID: &lt;b&gt;{{ student.s_id }}&lt;/b&gt;&lt;br&gt;<br>
                    &emsp;&emsp;&emsp;&emsp;{% endfor %}<br>
                    &lt;/body&gt;<br>
                    &lt;/html&gt;<br>
                    </p>
                    <br>
                    Add the url in student/urs.py file like so:
                    <br>
                    <p class="terminal">
                    from django.urls import path <br>
                    from students import views <br>
                    <br>
                    urlpatterns = [ <br>
                    &emsp;&emsp;&emsp;&emsp;path('', views.WelcomeView.as_view(), name='welcome'), <br>
                    &emsp;&emsp;&emsp;&emsp;path('depts/', views.DeptListView.as_view(), name='dept_list'), <br>
                    &emsp;&emsp;&emsp;&emsp;path('depts/&lt;str:pk&gt;/', views.DeptDetailView.as_view(), name='dept_details&emsp;&emsp;&emsp;&emsp;'),  <br>
                    &emsp;&emsp;&emsp;&emsp;path('students/', views.StudentListView.as_view(), name='stud_list'), <br>
                    ] <br>
                    </p>
                    <br>
                    If we go to the url 127.0.0.1:8000/students/ we should see the
                    following:
                    <br>
                    <img src="../assets/django-18-stud-list.png" alt="List of students" width=500">
                    <br>
                    Now, if you try to add a url to go to the student's detail right
                    now (when we have neither defined a student's detail view nor
                    its url) you will get an error.
                    <br>
                    So, let us create the student's detail view and corresponding
                    template and the url. Then we will come back here and add the
                    link to the student's details.
                    <br>
                    Let us first create the student's details view in
                    students/views.py:
                    <br>
                    <p class="terminal">
                    class StudentDetailView(DetailView): <br>
                    &emsp;&emsp;&emsp;&emsp;""" <br>
                    &emsp;&emsp;&emsp;&emsp;This class utilizes the default class <br>
                    &emsp;&emsp;&emsp;&emsp;based view provided by Django framework to <br>
                    &emsp;&emsp;&emsp;&emsp;display the details of a student in the system <br>
                    &emsp;&emsp;&emsp;&emsp;""" <br>
                    &emsp;&emsp;&emsp;&emsp;template_name = 'stud-details.html' <br>
                    &emsp;&emsp;&emsp;&emsp;model = Student <br>
                    &emsp;&emsp;&emsp;&emsp;context_object_name = 'student' <br>
                    </p>
                    <br>
                    Now, add the stud-details.html in the templates folder and
                    type in it the following basic html:
                    <br>
                    <p class="terminal">
                    &lt;!DOCTYPE html&gt; <br>
                    &lt;html lang="en"&gt; <br>
                    &lt;head&gt; <br>
                    &emsp;&emsp;&emsp;&emsp;&lt;meta charset="UTF-8"&gt; <br>
                    &emsp;&emsp;&emsp;&emsp;&lt;title&gt;Student details&lt;/title&gt; <br>
                    &lt;/head&gt; <br>
                    &lt;body&gt; <br>
                    &emsp;&emsp;&emsp;&emsp;&lt;h2&gt;Student Detail Screen&lt;/h2&gt; <br>
                    &emsp;&emsp;&emsp;&emsp;&lt;br&gt;&lt;br&gt;&lt;br&gt; <br>
                    &emsp;&emsp;&emsp;&emsp;Student Name: &lt;h3&gt;{{ student }}&lt;/h3&gt; <br>
                    &emsp;&emsp;&emsp;&emsp;Student ID: &lt;h3&gt;{{ student.s_id }}&lt;/h3&gt; <br>
                    &emsp;&emsp;&emsp;&emsp;Student Pic: &lt;img src="{{ student.s_pic }}"&lt; <br>
                    &lt;/body&gt; <br>
                    &lt;/html&gt; <br>
                    </p>
                    <br>
                    Notice how we used the student object's picture attribute to 
                    define the source of the image in an &lt;img&gt; tag.
                    <br>
                    Finally, add the url to this view in the students/urls.py file:
                    <br>
                    <p class="terminal">
                    from django.urls import path <br>
                    from students import views <br>
                    <br>
                    urlpatterns = [ <br>
                    &emsp;&emsp;&emsp;&emsp;path('', views.WelcomeView.as_view(), name='welcome'), <br>
                    &emsp;&emsp;&emsp;&emsp;path('depts/', views.DeptListView.as_view(), name='dept_list'), <br>
                    &emsp;&emsp;&emsp;&emsp;path('depts/<str:pk>/', views.DeptDetailView.as_view(), name='dept_details&emsp;&emsp;&emsp;&emsp;'), <br>
                    &emsp;&emsp;&emsp;&emsp;path('students/', views.StudentListView.as_view(), name='stud_list'), <br>
                    &emsp;&emsp;&emsp;&emsp;path('students/<str:pk>/', views.StudentDetailView.as_view(), name='stud_d&emsp;&emsp;&emsp;&emsp;etails'), <br>
                    ]    <br>
                    </p>
                    <br>
                    Now, coming back to the templates/stud-list.html, we can finally
                    add to it the link to details of the student:
                    <br>
                    <p class="terminal">
                    &lt;!DOCTYPE html&gt; <br>
                    &lt;html lang="en"&gt; <br>
                    &lt;head&gt; <br>
                    &emsp;&emsp;&emsp;&emsp;&lt;meta charset="UTF-8"&gt; <br>
                    &emsp;&emsp;&emsp;&emsp;&lt;title&gt;Student List&lt;/title&gt; <br>
                    &lt;/head&gt; <br>
                    &lt;body&gt; <br>
                    &lt;h2&gt;List of students&lt;/h2&gt; <br>
                    &lt;br&gt;&lt;br&gt;&lt;br&gt; <br>
                    {% for student in students %} <br>
                    Student ID: &lt;b&gt;{{ student.s_id }}&lt;/b&gt;&lt;br&gt; <br>
                    &lt;a href="{% url 'stud_details' pk=student.pk %}"&gt; Details &lt;/a&gt;&lt;br&gt; <br>
                    {% endfor %} <br>
                    &lt;/body&gt; <br>
                    &lt;/html&gt; <br>
                    </p>
                    <br>
                    If you go to 127.0.0.0:8000/students/ again, you should see the
                    page displayed with the link to see the details of the student:
                    <br>
                    <img src="../assets/django-19-stud-list.png" alt="List of students with link to view details" width="300">
                    <br>
                    And upon clicking the link, you should see the details as:
                    <br>
                    <img src="../assets/django-20-stud-details.png" alt="Student details" width="300">
                    <br>
                    But wait... what????? Where is my picture???
                    <br>
                    That is because the image source that we defined is incomplete and
                    the browser wasn't able to load the picture:
                    <br>
                    <img src="../assets/django-21-stud-detail-img-err.png" alt="Student image error analysis" width="700">
                    <br>
                    So, what do we do? Well, Django framework gives us a handy 'url'
                    attribute to get the absolute url of the image using the MEDIA_ROOT
                    attribute that we had declared previously in tutorial/settings.py
                    file.
                    <br>
                    To fix this issue, replace
                    <br>
                    <p class="terminal">
                    &lt;img src="{{ student.s_pic }}"&gt;
                    </p>
                    <br>
                    with:
                    <p class="terminal">
                    &lt;img src="{{ student.s_pic.url }}"&gt;
                    </p>
                    <br>
                    in students/template/stud-details.html and try to reload the page:
                    <br>
                    <img src="../assets/django-20-stud-details.png" alt="Student details" width="300">
                    <br>
                    Again?? Where the hell is my pic dude??
                    <br>
                    This is because we are in a development environment and need
                    absolute path to the image in order to process them correctly.
                    To do this, go to the tutorial/urls.py file and add the following
                    lines of code:
                    <p class="terminal">
                    from django.contrib import admin <br>
                    from django.urls import path, include <br>
                    # IMPORT THIS <br>
                    from django.conf import settings <br>
                    from django.conf.urls.static import static <br>
                    <br>
                    urlpatterns = [ <br>
                    &emsp;&emsp;&emsp;&emsp;path('admin/', admin.site.urls), <br>
                    &emsp;&emsp;&emsp;&emsp;path('', include('students.urls')), <br>
                    ] <br>
                    <br>
                    # ADD THIS <br>
                    if settings.DEBUG: <br>
                    &emsp;&emsp;&emsp;&emsp;urlpatterns += static(settings.MEDIA_URL, document_root=settings.MEDIA_ROO&emsp;&emsp;&emsp;&emsp;T) <br>
                    <br>
                    </p>
                    <br>
                    Now try to load student details page again:
                    <br>
                    <img src="../assets/django-22-stud-details-with-pic.png" alt="Student's details with picture loaded successfully" width="500">
                    <br>
                    Voila!!!
                    <br>
                    Okay, lets move on to the next bit, Adding and Updating instances
                    of models using Forms.
                </div>
                <div class="footer">
                    <h4>Contact me at gaur{dot}akshay{at}gmail{dot}com if you found this
                        helpful or if you have any suggestions to improve.</h4>
                </div>
        </div>
    </body>
</html>
