<?php

global $conn;

require(__DIR__ . "/../config/database.php");
require(__DIR__ . "/../constants/path.php");

if (isset($_POST["submit"])) {
   $nama = $_POST["nama-user"];
   $email = $_POST["email"];
   $password = $_POST["password"];
   $role = $_POST["role"];

   $sql = "INSERT INTO users (nama, email, password, role) VALUES ('$nama', '$email', '$password', '$role')";
   $result = $conn->query($sql);

   if ($result === TRUE) {
       header("Location: " . BASE_URL . "/views/pages/admin/users/list-user.php");
   }
}

$conn->close();