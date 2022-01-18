<!DOCTYPE html>
<html>
<head>
    <title>
        <?php
        include 'functions.php';
        $conn=OpenCon();
        ?>
    </title>
</head>
<body>
<div id="zafunkciju">
    <?php
    if (isset($_GET['prod'])) {
        $ime = $_GET['prod'];
        $stmt = $conn->prepare("SELECT * FROM `uređaj` WHERE Ime = '$ime';");
        $stmt->execute();
        foreach ($stmt->get_result() as $row) {
            $Ime = $row['Ime'];
            $Cijena = $row['Cijena'];
            $Opis = $row['Opis'];
            $Slika = $row['Slika'];
        }
        IspisProduct($Ime, $Cijena, $Opis, $Slika);
    }
    ?>
</div>

</body>
</html>