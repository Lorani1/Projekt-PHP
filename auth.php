<?php
session_start();

// Check if the user is not logged in or user_a is not set
if (!isset($_SESSION['user_type'])) {
    redirectToLogin();
}

// Check if user_a is neither 1 nor 2
if ($_SESSION['user_type'] != 1 && $_SESSION['user_type'] != 2) {
    redirectToLogin();
}

function redirectToLogin() {
    header("Location: login.inc.php");
    exit();
}

function redirectToHome() {
    header("Location: Home_Signed.php");
    exit();
}

function redirectToAdminHome() {
    header("Location: adminhome.php");
    exit();
}
?>