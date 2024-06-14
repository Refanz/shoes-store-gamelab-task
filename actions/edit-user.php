<?php

global $conn;

require(__DIR__ . "/../config/database.php");
require(__DIR__ . "/../constants/path.php");

$data = "";

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $sql = "SELECT * FROM users WHERE id = '$id'";

    $result = $conn->query($sql);

    $data = $result->fetch_assoc();
}

if (isset($_POST["edit"])) {
    $id = $_GET["id"];
    $nama = $_POST["nama-user"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $role = $_POST["role"];


    $sql_edit = "UPDATE users SET nama = '$nama', email = '$email', password = '$password', role = '$role' WHERE id = '$id'";

    $result_edit = $conn->query($sql_edit);

    if ($result_edit === TRUE) {
        header("Location: " . BASE_URL . "/views/pages/admin/users/list-user.php");
    }
}

