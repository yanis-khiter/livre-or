<!-- - Un formulaire d’ajout de commentaire (commentaire.php)
Ce formulaire ne contient qu’un champs permettant de rentrer son
commentaire et un bouton de validation. Il n’est accessible qu’aux
utilisateurs connectés. Chaque utilisateur peut poster plusieurs
commentaires. --> 

<?php

session_start();

if (isset($_POST['deconnexion'])) {

session_destroy();
header('location: index.php');
}


    require('connect.php');
    $error = '';

if (isset($_POST['submit'])) {

if (!empty($_POST['comment'])) {
    $comment = $_POST['comment'];

    $id = $_SESSION['id'];
    $sql = "INSERT INTO commentaires(commentaire, id_utilisateur) VALUES ('$comment', '$id')";
    $requete = mysqli_query($bdd, "INSERT INTO commentaires(commentaire, id_utilisateur) VALUES ('$comment', '$id')");
    header('Location: livre-or.php');

} else {
    $error = 'remplir le champs';
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
    
<header>
    <?php include 'header.php'; ?>
</header>

    <div class="wrapper">

        <form action="" method="POST" class="form">

            <div class="row">

                <div class="input-group textarea">
                    <label for="comment">Postes ton commentaire !</label>
                    <textarea id="comment" name="comment" placeholder="Tapez ici votre commentaire..." required></textarea>
                </div>

        </form>

        <div class="input-group">
            <button name="submit" class="btn">Commenter</button>
            </div>
            
    </div>

</body>

</html>