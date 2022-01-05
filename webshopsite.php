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
<?php
include 'webshop.php';
$conn = OpenCon();
$sql = "SELECT * FROM `uređaj` WHERE 1";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    $Ime=$row["Ime"];
    $Slika=$row["Slika"];
    $Cijena=$row["Cijena"];
    $Opis=$row["Opis"];
    }
} else {
    echo "<script>alert('Nešto je krivo sa bazom podataka!')</script>";
}
CloseCon($conn);
?>
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
                <input type="number" id="mincijena" class="sidebyside">
                <p class="sidebyside">Do</p>
                <input type="number" id="maxcijena" class="sidebyside">
            </form>
        </div>
        <br>
        <div class="izborpro">
            <?php
            $conn = OpenCon();
            $stmt = $conn->prepare("SELECT * FROM `uređaj` WHERE 1");
            $stmt->execute();
            $array = [];
            foreach ($stmt->get_result() as $row)
            {
                $array[] = $row['Proizvodac'];
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
            CloseCon($conn);
            ?>

        </div>
        <br>
        <div class="pretrazi">
            <button type="submit">Pretraži</button>
        </div>

    </div>
    <div class="navig">

    </div>
    <div class="okvirgrid">
        <div class="item1">
            <div class="item">
                <img src="<?php echo $Slika ?>" alt="Slika 1. uređaja">
                <h2><?php echo $Ime ?></h2>
                <h2><?php echo $Cijena ?></h2>
                <p><?php echo $Opis ?></p>
            </div>
        </div>
        <div class="item2">
            <div class="item">
                <img src="<?php echo $Slika ?>" alt="Slika 1. uređaja">
                <h2><?php echo $Ime ?></h2>
                <h2><?php echo $Cijena ?></h2>
                <p><?php echo $Opis ?></p>
            </div>
        </div>
        <div class="item3">
            <div class="item">
                <img src="<?php echo $Slika ?>" alt="Slika 1. uređaja">
                <h2><?php echo $Ime ?></h2>
                <h2><?php echo $Cijena ?></h2>
                <p><?php echo $Opis ?></p>
            </div>
        </div>
        <div class="item4">
            <div class="item">
                <img src="<?php echo $Slika ?>" alt="Slika 1. uređaja">
                <h2><?php echo $Ime ?></h2>
                <h2><?php echo $Cijena ?></h2>
                <p><?php echo $Opis ?></p>
            </div>
        </div>
        <div class="item5">
            <div class="item">
                <img src="<?php echo $Slika ?>" alt="Slika 1. uređaja">
                <h2><?php echo $Ime ?></h2>
                <h2><?php echo $Cijena ?></h2>
                <p><?php echo $Opis ?></p>
            </div>
        </div>
        <div class="item6">
            <div class="item">
                <img src="<?php echo $Slika ?>" alt="Slika 1. uređaja">
                <h2><?php echo $Ime ?></h2>
                <h2><?php echo $Cijena ?></h2>
                <p><?php echo $Opis ?></p>
            </div>
        </div>
        <div class="item7">
            <div class="item">
                <img src="<?php echo $Slika ?>" alt="Slika 1. uređaja">
                <h2><?php echo $Ime ?></h2>
                <h2><?php echo $Cijena ?></h2>
                <p><?php echo $Opis ?></p>
            </div>
        </div>
        <div class="item8">
            <div class="item">
                <img src="<?php echo $Slika ?>" alt="Slika 1. uređaja">
                <h2><?php echo $Ime ?></h2>
                <h2><?php echo $Cijena ?></h2>
                <p><?php echo $Opis ?></p>
            </div>
        </div>
        <div class="item9">
            <div class="item">
                <img src="<?php echo $Slika ?>" alt="Slika 1. uređaja">
                <h2><?php echo $Ime ?></h2>
                <h2><?php echo $Cijena ?></h2>
                <p><?php echo $Opis ?></p>
            </div>
        </div>
    </div>
</div>
</body>
</html>