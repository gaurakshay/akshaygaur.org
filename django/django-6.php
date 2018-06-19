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
          First things first, since from now on we are going to be adding many more urls to our project, it would behoove us to spend
          a little time on tidying things up.
          <br> If you remember, we imported our student app's view in our project's main url.py file. Consider this: you have
          4-5 apps and all have 10-15 urls. Even this conservative estimates leaves us with anywhere from 40-75 urls in one
          file. So let us try to avoid this future mess.
          <br> Open up the base urls.py file where we put our first view and remove all that we added previously. Then, we will
          tell this file to include another urls.py file so that it looks like:
          <br>
          <pre><code class="language-python">from django.contrib import admin
from django.urls import path, include

urlpatterns = [
    path('admin/', admin.site.urls),
    path('', include('students.urls')),
]</code></pre>
          <br> Now, lets create a urls.py file in our students app. This file should be located at students/urls.py.
          <pre><code class="language-treeview">tutorial//
|-- assets//
|   `-- media//
|   `-- student_pics//
|   `-- akshay.jpg
|-- manage.py*
|-- students//
|   |-- admin.py
|   |-- apps.py
|   |-- __init__.py
|   |-- migrations//
|   |-- models.py
|   |-- templates//
|   |   `-- welcome.html
|   |-- tests.py
|   |-- urls.py
|   `-- views.py
`-- tutorial//
  |-- __init__.py
  |-- settings.py
  |-- urls.py
  `-- wsgi.py</code></pre> To this file, add the following:
          <br>
          <pre><code class="language-python">from django.urls import path
from students import views

urlpatterns = [
    path('', views.WelcomeView.as_view(), name='welcome'),
]</code></pre>
          <br> Now try going to 127.0.0.1:8000 again. If we did it right, you should see the same results!
          <br>
          <br> So, one of the first views that we are going to try is list view. This view shows all model's instances. Some
          of the other views that we can utilize are details views, create views, delete views. All these views interact
          with the model in some way or the other and we will learn about them one by one. To create a list view, first,
          open up the views.py file in students directory. And add the following lines:
          <pre><code class="language-python">from django.shortcuts import render
      
# import the generic views.
from django.views.generic import TemplateView, ListView

# import models
from students.models import Department


class WelcomeView(TemplateView):
    """
    This is our welcome screen. Utilizes a
    template view.
    """
    template_name = 'welcome.html'


class DeptListView(ListView):
    """
    This class handles the list view for
    department model. Utilizes the list view.
    """
    template_name = 'dept-list.html'
    model = Department
    context_object_name = 'depts'</code></pre>
          <br> You must have noticed that the webpage that we defined for this page doesn't exist ('dept-list.html'). So lets
          fix this by make a html file named 'dept-list.html' in the --- you guessed right --- the templates folder.
          <br> Create a skeleton like we did before and put the following:
          <pre><code class="language-django">&lt;!doctype html&gt;
&lt;html lang="en"&gt;
&lt;head&gt;
  &lt;meta charset="UTF-8"&gt;
  &lt;title&gt;Department List&lt;/title&gt;
&lt;/head&gt;
&lt;body&gt;
  &lt;h2&gt;List of departments&lt;/h2&gt;
  &lt;br&gt;&lt;br&gt;&lt;br&gt;
  {% for dept in depts %}
  Department Name: &lt;b&gt;{{ dept }}&lt;/b&gt;&lt;br&gt;
  Department Code: &lt;b&gt;{{ dept.d_code }}&lt;/b&gt;&lt;br&gt;
  Department Chair: &lt;b&gt;{{ dept.d_chair }}&lt;/b&gt;&lt;br&gt;
  {% endfor %} 
&lt;/body&gt;
&lt;/html&gt;</code></pre>
          <br> So at this point, what we have is a view named DeptListView that knows that it would render dept-list.html. The
          only that remains to be done is to tell the project when to call the view that we declared. We do that in students/urls.py
          file so that project knows what view to call when any url is requested.
          <br> To do that, lets edit the students/urls.py and append this to the urlpatterns list:
          <br>
          <pre><code class="language-python">from django.urls import path
from students import views

urlpatterns = [
    path('', views.WelcomeView.as_view(), name='welcome'),
    path('depts/', views.DeptListView.as_view(), name='dept_list'),  # Add this...
]</code></pre>
          <br> Now, try going to the url 127.0.0.1:8000/depts/ and confirm that you see all the departments that you entered
          in the admin module show up here. Since I added only one, I only see one:
          <br>
          <img src="../img/django-14-dept-list.png" width="500" alt="List of the departments in the system">
          <br>
          <br> As you can see this is a very simple page and we can definitely use stuff like bootstrap to make it pretty. While
          we will touch upon such stuff in the future, this is going to be it for the time being.
          <br> One important thing that comes out of this is the fact that we can use the object references in this page to see
          their details as well. We will look at it next in the details view implementation.
          <br>
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
          $('a[href="\\.\\/django-6.php"]').attr("class", "nav-link active");
      })
  </script>
</body>

</html>