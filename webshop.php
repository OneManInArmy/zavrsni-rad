<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" href="slike/servislogo.png">
    <script src="scripts.ts"></script>
    <title>RTV-Servis Marušić Web Shop</title>
</head>
<body>
<?php
session_start();
include 'functions.php';
$conn=OpenCon();
?>
<div>
    <table class="selection">
        <tbody>
        <tr>
            <td style="width: 15%"><a href="index.php"><img src="slike/servislogo.png" alt="Servis logo" class="servislogo"></a></td>
            <td><a href="index.php">Početna</a></td>
            <td><a href="cjenik.php">Cjenik</a></td>
            <td style="background-color: lightgray;"><a href="webshop.php">Web Shop</a></td>
        </tr>
        </tbody>
    </table>
</div>
<div class="okvirshop">
    <div class="filters">
        <div class="trazilica">
            <h2>Traži po imenu</h2>
            <div class="search-container">
                <form method="post">
                        <input type="text" placeholder="Ime uređaja.." id="search" name="search">
                </form>
            </div>
        </div>
        <br>
        <div class="cijena">
            <form method="post">
                <h2>Traži po cijeni</h2>
                <p class="sidebyside">Od</p>
                <label for="mincijena"></label><input type="number" name="mincijena" id="mincijena" class="sidebyside">
                <p class="sidebyside">Do</p>
                <label for="maxcijena"></label><input type="number" name="maxcijena" id="maxcijena" class="sidebyside">
            </form>
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
                    <form method="post">
                        <input type="checkbox" id="' . $array[$x] . '" name="proizvodac[]" value="' . $array[$x] . '">
                        <label for="' . $array[$x] . '">' . $array[$x] . '</label><br>
                    </form>';
                echo $element;
            }
            ?>

        </div>
        <br>
        <div class="pretrazi">
            <form method="post" action="">
                <input type="submit" id="pretrazi" name="pretrazi" value="Pretraži">
            </form>
        </div>
        <?php
        $filters=0;
        if(array_key_exists('pretrazi',$_POST))
        {
            /*if(isset($_POST["search"])){
                $filters=1;
                $serime=$_POST["search"];
                echo $serime;
            }
            if(isset($_POST["mincijena"]))
            {
                $filters=1;
                $sermincijena=$_POST["mincijena"];
                echo $sermincijena;
            }
            if(isset($_POST["maxcijena"]))
            {
                $filters=1;
                $sermaxcijena=$_POST["maxcijena"];
                echo $sermaxcijena;
            }
            if(!empty($_POST['proizvodac'])) {
                foreach($_POST['proizvodac'] as $value){
                    echo "Prodavac : ".$value.'<br/>';}
            }*/
            $serime=$_POST['search'];
            header("location: webshop.php?ser='.$serime.'");
        }
        ?>

    </div>
    <div class="navig">
        <?php
        $navig = $conn->prepare("SELECT * FROM `proizvod` WHERE 1;");
        $navig->execute();
        $brojred = mysqli_num_rows($navig->get_result());
        $brojstr = ceil($brojred/9);
        $sadstr=1;
        if(isset($_SESSION['sadstr']))
            $sadstr = $_SESSION['sadstr'];
        ?>
        <form action="" method="post">
            <?php
            if (isset($_POST["navbutton"]))
            {
                if($_POST["navbutton"]=="<<-" && $sadstr!=1)
                {
                    $sadstr=$sadstr-1;
                    $_SESSION['sadstr'] = $sadstr;
                }
                else if($_POST["navbutton"]=="->>" && $sadstr!=$brojstr)
                {
                    $sadstr=$sadstr+1;
                    $_SESSION['sadstr'] = $sadstr;
                }
                else if($_POST["navbutton"]=="...")
                {
                    $sadstr=$sadstr;
                    $_SESSION['sadstr'] = $sadstr;
                }
                else
                {
                    if($_POST["navbutton"]=="<<-")
                    {
                        $sadstr=1;
                        $_SESSION['sadstr'] = $sadstr;
                    }
                    else if($_POST["navbutton"]=="->>")
                    {
                        $sadstr=$brojstr;
                        $_SESSION['sadstr'] = $sadstr;
                    }
                    else
                    {
                        $sadstr=$_POST["navbutton"];
                        $_SESSION['sadstr'] = $sadstr;
                    }
                }
            }
            ?>
            <input type="submit" name="navbutton" value="<<-">
            <input type="submit" name="navbutton" value="<?php
            if($sadstr==1)
            {
                echo "...";
            }
            else echo $sadstr-1;
            ?>">
            <input type="submit" name="navbutton" value="<?php echo $sadstr ?>">
            <input type="submit" name="navbutton" value="<?php
            if($sadstr==$brojstr)
            {
                echo "...";
            }
            else echo $sadstr+1 ?>">
            <input type="submit" name="navbutton" value="->>">
        </form>
    </div>
    <div class="okvirgrid">
        <?php
        $rangestart=($sadstr-1)*9;
        if($filters==0) {
            $stmt = $conn->prepare("SELECT * FROM `proizvod` WHERE 1 LIMIT $rangestart,9");
        }
        $stmt->execute();
        IspisGrid($stmt);
        ?>
    </div>
</div>
<?php
CloseCon($conn);
?>
</body>
</html>