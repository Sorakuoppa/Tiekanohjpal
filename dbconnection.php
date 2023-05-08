<?php
/* Tällä voi aina muodostaa sitten yhteyden mihin tahansa projektiin. */
function createDbConnection() {
    $ini = parse_ini_file("mycon.ini");

    $host = $ini["host"];
    $db = $ini["db"];
    $username = $ini["username"];
    $pw = $ini["pw"];

    try{
        $dbcon = new PDO("mysql:host=$host;dbname=$db", $username, $pw);
        return $dbcon;
    } catch( PDOException $e) {
        echo $e ->getMessage();
    }
    return null;
}