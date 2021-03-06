<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Akshar:wght@500&family=Arimo:wght@600&family=Bebas+Neue&family=Noto+Sans:wght@500&family=Oswald&family=Oxygen&family=Poppins&display=swap" rel="stylesheet">     <script src="scripts.js"></script>
    <script src="scripts.js"></script>
    <title>RTV-Servis Marušić</title>
</head>
<body>
<?php
include 'functions.php';
$conn=OpenCon();
QueryDestroy();
?>
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
<div class="spacer" style="background-image: url('slike/Website Images/indexselection.svg')"></div>
<div class="slideshow">
    <img src="slike/boselogo.png" alt="Bose logo" class="slideimg">
    <img src="slike/pioneerlogo.png" alt="Pioneer logo" class="slideimg">
    <img src="slike/yamahalogo.png" alt="Yamaha logo" class="slideimg">
    <img src="slike/clarionlogo.png" alt="Clarion logo" class="slideimg">
    <img src="slike/numarklogo.png" alt="Numark logo" class="slideimg">
</div>
<script>
    vrti();
</script>
<div class="spacer" style="background-image: url('slike/Website Images/indexcontent.svg')"></div>
<div class="content">
    <div class="maincontent">
        <h1>Servis elektroničkih uređaja Marušić</h1>
        <br>
        <p>Ovaj servis nudi usluge popravljanja, prikupljanja i prodaje digitalnih uređaja.</p>
        <p>Radno vrijeme:</p>
        <p>Ponedjeljak - Petak: 09h - 17h</p>
    </div>
    <div class="contentdivider"></div>
    <div class="content1">
        <h2>Kontakt</h2>
        <p>E-mail: randomgmail@gmail.com</p>
        <p>Mobitel: 0923567833</p>
        <p>Fax: 8139588256</p>
    </div>
    <div class="content2">
        <h2>Adresa</h2>
        <p>Ul. Vladimira Vidrića 12</p>
        <p>10000 Zagreb, Hrvatska</p>
    </div>
</div>
<?php
CloseCon($conn);
?>
</body>
</html>