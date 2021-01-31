
<?php
  if(isset($_GET['logout'])) {
    session_unset();
    session_destroy();
    
    header('location: prijava.php');
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
    <a class="navbar-brand" href="filmovi.php?sve"><img src="img/logo.png"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="filmovi.php?sve">Filmovi</a>
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
