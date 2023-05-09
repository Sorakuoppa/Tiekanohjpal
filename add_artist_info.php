<?php

require "dbconnection.php";
$dbcon = createDbConnection();

$body = file_get_contents('php://input');
$data = json_decode($body);

$artistId = strip_tags($data->ArtistId);
$name = strip_tags($data->Name);

$sql = "INSERT INTO artists (ArtistId, Name)
VALUES (?,?)";

$statement = $dbcon->prepare($sql);

foreach ($data as $artist) {
    $statement->execute(array(
        $artist-> ArtistId,
        $artist->Name
    ));
}