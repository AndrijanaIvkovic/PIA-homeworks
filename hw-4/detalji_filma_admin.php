<?php 
  if(isset($_POST['lupa'])) {
    $rec=$_POST['search'];
    header("location: filmovi.php?src=$rec");
  }
?>

<?php
  if(isset($_GET['sve'])) {
    $mysqli = new mysqli('localhost', 'root', '', 'imdb') or die(mysqli_error($mysqli));
    $res=$mysqli->query("SELECT * FROM filmovi") or die($mysqli->error);
  }
?>
<?php
  if(isset($_GET['logout'])) {
    session_unset();
    session_destroy();
    
    header('location: prijava.php');
  }
   $mysqli = new mysqli('localhost', 'root', '', 'imdb');
   $naslov = $_GET['film'];
   $result = $mysqli->query("SELECT f_id from filmovi where naslov = '".$naslov."'");
   $row= $result->fetch_assoc();
   $film_id = $row['f_id'];

   $result = $mysqli->query("SELECT count(*) as broj from ocenjivanje where f_id = ".$film_id);
   $row= $result->fetch_assoc();
   $broj_ocena = $row['broj'];


   $result = $mysqli->query("SELECT avg(ocena) as prosecna from ocenjivanje where f_id = ".$film_id);
   $row = $result->fetch_assoc();
   $prosecna = $row['prosecna'];
   if($prosecna == null){
   	$prosecna = 0;
   }


?>
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="sr">
<!--
	Domaci 4 (PIA 2021)
-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>IMDb</title>
    <meta name="author" content="Andrijana_Ivkovic" />
    <meta name="description" content="HTML/CSS/PHP/JavaScript/jQuery homework assignment." />
    <meta name="keywords" content="pia, web programming, html, css, php, bootstrap, javascript, jquery, " />
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="bootstrap-4.1.3-dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="bootstrap-4.1.3-dist/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="filmovi.css">
    <script src="https://use.fontawesome.com/releases/v5.5.0/js/all.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
</head>

<body data-spy="scroll" data-target="#navbarResponsive">


 
<!--- Navigacija -->
<nav class="navbar navbar-expand-md  bg-dark navbar-dark fixed-top">
    <a class="navbar-brand" href="adminStrana.php?sve"><img src="img/logo.png"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="adminStrana.php?sve">Filmovi</a>
            </li>
            <li>
              <a href="filmovi.php?logout" class="btn btn-outline-warning btn-lg"> Odjavi se </a>
            </li>
        </ul>
    </div>

</nav>
<div class="container-fluid" style="width:100%; background-color: rgb(14, 12, 12);  margin-bottom: -220px!important;">
<table style="top: 70px; position:relative;" style="background-color: rgb(14, 12, 12)">
<?php
 if(isset($_GET['film'])) {
    $mysqli = new mysqli('localhost', 'root', '', 'imdb') or die(mysqli_error($mysqli));
    $naslov=$_GET['film'];
    $res=$mysqli->query("SELECT * FROM filmovi WHERE naslov='$naslov'") or die($mysqli->error);
 
    
    while($red = $res->fetch_assoc()):     
        ?>
            <tr>
                <td style="width: 300px">
                <div class="naziv">
                <?php echo $red['naslov']?>
                </div> 
                </td> 
                <td style="width: 650px">
                    <div class="god"> (<?php echo $red['godina_izdanja'] ?>) </div>
                </td> 
            </tr>
            <tr>
               <td>
                <div class="trajanje_zanr"> 
                <?php echo $red['trajanje'] ?> | <?php echo $red['zanr_filma'] ?>
                </div>
               </td> 
            </tr>
                
            <tr>
                <td rowspan=2>
                  
                    <img class="image" style="width:370px; height:550px" src="<?php echo $red['slika'] ?>"> 
                 
                </td>
                <td> <div class="ofilmu"><?php echo $red['opis'] ?></div> 
		<td>
                <div class="stavka"> Srednja ocena: <?php echo $prosecna; ?>   &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;     Broj ocena: <?php echo $broj_ocena; ?> </div> <br>
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <form method="POST" action="oceni.php">
                  	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  					<select name="ocena" required>
    					<option value="1">1</option>
    					<option value="2">2</option>
    					<option value="3">3</option>
    					<option value="4">4</option>
    					<option value="5">5</option>
    					<option value="6">6</option>
    					<option value="7">7</option>
    					<option value="8">8</option>
    					<option value="9">9</option>
    					<option value="10">10</option>
  					</select>
  					<input type="submit" class="btn btn-outline-warning" value="Submit">
  					<input type="hidden" id="f_id" name="f_id" value="<?php echo $film_id; ?>">
  					<input type="hidden" id="film" name="film" value="<?php echo $naslov; ?>">
					</form>
                </td>
                </td> 
            </tr>
            <tr>
                <td>
		  <div class="stavka">  <p> <strong> Glumci: </strong></p>  <?php echo  $red['glumci'] ?></div> </br>
                  <div class="stavka"> <p> <strong> Producentska kuća: </strong> </p> <?php echo $red['producentska_kuca']  ?></div> </br>
                  <div class="stavka" >  <p> <strong> Režiser: </strong> </p>  <?php echo $red['reziser']?></div> </br>
                  <div class="stavka">  <p> <strong> Scenarista: </strong> </p>  <?php echo  $red['scenarista'] ?></div> </br> <br>
                </td>
            </tr>
                 
            
            
        <?php endwhile;
 }   
      
?>   
</table>
</div>
<footer class="footer1">
    <div class="row text-center">
        <div class="col-md-12">
            <a href="#" target="_blank"><i class="fab fa-facebook-square"></i></a>
            <a href="#" target="_blank"><i class="fab fa-twitter-square"></i></a>
            <a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
        </div>
    </div>
    <div align="center">
      <hr class="socket" >
      &copy; 1990-2021 by IMDb.com, Inc.
    </div>
    </footer>

</body>
</html>
