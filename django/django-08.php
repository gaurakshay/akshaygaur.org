<?php 
ob_start();
include "./django-boilerplate-top.php";
$boilerplate = ob_get_clean();
echo str_replace("???", "DetailView", $boilerplate);
?>
    <main>
      <p>
    So far, we have looked at a very basic details view with a few text fields to display. But what if we wanted to show a little
          media along with text?
      </p>
          <p> For that, we will use our student model where we stored student's pic as a model attribute. To start, let us first
          make a list view to show the list of students in our system. So open up your views.py and add the following:
          </p>
          <pre><code class="language-python"># import models
from students.models import Department, Student


class StudentListView(ListView):
    """
    Return list of students in the system.
    """
    template_name = 'stud-list.html'
    model = Student
    context_object_name = 'students'</code></pre>
          <p> And, create the template named 'stud-list.html' in the templates folder: </p>
          <pre><code class="language-django">&lt;!doctype html&gt;
&lt;html lang="en"&gt;
&lt;head&gt;
  &lt;meta charset="UTF-8"&gt;
  &lt;title&gt;Student List&lt;/title&gt;
&lt;/head&gt;
&lt;body&gt;
  &lt;h2&gt;List of students&lt;/h2&gt;
  &lt;br&gt;&lt;br&gt;&lt;br&gt;
  {% for student in students %}
  Student ID: &lt;b&gt;{{ student.s_id }}&lt;/b&gt;&lt;br&gt;
  {% endfor %}
&lt;/body&gt;
&lt;/html&gt;</code></pre>
          <p> Add the url in student/urls.py file like so:</p>
          <pre><code class="language-python">from django.urls import path
from students import views

