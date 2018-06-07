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
                    <h1>Akshay's Blog (under construction)</h1>
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
                    For our details view, lets first add a few new departments
                    to our list of departments using the admin module:
                    <br>
                    <img src="../assets/django-15-more-depts.png" width="400">
                    <br>
                    And let us reduce the amount of information that we are presenting
                    in the details view, and add a new link to view the details
                    of that particular department.
                    <br>
                    <p class="terminal">
                    &lt;!DOCTYPE html&gt;<br>
                    &lt;html lang="en"&gt;<br>
                    &lt;head&gt;<br>
                    &emsp;&emsp;&emsp;&emsp;&lt;meta charset="UTF-8"&gt;<br>
                    &emsp;&emsp;&emsp;&emsp;&lt;title&gt;Department List&lt;/title&gt;<br>
                    &lt;/head&gt;<br>
                    &lt;body&gt;<br>
                    &emsp;&emsp;&emsp;&emsp;&lt;h2&gt;List of departments&lt;/h2&gt;<br>
                    &emsp;&emsp;&emsp;&emsp;&lt;br&gt;&lt;br&gt;&lt;br&gt;<br>
                    &emsp;&emsp;&emsp;&emsp;{% for dept in depts %}<br>
                    &emsp;&emsp;&emsp;&emsp;Department Code: &lt;b&gt;{{ dept.d_code }}&lt;/b&gt;&lt;br&gt;<br>
                    &emsp;&emsp;&emsp;&emsp;&lt;a href="{% url 'dept_details' pk=dept.pk %}"&gt;Details&lt;/a&gt;&lt;br&gt;<br>
                    &emsp;&emsp;&emsp;&emsp;{% endfor %}<br>
                    &lt;/body&gt;<br>
                    &lt;/html&gt;<br>
                    </p>
                    <br>
                    This is how the page should look like now:<br>
                    <img src="../assets/django-16-dept-list.png" alt="List of departments will basic info" width="500"><br>
                    Notice how we create the url to refer to the link. We are asking
                    the framework to look for a url named 'dept_details' and pass
                    the dept's primary key pk to it. Now, all we need to do is to 
                    create a view named dept_details, and accept this pk as a 
                    parameter. We will use DetailsView to render this view as we
                    are providing details of one model's instance through this view
                    and that is exactly what the django framework's DetailView is made
                    for.
                    <br>
                    To create a detail view, first, open up the views.py file in
                    students directory. And add the following lines:
                    <p class="terminal">
                    from django.shortcuts import render<br>
                    <br>
                    # import the template view.<br>
                    from django.views.generic import TemplateView, ListView, DetailView<br>
                    <br>
                    # import department model<br>
                    from students.models import Department<br>
                    <br>
                    <br>
                    class WelcomeView(TemplateView):<br>
                    &emsp;&emsp;&emsp;&emsp;"""<br>
                    &emsp;&emsp;&emsp;&emsp;This is our welcome screen. Utilizes a<br>
                    &emsp;&emsp;&emsp;&emsp;template view.<br>
                    &emsp;&emsp;&emsp;&emsp;"""<br>
                    &emsp;&emsp;&emsp;&emsp;template_name = 'welcome.html'<br>
                    <br>
                    <br>
                    class DeptListView(ListView):<br>
                    &emsp;&emsp;&emsp;&emsp;"""<br>
                    &emsp;&emsp;&emsp;&emsp;This is the list view of the department model.<br>
                    &emsp;&emsp;&emsp;&emsp;Uses the default ListView provided<br>
                    &emsp;&emsp;&emsp;&emsp;by Django Framework.<br>
                    &emsp;&emsp;&emsp;&emsp;"""<br>
                    &emsp;&emsp;&emsp;&emsp;template_name = 'dept-list.html'<br>
                    &emsp;&emsp;&emsp;&emsp;model = Department<br>
                    &emsp;&emsp;&emsp;&emsp;context_object_name = 'depts'<br>
                    <br>
                    <br>
                    class DeptDetailView(DetailView):<br>
                    &emsp;&emsp;&emsp;&emsp;"""<br>
                    &emsp;&emsp;&emsp;&emsp;This is the detail view of the department model.<br>
                    &emsp;&emsp;&emsp;&emsp;Uses the default detail view provided<br>
                    &emsp;&emsp;&emsp;&emsp;by Django Framework.<br>
                    &emsp;&emsp;&emsp;&emsp;"""<br>
                    &emsp;&emsp;&emsp;&emsp;template_name = 'dept-details.html'<br>
                    &emsp;&emsp;&emsp;&emsp;model = Department<br>
                    &emsp;&emsp;&emsp;&emsp;context_object_name = 'dept'<br>
                    </p>
                    <br>
                    You must have noticed that the webpage that we defined for this
                    page doesn't exist ('dept-details.html'). So lets fix this by
                    make a html file named 'dept-details.html' in the --- you guessed
                    right --- the templates folder.
                    <br>
                    Create a skeleton like we did before and put the following:
                    <p class="terminal">
                    &lt;!DOCTYPE html&gt;<br>
                    &lt;html lang="en"&gt;<br>
                    &lt;head&gt;<br>
                    &emsp;&emsp;&emsp;&emsp;&lt;meta charset="UTF-8"&gt;<br>
                    &emsp;&emsp;&emsp;&emsp;&lt;title&gt;Department details&lt;/title&gt;<br>
                    &lt;/head&gt;<br>
                    &lt;body&gt;<br>
                    &emsp;&emsp;&emsp;&emsp;&lt;h2&gt;Department Detail Screen&lt;/h2&gt;<br>
                    &emsp;&emsp;&emsp;&emsp;&lt;br&gt;&lt;br&gt;&lt;br&gt;<br>
                    &emsp;&emsp;&emsp;&emsp;Department Name: &lt;h3&gt;{{ dept }}&lt;/h3&gt;<br>
                    &emsp;&emsp;&emsp;&emsp;Department Code: &lt;h3&gt;{{ dept.d_code }}&lt;/h3&gt;<br>
                    &emsp;&emsp;&emsp;&emsp;Department Chair: &lt;h3&gt;{{ dept.d_chair }}&lt;/h3&gt;<br>
                    &lt;/body&gt;<br>
                    &lt;/html&gt;<br>

                    </p>
                    <br>
                    So at this point, what we have is a view named DeptDetailView
                    that knows that it would render dept-details.html. The only that
                    remains to be done is to tell the project when to call the view
                    that we declared. We do that in students/urls.py file so that
                    project knows what view to call when any url is requested.
                    <br>
                    To do that, lets edit the students/urls.py and append this to the
                    urlpatterns list:
                    <p class="terminal">
                    from django.urls import path <br>
                    from students import views<br>
                    <br>
                    urlpatterns = [<br>
                    &emsp;&emsp;&emsp;&emsp;path('', views.WelcomeView.as_view(), name='welcome'),<br>
                    &emsp;&emsp;&emsp;&emsp;path('depts/', views.DeptListView.as_view(), name='dept_list'),<br>
                    &emsp;&emsp;&emsp;&emsp;path('depts/&lt;str:pk&gt;/', views.DeptDetailView.as_view(), name='dept_details'),<br>
                    ]<br>
                    </p>
                    <br>
                    This should be enough to bring up the details view. So let us go
                    to the dept list page and click on one of the "Details" link on
                    that page. If everything goes according to our plan, we should
                    see the details page like this:<br>
                    <img src="../assets/django-17-dept-details.png" alt="Department Details" width="500">
                </div>
                <div class="footer">
                    <h4>Contact me at gaur{dot}akshay{at}gmail{dot}com if you found this
                        helpful or if you have any suggestions to improve.</h4>
                </div>
        </div>
    </body>
</html>
