<?php session_start();?>
<?php //signup
    $mysqli = new mysqli('localhost', 'root', '', 'imdb') or die(mysqli_error($mysqli));

    if(isset($_POST['signup'])){
        $name=$_POST['name1'];
        $name01=$_POST['name2'];
        $email=$_POST['adr'];
        $name02=$_POST['username1'];
        $password=$_POST['psw'];
        $mysqli->query("INSERT INTO signup (ime, prezime, adresa, username, password) VALUES ('$name','$name01','$email','$name02','$password')");  
        $_SESSION['username']=$name02;
        header('location: filmovi.php?sve');
    } 
?>
<?php //login
 
 $mysqli = new mysqli('localhost', 'root', '', 'imdb') or die(mysqli_error($mysqli));
 if(isset($_POST['login'])){
     $name = $_POST['uname'];
     $password = $_POST['password1'];
   
     
         $result= $mysqli->query("SELECT * FROM signup WHERE username='$name'") or die($mysqli->error);
         $row= $result->fetch_assoc();
         if($password == $row['password']){
             $_SESSION['username']=$name;
           
             header('location: filmovi.php?sve');
             
         }
         
     
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
    <link rel="stylesheet" href="prijava.css">
    <script src="https://use.fontawesome.com/releases/v5.5.0/js/all.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
</head>

<body>
<div class="container-fluid">
    <div class="fixed-background">
    
            <button onclick="document.getElementById('id01').style.display='block'" style="width:auto;" class="sign">Log In </button>
          
            <div id="id01" class="modal">
           
              <form class="modal-content animate" style="background-color: black" action="prijava.php" method="POST">
              <span onclick="document.getElementById('id01').style.display='none'" class="close" style="color: white" title="Zatvori Modal">&times;</span>
                <div class="container">
                  <label for="uname"><b>Korisničko ime</b></label>
                  <input type="text" placeholder="Unesite korisničko ime" name="uname" required>

                  <label for="psw"><b>Lozinka</b></label>
                  <input type="password" placeholder="Unesite lozinku" name="password1" required>
      
                  <button type="submit" class="loginbtn" name="login">Prijavite se</button>
                  <label>
                    <input type="checkbox" checked="checked" name="remember"> Zapamti me
                  </label>
                </div>

                <div class="container" style="background-color:#000">
                  <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Izađi</button>
                 <!-- <span class="psw">Zaboravili ste <a href="#">lozinku?</a></span> -->
                </div>
              </form>
            </div>
            
          
            <button onclick="document.getElementById('id02').style.display='block'" style="width:auto;" class="sign">Sign Up</button>

            <div id="id02" class="modal2">
              <span onclick="document.getElementById('id02').style.display='none'" class="close2" title="Zatvori Modal">&times;</span>
                <form class="modal2-content" action="prijava.php" method="POST">
                  <div class="container2">
                    <h1>Registrujte se</h1>
                    <p>Popunite formu kako biste kreirali nalog.</p>
                    <hr>
                    <label for="name1"><b>Ime</b></label>
                    <input type="text" placeholder="Unesite ime" name="name1" required>

                    <label for="name2"><b>Prezime</b></label>
                    <input type="text" placeholder="Unesite prezime" name="name2" required>

                    <label for="adr"><b>E-mail</b></label>
                    <input type="text" placeholder="Unesite e-mail adresu" name="adr" required>

                    <label for="username"><b>Korisničko ime</b></label>
                    <input type="text" placeholder="Unesite korisničko ime" name="username1" required>

                    <label for="psw"><b>Lozinka</b></label>
                    <input type="password" placeholder="Unesite lozinku" name="psw" required>

                    <label>
                    <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Zapamti me
                    </label>

                    <p>Kreiranjem naloga prihvatate naše <a href="#" style="color:dodgerblue">Uslove korišćenja i Politiku privatnosti</a>.</p>

                    <div class="clearfix2">
                      <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn2">Izađi</button>
                      <button type="submit" class="signupbtn" name="signup">Registrujte se</button>
                    </div>
                 </div>
                </form>
            </div>
          
    </div>
</div>

<script>
 
  var modal = document.getElementById('id01');
  
  //kada korisnik klikne bilo gde izvan modala zatvori ga
  window.onclick = function(event) {
      if (event.target == modal) {
          modal.style.display = "none";
      }
  }
</script>

<script>
 
  var modal = document.getElementById('id02');
  
  //kada korisnik klikne bilo gde izvan modala zatvori ga
  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  }
</script>
 


</body>
</html>
