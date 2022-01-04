<?php
function OpenCon()
{
    $dbhost = "localhost";
    $dbuser = "Leo";
    $dbpass = ".Nhc{Y[\/8y5;j\%TKjB";
    $db = "rtv-servis marušić shop";
    $conn = new mysqli($dbhost, $dbuser, $dbpass,$db)
    or die("Connect failed: %s\n". $conn -> error);

    return $conn;
}

function CloseCon($conn)
{
    $conn -> close();
}
?>