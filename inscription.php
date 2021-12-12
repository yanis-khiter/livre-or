<!-- - Une page contenant un formulaire d’inscription (inscription.php) :
Le formulaire doit contenir l’ensemble des champs présents dans la table
“utilisateurs” (sauf “id”) ainsi qu’une confirmation de mot de passe. Dès
qu’un utilisateur remplit ce formulaire, les données sont insérées dans la
base de données et l’utilisateur est redirigé vers la page de connexion. -->

<?php

include 'connect.php' ;

$message = '';

if(isset($_POST['login'])&& isset($_POST['password'])&&  isset($_POST['confirmepassword']))

{ 

$login = $_POST['login']; 
$password = $_POST['password']; 
$password_confirme = $_POST['confirmepassword'];


    $requete = mysqli_query($bdd, "SELECT * FROM utilisateurs WHERE login = '$login'");
    
    $resultat = mysqli_fetch_all($requete);

            if ($password != $password_confirme) {
                $message = 'Les deux mots de passes ne sont pas identique'; } 

            elseif (count($resultat) != 0){
                $message='Login déjà pris !'; } 

            else {

    $requete = mysqli_query($bdd, "INSERT INTO utilisateurs(login, password) VALUES ('$login','$password') ");

    header('Location: connexion.php');

}
}

?>   


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" type="text/css" href="style.css"> 

</head>

<body class="bodyinscri">

<?php include 'header.php'; ?>

    <main>

        <div class="box-a">

            <div class="boxy">

                <h1 class="h1inscri">Inscription</h1>
                <h2 class="h2inscri">Je te laisse t'inscrire Cow-Boy ! </h2>
                    
                    <form method="post" action="inscription.php" class="form-inscri" >

                        <input type="text" name="login" placeholder='Login : "Arthur"' required><br>
                        <input type="password" name="password" placeholder='Mot de passe : *****' required><br>
                        <input type="password" name="confirmepassword" placeholder='Confirmation : *****' required><br>

                        <?php
                        echo "<p class='msg'>". $message. '</p>' ;
                        ?>

                        <div id="buttoninscri">
                        <input class="inputinscri" type="submit" value="S'inscrire">
                        </div> 

                    </form>

            <div>

        </div>

    </main>           

</body>
</html> 