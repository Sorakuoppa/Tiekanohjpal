<?php

require "dbconnection.php";
$dbcon = createDbConnection();

$playlist_id = 1;
$sql = "SELECT PlaylistId, TrackId, Name, Composer FROM playlists, playlist_track, tracks
WHERE PlaylistId.playlists = PlaylistId.playlist_track AND TrackId.playlist_track = TrackId.tracks
AND PlaylistId = $playlist_id";

$statement = $dbcon->prepare($sql);
$statement->execute();

/* Haetaan tulosrivit vain assosiatiivisina tauluina */
$songs = $statement->fetchAll(PDO::FETCH_ASSOC);

foreach ($songs as $song) {
    echo $song["Name"]."<br> (".$song["Composer"]. ")<br>";
};
