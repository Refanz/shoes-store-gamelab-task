<?php

function isUserLogin()
{
    return isset($_SESSION["user"]);
}

function getUserLogin()
{
    return $_SESSION["user"];
}
