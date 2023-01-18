<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "wedkowanie";

$conn = mysqli_connect($servername, $username, $password, $dbname);


if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}else{
    echo "Connection succesful"."<br>";
}

mysqli_select_db ($conn,"wedkowanie");
$a = null;
$b= $_POST['imie'];
$c= $_POST['nazwisko'];
$d= $_POST['adres'];
mysqli_query ($conn, "INSERT INTO karty_wedkarskie (imie,nazwisko,adres,data_zezwolenia,punkty) VALUES ('$b','$c','$d','$a','$a')");
echo "Data was sent";
mysqli_close ($conn);

?>

