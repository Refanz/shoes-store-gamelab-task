<?php

global $conn;
require(__DIR__ . "/../../functions/functions.php");
require(__DIR__ . "/../../constants/path.php");

$sql = "SELECT * FROM shoes LIMIT 3";

$datas = getListShoesWithLimit(3);

$list_trending_shoes_sneakers = getShoesByTypeAndStatus("sneakers", "trending");

$list_trending_shoes_active = getShoesByTypeAndStatus("active", "trending");

$list_trending_shoes_sandals = getShoesByTypeAndStatus("sandals", "trending");


