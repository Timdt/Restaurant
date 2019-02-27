

<form action="/restaurant/agenda.php" method="POST">
  Zoek reservering datum:<br>
  <input type="date" name="datum" value=""><br><br>
  <input type="submit" value="Submit">
</form>



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

//$date= $_POST['datum'];
//$sql = "SELECT reserveringen.Reservering_Id,reserveringen.Tafel_Id, reserveringen.Res_Datum, reserveringen.VoorNaam, reserveringen.AchterNaam FROM reserveringen INNER JOIN tafels ON reserveringen.Tafel_Id=tafels.Tafel_Id";
$sql = "SELECT Reservering_Id, Tafel_Id, Res_Datum, VoorNaam, AchterNaam FROM reserveringen "; //WHERE Res_Datum LIKE '%$date%'
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
?>


</div>
