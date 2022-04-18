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
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Akshar:wght@500&family=Arimo:wght@600&family=Bebas+Neue&family=Noto+Sans:wght@500&family=Oswald&family=Oxygen&family=Poppins&display=swap" rel="stylesheet">
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
    <div class='picture'>
        <img id="preview" src="" alt="Product Image">
        <script>
            const loadFile = function (event) {
                const output = document.getElementById('preview');
                output.src = URL.createObjectURL(event.target.files[0]);
                output.onload = function () {
                    URL.revokeObjectURL(output.src) // free memory
                }
            };
        </script>
        <form action="" method="post" enctype="multipart/form-data" name="dodaj" id="dodaj">
            Select Image Files to Upload:
            <input type="file" name="fileToUpload[]" id="fileToUpload" onchange="loadFile(event)" accept="image/*" form="dodaj" required>
        </form>
    </div>
    <div class='name'>
        <label>
            <input type="text" name="prodname" id="prodname" placeholder="Ime uređaja..." form="dodaj" required>
        </label>
    </div>
    <div class='shortdescription'>
        <label for="shortdesc">Kratiki Opis:</label>
        <br>
        <input style="width: 60%;" id="shortdesc" name="shortdesc" type="text" placeholder="Kratki opis..." form="dodaj">
    </div>
    <div class='price'>
        <label for="price">Cijena: </label>
        <input type="number" name="price" id="price" placeholder="Cijena..." form="dodaj" min="0" maxlength="8" oninput="if (this.value.length > this.maxLength){ this.value = this.value.slice(0, this.maxLength);}" required> kn
    </div>
    <div class='contact'>
        <label for="manufacturer">Proizvođač</label>
        <input id="manufacturer" name="manufacturer" type="text" list="proizvodaci" placeholder="Proizovđač..." form="dodaj" required>
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
            <input type="number" id="available" name="available" placeholder="Raspoloživo..." form="dodaj"  required>
            <br>
            <input type="submit" name="submit" value="Dodaj" form="dodaj">
        </div>
    </div>
    <script>
    </script>
    <div class="longdescription">
        <label for="longdesc">Dugi Opis:</label>
        <br>
        <textarea name="longdesc" id="longdesc" wrap="hard" placeholder="Dugi opis ovdje..." form="dodaj" style="resize: none;"></textarea>
    </div>
</div>
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
                        echo "<br>Sorry, your file and information was not uploaded.";
                        // if everything is ok, try to upload file
                    } else {
                        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"][$key], $target_file)) {
                            $filename = htmlspecialchars(basename($_FILES["fileToUpload"]["name"][$key]));
                            echo "<br>The file " . $filename . " and information has been uploaded.";
                            $change = $conn->prepare("INSERT INTO `proizvod`(`Ime`, `Cijena`, `Proizvodac`, `Slika`, `Opis`, `DugiOpis`, `Broj`) VALUES ('$name','$price','$manufacturer','$filename','$shortdesc','$longdesc','$available')");
                            $change->execute();
                            header("location: prodadd.php");
                        } else {
                            echo "<br>Sorry, there was an error uploading your file.";
                        }
                    }
                }
            }
        }
        ?>
    </div>
</footer>
</body>
</html>