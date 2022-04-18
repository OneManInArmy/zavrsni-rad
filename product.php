<!DOCTYPE html>
<html lang="hr">
<?php
include 'functions.php';
$conn=OpenCon();
QueryDestroy();
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Akshar:wght@500&family=Arimo:wght@600&family=Bebas+Neue&family=Noto+Sans:wght@500&family=Oswald&family=Oxygen&family=Poppins&display=swap" rel="stylesheet">
    <link rel="icon" href="slike/servislogo.png">
    <script src="scripts.ts"></script>
    <title><?php $ime =$_GET['prod'];
        echo $ime; ?></title>
</head>
<body>
<div>
    <table class="selection">
        <tbody>
        <tr>
            <td><a href="index.php">Početna</a></td>
            <td><a href="cjenik.php">Cjenik</a></td>
            <td><a href="webshop.php?page=1">Web Shop</a></td>
        </tr>
        </tbody>
    </table>
</div>
<div class="spacer" style="background-image: url('slike/Website Images/productselection.svg')"></div>
<div class="back">
    <a onclick="PreviousPage()"><span>&#8592;</span>Nazad</a>
</div>
<script>
    function PreviousPage()
    {
        window.history.back();
    }
</script>
<div id="zafunkciju" class="prodbox">
    <?php

        $stmt = mysqli_query($conn, "SELECT * FROM `proizvod` WHERE Ime = '$ime';");
        foreach ($stmt as $row) {
            $Ime = $row['Ime'];
            $Cijena = $row['Cijena'];
            $Opis = $row['Opis'];
            $DugiOpis = $row['DugiOpis'];
            $Slika = $row['Slika'];
            $Broj = $row["Broj"];
        }
    ?>
    <div class='picture'>
        <img src="<?php echo "slike/$Slika"; ?>" alt="<?php echo $Ime; ?>">
    </div>
    <div class='name'>
        <h1><?php echo $Ime; ?></h1>
    </div>
    <div class='shortdescription'>
        <p>Kratki opis:</p>
        <p><?php echo $Opis; ?></p>
    </div>
    <div class='longdescription'>
        <label for="longdescription">Dugi Opis:</label>
        <br>
        <textarea name="longdescription" id="longdescription" wrap="hard" readonly style="resize: none;"><?php echo $DugiOpis; ?></textarea>
    </div>
    <div class="number">
        <p>Raspoloživo: <?php echo $Broj; ?></p>
    </div>
    <div class='price'>
        <p>Cijena: <?php echo $Cijena; ?> kn</p>
    </div>
    <div class='contact'>
        <p>Kontakt: radnommail@gmail.com</p>
    </div>
</div>
<div class="spacer" style="background-image: url('slike/Website Images/productfooter.svg')"></div>
<footer class="footer">
    <br>
    <br>
    <br>
    <br>
    <br>
</footer>
</body>
</html>