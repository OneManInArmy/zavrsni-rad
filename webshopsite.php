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
echo "<p style='position: relative;top:15vh;'>Connected Successfully</p>";
CloseCon($conn);
?>
<div class="okvirgrid">

</div>
</body>
</html>