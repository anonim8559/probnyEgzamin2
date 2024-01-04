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



$sql = "SELECT id, imie, nazwisko, rok_urodzenia FROM osoby";
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
      
      <input type="number"/>

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



$sql = "SELECT id, imie, nazwisko, rok_urodzenia FROM osoby";
$result = $conn->query($sql);





$conn->close();
?>
    </div>
    
    </div>
    
    <div id="stopka">
    Stronę wykonał: 11
    </div>
</body>
</html>