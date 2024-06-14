<?php

global $conn;
require(__DIR__ . "/../config/database.php");

$sql = "SELECT * FROM users";

$result = $conn->query($sql);

$datas = $result->fetch_all();





