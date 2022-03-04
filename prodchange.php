<!DOCTYPE html>
<html lang="hr">
<?php
include 'functions.php';
$conn=OpenCon();
CookieDestroy();
?>
<head>
    <meta charset="utf8_croatian_ci">
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
            <td><a href="webshop.php">Web Shop</a></td>
        </tr>
        </tbody>
    </table>
</div>
<div id="zafunkciju" class="prodbox">
    <?php
    $stmt = $conn->prepare("SELECT * FROM `proizvod` WHERE Ime = '$ime';");
    $stmt->execute();
    foreach ($stmt->get_result() as $row) {
        $Ime = $row['Ime'];
        $Cijena = $row['Cijena'];
        $Opis = $row['Opis'];
        $Slika = $row['Slika'];
    }
    echo "
            <div class='picture'>
                <img src=".$Slika." alt=".$Ime.">
            </div>
            <div class='name'>
                <h1>$Ime</h1>
            </div>
            <div class='description'>
                <p>$Opis</p>
            </div>
            <div class='empty'>
                
            </div>
            <div class='price'>
                <p>Cijena: $Cijena kn</p>
            </div>
            <div class='contact'>
                <p>Kontaktirajte Kolegu</p>
            </div>
        ";
    ?>
</div>
</body>
</html>