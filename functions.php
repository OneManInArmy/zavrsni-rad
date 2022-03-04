
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
function CookieDestroy(){
    setcookie("filters", "", time() - 3600, "/");
    setcookie("query", "", time() - 3600, "/");
}
?>
