<?php
session_start();
if(isset($_SESSION['username']))
{

	 $user = $_SESSION['username'];
	 $mysqli = new mysqli('localhost', 'root', '', 'imdb') or die(mysqli_error($mysqli));
	 $result = $mysqli->query("SELECT s_id from signup where username = '".$user."'");
   	 $row= $result->fetch_assoc();
     $s_id = $row['s_id'];
     $f_id = $_POST['f_id'];
     $ocena = $_POST['ocena'];
     $result = $mysqli->query("INSERT into ocenjivanje values('".$s_id."', '".$f_id."', ".$ocena.")");


     header('location: detalji_filma.php?film='.$_POST['film']);

}



?>
