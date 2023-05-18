<?php
// Initialize the session
session_start();

// Unset all of the session variables
$_SESSION = array();

// Destroy the session.
session_destroy();

// Redirect to login page
echo "<script>alert('You have Logged out successfully!')</script>";
echo "<script>window.open('../../index.php','_self')</script>";
// header("location: ../../index.php");
exit;
