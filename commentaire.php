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
    $requete = mysqli_query($bdd, "INSERT INTO commentaires(id,commentaire, id_utilisateur, date) VALUES (NULL, '$comment', '$id', NOW())");

    header('Location: livre-or.php');

} else {
    $message = 'Veuillez remplir le champ';
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

                <form method ="post" action = "commentaire.php" class="form-com" >

                    <textarea  class="areacom" name="comment"  placeholder="Dis-moi tout cow-boy ..." required></textarea>

                    <div class="buttoncom">
                    <input class="inputcom" type="submit" value="Commenter" name="submit" action="post" required/>
                    </div>

                    <div class="message">
                    <?php
                    echo "<p class='msg'>". $message. '</p>' ;
                    ?>
                    </div>

                </form>
            
            </div>
    

    </body>

    </html>