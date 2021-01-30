<?php
    if(isset($_GET['edit'])) {
        $mysqli = new mysqli('localhost', 'root', '', 'imdb') or die(mysqli_error($mysqli));
        $id=$_GET['edit'];
        $res=$mysqli->query("SELECT * FROM filmovi WHERE f_id=$id") or die($mysqli->error);
        $row=$res->fetch_assoc();
    }
?>
<?php
    if(isset($_POST['izmeni'])) {
        $mysqli = new mysqli('localhost', 'root', '', 'imdb') or die(mysqli_error($mysqli));
        $name=$_POST['naslovFilma'];
        $name1=$_POST['godinaIzdanja'];
        $name2=$_POST['zanrFilma'];
        $name3=$_POST['opisFilma'];
        $name4=$_POST['glumeU'];
        $name5=$_POST['scenaristaF'];
        $name6=$_POST['reziserF'];
        $name7=$_POST['producentska'];
        $name8=$_POST['trajanjeF'];
        $name9=addslashes($_POST['poster']);
        $name10=$_POST['zanrbr'];
        $id=$_POST['id'];
        $mysqli->query("UPDATE filmovi SET naslov='$name', opis='$name3', zanr_filma='$name2', scenarista='$name5', reziser='$name6', producentska_kuca='$name7', glumci='$name4', godina_izdanja=$name1, slika='$name9', trajanje='$name8', zanr=$name10 WHERE f_id=$id" ) or die($mysqli->error);
        header("location: adminStrana.php?sve");
    }
?>
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

<body data-spy="scroll" data-target="#navbarResponsive" style="background-color: rgb(14, 12, 12)">

<div class="container" style="background-color: rgb(52, 58, 64); ">
            <form action="izmenaAdmin.php" method="POST" style="margin-right:50px; margin-left: 50px">
            <input value="<?php echo $row['f_id'] ?>" name="id" style="visibility:visible;" >
                <div class="row">
                    <div class="col-25">
                        <label for="naslov">Naslov filma</label>
                     </div>
                <div class="col-75">
                    <input value="<?php echo $row['naslov'] ?>" type="text" id="naslov" name="naslovFilma" placeholder="Dodajte naslov.." style=" border: 1px solid  rgb(255, 193, 7); border-radius: 4px">
                </div>
                </div>
                <div class="row">
                    <div class="col-25">
                     <label for="godina">Godina izdanja</label>
                    </div>
                    <div class="col-75">
                        <input value="<?php echo $row['godina_izdanja'] ?>" type="text" id="godina" name="godinaIzdanja" placeholder="Dodajte godinu izdanja.." style="border: 1px solid  rgb(255, 193, 7);  border-radius: 4px">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                     <label for="zanr">Žanr filma</label>
                    </div>
                    <div class="col-75">
                     <input value="<?php echo $row['zanr_filma'] ?>" type="text" id="zanr" name="zanrFilma" placeholder="Dodajte žanr filma.." style=" border: 1px solid  rgb(255, 193, 7); border-radius: 4px">
                    </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="opis">Opis filma</label>
                        </div>
                        <div class="col-75">
                         <textarea value="<?php echo $row['opis'] ?>" id="opis" name="opisFilma" placeholder="Dodajte opis filma.." style="height:200px; border: 1px solid  rgb(255, 193, 7); border-radius: 4px;"></textarea>
                        </div>
                    </div>
                       
                        <div class="row">
                            <div class="col-25">
                                <label for="glumci">Glumci</label>
                            </div>
                            <div class="col-75">
                                <textarea value="<?php echo $row['glumci'] ?>" id="glumci" name="glumeU" placeholder="Dodajte glumce.." style="height:100px; border: 1px solid  rgb(255, 193, 7); border-radius: 4px;"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-25">
                                <label for="scenarista">Scenarista</label>
                            </div>
                            <div class="col-75">
                                <input value="<?php echo $row['scenarista'] ?>" type="text" id="scenarista" name="scenaristaF" placeholder="Dodajte scenariste.." style=" border: 1px solid  rgb(255, 193, 7); border-radius: 4px">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-25">
                                <label for="reziser">Režiser</label>
                            </div>
                            <div class="col-75">
                                <input value="<?php echo $row['reziser'] ?>" type="text" id="reziser" name="reziserF" placeholder="Dodajte režisere.." style=" border: 1px solid  rgb(255, 193, 7); border-radius: 4px">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-25">
                                <label for="prodKuca">Producentska kuća</label>
                            </div>
                            <div class="col-75">
                                <input value="<?php echo $row['producentska_kuca'] ?>" type="text" id="prodKuca" name="producentska" placeholder="Dodajte producentske kuće.." style=" border: 1px solid  rgb(255, 193, 7); border-radius: 4px">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-25">
                                <label for="trajanje">Trajanje filma</label>
                            </div>
                            <div class="col-75">
                                <input value="<?php echo $row['trajanje'] ?>" type="text" id="trajanje" name="trajanjeF" placeholder="Dodajte minute trajanja.." style=" border: 1px solid  rgb(255, 193, 7); border-radius: 4px">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-25">
                                <label for="slika">Poster</label>
                            </div>
                            <div class="col-75">
                                <input value="<?php echo $row['slika'] ?>" type="file" id="slika" name="poster" placeholder="Dodajte poster filma.." style="border: 1px solid  rgb(255, 193, 7); border-radius: 4px">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-25">
                                <label for="zanrb">Redni broj žanra</label>
                            </div>
                            <div class="col-75">
                                <input value="<?php echo $row['zanr'] ?>" type="text" id="zanrb" name="zanrbr" placeholder="Dodajte redni broj žanra.." style="border: 1px solid  rgb(255, 193, 7); border-radius: 4px">
                            </div>
                        </div>
                        <div class="row">
                            <input type="submit" value="Izmeni" name="izmeni">
                        </div>
            </form>
            </div>
    </div>
  </div>        
</div>
</body>
