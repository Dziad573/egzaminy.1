<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Portal społecznościowy</title>
    <link rel="stylesheet" href="styl5.css">
</head>
<body>
    <section id="baner-lewy">
        <h2>Nasze osiedle</h2>
    </section>

    <section id="baner-prawy">
        <?php
            $host = "localhost";
            $user = "root";
            $pass = "";
            $db = "portal";
            $conn = mysqli_connect($host, $user, $pass, $db) or die ("problem z połączeniem");
            mysqli_select_db($conn, $db);
            $q1 = "SELECT * FROM `dane`;";
            $res = mysqli_query($conn, $q1);
            $a = 0;
            echo "<h5>Liczba użytkowników portalu: ";
            while($row = mysqli_fetch_row($res)){
                $a += 1;
            };
            echo $a;
            echo "</h5>";

        ?>
    </section>

    <div id="blok-lewy">
        <h3>
            Logowanie
        </h3>

        <form action="uzytkownicy.php" method="post">
            login<br>
            <input type="text" name="log"><br>
            haslo<br>
            <input type="password" name="pass"><br>
            <input type="submit" value="Zaloguj">
        </form>
    </div>

    <div id="blok-prawy">
        <h3>
            Wizytówka
        </h3>

        <div id="wizytowka">
            <?php

            if(isset ($_POST['log']) && isset ($_POST['pass'])){
                if(!empty($_POST['log']) || !empty($_POST['pass'])){
                    $login = $_POST['log'];
                    $haslo = $_POST['pass'];
                    $q2 = "SELECT haslo FROM `uzytkownicy` WHERE login = '$login';";
                    $res2 = mysqli_query($conn, $q2);
                        if(mysqli_num_rows($res2) == 0){
                            echo "login nie istnieje";
                        }else{
                            $sha1 = sha1($haslo);
                            if(mysqli_num_rows($res2) == 1){
                                while($row = mysqli_fetch_assoc($res2)){
                                    if($sha1 == $row['haslo']){
                                        $q3 = "SELECT login, rok_urodz, przyjaciol, hobby, zdjecie FROM uzytkownicy, dane WHERE uzytkownicy.id = dane.id AND login = '$login';";
                                        $res4 = mysqli_query($conn, $q3);
                                        while($row2 = mysqli_fetch_assoc($res4)){
                                            echo "<img src=' ".$row2['zdjecie']."' alt= 'osoba' <br>";
                                            $wiek = 2022 - $row2['rok_urodz'];
                                            $lohin = $row2['login'];
                                            echo "<h4>$login"."($wiek)</h4>";
                                            $hobby = $row2['hobby'];
                                            echo "<p> hobby: $hobby </p>";
                                            $znaj = $row2['przyjaciol'];
                                            echo "<h1><img src = 'icon-on.png'> $znaj </h1>";
                                            echo "<a href = 'dane.html'> <div id='przycisk'> Więcej informacji </div> </a>";
                                            
                                            
                                        };
                                    }else{
                                        echo "hasło nieprawidłowe";
                                    };
                                };
                            };
                        };
                    };
                };
            
            
            mysqli_close($conn);
            ?> 
        </div>
    </div>

    <footer id="stopka">
        Stronę wykonał: #000000000000
    </footer>
</body>
</html>