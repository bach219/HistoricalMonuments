<?php

error_reporting(1);

$host = "localhost";
$user = "root";
$pass = "";
$db = "historical_monuments";

$link = mysqli_connect($host, $user, $pass, $db);
if (!$link)
    echo "\n\n Error: " . mysqli_error($link);

function db_q($sql) {
    global $link, $db;

    mysqli_set_charset($link, 'utf8');
    mysqli_select_db($link, $db);

    $q = mysqli_query($link, $sql);

    if ($q === true)
        return null;

    $result = array();
    while ($row = mysqli_fetch_array($q)) {
        $result[] = $row;
    }

    return $result;
}

function db_row($sql) {
    global $link;

    $table = db_q($sql);

    if (!is_array($table) || empty($table))
        return NULL;
    return $table[0];
}

function db_one($sql) {
    $row = db_row($sql);
    return $row[0];
}

function db_escape($str) {
    global $link;

    if ($link)
        return mysqli_real_escape_string($link, $str);


    return $str;
}

?>