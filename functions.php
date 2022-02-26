
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
    $conn -> close();
}
function IspisGrid($stmt)
{
    $x=1;
    foreach ($stmt->get_result() as $row) {
        $Ime = $row['Ime'];
        $Cijena = $row['Cijena'];
        $Opis = $row['Opis'];
        $Slika = $row['Slika'];
        echo
            '
            <div class="item' . $x . '">
                    <div class="item">
                        <a href="product.php?prod=' . $Ime . '">
                            <img src="' . $Slika . '" alt="Slika ' . $x . '. uređaja">
                        </a>
                        <hr>
                        <a href="product.php?prod=' . $Ime . '">
                            <h2>' . $Ime . '</h2>
                            <h2>' . $Cijena . ' kn</h2>
                            <p>' . $Opis . '</p>
                        </a>
                    </div>
            </div>
           ';
        $x++;
    }

        /*$broj=0;
        foreach ($stmt->get_result() as $row) {
            $Ime[]= $row['Ime'];
            $Cijena[]= $row['Cijena'];
            $Opis[]= $row['Opis'];
            $Slika[]= $row['Slika'];
            $broj++;
        }
        $x=1;
        for($y=(($page-1)*9);$y<($page*9);$y++){
            echo '
            <div class="item'.$x.'">
                    <div class="item">
                        <a href="product.php?prod='.$Ime[$y].'">
                            <img src="'.$Slika[$y].'" alt="Slika '.$x.'. uređaja">
                        </a>
                        <hr>
                        <a href="product.php?prod='.$Ime[$y].'">
                            <h2>'.$Ime[$y].'</h2>
                            <h2>'.$Cijena[$y].' kn</h2>
                            <p>'.$Opis[$y].'</p>
                        </a>
                    </div>
            </div>
           ';
            $x++;
        }*/
}

function CookieDestroy(){
    setcookie("filters", "", time() - 3600, "/");
    setcookie("query", "", time() - 3600, "/");
}
?>
