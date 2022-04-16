<?php
session_start();
if ($_SESSION["loggedin"] != TRUE) {
    header("location: index.php");
    exit;
}
include 'functions.php';
$conn=OpenCon();
$ime =$_GET['prod'];
$stmt = mysqli_query($conn, "SELECT Slika FROM proizvod WHERE Ime LIKE '$ime'");
foreach ($stmt as $row){
    $slika = $row["Slika"];
}
unlink("slike/$slika");
$delete = $conn->prepare("DELETE FROM `proizvod` WHERE Ime LIKE '$ime'");
$delete->execute();
$page = $_GET["page"];
header("location: adminshop.php?page=$page");
