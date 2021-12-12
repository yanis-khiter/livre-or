<!-- - Un formulaire d’ajout de commentaire (commentaire.php)
Ce formulaire ne contient qu’un champs permettant de rentrer son
commentaire et un bouton de validation. Il n’est accessible qu’aux
utilisateurs connectés. Chaque utilisateur peut poster plusieurs
commentaires. --> 

<?php

session_start();

    require('connect.php');

    $message = '';

if (isset($_POST['submit'])) {

if (!empty($_POST['comment'])) {
    $comment = $_POST['comment'];

    $id = $_SESSION['id'];
    $sql = "INSERT INTO commentaires(commentaire, id_utilisateur) VALUES ('$comment', '$id')";
    $requete = mysqli_query($bdd, "INSERT INTO commentaires(commentaire, id_utilisateur) VALUES ('$comment', '$id')");

    header('Location: livre-or.php');

} else {
    $error = 'Veuillez remplir le champ';
}
}

?>

<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="style.css">

        <title>Commentaire</title>

    </head>

    <body class="bodycomm">
        
        <?php include 'header.php'; ?>

            <div class="box-c">

                <h1 class="h1com"> Commentaires</h1>

                    <form class="form-com" method="POST">


                        <textarea  class="areacom" name="commentaire" placeholder="Votre commentaire..." required></textarea>

                        <div class="buttoncom">
                        <input class="inputcom" type="submit" value="Poster mon commentaire" name="submit_commentaire" />
                        </div>

                        <?php
                        echo "<p class='msg'>". $message. '</p>' ;
                        ?>
                

                    </form>

            </div>
    

    </body>

    </html>