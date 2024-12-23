<?php
session_start();

function isLoggedIn() {
    return isset($_SESSION['user']);
}

function isAdmin() {
    return isLoggedIn() && $_SESSION['user']['role'] === 'admin';
}

function isDonatur() {
    return isLoggedIn() && $_SESSION['user']['role'] === 'donatur';
}

function isBeneficiary() {
    return isLoggedIn() && $_SESSION['user']['role'] === 'beneficiary';
}

function requireLogin() {
    if (!isLoggedIn()) {
        header('Location: ../feature/login.php');
        exit();
    }
}

function requireAdmin() {
    if (!isAdmin()) {
        header('Location: index.php');
        exit();
    }
}
?>
