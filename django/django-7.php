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
          For our details view, lets first add a few new departments to our list of departments using the admin module:
          <br>
          <img src="../img/django-15-more-depts.png" width="600">
          <br> And let us reduce the amount of information that we are presenting in the details view, and add a new link to
          view the details of that particular department.
          <br>
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
        Department Code: &lt;b&gt;{{ dept.d_code }}&lt;/b&gt;&lt;br&gt;
        &lt;a href="{% url 'dept_details' pk=dept.pk %}"&gt; Details &lt;/a&gt;&lt;br&gt;
        {% endfor %} 
      &lt;/body&gt;
      &lt;/html&gt;
         </code></pre>
          <br> This is how the page should look like now:
          <br>
          <img src="../img/django-16-dept-list.png" alt="List of departments will basic info" width="500">
          <br> Notice how we create the url to refer to the link. We are asking the framework to look for a url named 'dept_details'
          and pass the dept's primary key pk to it. Now, all we need to do is to create a view named dept_details, and accept
          this pk as a parameter. We will use DetailsView to render this view as we are providing details of one model's
          instance through this view and that is exactly what the django framework's DetailView is made for.
          <br> To create a detail view, first, open up the views.py file in students directory. And add the following lines:
          <pre><code class="language-python">from django.shortcuts import render
      
      # import the generic views.
      from django.views.generic import TemplateView, ListView, DetailView
      
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
        department model. Utilizes the list view
        """
        template_name = 'dept-list.html'
        model = Department
        context_object_name = 'depts'
      
      
      class DeptDetailView(DetailView):
        """
        This is the detail view of the class.
        Uses the default detail view provided
        by Django Framework.
        """
        template_name = 'dept-details.html'
        model = Department
        context_object_name = 'dept'</code></pre>
          <br> You must have noticed that the webpage that we defined for this page doesn't exist ('dept-details.html'). So lets
          fix this by make a html file named 'dept-details.html' in the --- you guessed right --- the templates folder.
          <br> Create a skeleton like we did before and put the following:
          <pre><code class="language-django">&lt;!doctype html&gt;
      &lt;html lang="en"&gt;
      &lt;head&gt;
        &lt;meta charset="UTF-8"&gt;
        &lt;title&gt;Department details&lt;/title&gt;
      &lt;/head&gt;
      &lt;body&gt;
        &lt;h2&gt;Department Detail Screen&lt;/h2&gt;
        &lt;br&gt;&lt;br&gt;&lt;br&gt;
        Department Name: &lt;h3&gt;{{ dept }}&lt;/h3&gt;
        Department Code: &lt;h3&gt;{{ dept.d_code }}&lt;/h3&gt;
        Department Chair: &lt;h3&gt;{{ dept.d_chair }}&lt;/h3&gt;
      &lt;/body&gt;
      &lt;/html&gt;</code></pre>
          <br> So at this point, what we have is a view named DeptDetailView that knows that it would render dept-details.html.
          The only that remains to be done is to tell the project when to call the view that we declared. We do that in students/urls.py
          file so that project knows what view to call when any url is requested.
          <br> To do that, lets edit the students/urls.py and append this to the urlpatterns list:
          <pre><code class="language-python">from django.urls import path
      from students import views
      
      urlpatterns = [
        path('', views.WelcomeView.as_view(), name='welcome'),
        path('depts/', views.DeptListView.as_view(), name='dept_list'),
        path('depts/&lt;str:pk&gt;/details/', views.DeptDetailView.as_view(), name='dept_details'),
      ]</code></pre>
          <br> This should be enough to bring up the details view. So let us go to the dept list page and click on one of the
          "Details" link on that page. If everything goes according to our plan, we should see the details page like this:
          <br>
          <img src="../img/django-17-dept-details.png" alt="Department Details" width="500">
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
  <script src="../js/jquery-3.3.1.min.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../dist/js/bootstrap.min.js"></script>
  <script>
      $(document).ready(function () {
          $('a[href="\\.\\/django-1.php"]').attr("class", "nav-link");
          $('a[href="\\.\\/django-7.php"]').attr("class", "nav-link active");
      })
  </script>
</body>

</html>