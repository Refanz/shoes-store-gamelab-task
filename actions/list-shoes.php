<?php

$datas = getAllShoes();
$shoes_count = getShoesCount();

if (isset($_POST["search"])) {
    $search_shoes = $_POST["search-sepatu"];
    $datas = getListShoesByName($search_shoes);
}

if (isset($_POST["search-type"])) {
    $shoes_type = $_POST["shoes-type"];

    if ($shoes_type === "all") {
        $datas = getAllShoes();
    } else {
        $datas = getListShoesWithType($shoes_type);
    }
}







