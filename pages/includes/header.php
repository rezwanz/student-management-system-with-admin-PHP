<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student Management System</title>
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="assets/css/all.min.css">
    <link rel="stylesheet" href="assets/css/toastr.min.css">
</head>
<body>

<?php
if(isset($_SESSION['email']))
{
?>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow">
        <div class="container">
            <a href="action.php?page=home" class="navbar-brand">Logo</a>
            <?php
            if ($_SESSION['user_type'] == 'student')
            {
                ?>
                <div class="collapse navbar-collapse" id="Menu">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a href="action.php?page=home" class="nav-link">Home</a></li>
                    <li class="nav-item dropdown">
                        <a href="" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Student Portal</a>
                        <ul class="dropdown-menu">
<!--                            <li><a href="action.php?page=add_student" class="dropdown-item">Student Registration</a></li>-->
                            <li><a href="action.php?page=manage_student" class="dropdown-item">Student Dashboard</a></li>
                            <li><a href="action.php?page=course_registration" class="dropdown-item">Course Registration</a></li>
                            <li><a href="action.php?page=manage_registered_courses" class="dropdown-item">Manage Registered Courses</a></li>
                        </ul>
                    </li>
                    <li><a href="action.php?page=logout" class="nav-link">Logout</a></li>
                </ul>
                </div>
            <?php }
            else { ?>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#Menu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="Menu">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a href="action.php?page=home" class="nav-link">Home</a></li>
                    <li class="nav-item dropdown">
                        <a href="" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Student Portal</a>
                        <ul class="dropdown-menu">
                            <li><a href="action.php?page=add_student" class="dropdown-item">Student Registration</a></li>
                            <li><a href="action.php?page=manage_student" class="dropdown-item">Student Dashboard</a></li>
                            <li><a href="action.php?page=course_registration" class="dropdown-item">Course Registration</a></li>
                            <li><a href="action.php?page=manage_registered_courses" class="dropdown-item">Manage Registered Courses</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Department</a>
                        <ul class="dropdown-menu">
                            <li><a href="action.php?page=add_department" class="dropdown-item">Add Department</a></li>
                            <li><a href="action.php?page=manage_department" class="dropdown-item">Manage Department</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Courses</a>
                        <ul class="dropdown-menu">
                            <li><a href="action.php?page=add_course" class="dropdown-item">Add Courses</a></li>
                            <li><a href="action.php?page=manage_course" class="dropdown-item">Manage Courses</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Users</a>
                        <ul class="dropdown-menu">
                            <li><a href="action.php?page=add_user" class="dropdown-item">Add User</a></li>
                            <li><a href="action.php?page=manage_user" class="dropdown-item">Manage User</a></li>
                        </ul>
                    </li>
                    <li><a href="action.php?page=logout" class="nav-link">Logout</a></li>
                </ul>
            </div>
           <?php } ?>
        </div>
    </nav>

<?php } ?>