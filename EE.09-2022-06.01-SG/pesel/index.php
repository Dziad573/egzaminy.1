<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styl.css">
    <title>Forum o psach</title>
</head>
<body>
    <header id="baner"><h1>Forum miłośników psów</h1></header>
    <main id="main-lewy">
        <img src="avatar.png" alt="Użytkownik forum"><br>
        
        <?php
            $host = "localhost";
            $user = "root";
            $pass = "";
            $db = "forumpsy";
            $conn = mysqli_connect($host, $user, $pass, $db);
            $q1= "SELECT nick, postow, pytanie FROM konta, pytania WHERE konta.id = pytania.konta_id AND konta_id = 1;";
            $res1 = mysqli_query($conn, $q1);
            while($row1 = mysqli_fetch_row($res1)){

                echo "<h4>Użytkownik: ".$row1[0]."</h4>";    
                echo "<p> ".$row1[1]." postów na forum </p>";    
                echo "<p> ".$row1[2]." </p>";    
 
                
            }

            
        ?>

        <video controls LOOP autoplay>
            <source src="video.mp4" type="video/mp4">
        </video>
    </main>
    <main id="main-prawy">
        <form action="index.php" method="POST" >
            <textarea name="text" id="" cols="40" rows="4"></textarea><br>
            <input type="submit" value="Dodaj odpowiedź" id="sub">
            <?php
                
                if(isset ($_POST['text'])){
                    if(!empty ($_POST['text'])){

                        $pobierz = $_POST['text'];
                        $q2= "INSERT INTO odpowiedzi (Pytania_id, konta_id, odpowiedz) VALUES ('1', '5', '$pobierz');";
                        $res2 = mysqli_query($conn, $q2);

                    }
                }
                
                
                ?>
                
        </form>
        <h2>Odpowiedzi na pytanie</h2>

        <?php

            $q3 = "SELECT  odpowiedzi.odpowiedz, konta.nick FROM odpowiedzi,konta WHERE odpowiedzi.konta_id=konta.id AND Pytania_id = 1;";
            $res3 = mysqli_query($conn, $q3);
echo<<<TX
    <ol>
TX;
        while($row3 = mysqli_fetch_row($res3)){ 
                    
                    echo "<li>$row3[0] <em>$row3[1]</em><hr></li>";
                   
                }
            
echo<<<TX
    </ol>
TX;
            
        mysqli_close($conn);
        ?>

    </main>
    <footer id="stopka">Autor: #00000000000 <a href="http://mojestrony.pl/" target="_blank">Zobacz nasze realizacje</a></footer>


    <div class="box"></div>
    <div class="box"></div>
    <div class="box"></div>

</body>
</html>