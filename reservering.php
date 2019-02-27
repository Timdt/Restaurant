<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>reservering maken</title>
  </head>
  <body>
<h1>Maak reservering</h1>

<form action="/restaurant/maak_reservering.php" method="POST">
  Voornaam:<br>
  <input type="text" name="voornaam" value=""><br><br>

  Achternaam:<br>
  <input type="text" name="achternaam" value=""><br><br>

  Email:<br>
  <input type="text" name="email" value=""><br><br>

  Telefoonnummer:<br>
  <input type="text" name="telefoonnummer" value=""><br><br>

  Tafel:<br>
  <input type="text" name="tafel" value=""><br><br>

  Reserverings Datum:<br>
  <input type="date" name="datum" value="dd//mm//yy"><br><br>

  <input type="submit" value="Submit">
</form>




<div id="Tafels">
<h3>Gereserveerde Tafels</h3>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "restaurant";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// $sql = "SELECT reserveringen.Tafel_Id, reserveringen.Res_Datum
// FROM reserveringen
// INNER JOIN tafels ON reserveringen.Tafel_Id=tafels.Tafel_Id";
// $result = $conn->query($sql);

//andere query welke ik heb geprobeerd met reservering nummer
//tafels.tafel_Nummer,reserveringen.Res_Datum,reserveringen.Reservering_Id FROM tafels INNER JOIN reserveringen ON reserveringen.Res_Datum = reserveringen.Res_Datum AND reserveringen.Reservering_Id = reserveringen.Reservering_Id

//$sql = "SELECT tafels.tafel_Nummer,reserveringen.Res_Datum,reserveringen.Reservering_Id FROM tafels LEFT JOIN reserveringen ON reserveringen.Res_Datum = reserveringen.Res_Datum AND reserveringen.Reservering_Id = reserveringen.Reservering_Id";
$sql = "SELECT Reservering_Id, Tafel_Id, Res_Datum, VoorNaam, AchterNaam FROM reserveringen ORDER BY Res_Datum DESC";
$result = $conn->query($sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "reserveringID: ". $row["Reservering_Id"]. " tafelnummer: " . $row["Tafel_Id"]. " - Reservering_datum: " . $row["Res_Datum"]. " " . $row["VoorNaam"]." ".$row["AchterNaam"]. " ". "<br>";
    }
} else {
    echo "0 results";
}

mysqli_close($conn);

//$sql = "SELECT tafels.tafel_Nummer,tafels.Res_Datum,tafels.Reservering_Id FROM tafels INNER JOIN reserveringen ON tafels.Res_Datum = reserveringen.Res_Datum AND tafels.tafel_Id = reserveringen.tafel_Id";


//SELECT tafels.Tafel_Id,reserveringen.Res_datum FROM tafels INNER JOIN reserveringen ON reserveringen.Res_Datum = reserveringen.Res_Datum
//tafels en reserveerdatums

//LAATSTE query SELECT tafels.tafel_Nummer,reserveringen.Res_Datum,reserveringen.Reservering_Id FROM tafels RIGHT JOIN reserveringen ON reserveringen.Res_Datum = reserveringen.Res_Datum AND reserveringen.Reservering_Id = reserveringen.Reservering_Id
?>




</div>


  </body>
</html>
