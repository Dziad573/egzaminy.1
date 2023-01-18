<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "pogotowieee09";
    $nr = $_POST['nr'];
    $imie1 = $_POST['imie1'];
    $imie2 = $_POST['imie2'];
    $imie3 = $_POST['imie3'];
    $conn = mysqli_connect($host, $user, $pass,$db) or die('Problem z połączeniem z bazą'); 
   
    if(isset ($_POST['nr']) && isset ($_POST['imie1']) && isset ($_POST['imie2']) && isset ($_POST['imie3'])){
        if(empty($_POST['nr']) || empty($_POST['imie1']) || empty($_POST['imie2']) || empty($_POST['imie3'])){
            die("Wypełnij formularz");
        }else{
            mysqli_select_db($conn, $db) or die('Problem z bazą');
            $q = "INSERT INTO ratownicy (nrKaretki, ratownik1, ratownik2, ratownik3) VALUES ('$nr', '$imie1', '$imie2', '$imie3');";
            mysqli_query($conn, $q);
            echo "Do bazy zostało wysłane zapytanie:"." "."$q";
        }
    }else{
        die("Wypełnij formularz");
    }

    mysqli_close($conn);
?>