<?php

global $conn;

require(__DIR__ . "/../config/database.php");
require(__DIR__ . "/../constants/path.php");

$id = $_GET["id"];

$sql_select = "SELECT img FROM shoes WHERE id = '$id'";
$result_select = $conn->query($sql_select);

if ($result_select->num_rows > 0) {
    $data = $result_select->fetch_assoc();
    $img_shoes = $data["img"];

    $sql_delete = "DELETE FROM shoes WHERE id = '$id'";

    $img_path = __DIR__ . "/../" . $img_shoes;

    if ($conn->query($sql_delete) === TRUE) {
        $img_path = BASE_URL . $img_shoes;

        if (file_exists($img_path)) {
            unlink($img_path);
        }

        header("Location: " . BASE_URL . "/views/pages/admin/product-shoes/list-shoes.php");
    }
}

