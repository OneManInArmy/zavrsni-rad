<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" href="slike/servislogo.png">
    <link href="https://fonts.googleapis.com/css2?family=Akshar:wght@500&family=Arimo:wght@600&family=Bebas+Neue&family=Noto+Sans:wght@500&family=Oswald&family=Oxygen&family=Poppins&display=swap" rel="stylesheet">     <script src="scripts.js"></script>
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

<div class="cjenik">
    <table>
        <tr>
            <th>Naziv rada</th>
            <th class="center">Cijena</th>
            <th class="center">Ukupna cijena</th>
        </tr>
        <tr>
            <td>Konstatacija kvara uređaja</td>
            <td class="center">150+PDV</td>
            <td class="center">187,50 kn</td>
        </tr>
        <tr>
            <td>Konstatacija kvara profesionalnih uređaja, High-end uređaja</td>
            <td class="center">400+PDV</td>
            <td class="center">500 kn</td>
        </tr>
        <tr>
            <td>Radni sat popravka uređaja</td>
            <td class="center">200+PDV</td>
            <td class="center">250 kn</td>
        </tr>
        <tr>
            <td>Radni sat popravka profesionalnih uređaja i high-end uređaja</td>
            <td class="center">400+PDV</td>
            <td class="center">500 kn</td>
        </tr>
        <tr>
            <td>Lemljenje konektora po komadu</td>
            <td class="center">30+PDV</td>
            <td class="center">37,50 kn</td>
        </tr>
        <tr>
            <td>Lemljenje high-end konektora po komadu</td>
            <td class="center">120+PDV</td>
            <td class="center">150 kn</td>
        </tr>
        <tr>
            <td>Dovoz i odvoz aparata na servis</td>
            <td class="center">300+PDV</td>
            <td class="center">375 kn</td>
        </tr>
        <tr>
            <td>Izlazak na teren - Dolazak kod stranke</td>
            <td class="center">300+PDV</td>
            <td class="center">375 kn</td>
        </tr>
        <tr>
            <td>Zbrinjavanje uređaja po komadu</td>
            <td class="center">100+PDV</td>
            <td class="center">125 kn</td>
        </tr>
        <tr>
            <td>Limitiranje stereo pojačala</td>
            <td class="center">600+PDV</td>
            <td class="center">750 kn</td>
        </tr>
        <tr>
            <td>Limitiranje AV višekanalnih pojačala</td>
            <td class="center">1000+PDV</td>
            <td class="center">1250 kn</td>
        </tr>
        <tr>
            <td>Usluga instaliranja softwera, firmwera, programiranja</td>
            <td class="center">250+PDV</td>
            <td class="center">312,50 kn</td>
        </tr>
    </table>
</div>


<div class="spacer" style="background-image: url('slike/Website Images/indexcontent.svg')"></div>
<footer class="footer">

</footer>
</body>
</html>