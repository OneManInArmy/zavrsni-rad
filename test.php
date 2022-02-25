<html lang="hr">

<head>
    <title>Paging Using PHP</title>
</head>

<body>
<?php
include 'functions.php';
$conn=OpenCon();

         $sql = "SELECT * FROM proizvod ";
         $retval = $conn->prepare($sql);
         $retval->execute();
         $rec_limit=9;
         $row = mysqli_num_rows($retval->get_result());
         $rec_count = $row[0];

         if( isset($_GET['page'] ) ) {
            $page = $_GET['page'] + 1;
            $offset = $rec_limit * $page ;
         }else {
            $page = 0;
            $offset = 0;
         }

         $left_rec = $rec_count - ($page * $rec_limit);
         $sql = "SELECT * ".
            "FROM proizvod ".
            "LIMIT $offset, $rec_limit";

         $retval = $conn->prepare($sql);
         $retval->execute();


foreach ($retval->get_result() as $row)
{
    $Ime= $row['Ime'];
    $Cijena= $row['Cijena'];
    $Opis= $row['Opis'];
    $Slika= $row['Slika'];
    echo
        '
            <div class="item'.$x.'">
                    <div class="item">
                        <a href="product.php?prod='.$Ime.'">
                            <img src="'.$Slika.'" alt="Slika '.$x.'. uređaja">
                        </a>
                        <hr>
                        <a href="product.php?prod='.$Ime.'">
                            <h2>'.$Ime.'</h2>
                            <h2>'.$Cijena.' kn</h2>
                            <p>'.$Opis.'</p>
                        </a>
                    </div>
            </div>
           ';
    $x++;
}
         
         if( $page > 0 ) {
            $last = $page - 2;
            echo "<a href = \"test.php?page = $last\">Last 10 Records</a> |";
            echo "<a href = \"test.phppage = $page\">Next 10 Records</a>";
         }else if( $page == 0 ) {
            echo "<a href = \"test.php?page = $page\">Next 10 Records</a>";
         }else if( $left_rec < $rec_limit ) {
            $last = $page - 2;
            echo "<a href = \"test.php?page = $last\">Last 10 Records</a>";
         }

         CloseCon($conn);
?>

</body>
</html>