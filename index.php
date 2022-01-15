<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" href="slike/servislogo.png">
    <script src="scripts.ts"></script>
    <title>RTV-Servis Marušić</title>
</head>
<body>
<?php
include 'functions.php';
$conn=OpenCon();
?>
<div>
    <table class="selection">
        <tbody>
        <tr>
            <td style="width: 15%"><a href="index.php"><img src="slike/servislogo.png" alt="Servis logo" class="servislogo"></a></td>
            <td style="background-color: lightgray;"><a href="index.php">Početna</a></td>
            <td><a href="cjenik.php">Cjenik</a></td>
            <td><a href="webshopsite.php">Web Shop</a></td>
        </tr>
        </tbody>
    </table>
</div>
    <div class="slideshow">
        <img src="slike/boselogo.png" alt="Bose logo" class="slideimg boselogo">
        <img src="slike/pioneerlogo.png" alt="Pioneer logo" class="slideimg pioneerlogo">
        <img src="slike/yamahalogo.png" alt="Yamaha logo" class="slideimg yamahalogo">
        <img src="slike/clarionlogo.png" alt="Clarion logo" class="slideimg clarionlogo">
        <img src="slike/numarklogo.png" alt="Numark logo" class="slideimg numarklogo">
    </div>
    <script>
        vrti();
    </script>
    <div class="maincontainer">
        <div class="content">
            <div class="maincontent">
                <h1>Servis digitalnih uređaja</h1>
                <p>Ovaj servis nudi usluge popravljanja, prikupljanja i prodaje digitalnih uređaja.</p>
                <p>Radno vrijeme: 09h - 17h</p>
            </div>
            <div class="content1">
                <h2>Kontakt</h2>
                <p>E-mail: randomgmail@gmail.com</p>
                <p>Mobitel: 0923567833</p>
                <p>Fax: 8139588256</p>
            </div>
            <div class="content2">
                <h2>Adresa</h2>
                <p>Ul. Vladimira Vidrića 12</p>
                <p>1000 Zagreb, Hrvatska</p>
            </div>
        </div>
    </div>
<?php
CloseCon($conn);
?>
</body>
</html>