
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
                        <a href="product.php?hello=true">
                            <img src="'.$Slika.'" alt="Slika '.$x.'. uređaja">
                        </a>
                        <hr>
                        <a href="product.php?prod='.$Ime.'">
                            <h2>'.$Ime.'</h2>
                            <h2>'.$Cijena.' kn</h2>
                            <p>'.$Opis.'</p>
                        </a>
                    </div>
            </div>
           ';
        $x++;
    }
}

function IspisProduct($Ime, $Cijena, $Opis, $Slika)
{
    echo
    "
    <div>
        <img src=".$Slika." alt=".$Ime.">
        <h1>$Ime</h1>
        <p>$Cijena</p>
        <p>$Opis</p>
        
    </div>
    ";
}

?>