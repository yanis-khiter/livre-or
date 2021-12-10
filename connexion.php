<!-- - Une page contenant un formulaire de connexion (connexion.php) :
Le formulaire doit avoir deux inputs : “login” et “password”. Lorsque le
formulaire est validé, s’il existe un utilisateur en bdd correspondant à ces
informations, alors l’utilisateur devient connecté et une (ou plusieurs)
variables de session sont créées. -->


<?php

session_start();

include 'connect.php' ;


$message = '';


if(isset($_POST['login'])&& isset($_POST['password'])){

  $login = $_POST['login']; 
  $password = $_POST['password']; 


  $requete = mysqli_query($bdd, "SELECT * FROM utilisateurs WHERE login = '$login' && password = '$password'");

  $resultat= mysqli_fetch_assoc($requete);

if(!empty($resultat)) {

  $_SESSION['userconnect']=[
      'id'  => $resultat['id'],
      'login' => $resultat['login'],
      'password' => $resultat['password'],
    ];
    $_SESSION['id'] = $resultat['id'];
    $_SESSION['login'] = $resultat['login'];
    $_SESSION['password'] = $resultat['password'];

    if($resultat['login']==$login) {
}


header('Location: profil.php'); 
} 


if (isset($resultat['login']) && $resultat['login']=='admin') {
    
    
header('Location: admin.php');
}


else { 
$message = '<br>'.'Utilisateur inconnu ! '; }

}


?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" type="text/css" href="style.css"> 
</head>

<body class="bodyconni">

<?php include 'header.php'; ?>

<main>

<div class="box-b"></div>

        <div class="conni">

            <h1 class="h1conn">Connexion</h1>

            
        <form method ="post" action = "connexion.php" class="form" >

            <input type="text" name="login" placeholder='Login : "Arthur"' required><br>
            <input type="password" name="password" placeholder='Mot de passe : *****' required><br>
        
                <?php
                echo "<p class='msg'>". $message. '</p>' ;
                ?>

            <div id="buttoncon">
            <input class="inputconni" type="submit"value="Se connecter">
            </div> 

        </form>
 
    </div> 

</main>



  

</body>
</html>