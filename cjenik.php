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
$conn=OpenCon();
QueryDestroy();
?>
    <div>
        <table class="selection">
            <tbody>
            <tr>
                <td style="width: 15%"><a href="index.php"><img src="slike/servislogo.png" alt="Servis logo" class="servislogo"></a></td>
                <td><a href="index.php">Početna</a></td>
                <td style="background-color: lightgray;"><a href="cjenik.php">Cjenik</a></td>
                <td><a href="webshop.php?page=1">Web Shop</a></td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="uvod">
        <h1>Cjenik</h1>
        <p>Cijena naplate uređaja ovisi o vremenu potrebnom za popravak uređaja, potrebim dijelovima za popravak, te dodatnim troškovima popravka + PDV</p>
        <p>Sed felis ipsum, suscipit vel blandit nec, tristique nec augue. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed eu velit non tellus pellentesque laoreet. In semper nunc vel dui cursus feugiat. Vestibulum at consectetur nunc, nec pellentesque purus.</p>
        <p>Osnovna lista cijena nalazi se u tablici ispod</p>
    </div>
    <div class="cijene">
        <img src="slike/soundtouch.png" alt="Bose soundbar" class="soundbar">
        <table class="tablicacijena">
            <tr>
                <th style="border-top: none;">Vrijeme</th>
                <th style="border-top: none;">Cijena</th>
            </tr>
            <tr>
                <td>1h</td>
                <td>200kn + Suspendisse commodo rhoncus consequat</td>
            </tr>
            <tr>
                <td>2h</td>
                <td>300kn + Suspendisse commodo rhoncus consequat</td>
            </tr>
            <tr>
                <td>3h</td>
                <td>400kn + Suspendisse commodo rhoncus consequat</td>
            </tr>
            <tr>
                <td>4h</td>
                <td>500kn + Suspendisse commodo rhoncus consequat</td>
            </tr>
            <tr>
                <td>Nabavka dijelova</td>
                <td>50kn - 500kn + Suspendisse commodo rhoncus consequat</td>
            </tr>
        </table>
        <img src="slike/mikser.png" alt="Pioneer mixer" class="pmixer">
    </div>
    <footer>

    </footer>
<?php
CloseCon($conn);
?>
</body>
</html>