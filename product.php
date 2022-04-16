<!DOCTYPE html>
<html lang="hr">
<?php
include 'functions.php';
$conn=OpenCon();
QueryDestroy();
?>
<head>
    <meta charset="utf8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styles.css">
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
            <td style="width: 15%"><a href="index.php"><img src="slike/servislogo.png" alt="Servis logo" class="servislogo"></a></td>
            <td><a href="index.php">Početna</a></td>
            <td><a href="cjenik.php">Cjenik</a></td>
            <td><a href="webshop.php?page=1">Web Shop</a></td>
        </tr>
        </tbody>
    </table>
</div>
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
        <img src="<?php echo "slike/$Slika"; ?>" alt=".$Ime.">
    </div>
    <div class='name'>
        <h1><?php echo $Ime; ?></h1>
    </div>
    <div class='shortdescription'>
        <p>Kratki opis:</p>
        <p><?php echo $Opis; ?></p>
    </div>
    <div class='longdescription'>
        <p>Dugi opis:</p><br>
        <p><?php echo $DugiOpis; ?></p>
    </div>
    <div class="number">
        <p>Raspoloživo: <?php echo $Broj; ?></p>
    </div>
    <div class='price'>
        <p>Cijena: <?php echo $Cijena; ?> kn</p>
    </div>
    <div class='contact'>
        <p>Kontakt: rtvmara@gmail.com</p>
    </div>
</div>

</body>
</html>