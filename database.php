<?php
require_once 'action.php';

$servername = "localhost";
$username = "root";
$password = "";
$db = "input_form";

if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'student')
{
    $student = explode('=',$_SERVER['REQUEST_URI']);
    if (in_array('home', $student) || in_array('manage_student', $student) || in_array('edit_student&edit_student', $student) || in_array('course_registration', $student) || in_array('logout',$student) || in_array("manage_registered_courses", $student) || in_array("edit_registered_courses&edit_registered_courses", $student))
    {
        //
    }
    else
    {
//        die('Sorry, You cannot access to this page!');
        session_destroy();
        header("Location: action.php?page=login");
    }
}
$connect = new mysqli($servername, $username, $password, $db);