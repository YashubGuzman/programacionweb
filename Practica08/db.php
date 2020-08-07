<?php

function getPDO() {
    $host = DB_SERVER;
    $dbname = DB_DATABASE;
    $port = DB_PORT;
    $connStr =  "mysql:host={$host};dbname={$dbname};port={$port}";
    $dbOpt = array(
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"
    );
    return new PDO($connStr, DB_USER, DB_PASSWORD, $dbOpt);
}
