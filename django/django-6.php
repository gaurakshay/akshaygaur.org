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
                    <!-- ><h4>Django</h4> -->
                    Django Tutorial<br>
                    &emsp;<a href="django-1.php"> Setup </a><br>
                    &emsp;<a href="django-2.php"> App and Models </a><br>
                    &emsp;<a href="django-3.php"> Admin Module </a><br>
                    &emsp;<a href="django-4.php"> Media Root </a><br>
                </div>
                <div class="content">
                    First things first, since from now on we are going to be adding
                    many more urls to our project, it would behoove us to do a little
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
                    So, one of the first views that we are going to try is details
                    view. This view shows a model's instance one at a time. Some
                    of the other views that we can utilize are list views, create
                    views, delete views. All these views interact with the model
                    in some way or the other and we will learn about them one by
                    one.

                </div>
                <div class="footer">
                    <h4>Contact me at gaur{dot}akshay{at}gmail{dot}com if you found this
                        helpful or if you have any suggestions to improve.</h4>
                </div>
        </div>
    </body>
</html>
