<?php
session_start();
require_once 'vendor/autoload.php';
use App\classes\Auth;


if (isset($_GET['page']))
{
    $_GET['page'];
    if ($_GET['page'] == 'home')
    {
        include 'pages/home.php';
    }

    elseif ($_GET['page'] == 'add_student')
    {
        include 'pages/add_student.php';
    }

    elseif ($_GET['page'] == 'manage_student')
    {
        include 'pages/manage_student.php';
    }

    else if ($_GET['page'] == 'edit_student')
    {
        include 'pages/edit_student.php';
    }

    elseif ($_GET['page'] == 'add_department')
    {
        include 'pages/add_department.php';
    }

    elseif ($_GET['page'] == 'manage_department')
    {
        include 'pages/manage_department.php';
    }

    else if ($_GET['page'] == 'edit_department')
    {
        include 'pages/edit_department.php';
    }

    elseif ($_GET['page'] == 'add_course')
    {
        include 'pages/add_course.php';
    }

    elseif ($_GET['page'] == 'manage_course')
    {
        include 'pages/manage_course.php';
    }

    else if ($_GET['page'] == 'edit_course')
    {
        include 'pages/edit_course.php';
    }

    elseif ($_GET['page'] == 'add_user')
    {
        include 'pages/add_user.php';
    }

    elseif ($_GET['page'] == 'manage_user')
    {
        include 'pages/manage_user.php';
    }

    else if ($_GET['page'] == 'edit_user')
    {
        include 'pages/edit_user.php';
    }

    else if ($_GET['page'] == 'course_registration')
    {
        include 'pages/course_registration.php';
    }

    else if ($_GET['page'] == 'manage_registered_courses')
    {
        include 'pages/manage_registered_courses.php';
    }

    else if ($_GET['page'] == 'edit_registered_courses')
    {
        include 'pages/edit_registered_courses.php';
    }

//    elseif ($_GET['page'] == 'register')
//    {
//        include 'pages/register.php';
//    }

    elseif ($_GET['page'] == 'login')
    {
        include 'pages/login.php';
    }

    elseif ($_GET['page'] == 'logout')
    {
        $auth = new Auth();
        $auth->logout();
    }
}
elseif (isset($_REQUEST['loginBtn']))
{
    include 'pages/home.php';
}

elseif (isset($_REQUEST['delete']))
{
    include 'pages/manage_student.php';
}

elseif (isset($_REQUEST['dept_delete']))
{
    include 'pages/manage_department.php';
}

elseif (isset($_REQUEST['course_delete']))
{
    include 'pages/manage_course.php';
}

elseif (isset($_REQUEST['user_delete']))
{
    include 'pages/manage_user.php';
}

elseif (isset($_REQUEST['registered_courses_delete']))
{
    include 'pages/manage_registered_courses.php';
}