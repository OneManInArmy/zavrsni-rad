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
function IspisGrid($stmt)
{
    $array = [];
    $x=1;
    foreach ($stmt->get_result() as $row)
    {
        $Ime= $row['Ime'];
        $Cijena= $row['Cijena'];
        $Opis= $row['Opis'];
        $Slika= $row['Slika'];
        echo
            '
            <div class="item'.$x.'">
                <div class="item">
                    <img src="'.$Slika.'" alt="Slika '.$x.'. uređaja">
                    <hr>
                    <h2>'.$Ime.'</h2>
                    <h2>'.$Cijena.' kn</h2>
                    <p>'.$Opis.'</p>
                </div>
            </div>
           ';
        $x++;
    }
}

?>