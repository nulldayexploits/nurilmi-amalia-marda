<?php

/*
 * Koneksi database hanya dapat menggunakan mysqli
 *
*/

include_once __DIR__."/../admin/config/connect-db.php";
#include '../admin/connect-db.php';

$database = [
    'hostname' => $databaseHost,
    'username' => $databaseUsername,
    'password' => $databasePassword,
    'database' => $databaseName,
    'port'     => $databasePort
];