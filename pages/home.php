<?php

if (!isset($_SESSION['email']))
{
    header('Location: action.php?page=login');
}
include 'includes/header.php';
?>

<h3>Welcome to Student Management System!</h3>

<?php
include 'includes/footer.php';
?>