urlpatterns = [
    path('', views.WelcomeView.as_view(), name='welcome'),
    path('depts/', views.DeptListView.as_view(), name='dept_list'),
    path('depts/&lt;str:pk&gt;/details/', views.DeptDetailView.as_view(), name='dept_details'),
    path('students/', views.StudentListView.as_view(), name='stud_list'),
]</code></pre>
          <p> If we go to the url 127.0.0.1:8000/students/ we should see the following:
          </p> <p>
          <img src="../img/django-18-stud-list.png" alt="List of students">
          </p> <p> Now, if you try to add a link to go to the student's detail like we did in the case of Department list view right
          now (when we have neither defined a student's detail view nor its url) you will get an error.
          </p> <p> So, let us create the student's detail view and corresponding template and the url. Then we will come back here
          and add the link to the student's details.
          </p> <p> Let us first create the student's details view in students/views.py:
          </p>
          <pre><code class="language-python">class StudentDetailView(DetailView):
    """
    This class utilizes the default class based view provided by Django framework to display the details of a student
    in the system
    """
    template_name = 'stud-details.html'
    model = Student
    context_object_name = 'student'</code></pre>
          <p> Now, add the stud-details.html in the templates folder and type in it the following basic html:
          </p>
          <pre><code class="language-django">&lt;!doctype html&gt;
&lt;html lang="en"&gt;
&lt;head&gt;
  &lt;meta charset="UTF-8"&gt;
  &lt;title&gt;Student details&lt;/title&gt;
&lt;/head&gt;
&lt;body&gt;
  &lt;h2&gt;Student Detail Screen&lt;/h2&gt;
  &lt;br&gt;&lt;br&gt;&lt;br&gt;
  Student Name: &lt;h3&gt;{{ student }}&lt;/h3&gt;
  Student ID: &lt;h3&gt;{{ student.s_id }}&lt;/h3&gt;
  Student Pic: &lt;img src="{{ student.s_pic }}"&gt;
&lt;/body&gt;
&lt;/html&gt;</code></pre>
          <p> Notice how we used the student object's picture attribute to define the source of the image in an &lt;img&gt;
          tag.
          </p> <p> Finally, add the url to this view in the students/urls.py file:
          </p>
          <pre><code class="language-python">from django.urls import path
from students import views

urlpatterns = [
    path('', views.WelcomeView.as_view(), name='welcome'),
    path('depts/', views.DeptListView.as_view(), name='dept_list'),
    path('depts/&lt;str:pk&gt;/details/', views.DeptDetailView.as_view(), name='dept_details'),
    path('students/', views.StudentListView.as_view(), name='stud_list'),
    path('students/&lt;int:pk&gt;/details/', views.StudentDetailView.as_view(), name='stud_details'),
]</code></pre>
          <p> Now, coming back to the templates/stud-list.html, we can finally add to it the link to details of the student:
          </p>
          <pre><code class="language-django">&lt;!doctype html&gt;
&lt;html lang="en"&gt;
&lt;head&gt;
  &lt;meta charset="UTF-8"&gt;
  &lt;title&gt;Student List&lt;/title&gt;
&lt;/head&gt;
&lt;body&gt;
  &lt;h2&gt;List of students&lt;/h2&gt;
  &lt;br&gt;&lt;br&gt;&lt;br&gt;
  {% for student in students %}
  Student ID: &lt;b&gt;{{ student.s_id }}&lt;/b&gt;&lt;br&gt;
  &lt;a href="{% url 'stud_details' pk=student.pk %}"&gt; Details &lt;/a&gt;&lt;br&gt;
  {% endfor %}
&lt;/body&gt;
&lt;/html&gt;</code></pre>
          <p> If you go to 127.0.0.0:8000/students/ again, you should see the page displayed with the link to see the details
          of the student:
          </p> <p>
          <img src="../img/django-19-stud-list.png" alt="List of students with link to view details">
          </p> <p> And upon clicking the link, you should see the details as:
          </p> <p>
          <img src="../img/django-20-stud-details.png" alt="Student details">
          </p> <p> But wait... what????? Where is my picture???
          </p> <p> That is because the image source that we defined is incomplete and the browser wasn't able to load the picture:
          </p> <p>
          <img src="../img/django-21-stud-detail-img-err.png" alt="Student image error analysis">
          </p> <p> So, what do we do? Well, Django framework gives us a handy 'url' attribute to get the absolute url of the image
          using the MEDIA_ROOT attribute that we had declared previously in tutorial/settings.py file.
          </p> <p> To fix this issue, replace
          </p>
          <pre><code class="language-django">&lt;img src="{{ student.s_pic }}"&gt;</code></pre>
          with:
          <pre><code class="language-django">&lt;img src="{{ student.s_pic.url }}"&gt;</code></pre>
          <p> in students/template/stud-details.html and try to reload the page:
          </p> <p>
          <img src="../img/django-20-stud-details.png" alt="Student details">
          </p> <p> Again?? Where the hell is my pic dude??
          </p> <p> This is because we are in a development environment and need absolute path to the image in order to process them
          correctly. To do this, go to the tutorial/urls.py file and add the following lines of code:</p>
          <pre><code class="language-python">from django.contrib import admin
from django.urls import path, include
# IMPORT THIS
from django.conf import settings
from django.conf.urls.static import static

urlpatterns = [
    path('admin/', admin.site.urls),
    path('', include('students.urls')),
]

# ADD THIS
if settings.DEBUG:
    urlpatterns += static(settings.MEDIA_URL, document_root=settings.MEDIA_ROOT)</code></pre>
          <p> Now try to load student details page again:
          </p> <p>
          <img src="../img/django-22-stud-details-with-pic.png " alt="Student 's details with picture loaded successfully">
          </p> <p> Voila!!!
          </p> <p> Okay, lets move on to the next bit, Adding and Updating instances of models using Forms. </p>
    </main>
<?php 
ob_start();
include "./django-boilerplate-bottom.php";
$boilerplate = ob_get_clean();
echo str_replace("???", "08", $boilerplate);
?>
