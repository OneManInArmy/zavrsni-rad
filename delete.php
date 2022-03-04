<?php
include 'functions.php';
$conn=OpenCon();
$ime =$_GET['prod'];
$delete = $conn->prepare("DELETE FROM `proizvod` WHERE Ime LIKE '$ime'");
$delete->execute();
$page = $_GET["page"];
header("location: adminshop.php?page=$page");
