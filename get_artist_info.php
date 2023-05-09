<?php

require "dbconnection.php";
$dbcon = createDbConnection();

$artistId = "";
$sql = "SELECT Name FROM artists WHERE ArtistId = $artistId";

$statement = $dbcon->prepare($sql);
$statement->execute([$artistId]);
$artist = $statement-> fetchAll(PDO::FETCH_ASSOC);

$sql = "SELECT albums.Title AS album_title, tracks.Name as track_name
FROM albums JOIN tracks ON tracks.AlbumId = albums.AlbumId
WHERE albums.ArtistId = $artistId
ORDER BY albums.Title;
";
$statement = $dbcon->prepare($sql);
$statement->execute([$artistId]);
$artist = $statement-> fetchAll(PDO::FETCH_ASSOC);

$list = array(
    "artist" => $artist["Name"],
    "albums" => array()
);
$current_album = null;
foreach($albums as $album ){
    if($current_album !== $album["album_title"]){
        $result
    }
};