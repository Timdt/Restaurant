<form action="/restaurant/maak_bestelling.php" method="POST">
  <h2>Enter Order</h2>

  Table Number:<br>
  <input type="text" name="tafelnummer" value=""><br><br>
  Receipt Id:<br>
  <input type="text" name="receiptid"   value=""><br><br>
  Menu_Item:<br>
  <input type="text" name="menu_item"   value=""><br><br>
  Date: <br>
  <input type="date" name="date"        value=""><br><br>

  <input type="submit" value="Submit">
</form>


<h2>Pending Orders:</h2>
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

//MY Query i am trying to run
// $sql = "SELECT O.Res_Datum, R.Reservering_Id, O.Tafel_Id,O.ReceiptID, SUM(MI.ItemPrice) AS TotalReceiptPrice
// FROM Orders, Reserveringen AS O INNER JOIN MenuItem AS MI ON O.MenuItemID = MI.MenuItemID
// AS O LEFT JOIN Reservering_Id AS R on O.Reservering_Id = R.reservering_Id
// GROUP BY O.Res_Datum, O.Res_ID, O.Tafel_Id  ";

//The statement I get with an Empty reservation_ID
$sql = "SELECT O.Res_Datum, O.Res_ID, O.Tafel_Id,O.ReceiptID, SUM(MI.ItemPrice) AS TotalReceiptPrice
FROM Orders AS O INNER JOIN MenuItem AS MI ON O.MenuItemID = MI.MenuItemID
GROUP BY O.Res_Datum, O.Res_ID, O.Tafel_Id";

$result = $conn->query($sql);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "Res_datum: ". $row["Res_Datum"]. " ReservationID : " . $row["Res_ID"]. " - Table_Number: " . $row["Tafel_Id"]. " BonNummer: ".$row["ReceiptID"]." Total Order Price: " . $row["TotalReceiptPrice"]." ". "<br>";
    }
} else {
    echo "0 results";
}

mysqli_close($conn);
?>


</div>
