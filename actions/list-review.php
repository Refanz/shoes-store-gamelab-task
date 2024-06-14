<?php

global $conn;
require(__DIR__ . "/../config/database.php");

$sql = "SELECT * FROM reviews";

$result = $conn->query($sql);

$datas = $result->fetch_all();

if (isset($_POST["sort"])) {
    $select_sort = $_POST["select-sort"];

    $sort = "";

    if ($select_sort === "0") {
        $sort = "ASC";
    } else {
        $sort = "DESC";
    }

    $sql_order = "SELECT * FROM reviews ORDER BY rating $sort";
    $datas = $conn->query($sql_order)->fetch_all();
}
