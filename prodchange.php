<?php
session_start();
if($_SESSION["loggedin"] != TRUE) {
    header("location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="hr">
<?php
include 'functions.php';
$conn=OpenCon();
QueryDestroy();
ob_start();
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
            <td><a href="index.php">Početna</a></td>
            <td><a href="cjenik.php">Cjenik</a></td>
            <td><a href="webshop.php?page=1">Web Shop</a></td>
        </tr>
        </tbody>
    </table>
</div>
<div class="spacer" style="background-image: url('slike/Website Images/productselection.svg')"></div>

<div class="adminback">
    <a onclick="window.location='adminshop.php?page=1'"><span>&#8592;</span>Nazad</a>
</div>
<div class="prodbox">
    <?php
    $stmt = mysqli_query($conn, "SELECT * FROM `proizvod` WHERE Ime = '$ime';");
    foreach ($stmt as $row) {
        $Ime = $row['Ime'];
        $Cijena = $row['Cijena'];
        $Opis = $row['Opis'];
        $DugiOpis = $row['DugiOpis'];
        $Slika = $row['Slika'];
        $Broj = $row['Broj'];
        $Proizvodac = $row['Proizvodac'];
    }
    ?>
    <div class='picture'>
            <img id="preview" src="<?php echo "slike/$Slika"?>" alt="<?php echo $Ime; ?>">
            <script>
                const loadFile = function (event) {
                    const output = document.getElementById('preview');
                    output.src = URL.createObjectURL(event.target.files[0]);
                    output.onload = function () {
                        URL.revokeObjectURL(output.src) // free memory
                    }
                };
            </script>
        <form action="" method="post" enctype="multipart/form-data" name="promjena" id="promjena">
            Select Image Files to Upload:
            <input type="file" name="fileToUpload[]" id="fileToUpload" onchange="loadFile(event)" accept="image/*" form="promjena">
        </form>
    </div>
    <div class='name'>
        <label>
            <input type="text" name="prodname" id="prodname" placeholder="Ime uređaja..." form="promjena" required>
        </label>
    </div>
    <div class='shortdescription'>
        <label for="shortdesc">Kratiki Opis:</label>
        <br>
        <input style="width: 60%;" id="shortdesc" name="shortdesc" type="text" placeholder="Kratki opis..." form="promjena">
    </div>
    <div class='price'>
        <label for="price">Cijena: </label>
        <input type="number" name="price" id="price" placeholder="Cijena..." form="promjena" min="1" required> kn
    </div>
    <div class='contact'>
        <label for="manufacturer">Proizvođač</label>
        <input id="manufacturer" name="manufacturer" type="text" list="proizvodaci" placeholder="Proizovđač..." form="promjena" required>
        <datalist id="proizvodaci">
                <option value="Bose">Bose</option>
                <option value="Pioneer">Pioneer</option>
                <option value="Yamaha">Yamaha</option>
                <option value="Numark">Numark</option>
                <option value="Clarion">Clarion</option>
                <option value="Sony">Sony</option>
            </datalist>
    </div>
    <div class="number">
        <div>
            <label for="available">Raspoloživo:</label>
            <input type="number" id="available" name="available" placeholder="Raspoloživo..." form="promjena" required>
            <br>
            <input type="submit" name="submit" value="Promijeni" form="promjena" style="position:relative; top:20vh; left:45%;">
        </div>
    </div>
    <div class="longdescription">
        <label for="longdesc">Dugi Opis:</label>
        <br>
        <textarea name="longdesc" id="longdesc" wrap="hard" placeholder="Dugi opis ovdje..." form="promjena" style="resize: none;"><?php echo $DugiOpis; ?></textarea>
    </div>
</div>
<script>
    window.addEventListener('load', () => {
        Fill();
    });
    function Fill() {
        document.getElementById('prodname').value = '<?php echo $Ime;?>';
        document.getElementById('shortdesc').value = '<?php echo $Opis;?>';
        document.getElementById('price').value = '<?php echo $Cijena;?>';
        document.getElementById('manufacturer').value = '<?php echo $Proizvodac;?>';
        document.getElementById('available').value = '<?php echo $Broj;?>';
    }
</script>
<div class="spacer" style="background-image: url('slike/Website Images/productfooter.svg')"></div>
<footer class="footer">
    <div style="text-align: center">
        <?php
        if(isset($_POST['submit'])) {
            $name = strip_tags($_POST['prodname']);
            $price = strip_tags($_POST['price']);
            $shortdesc = strip_tags($_POST['shortdesc']);
            $longdesc = strip_tags($_POST['longdesc']);
            $available = strip_tags($_POST['available']);
            $manufacturer = strip_tags($_POST['manufacturer']);

            $change = $conn->prepare("UPDATE `proizvod` SET `Ime`='$name',`Cijena`='$price',`Proizvodac`='$manufacturer',`Opis`='$shortdesc',`DugiOpis`='$longdesc',`Broj`='$available' WHERE `Ime` LIKE '$ime'");
            $change->execute();

            $target_dir = "slike/";
            $fileName = array_filter($_FILES['fileToUpload']['name']);
            if (!empty($fileName)) {
                foreach($_FILES["fileToUpload"]["tmp_name"] as $key=>$tmp_name) {
                    $target_file = $target_dir . htmlspecialchars(basename($_FILES["fileToUpload"]["name"][$key]));
                    $uploadOk = 1;
                    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

                    // Check if image file is an actual image or fake image
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
                        header("location: prodchange.php?prod=$name");
                        // if everything is ok, try to upload file
                    } else {
                        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"][$key], $target_file)) {
                            $filename = htmlspecialchars(basename($_FILES["fileToUpload"]["name"][$key]));
                            echo "<br>The file " . $filename . " has been uploaded.";
                            $stmt = $conn->prepare("UPDATE `proizvod` SET `Slika`='$filename' WHERE `Ime` LIKE '$name'");
                            $stmt->execute();
                        } else {
                            echo "<br>Sorry, there was an error uploading your file.";
                        }
                        header("location: prodchange.php?prod=$name");
                    }
                }
            }
            else {
                header("location: prodchange.php?prod=$name");
            }
        }
        ?>
    </div>
</footer>
</body>
</html>