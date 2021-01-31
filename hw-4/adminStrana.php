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
    header("location: adminStrana.php?src=$rec");
  }
?>

<?php //admin dodaje
    $mysqli = new mysqli('localhost', 'root', '', 'imdb') or die(mysqli_error($mysqli));

    if(isset($_POST['dodaj'])){
        $name=$_POST['naslovFilma'];
        $name1=$_POST['godinaIzdanja'];
        $name2=$_POST['zanrFilma'];
        $name3=$_POST['opisFilma'];
        $name4=$_POST['glumeU'];
        $name5=$_POST['scenaristaF'];
        $name6=$_POST['reziserF'];
        $name7=$_POST['producentska'];
        $name8=$_POST['trajanjeF'];
        $name9=$_POST['poster'];
        $name10=$_POST['zanrbr'];
        $mysqli->query("INSERT INTO filmovi (naslov, opis, zanr_filma, scenarista, reziser, producentska_kuca, glumci, godina_izdanja, slika, trajanje, zanr) VALUES ('$name','$name3','$name2','$name5','$name6','$name7','$name4','$name1','$name9','$name8','$name10')") or die($mysqli->error);
       
        header('location: adminStrana.php?sve');
    } 
?>
<?php 
    if(isset($_GET['obrisi'])) {
        $mysqli = new mysqli('localhost', 'root', '', 'imdb') or die(mysqli_error($mysqli));
        $i=$_GET['obrisi'];
        $mysqli->query("DELETE FROM filmovi WHERE f_id=$i");
        header("location: adminStrana.php?sve");
    }
?>
<?php 
    if(isset($_GET['izmeni'])) {
        $id=$_GET['izmeni'];
        header("location: izmenaAdmin.php?edit=$id");
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
    <link rel="stylesheet" href="admin.css">
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
		  	  
		<a style="color: rgb(255, 193, 7)" class="linkovi" href=adminStrana.php?link=1>Komedije</a> <br /> 
		<a style="color: rgb(255, 193, 7)" class="linkovi" href=adminStrana.php?link=2>Trileri</a> <br />
		<a style="color: rgb(255, 193, 7)" class="linkovi" href=adminStrana.php?link=3>Drame</a> <br />
		<a style="color: rgb(255, 193, 7)" class="linkovi" href=adminStrana.php?link=4>Romantični</a> <br />
   		<a style="color: rgb(255, 193, 7)" class="linkovi" href=adminStrana.php?link=5>Sci-fi</a> <br />
    		<a style="color: rgb(255, 193, 7)" class="linkovi" href=adminStrana.php?link=6>Horori</a> <br />
   		<a style="color: rgb(255, 193, 7)" class="linkovi" href=adminStrana.php?sve>Svi filmovi</a>
    
  </div>
  
    </td>
    <td> <!---Prikazivanje filmova -->
      <table> 
      
      <?php if($res!=null) { while($red=$res->fetch_assoc()) : ?>
      <tr><td><a href="detalji_filma.php?film=<?php echo $red['naslov']?>" style="color: white"><?php  echo $red['naslov'] ?> </a></td> </tr>
      <tr><td> &nbsp </td> </tr>
      <tr><td> <img style="height:240px; width:160px" src="<?php echo $red['slika']?>"> </td> 
      </tr>
      
      <tr> <td> <a href="adminStrana.php?obrisi=<?php echo $red['f_id'] ?>"><button type="button" class="btn btn-warning">Obriši</button> </a> </td> 
      <td> <a href="adminStrana.php?izmeni=<?php echo $red['f_id'] ?>"><button type="button" class="btn btn-warning" style="margin-left:-75px;">Izmeni</button> </a> </td>  </tr>  
      <tr><td> &nbsp </td> </tr> 
      
      <?php endwhile; } ?>
      
      </table>
    </td>
    
    </tr>

    </table>
   
 
  <div class="container" style="background-color: rgb(52, 58, 64); ">
            <form action="adminStrana.php" method="POST" style="margin-right:50px; margin-left: 50px">
                <div class="row">
                    <div class="col-25">
                        <label for="naslov">Naslov filma</label>
                     </div>
                <div class="col-75">
                    <input type="text" id="naslov" name="naslovFilma" placeholder="Dodajte naslov.." style=" border: 1px solid  rgb(255, 193, 7); border-radius: 4px">
                </div>
                </div>
                <div class="row">
                    <div class="col-25">
                     <label for="godina">Godina izdanja</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="godina" name="godinaIzdanja" placeholder="Dodajte godinu izdanja.." style="border: 1px solid  rgb(255, 193, 7);  border-radius: 4px">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                     <label for="zanr">Žanr filma</label>
                    </div>
                    <div class="col-75">
                     <input type="text" id="zanr" name="zanrFilma" placeholder="Dodajte žanr filma.." style=" border: 1px solid  rgb(255, 193, 7); border-radius: 4px">
                    </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="opis">Opis filma</label>
                        </div>
                        <div class="col-75">
                         <textarea id="opis" name="opisFilma" placeholder="Dodajte opis filma.." style="height:200px; border: 1px solid  rgb(255, 193, 7); border-radius: 4px;"></textarea>
                        </div>
                    </div>
                       
                        <div class="row">
                            <div class="col-25">
                                <label for="glumci">Glumci</label>
                            </div>
                            <div class="col-75">
                                <textarea id="glumci" name="glumeU" placeholder="Dodajte glumce.." style="height:100px; border: 1px solid  rgb(255, 193, 7); border-radius: 4px;"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-25">
                                <label for="scenarista">Scenarista</label>
                            </div>
                            <div class="col-75">
                                <input type="text" id="scenarista" name="scenaristaF" placeholder="Dodajte scenariste.." style=" border: 1px solid  rgb(255, 193, 7); border-radius: 4px">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-25">
                                <label for="reziser">Režiser</label>
                            </div>
                            <div class="col-75">
                                <input type="text" id="reziser" name="reziserF" placeholder="Dodajte režisere.." style=" border: 1px solid  rgb(255, 193, 7); border-radius: 4px">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-25">
                                <label for="prodKuca">Producentska kuća</label>
                            </div>
                            <div class="col-75">
                                <input type="text" id="prodKuca" name="producentska" placeholder="Dodajte producentske kuće.." style=" border: 1px solid  rgb(255, 193, 7); border-radius: 4px">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-25">
                                <label for="trajanje">Trajanje filma</label>
                            </div>
                            <div class="col-75">
                                <input type="text" id="trajanje" name="trajanjeF" placeholder="Dodajte minute trajanja.." style=" border: 1px solid  rgb(255, 193, 7); border-radius: 4px">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-25">
                                <label for="slika">Poster</label>
                            </div>
                            <div class="col-75">
                                <input type="text" id="slika" name="poster" placeholder="Dodajte poster filma.." style="border: 1px solid  rgb(255, 193, 7); border-radius: 4px">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-25">
                                <label for="zanrb">Redni broj žanra</label>
                            </div>
                            <div class="col-75">
                                <input type="text" id="zanrb" name="zanrbr" placeholder="Dodajte redni broj žanra.." style="border: 1px solid  rgb(255, 193, 7); border-radius: 4px">
                            </div>
                        </div>
                        <div class="row">
                            <input type="submit" value="Dodaj" name="dodaj">
                        </div>
            </form>
            </div>
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
