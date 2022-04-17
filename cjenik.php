<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="utf8_croatian_ci">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" href="slike/servislogo.png">
    <script src="scripts.ts"></script>
    <title>RTV-Servis Marušić Cjenik</title>
</head>
<body>
<?php
include 'functions.php';
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
<div class="spacer" style="background-image: url('slike/Website Images/cjenikselection.svg')"></div>
<div class="uvod">
        <h1>Cjenik</h1>
        <p>Cijena naplate uređaja ovisi o vremenu potrebnom za popravak uređaja, potrebim dijelovima za popravak, te dodatnim troškovima popravka + PDV</p>
        <p>Sed felis ipsum, suscipit vel blandit nec, tristique nec augue. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed eu velit non tellus pellentesque laoreet. In semper nunc vel dui cursus feugiat. Vestibulum at consectetur nunc, nec pellentesque purus.</p>
        <p></p>
</div>
</body>
</html>