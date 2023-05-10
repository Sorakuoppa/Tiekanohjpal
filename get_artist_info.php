<?php

require "dbconnection.php";
$dbcon = createDbConnection();

$artistId = 1;
$sql = "SELECT Name FROM artists WHERE ArtistId = ?";

$statement = $dbcon->prepare($sql);
$statement->execute([$artistId]);
$artist1 = $statement-> fetchAll(PDO::FETCH_ASSOC);

$sql = "SELECT albums.Title AS album_title, tracks.Name as track_name
FROM albums JOIN tracks ON tracks.AlbumId = albums.AlbumId
WHERE albums.ArtistId = ?
ORDER BY albums.Title;
";

$statement = $dbcon->prepare($sql);
$statement->execute([$artistId]);
$artist2 = $statement-> fetchAll(PDO::FETCH_ASSOC);

$result = array(
    "artist" => $artist1,
    "album" => $artist2
);

echo json_encode($result);