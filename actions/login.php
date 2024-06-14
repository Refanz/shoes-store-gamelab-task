<?php

session_start();

require(__DIR__ . "/../config/database.php");

$status = true;
$messages = "";

if (isset($_POST["submit"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['user'] = [
            "email" => $email,
            "name" => $result->fetch_assoc()["nama"],
        ];

        header("Location: index.php");
    } else {
        $status = false;
        $messages = "Email/password salah!";
    }
}

$conn->close();



