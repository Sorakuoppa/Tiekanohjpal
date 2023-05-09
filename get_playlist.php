<?php

require "dbconnection.php";
$dbcon = createDbConnection();

$playlist_id = 1;
$sql = "SELECT tracks.Name, tracks.Composer FROM tracks
INNER JOIN playlist_track ON tracks.TrackId = playlist_track.TrackId
WHERE playlist_track.PlaylistId = $playlist_id";

$statement = $dbcon->prepare($sql);
$statement->execute();

while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
    echo "- ". $row["Name"]."<br>". $row["Composer"]. "<br><br>";
};
