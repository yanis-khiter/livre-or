<?php

session_start();

require('connect.php');

?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <title>Livre d'Or</title>

</head>

<body class="bodylivre">

    <?php include 'header.php'; ?>

        <main class="container">

            <h1 class="h1livre">Livre d'or</h1>

                <div class="all-livre">

                    <?php

                    $requete = mysqli_query($bdd, "SELECT * FROM commentaires INNER JOIN utilisateurs WHERE utilisateurs.id = commentaires.id_utilisateur
                        ORDER BY commentaires.date DESC");
                    $commentaires = mysqli_fetch_all($requete);


                    $requete2 = mysqli_query($bdd, "SELECT login FROM utilisateurs INNER JOIN commentaires WHERE
                        commentaires.id_utilisateur = utilisateurs.id");
                    $login = mysqli_fetch_assoc($requete2);


                    foreach ($commentaires as $com) : ?>

                            <p class="livreor"><?= $com[1]; ?></p>
                            
                            <span><?= $com[5]; ?></span>
                            <span> le <?= $com[3]; ?></span>

                    <?php endforeach; ?>

                </div>
                
        </main>

</body>
</html>
