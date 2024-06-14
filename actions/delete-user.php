<?php

global $conn;

require(__DIR__ . "/../config/database.php");
require(__DIR__ . "/../constants/path.php");

$id = $_GET["id"];

$sql_delete = "DELETE FROM users WHERE id = '$id'";

$result = $conn->query($sql_delete);

if ($result === TRUE) {
    header("Location: " . BASE_URL . "/views/pages/admin/users/list-user.php");
}

