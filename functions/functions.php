<?php

require(__DIR__ . "/../config/database.php");

function isUserLogin()
{
    return isset($_SESSION["user"]);
}

function getListShoesWithType($type)
{
    global $conn;

    $sql = "SELECT * FROM shoes WHERE type = '$type'";
    return $conn->query($sql)->fetch_all();
}

function getListShoesByName($search)
{
    global $conn;

    $sql_search = "SELECT * FROM shoes WHERE nama LIKE '%$search%'";
    return $conn->query($sql_search)->fetch_all();
}

function getAllShoes()
{
    global $conn;

    $sql = "SELECT * FROM shoes";
    return $conn->query($sql)->fetch_all();
}

function getShoesCount()
{
    global $conn;

    $sql = "SELECT * FROM shoes";
    return $conn->query($sql)->num_rows;
}

function getShoesByTypeAndStatus($type, $status)
{
    global $conn;

    $sql = "SELECT * FROM shoes WHERE type = '$type' AND status = '$status'";
    return $conn->query($sql)->fetch_all();
}

function getListShoesWithLimit($limit)
{
    global $conn;
    $sql = "SELECT * FROM shoes LIMIT $limit";

    return $conn->query($sql)->fetch_all();
}

function getReviewsUserWithLimit($limit)
{
    global $conn;
    $sql = "SELECT * FROM reviews LIMIT $limit";
    return $conn->query($sql)->fetch_all();
}
