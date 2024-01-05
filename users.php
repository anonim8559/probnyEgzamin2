<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl4.css" />  
    <title>Panel administratora </title>
</head>
<body>
    <div id="baner">
        Portal Społecznościowy - panel administratora
    </div>
    <div id="srodek">
    <div id="lewo">
        <h4>Użytkownicy</h4>
        <?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "dane4";

$conn = new mysqli($servername, $username, $password, $database);



$sql = "SELECT id, imie, nazwisko, rok_urodzenia FROM osoby LIMIT 30";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
       
        $wiek = date("Y") - $row["rok_urodzenia"];

        
        echo $row["id"] . ". " . $row["imie"] . " " . $row["nazwisko"] . ", " . $wiek . " lat<br>";
    }
} else {
    echo "Brak danych w bazie";
}


$conn->close();
?>
        <a href="settings.html">Inne ustawienia</a>
    </div>
    <div id="prawo">
        <h4>Podaj id użytkownika</h4>
        <form action="users.php" method="post">
      
      <input type="number" name="id" id="id"/>

      <br />

      
      <button id="p">ZOBACZ</button>

      <br />

    </form>
    <?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "dane4";

$conn = new mysqli($servername, $username, $password, $database);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if (isset($_POST["id"])) {
    $id = $_POST["id"];
    $sql2 = "SELECT osoby.id, osoby.imie, osoby.nazwisko, osoby.zdjecie, osoby.rok_urodzenia, osoby.opis, hobby.nazwa FROM osoby, hobby WHERE osoby.Hobby_id=hobby.id AND osoby.id = $id";
    $result2 = $conn->query($sql2);

    if ($result2->num_rows > 0) {
        $row2 = $result2->fetch_assoc();

        echo '<h2>' . $row2["id"] . '. ' . $row2["imie"] . ' ' . $row2["nazwisko"] . '</h2>';

        echo '<img src="' . $row2["zdjecie"] . '" alt="' . $id . '">';

        echo '<p>Rok urodzenia: ' . $row2["rok_urodzenia"] . '</p>';
        echo '<p>Opis: ' . $row2["opis"] . '</p>';
        echo '<p>Hobby: ' . $row2["nazwa"] . '</p>';
    } else {
        echo "Brak danych dla wybranego ID";
    }
}

$conn->close();
?>


    </div>
    
    </div>
    
    <div id="stopka">
    Stronę wykonał: 11
    </div>
</body>
</html>