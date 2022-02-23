
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
                        <a href="product.php?prod='.$Ime.'">
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
function MakeQuery(): string
{
    if(isset($_POST["search"])){
        $filters=1;
        $serime=$_POST["search"];
        if($serime==null)
        {
            $sql[] = " Ime LIKE '%' ";
        }
        else $sql[] = " Ime LIKE '$serime' ";
    }
    if(isset($_POST["mincijena"]))
    {
        $filters=1;
        $sermincijena=$_POST["mincijena"];
        if($sermincijena==null)
        {
            $sql[] = " Cijena BETWEEN 0 ";
        }
        else $sql[] = " Cijena BETWEEN $sermincijena ";
    }
    if(isset($_POST["maxcijena"]))
    {
        $filters=1;
        $sermaxcijena=$_POST["maxcijena"];
        if($sermaxcijena==null)
        {
            $sql[] = " 9999999999999999 ";
        }
        else $sql[] = " $sermaxcijena ";
    }
    if(!empty($_POST['proizvodac'])) {
        foreach($_POST['proizvodac'] as $value){
            $sqlpro[] = " '$value' ";}
    }
    if (!empty($sql)) {
        $query =null;
        if (empty($sqlpro)) {
            $sqlpro[] = " SELECT Proizvodac FROM proizvod ";
        }
        $query .= 'SELECT * FROM proizvod WHERE ' . implode(' AND ', $sql) . 'AND Proizvodac IN (' . implode(' , ',$sqlpro) . ')';
    }
    return $query;
}

?>
