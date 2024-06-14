<?php

global $conn;

require(__DIR__ . "/../config/database.php");

$nama = $_POST["nama"];
$pekerjaan = $_POST["pekerjaan"];
$pesan = $_POST["pesan"];
$rating = $_POST["rating"];

$sql = "INSERT INTO reviews (nama, pekerjaan, pesan, rating) VALUES '$nama', '$pekerjaan', '$pesan', '$rating')";
$result = $conn->query($sql);

if ($result === TRUE) {

}
