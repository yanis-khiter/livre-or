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

  
  var_dump($requete);

  $resultat= mysqli_fetch_assoc($requete);

  var_dump($resultat);

  if(!empty($resultat)) {

  $_SESSION['userconnect']=[
      'id' => $resultat['id'],
      'login' => $resultat['login'],
      'password' => $resultat['password'],
    ];

       
if($resultat['login']==$login){
}


header('Location: profil.php'); 
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
    <link rel="stylesheet" type="text/css" href="style1.css"> 

</head>
<body>

    <div class="box-b">
        <div class="connect"> 

            <h1>Connectez-vous</h1>

            

            <form method ="post" action = "connexion.php" class="form" >

            <table>

                <tr>
                    <td>Login</td>
                    <td><input type="text" name="login" placeholder='Exemple : "Yanis13 ..."'></td>
                </tr>
                <tr>
                    <td>Mot de Passe</td>
                    <td><input type="password" name="password" placeholder='Exemple : "**** ..."'></td>
                </tr>

            </table>

            <div id="button">
            <input type="submit"value="Se connecter">
            </div>  

            <?php
                echo "<p class='msg'>". $message. '</p>' ;
                ?>

                
            </form>

        </div> 
    </div>
  

</body>
</html>