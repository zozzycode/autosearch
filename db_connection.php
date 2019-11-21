<?php

function OpenConection () {
    // local
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "autosearch";

    $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname) or die("Connect failed: %s\n". $conn -> error);
    mysqli_set_charset( $conn, 'utf8');
    // echo "Connected Successfully\n";
    return $conn;
}

function CloseConnection($conn) {
    // echo "Connection closed\n";
    $conn -> close();
}
