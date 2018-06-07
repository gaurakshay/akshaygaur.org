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
                    First things first, since from now on we are going to be adding
                    many more urls to our project, it would behoove us to 
                    spend a little time on tidying things up.
                    <br>
                    If you remember, we imported our student app's view in our
                    project's main url.py file. Consider this: you have 4-5 apps
                    and all have 10-15 urls. Even this conservative estimates leaves
                    us with anywhere from 40-75 urls in one file. So let us try
                    to avoid this future mess.
                    <br>
                    Open up the base urls.py file where we put our first view and
                    remove all that we added previously. Then, we will tell this file
                    to include another urls.py file so that it looks like:
                    <br>
                    <p class="terminal">
                    from django.contrib import admin<br>
                    from django.urls import path<br>
                    <br>
                    urlpatterns = [<br>
                    &emsp;&emsp;&emsp;&emsp;path('admin/', admin.site.urls),<br>
                    &emsp;&emsp;&emsp;&emsp;path('', include('students.urls')),<br>
                    ]<br>
                    </p>
                    <br>
                    Now, lets create a urls.py file in our students app. This file
                    should be located at students/urls.py.
                    <br>
                    <p class="terminal">
                    from django.urls import path, include<br>
                    from students import views<br>
                    <br>
                    urlpatterns = [<br>
                    &emsp;&emsp;&emsp;&emsp;path('', views.Welcome.as_view(), name),<br>
                    ]<br>
                    </p>
                    <br>
                    Now try going to 127.0.0.1:8000 again. If we did it right, you
                    should see the same results!
                    <br>
                    So, one of the first views that we are going to try is list
                    view. This view shows all model's instances. Some
                    of the other views that we can utilize are details views, create
                    views, delete views. All these views interact with the model
                    in some way or the other and we will learn about them one by
                    one.
                    To create a list view, first, open up the views.py file in
                    students directory. And add the following lines:
                    <p class="terminal">
                    from django.shortcuts import render<br>
                    <br>
                    # import the template view.<br>
                    from django.views.generic import TemplateView, ListView<br>
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
                    </p>
                    <br>
                    You must have noticed that the webpage that we defined for this
                    page doesn't exist ('dept-list.html'). So lets fix this by
                    make a html file named 'dept-list.html' in the --- you guessed
                    right --- the templates folder.
                    <br>
                    Create a skeleton like we did before and put the following:
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
                    &emsp;&emsp;&emsp;&emsp;Department Name: &lt;b&gt;{{ dept }}&lt;/b&gt;&lt;br&gt;<br>
                    &emsp;&emsp;&emsp;&emsp;Department Code: &lt;b&gt;{{ dept.d_code }}&lt;/b&gt;&lt;br&gt;<br>
                    &emsp;&emsp;&emsp;&emsp;Department Chair: &lt;b&gt;{{ dept.d_chair }}&lt;/b&gt;&lt;br&gt;<br>
                    &emsp;&emsp;&emsp;&emsp;{% endfor %}<br>
                    &lt;/body&gt;<br>
                    &lt;/html&gt;<br>
                    </p>
                    <br>
                    So at this point, what we have is a view named DeptListView
                    that knows that it would render dept-list.html. The only that
                    remains to be done is to tell the project when to call the view
                    that we declared. We do that in students/urls.py file so that
                    project knows what view to call when any url is requested.
                    <br>
                    To do that, lets edit the students/urls.py and append this to the
                    urlpatterns list:
                    <br>
                    <p class="terminal">
                    &emsp;&emsp;&emsp;&emsp;path('depts/', views.DeptListView.as_view(), name='dept_list'),
                    </p>
                    <br>
                    Now, try going to the url 127.0.0.1:8000/depts/ and confirm
                    that you see all the departments that you entered in the admin
                    module show up here. Since I added only one, I only see one:
                    <br>
                    <img src="../assets/django-14-dept-list.png" width="500" alt="List of the departments in the system">
                    <br>
                    <br>
                    As you can see this is a very simple page and we can definitely
                    use stuff like bootstrap to make it pretty. While we will touch
                    upon such stuff in the future, this is going to be it for the
                    time being.
                    <br>
                    One important thing that comes out of this is the fact that
                    we can use the object references in this page to see their
                    details as well. We will look at it next in the details view
                    implementation.
                    <br>
                </div>
                <div class="footer">
                    <h4>Contact me at gaur{dot}akshay{at}gmail{dot}com if you found this
                        helpful or if you have any suggestions to improve.</h4>
                </div>
        </div>
    </body>
</html>
