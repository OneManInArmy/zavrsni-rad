<?php
function OpenCon()
{
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = ".Nhc{Y[\/8y5;j\%TKjB";
    $db = "ServisMarusic";
    $conn = new mysqli($dbhost, $dbuser, $dbpass,$db)
    or die("Connect failed: %s\n". $conn -> error);

    return $conn;
}

function CloseCon($conn)
{
    $conn->close();
}
function QueryDestroy(){
    session_start();
    unset($_SESSION["filters"]);
    unset($_SESSION["query"]);
}
?>