<?php

global $conn;
require(__DIR__ . "/../config/database.php");

$sql = "SELECT * FROM shoes";

$result = $conn->query($sql);

$datas = $result->fetch_all();





