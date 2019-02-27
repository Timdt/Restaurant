<?php


$con = mysqli_connect('localhost','root','');

if(!$con) {
echo 'Niet verbonden met Server';
}

if(!mysqli_select_db ($con,'restaurant')) {
echo 'Database Niet Geselecteerd';
}

$voornaam = $_POST['voornaam'];
$achternaam = $_POST['achternaam'];
$email = $_POST['email'];
$telefoonnummer = $_POST['telefoonnummer'];
$tafel = $_POST['tafel'];
$datum = $_POST['datum'];

$sql = "INSERT INTO reserveringen (reserveringen.VoorNaam, reserveringen.AchterNaam, reserveringen.Email, reserveringen.TelefoonNummer, reserveringen.Tafel_Id, reserveringen.Res_Datum)
VALUES ('$voornaam', '$achternaam', '$email', '$telefoonnummer','$tafel','$datum')";

if(!mysqli_query($con,$sql)){
  echo 'Invoeren niet gelukt';
}else {
  echo 'Reservering Succesvol Gemaakt';
}

header("refresh:1; url=reservering.php");





?>
