<?php

global $conn;

require(__DIR__ . "/../config/database.php");
require(__DIR__ . "/../constants/path.php");

$data = "";

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $sql = "SELECT * FROM shoes WHERE id = '$id'";

    $result = $conn->query($sql);

    $data = $result->fetch_assoc();
}

if (isset($_POST["edit"])){
    $id = $_GET["id"];

    $nama_sepatu = $_POST["nama-sepatu"];
    $harga_sepatu = $_POST["harga-sepatu"];
    $img_now = $_POST["img-sepatu"];


    if (!empty($_FILES["foto-sepatu"])) {
        $img_update_name = $_FILES["foto-sepatu"]["name"];
        $img_update_tmp = $_FILES["foto-sepatu"]["tmp_name"];

        $baseImgDir = "/assets/uploads/";
        $targetDir = __DIR__ . "/.." . $baseImgDir;
        $targetFilePath = $targetDir . basename($img_update_name);

        $img_update_url = $baseImgDir . basename($img_update_name);

        $img_now_path = __DIR__ . "/../" . $img_now;

        if (move_uploaded_file($img_update_tmp, $targetFilePath)) {

            if (file_exists($img_now_path)) {
                unlink($img_now_path);
            }

            $sql_edit = "UPDATE shoes SET nama = '$nama_sepatu', harga = '$harga_sepatu', img = '$img_update_url' WHERE id = '$id'";
            $result_edit = $conn->query($sql_edit);

            if ($result_edit === TRUE) {
                header("Location: " . BASE_URL . "/views/pages/admin/product-shoes/list-shoes.php");
            }
        }
    }
}

