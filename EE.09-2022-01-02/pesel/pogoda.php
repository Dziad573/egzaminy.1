<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styl2.css">
    <title>Prognoza pogody Wrocław</title>
</head>
<body>
        <section id="baner-lewy"><img src="logo.png" alt="mateo"></section>
        <section id="baner-srodek"><h1>Prognoza dla Wrocławia</h1></section>
        <section id="baner-prawy"><p>maj, 2019 r.</p></section>

    <section id="blok-glowny">
        <?php
            $host = "localhost";
            $user = "root";
            $pass = "";
            $db = "prognoza";
            $conn = mysqli_connect($host, $user, $pass, $db) or die ('Błąd połączenia');
            $q = 'SELECT data_prognozy, temperatura_noc, temperatura_dzien, opady, cisnienie, id, miasta_id FROM pogoda WHERE miasta_id = 1 order by data_prognozy ASC;';
            $res = mysqli_query($conn, $q) or die ('Problem z odczytem danych');
echo<<<TX
    <table>
        <thead>
            <tr>
                <th>
                    DATA
                </th>
                <th>
                    TEMPERATURA W NOCY
                </th>
                <th>
                    TEMPERATURA W DZIEŃ
                </th>
                <th>
                    OPADY [mm/h]
                </th>
                <th>
                    CIŚNIENIE [hPa]
                </th>
            </tr>
        </thead>
    <tbody>
TX;
        while($row = mysqli_fetch_row($res)){
            echo "<tr>";
            foreach($row as $col){
                echo "<td>".$col."</td>";
            }
            echo "</tr>"; 
        }
echo<<<TX
    </tbody>
    </table>
TX;
        
        mysqli_close($conn);

        ?>
    </section>

    <section id="blok-dol1"><img src="obraz.jpg" alt="Polska, Wrocław"></section>
    <section id="blok-dol2"><a href="kwerendy.txt">Pobierz kwerendy</a></section>
    
    <section id="stopka">
        <p>Stronę wykonał: #000000000000</p>
    </section>
</body>
</html>