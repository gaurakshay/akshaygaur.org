<?php 
ob_start();
include "./django-boilerplate-top.php";
$boilerplate = ob_get_clean();
echo str_replace("???", "CreateView", $boilerplate);
?>
    <main>
    In this article, we are going to talk about adding new students to our model. To do that, we are going to need to put together
          a few things:
          <ol>
            <li> A form that will specify what data is required for the creation of the student.</li>
            <li> A url that will be served for entering data for the new model.
            </li>
            <li> A view that will take an html template and render for the requestor. </li>
            <li> A template that will describe how to show the input fields that will be required for creation of the model.
            </li>
          </ol>
          <h4> 1. Setting up the form </h4>
          For this, we need to create a python file in the students directory named 'forms.py'. The directory after creating this file
          should look like:
          <pre><code class="language-treeview">tutorial//
|-- assets//
|   `-- media//
|       `-- student_pics//
|           `-- akshay.jpg
|-- manage.py*
|-- students//
|   |-- admin.py
|   |-- apps.py
|   |-- forms.py &lt;------------------THIS ONE RIGHT HERE
|   |-- __init__.py
|   |-- migrations//
|   |-- models.py
|   |-- templates//
|   |   |-- dept-details.html
|   |   |-- dept-list.html
|   |   |-- stud-details.html
|   |   |-- stud-list.html
|   |   `-- welcome.html
|   |-- tests.py
|   |-- urls.py
|   `-- views.py
`-- tutorial//
  |-- __init__.py
  |-- settings.py
  |-- urls.py
  `-- wsgi.py</code></pre>
        <p> Inside this file, add the following:
          </p>
          <pre><code class="language-python">from django.forms import ModelForm
        
# Import models
from students.models import Student


class StudentForm(ModelForm):
    """
    This is the modelfrom for the student.
    """
    class Meta:
    model = Student
    fields = ['s_id', 's_first_name', 's_last_name', 's_pic', 'course']</code></pre>
    
    <p>So, we have essentially told the framework that the student form is the default form type in django (ModelForm)
          and that does all the heavylifting for us. We still need to tell what model we will be using so that it knows where
          it will refer for the fields that we list in the next line.
          </p> <p> The 'fields' list just tells what attributes will participate in the form that we will see in a moment.
          </p> <p>
          <b>2. Setting up the URL </b>
          </p> <p> To set up the url, we will go to the students/urls.py file and add the following:
          </p>
          <pre><code class="language-python">from django.urls import path
from students import views

urlpatterns = [
    path('', views.WelcomeView.as_view(), name='welcome'),
    path('depts/', views.DeptListView.as_view(), name='dept_list'),
    path('depts/&lt;str:pk&gt;/details/', views.DeptDetailView.as_view(), name='dept_details'),
    path('students/', views.StudentListView.as_view(), name='stud_list'),
    path('students/&lt;int:pk&gt;/details/', views.StudentDetailView.as_view(), name='stud_details'),
    path('students/edit/', views.StudentAddView.as_view(), name='stud_edit'),
]</code></pre>
           <p>
          <b>3. Declaring the view </b>
          Go to students/views.py and add the following to declare the view for this view:
          </p>
          <pre><code class="language-python"># import the generic views.
from django.views.generic import TemplateView, ListView, DetailView, CreateView

# import models
from students.models import Department, Student

# import forms
from students.forms import StudentForm


class StudentAddView(CreateView):
    """
    This class utilizes the default class based
    view provided by Django framework to add submitted
    data to backend database.
    """
    template_name = 'stud-edit.html'
    model = Student
    form_class = StudentForm</code></pre>
          <p>
          <b> 4. Designing the form </b>
          </p> <p> Even though the heading says 'designing' we are going to design a very basic one. Later in the tutorial, we will
          look how to use frameworks such as Bootstrap or Materialize to render the forms.
          </p> <p> Create a file named 'stud-edit.html' in students/templates folder. Once created, add the following to the file: </p>
          <pre><code class="language-django">&lt;!doctype html&gt;
&lt;html lang="en"&gt;
&lt;head&gt;
  &lt;meta charset="UTF-8"&gt;
  &lt;title&gt;Student details&lt;/title&gt;
&lt;/head&gt;
&lt;body&gt;
  &lt;h2&gt;Student Add Screen&lt;/h2&gt;
  &lt;br&gt;&lt;br&gt;&lt;br&gt;
&lt;form method="POST" enctype="multipart/form-data"&gt;
{{ form.as_p }}
&lt;button type="submit"&gt; Save &lt;/button&gt;
&lt;/form&gt;
&lt;/body&gt;
&lt;/html&gt;</code></pre>
          <p> *************** IMPORTANT ***************
          </p> <p>
          <i>
            <b> enctype='multipart/form-data' </b>
          </i>
          </p> <p>
          <i> Please note the 'enctype' attribute added to the form. This is required whenever uploading media in your form.
            If you don't put this in the form, the pictures will not be uploaded for the model instance.
          </i>
          </p> <p>
          </p> <p> So, now try going to the address '127.0.0.1:8000/students/edit/' and what do you see?
          </p> <p>
          <img src="../img/django-22-stud-details-with-pic.png" alt="Student form">
          </p> <p> What is interesting here is that Django implements basic checks for you automatically. Such as checking all the
          required fields in the form are entered or not. For us, for example, entering the primary key for the student is
          very important. So, if I try to submit a form without entering the primary key, I get the following error:
          </p> <p>
          <img src="../img/django-24-form-error.png" alt="Form check">
          </p> <p> Isn't that nice?
          </p> <p> So fill out all the details for this student and submit the form. What do you see?
          </p> <p>
          <img src="../img/django-25-csrf-error.png" alt="CSRF Error message">
          </p> <p>
          </p> <p> This is the
          <i>
            <a href="https://en.wikipedia.org/wiki/Cross-site_request_forgery"> CSRF </a>
          </i>
          handling that Django does for you automatically and is extremely handy feature of Django framework. This also ensures that
          we follow basic security protocols to keep our site safe from malicious agents.
          </p> <p> To make sure that our site complies with Django's standards, we need to add {% csrf_token %} just after our &lt;form&gt;
          tag. </p>
          <pre><code class="language-django">&lt;!doctype html&gt;
&lt;html lang="en"&gt;
&lt;head&gt;
  &lt;meta charset="UTF-8"&gt;
  &lt;title&gt;Student details&lt;/title&gt;
&lt;/head&gt;
&lt;body&gt;
  &lt;h2&gt;Student Add Screen&lt;/h2&gt;
  &lt;br&gt;&lt;br&gt;&lt;br&gt;
&lt;form method="POST" enctype="multipart/form-data"&gt;
&lt;!-- Add this here --&gt;
{% csrf_token %}
{{ form.as_p }}
&lt;button type="submit"&gt; Save &lt;/button&gt;
&lt;/form&gt;
&lt;/body&gt;
&lt;/html&gt;</code></pre>
          <p> Now that we fixed that, let us enter some data in the form and try submitting again. Does the form submit the
          data correctly?
          </p> <p> Here is what I get:
          </p> <p>
          <img src="../img/django-26-improperly-configured-redirect-url.png" alt="Improperly configured
         redirect url">
          </p> <p> What this is tells us is that form has been submitted successfully, but it doesn't know which page to redirect
          to upon a successful submission of a form.
          </p> <p> To confirm our understanding, let us go and check list of students at 127.0.0.1:8000/students/
          </p> <p>
          <img src="../img/django-27-list-with-new-student.png" alt="List with new student">
          </p> <p> Yay! Our new student is in the system!! Let us look at the student's details by clicking on the Details link.
          </p> <p>
          <img src="../img/django-28-no-s_pic-attribute-error.png" alt="No pic with student">
          </p> <p> This tells us that this student doesn't have an image and because we try to display the student's pic using the
          {% student.s_pic.url %} Django tag when it doesn't exit, we get this error. You can think of this as being similar
          to a null value error in regular programming.
          </p> <p> So now we need to fix two things:
          </p>
          <ol>
            <li> Redirect url on successful form submission </li>
            <li> Handling the case when there is no image for the student </li>
          </ol>
          <b> 1. Setting up a redirect url on successful form submission </b>
          This is fixed in multiple ways:
          <ol type="a">
            <li> Defining the success url in our view.
              <p> In our views.py, add the following to our existing code: </p>
              <pre><code class="language-python">#import reverse lazy
from django.urls import reverse_lazy


class StudentAddView(CreateView):
    """
    This class utilizes the default class based
    view provided by Django framework to add submitted
    data to backend database.
    """
    template_name = 'stud-edit.html'
    model = Student
    form_class = StudentForm
    # Use reverse lazy to create the url for our list view
    # the parameter is the named url in our urls.py file.
    success_url = reverse_lazy('stud_list')</code></pre>
              <p> If you remember in our urls.py file, we defined the /students/ url with a name='stud_list', we pass this to
              our success_url variable in our view. After doing this, when we submit a student form, we will be redirected
              to the url which has the name 'stud_edit'. Be careful and don't mix up your dashes and underscores and all
              will be fine &#9786;.
              </p> <p> If all goes well, upon entering correct form data, you will see;
              </p> <p>
              <img src="../img/django-29-success-url-list.png" alt="Successful redirection
         to student list">
              </p>
            </li>
            <li> Defining the get_absolute_url in our model. If we don't add the success_url in our view, Django by default tries
              to show the added model instance on form submission. To view this model instance, it needs to know which url
              displays the details of a model in our app.
              <p> So, we will define the get_absolute_url for our student model in students/models.py file.
              </p> <p> Change the Student model in models.py file as below:
              </p>
              <pre><code class="language-python"># Import reverse_lazy for get_absolute_url
from django.urls import reverse_lazy


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
        return "{0} {1}".format(self.s_first_name, self.s_last_name)

    def get_absolute_url(self):
        """
        Returns the url to details for this object.
        :return: URL to display object details.
        """
        return reverse_lazy('stud_details', kwargs={'pk': self.pk})</code></pre>
              <p> Now, assuming that success_url is not defined, when you again enter a student's details in the form and submit,
              you will see:
              </p> <p>
              <img src="../img/django-30-success-url-details.png" alt="Successful redirect to
         student details">
              </p> <p> I have never seen a more beautiful error code! That is because we are being redirected to the student's detail
              page and we are getting this error only because it doesn't have a picture.
              </p>
            </li>
          </ol>
           <p>
          <b> 2. Handling the case when there is no image for the student </b>
          </p> <p> Here we can implement some basic validation in the template of ours like so: </p>
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
  Student Pic: 
&lt;!-- Basic validation in templates --&gt;
{% if student.s_pic %}
&lt;img src="{{ student.s_pic.url }}"&gt;
{% else %}
&lt;i&gt; No picture uploaded. &lt;/i&gt;
{% endif %}
&lt;/body&gt;
&lt;/html&gt;</code></pre>
          <p> Now try and see the details of any student that doesn't have a picture:
          </p> <p>
          <img src="../img/django-31-template-validation.png" alt="Successful template validation">
          </p> <p>
          Now that we have seen various views, lets take a break and talk about templates for a bit. </p>
    </main>
<?php 
ob_start();
include "./django-boilerplate-bottom.php";
$boilerplate = ob_get_clean();
echo str_replace("???", "09", $boilerplate);
?>
