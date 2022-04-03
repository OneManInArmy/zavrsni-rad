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
<div class="prodbox">
    <?php
    $stmt = $conn->prepare("SELECT * FROM `proizvod` WHERE Ime = '$ime';");
    $stmt->execute();
    foreach ($stmt->get_result() as $row) {
        $Ime = $row['Ime'];
        $Cijena = $row['Cijena'];
        $Opis = $row['Opis'];
        $Slika = $row['Slika'];
        $Broj = $row['Broj'];
        $DugiOpis = $row['DugiOpis'];
    }
    ?>
    <div class='picture'>
            <img id="preview" src="<?php echo "slike/$Slika"?>">
            <script>
                var loadFile = function(event) {
                    var output = document.getElementById('preview');
                    output.src = URL.createObjectURL(event.target.files[0]);
                    output.onload = function() {
                        URL.revokeObjectURL(output.src) // free memory
                    }
                };
            </script>
        <form action="" method="post" enctype="multipart/form-data" id="promjena">
            Select Image Files to Upload:
            <input type="file" name="fileToUpload[]" id="fileToUpload" onchange="loadFile(event)" accept="image/*" multiple>
        </form>
        <?php
    if(isset($_POST['submit'])) {
        $target_dir = "slike/";
        $fileNames = array_filter($_FILES['fileToUpload']['name']);
        if (!empty($fileNames)) {
            foreach($_FILES["fileToUpload"]["tmp_name"] as $key=>$tmp_name) {
                $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"][$key]);
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

                // Check if image file is a actual image or fake image
                $check = getimagesize($_FILES["fileToUpload"]["tmp_name"][$key]);
                if ($check !== false) {
                    $uploadOk = 1;
                } else {
                    echo "<br>File is not an image.";
                    $uploadOk = 0;
                }

                // Check if file already exists
                if (file_exists($target_file)) {
                    echo "<br>Sorry, file already exists.";
                    $uploadOk = 0;
                }

                // Check file size
                if ($_FILES["fileToUpload"]["size"][$key] > 5000000) {
                    echo "<br>Sorry, your file is too large.";
                    $uploadOk = 0;
                }

                // Allow certain file formats
                if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                    && $imageFileType != "gif") {
                    echo "<br>Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                    $uploadOk = 0;
                }

                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                    echo "<br>Sorry, your file was not uploaded.";
                    // if everything is ok, try to upload file
                } else {
                    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"][$key], $target_file)) {
                        $filename = htmlspecialchars(basename($_FILES["fileToUpload"]["name"][$key]));
                        echo "<br>The file " . $filename . " has been uploaded.";
                        $stmt = $conn->prepare("UPDATE `proizvod` SET `Slika`='$filename' WHERE Ime Like '$Ime'");
                        $stmt->execute();
                        header("location: prodchange.php?prod=$Ime");
                    } else {
                        echo "<br>Sorry, there was an error uploading your file.";
                    }
                }
            }
        }
        else echo "Please select files!";

    }
?>
    </div>
    <div class='name'>
        <label>
            <input type="text" value="<?php echo $Ime; ?>">
        </label>
    </div>
    <div class='shortdescription'>
        <label for="opis">Kratiki Opis:</label>
        <br>
        <input style="width: 60%;" id="opis" type="text" value="<?php echo $Opis; ?>" placeholder="Kratki opis ovdje...">
    </div>
    <div class='price'>
        <label for="cijena">Cijena: </label><input type="number" id="cijena" value="<?php echo $Cijena;?>"> kn
    </div>
    <div class='contact'>
        <p>Kontaktirajte Kolegu</p>
    </div>
    <div class="number">
        <div>
            <label for="broj">Raspoloživo: </label><input type="number" id="broj" value="<?php echo $Broj;?>">
            <br>
            <input type="submit" name="submit" value="Promijeni" form="promjena" style="position:relative; top:20vh; left:45%;">
        </div>
    </div>
    <div class="longdescription">
        <label for="dugiopis">Dugi Opis:</label>
        <br>
        <textarea id="dugiopis" wrap="hard" placeholder="Dugi opis ovdje..."><?php echo $DugiOpis; ?></textarea>
    </div>
</div>

</body>
</html>