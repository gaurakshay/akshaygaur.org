<?php include './django-boilerplate-top.php';?>
          First things first, since from now on we are going to be adding many more urls to our project, it would behoove us to spend
          a little time on tidying things up.
          </p> <p> If you remember, we imported our student app's view in our project's main url.py file. Consider this: you have
          4-5 apps and all have 10-15 urls. Even this conservative estimates leaves us with anywhere from 40-75 urls in one
          file. So let us try to avoid this future mess.
          </p> <p> Open up the base urls.py file where we put our first view and remove all that we added previously. Then, we will
          tell this file to include another urls.py file so that it looks like:
          </p> <p>
          <pre><code class="language-python">from django.contrib import admin
from django.urls import path, include

urlpatterns = [
    path('admin/', admin.site.urls),
    path('', include('students.urls')),
]</code></pre>
          </p> <p> Now, lets create a urls.py file in our students app. This file should be located at students/urls.py.
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
          </p> <p>
          <pre><code class="language-python">from django.urls import path
from students import views

urlpatterns = [
    path('', views.WelcomeView.as_view(), name='welcome'),
]</code></pre>
          </p> <p> Now try going to 127.0.0.1:8000 again. If we did it right, you should see the same results!
          </p> <p>
          </p> <p> So, one of the first views that we are going to try is list view. This view shows all model's instances. Some
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
          </p> <p> You must have noticed that the webpage that we defined for this page doesn't exist ('dept-list.html'). So lets
          fix this by make a html file named 'dept-list.html' in the --- you guessed right --- the templates folder.
          </p> <p> Create a skeleton like we did before and put the following:
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
          </p> <p> So at this point, what we have is a view named DeptListView that knows that it would render dept-list.html. The
          only that remains to be done is to tell the project when to call the view that we declared. We do that in students/urls.py
          file so that project knows what view to call when any url is requested.
          </p> <p> To do that, lets edit the students/urls.py and append this to the urlpatterns list:
          </p> <p>
          <pre><code class="language-python">from django.urls import path
from students import views

urlpatterns = [
    path('', views.WelcomeView.as_view(), name='welcome'),
    path('depts/', views.DeptListView.as_view(), name='dept_list'),  # Add this...
]</code></pre>
          </p> <p> Now, try going to the url 127.0.0.1:8000/depts/ and confirm that you see all the departments that you entered
          in the admin module show up here. Since I added only one, I only see one:
          </p> <p>
          <img src="../img/django-14-dept-list.png" width="500" alt="List of the departments in the system">
          </p> <p>
          </p> <p> As you can see this is a very simple page and we can definitely use stuff like bootstrap to make it pretty. While
          we will touch upon such stuff in the future, this is going to be it for the time being.
          </p> <p> One important thing that comes out of this is the fact that we can use the object references in this page to see
          their details as well. We will look at it next in the details view implementation.
          </p> <p>
<?php 
    $boilerplate = file_get_contents('./django-boilerplate-bottom.php');
    echo str_replace("???", "6", $boilerplate);
?>