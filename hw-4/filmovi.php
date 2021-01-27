<?php session_start(); ?>
<?php
  if(!isset($_SESSION['username'])){
    header('location: prijava.php');
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
?>
<?php 
  if(isset($_POST['lupa'])) {
    $rec=$_POST['search'];
    header("location: filmovi.php?src=$rec");
  }
?>
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

<?php
  $mysqli = new mysqli('localhost', 'root', '', 'imdb') or die(mysqli_error($mysqli));
  if(isset($_GET['sve'])) {
    $res=$mysqli->query("SELECT * FROM filmovi ") or die($mysqli->error) ;  
  }
  else if(isset($_GET['link'])) {
    $zanr=$_GET['link'];
    $res=$mysqli->query("SELECT * FROM filmovi WHERE zanr IN ('$zanr')") or die($mysqli->error) ;
  }
  else if(isset($_GET['src'])) {
    $rec2=$_GET['src'];
    $res=$mysqli->query("SELECT * FROM filmovi WHERE naslov LIKE ('$rec2')") or die($mysqli->error);
  }
  else { $res=null; 
  }
  
?>

<!--- Navigacija -->
<nav class="navbar navbar-expand-md  bg-dark navbar-dark fixed-top">
    <a class="navbar-brand" href="#"><img src="img/logo.png"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="filmovi.php?sve">Filmovi</a>
            </li>
            <li>
                <form class="example" action="filmovi.php" style="margin:auto;max-width:1000px" method="POST">
                    <input type="text" placeholder="Pretraži filmove" name="search">
                    <button type="submit" name="lupa"><i class="fa fa-search" ></i></button>
                </form>
            </li>
            <li>
              <a href="filmovi.php?logout" class="btn btn-outline-warning btn-lg"> Odjavi se </a>
            </li>
        </ul>
    </div>

</nav>
<!--- Kraj navigacije -->

<div id="filmovi" class="offset">

  <div class="container-fluid">
  <div class="narrow">
    <table> 
    <tr><td style="vertical-align:top"> 
    <div class="col-12">
      
		  
      <h2 class="heading">Žanrovi</h2>
		  	  
		<a style="color: rgb(255, 193, 7)" class="linkovi" href=filmovi.php?link=1>Komedije</a> <br /> 
		<a style="color: rgb(255, 193, 7)" class="linkovi" href=filmovi.php?link=2>Trileri</a> <br />
		<a style="color: rgb(255, 193, 7)" class="linkovi" href=filmovi.php?link=3>Drame</a> <br />
		<a style="color: rgb(255, 193, 7)" class="linkovi" href=filmovi.php?link=4>Romantični</a> <br />
    		<a style="color: rgb(255, 193, 7)" class="linkovi" href=filmovi.php?link=5>Sci-fi</a> <br />
   		<a style="color: rgb(255, 193, 7)" class="linkovi" href=filmovi.php?link=6>Horori</a> <br />
   		<a style="color: rgb(255, 193, 7)" class="linkovi" href=filmovi.php?sve>Svi filmovi</a>
    
  </div>
  
    </td>
    <td> <!---Prikazivanje filmova -->
      <table> 
      
      <?php if($res!=null) { while($red=$res->fetch_assoc()) : ?>
      <tr><td> <?php echo $red['naslov'] ?> </td> </tr>
      <tr><td> &nbsp </td> </tr>
      <tr><td> <img style="height:222px; width:144px" src="<?php echo $red['slika']?>"> </td> 
      </tr>
      <tr><td> &nbsp </td> </tr> 
      <?php endwhile; } ?>
      </table>
    </td>
    </tr>
    
    </table>
   
  </div>
  </div>
</div>
<!---Footer -->
<footer>
    <div class="row text-center">
        <div class="col-md-12">
            <a href="https://www.facebook.com/imdb" target="_blank"><i class="fab fa-facebook-square"></i></a>
            <a href="https://www.twitter.com/imdb" target="_blank"><i class="fab fa-twitter-square"></i></a>
            <a href="https://www.instagram.com/imdb" target="_blank"><i class="fab fa-instagram"></i></a>
        </div>
    </div> 
    <div align="center">
      <hr class="socket" >
      &copy; 1990-2021 by IMDb.com, Inc.
    </div>
</footer>

</body>
</html>
