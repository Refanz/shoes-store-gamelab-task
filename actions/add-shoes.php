<?php

global $conn;

require(__DIR__ . "/../config/database.php");

if (isset($_POST["submit"])) {
    $namaSepatu = $_POST["nama-sepatu"];
    $hargaSepatu = $_POST["harga-sepatu"];

    $namaFoto = $_FILES["foto-sepatu"]["name"];
    $namaFotoTemp = $_FILES["foto-sepatu"]["tmp_name"];


    $baseImgDir = "/assets/uploads/";
    $targetDir = __DIR__ . "/.." . $baseImgDir;
    $targetFilePath = $targetDir . basename($namaFoto);

    if (!is_dir($targetDir)) {
        mkdir($targetDir);
    }

    if (move_uploaded_file($namaFotoTemp, $targetFilePath)) {

        $imgUrl = $baseImgDir . basename($namaFoto);

        $sql = "INSERT INTO shoes (nama, harga, img) VALUES ('$namaSepatu', '$hargaSepatu', '$imgUrl')";

        $result = $conn->query($sql);

        if ($result === TRUE) {
            echo "Berhasil menambahkan data sepatu";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "404";
    }
}

$conn->close();