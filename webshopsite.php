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
include 'webshop.php';
$conn=OpenCon();
?>
<div>
    <table class="selection">
        <tbody>
        <tr>
            <td onclick="pocetna()" style="width: 15%"><img src="slike/servislogo.png" alt="Servis logo" class="servislogo"></td>
            <td onclick="pocetna()">Početna</td>
            <td onclick="cjenik()">Cjenik</td>
            <td onclick="shop()" style="background-color: lightgray;">Web Shop</td>
        </tr>
        </tbody>
    </table>
</div>
<div class="okvirshop">
    <div class="filters">
        <div class="trazilica">
            <h2>Traži po imenu</h2>
            <div class="search-container">
                <form action="/action_page.php">
                    <label>
                        <input type="text" placeholder="Ime uređaja.." name="search">
                    </label>
                </form>
            </div>
        </div>
        <br>
        <div class="cijena">
            <form>
                <h2>Traži po cijeni</h2>
                <p class="sidebyside">Od</p>
                <label for="mincijena"></label><input type="number" id="mincijena" class="sidebyside">
                <p class="sidebyside">Do</p>
                <label for="maxcijena"></label><input type="number" id="maxcijena" class="sidebyside">
            </form>
        </div>
        <br>
        <div class="izborpro">
            <?php
            $stmt = $conn->prepare("SELECT DISTINCT Proizvođač FROM `uređaj` WHERE 1");
            $stmt->execute();
            $array = [];
            foreach ($stmt->get_result() as $row)
            {
                $array[] = $row['Proizvođač'];
            }
            $len=sizeof($array);
            for ($x = 0; $x < $len; $x++) {
                $element =
                    '
                        <input type="checkbox" id="' . $array[$x] . '" name="' . $array[$x] . '" value="' . $array[$x] . '">
                        <label for="">' . $array[$x] . '</label><br>
                        ';
                echo $element;
            }
            ?>

        </div>
        <br>
        <div class="pretrazi">
            <button type="submit">Pretraži</button>
        </div>

    </div>
    <div class="navig">
        <?php
        $stmt = $conn->prepare("SELECT * FROM `uređaj` WHERE 1;");
        $stmt->execute();
        $brojred = mysqli_num_rows($stmt->get_result());
        $brojstr = $brojred%9;
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
        if($sadstr==1) {
            $stmt = $conn->prepare("SELECT * FROM `uređaj` WHERE 1 LIMIT 9; ");
        }
        else
        {
            $rangestart=($sadstr-1)*9;
            $stmt = $conn->prepare("SELECT * FROM `uređaj` WHERE 1 LIMIT $rangestart,9");
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