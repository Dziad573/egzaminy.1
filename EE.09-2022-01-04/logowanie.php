<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl4.css">
    <title>Forum o psach</title>
</head>
<body>

    <section id="baner"><h1>Forum wielbicieli psów</h1></section>
    <section id="blok1"><img src="zad1/obraz1.jpg" alt="foksterier" height="500px"></section>
    <section id="blok2">
        <h2>Zapisz się</h2>
        <form action="http://localhost/egzaminy/EE.09-2022-01-04/logowanie.php" method="post">
            login: <input type="text" value="" name="login">
            hasło: <input type="password" value="" name="h">
            powtórz hasło: <input type="password" value="" name="ph" size="13">
            <input type="submit" value="Zapisz">
        </form>
    <?php
        $host = "localhost";
        $user = "root";
        $pass = "";
        $db = "psy";
        $login = $_POST['login'];
        $h = $_POST['h'];
        $ph = $_POST['ph'];
        if(isset($login) && isset($h) && isset ($ph)){
            if(empty('login')){
                die('Podaj login');
            } elseif (empty('h')){
                die('Podaj hasło');
            }elseif (empty('ph')){
                die('Potwierdź hasło');
            }else{
            
            $conn = mysqli_connect($host, $user, $pass, $db) or die('Błąd połączenia z bazą');
            $q = "SELECT login FROM uzytkownicy;";
            $res = mysqli_query($conn, $q);
                if($login == $res){
                    echo "login występuje w bazie danych, konto nie zostało dodane";
                }elseif ($h!=$ph){
                    echo "hasła nie są takie same, konto nie zostało dodane";
                }else{
                    $h_sha=sha1($h);
                    $q2 = "insert into `uzytkownicy` (login, haslo) values ('$login','$h_sha');";
                    $res2 = mysqli_query($conn,$q2) or die('wypierdalaj');
                    echo "<p> Konto zostało dodane </p>";
            }
        }


        }




        //require('regulamin.html');
    ?>
    </section>
    <section id="blok3">
        <h2>Zapraszamy wszystkich</h2>
        <ul>
            <li>właścicieli psów</li>
            <li>właścicieli psów</li>
            <li>tych, co chcą kupić psa</li>
            <li>tych, co lubią psy</li>
        </ul>
        <a href="http://localhost/egzaminy/EE.09-2022-01-04/regulamin.html">Przeczytaj regulamin forum</a>
    </section>
    <section id="stopka">Stronę wykonał: #00000000000000</section>



</body>
</html>