<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="utf8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" href="slike/servislogo.png">
    <script src="scripts.ts"></script>
    <title>Adminshop</title>
</head>
<body>
<div>
    <table class="selection">
        <tbody>
        <tr>
            <td style="width: 15%"><a href="index.php"><img src="slike/servislogo.png" alt="Servis logo" class="servislogo"></a></td>
            <td><a href="index.php">Početna</a></td>
            <td><a href="cjenik.php">Cjenik</a></td>
            <td><a href="webshop.php">Web Shop</a></td>
        </tr>
        </tbody>
    </table>
</div>
<?php
include 'functions.php';
$conn=OpenCon();
$page = $_GET["page"];
?>
<div class="okvirshop">
    <div class="filters">
        <form method="post" action="">
            <div class="trazilica">
                <h2>Traži po imenu</h2>
                <div class="search-container">
                    <label for="search"></label><input type="text" placeholder="Ime uređaja..." id="search" name="search">
                </div>
            </div>
            <br>
            <div class="cijena">
                <h2>Traži po cijeni</h2>
                <p class="sidebyside">Od</p>
                <label for="mincijena"></label><input type="number" min="0" name="mincijena" id="mincijena" class="sidebyside">
                <p class="sidebyside">Do</p>
                <label for="maxcijena"></label><input type="number" min="0" name="maxcijena" id="maxcijena" class="sidebyside">
            </div>
            <br>
            <div class="izborpro">
                <?php
                $prod = $conn->prepare("SELECT DISTINCT Proizvodac FROM `proizvod` WHERE 1");
                $prod->execute();
                $array = [];
                foreach ($prod->get_result() as $row)
                {
                    $array[] = $row['Proizvodac'];
                }
                $len=sizeof($array);
                for ($x = 0; $x < $len; $x++) {
                    $element =
                        '
                            <input type="checkbox" id="' . $array[$x] . '" name="proizvodac[]" value="' . $array[$x] . '" >
                            <label for="' . $array[$x] . '">' . $array[$x] . '</label><br>
                        ';
                    echo $element;
                }
                ?>
            </div>
            <br>
            <div class="pretrazi">
                <input type="submit" id="pretrazi" name="pretrazi" value="Pretraži">
            </div>
        </form>
        <?php
        if(isset($_POST["pretrazi"])) {
            setcookie("filters", "1", time() + (86400 * 30), "/");
            if(isset($_POST["search"])){
                $serime=$_POST["search"];
                if($serime==null) {
                    $sql[] = " Ime LIKE '%' ";
                }
                else {
                    $_COOKIE["filters"]=1;
                    $sql[] = " Ime LIKE '%$serime%' ";
                }
            }
            if(isset($_POST["mincijena"])) {
                $sermincijena=$_POST["mincijena"];
                if($sermincijena==null)
                {
                    $sql[] = " Cijena BETWEEN 0 ";
                }
                else {
                    $_COOKIE["filters"]=1;
                    $sql[] = " Cijena BETWEEN $sermincijena ";
                }
            }
            if(isset($_POST["maxcijena"])) {
                $sermaxcijena=$_POST["maxcijena"];
                if($sermaxcijena==null)
                {
                    $sql[] = " 9999999999999999 ";
                }
                else {
                    $_COOKIE["filters"]=1;
                    $sql[] = " $sermaxcijena ";
                }
            }
            if(!empty($_POST['proizvodac'])) {
                $_COOKIE["filters"]=1;
                foreach($_POST['proizvodac'] as $value){
                    $sqlpro[] = " '$value' ";
                }
            }
            if (!empty($sql)) {
                if (empty($sqlpro)) {
                    $sqlpro[] = " SELECT Proizvodac FROM proizvod ";
                }
                $query = 'SELECT * FROM proizvod WHERE ' . implode(' AND ', $sql) . 'AND Proizvodac IN (' . implode(' , ',$sqlpro) . ')' . ' ORDER BY ID';
                setcookie("query", $query, time() + (86400 * 30), "/");
            }
            header("location: adminshop.php?page=1");
        }
        ?>
    </div>
    <div class="navig">
        <?php
        if(empty($page) || $page <= 0)
        {
            header("location: adminshop.php?page=1");
        }
        if($_COOKIE["filters"]==1){
            $query=$_COOKIE["query"];
        }
        else{
            $query="SELECT * FROM proizvod WHERE 1";
        }

        $broj = $conn->prepare($query);
        $broj->execute();
        $brojred = mysqli_num_rows($broj->get_result());
        $brojstr = ceil($brojred/9);

        $rangestart=($page-1)*9;
        $query = $query . ' LIMIT '.$rangestart.' , 9 ';
        $stmt = $conn->prepare($query);
        $stmt->execute();


        ?>
        <script>
            function PageMinus(){
                if(<?php echo $page; ?>-1 > 0){
                    window.location="adminshop.php?page=<?php echo $page-1; ?>";
                }
            }
            function PagePlus(){
                if(<?php echo $page ?>+1 <= <?php echo $brojstr; ?>){
                    window.location="adminshop.php?page=<?php echo $page+1; ?>"
                }
            }
        </script>
        <form action="" method="post">
            <input type="button" value="<?php if($page-1<=0){echo '...';}
            else echo $page-1; ?>" name="strminus" onclick="PageMinus()">
            <input type="button" value="<?php echo $page ?>" name="trenstr">
            <input type="button" value="<?php if($page+1>$brojstr){echo '...';}
            else echo $page+1 ?>" name="strplus" onclick="PagePlus()">
        </form>
    </div>
    <div class="okvirgrid">
        <?php
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
                        <div class="prodimg">
                            <a href="product.php?prod=' . $Ime . '">
                                <img src="slike/' . $Slika . '" alt="Slika ' . $x . '. uređaja">
                            </a>
                        </div>    
                        <div class="prodtext">
                            <a href="product.php?prod=' . $Ime . '">
                                <h2>' . $Ime . '</h2>
                                <h2>' . $Cijena . ' kn</h2>
                                <p>' . $Opis . '</p>
                            </a>
                        </div>
                        <div class="prodbutton">
                            <a href="prodchange.php?prod=' . $Ime . '"><button>Izmjeni</button></a>
                            <form method="post" action="delete.php?prod=' . $Ime . '&page='.$page.'">
                                <button name="izbrisi">Izbriši</button>
                            </form>
                        </div>
                    </div>
            </div>

           ';
        $x++;
        }
        ?>
    </div>
</div>

</body>
</html>