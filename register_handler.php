<?php
require_once 'includes/config.php';
require_once 'includes/helpers.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = sanitizeInput($_POST['name']);
    $email = sanitizeInput($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = sanitizeInput($_POST['role']);

    $stmt = $conn->prepare("INSERT INTO users (name, email, password, role) VALUES (:name, :email, :password, :role)");
    $stmt->execute(['name' => $name, 'email' => $email, 'password' => $password, 'role' => $role]);

    redirect('../feature/login.php');
}
?>
