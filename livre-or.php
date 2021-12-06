<!-- - Une page permettant de voir le livre d’or (livre-or.php) :

Sur cette page on voit l’ensemble des commentaires, organisés du plus
récent au plus ancien. Chaque commentaire doit être composé d’un texte
“posté le `jour/mois/année` par `utilisateur`” suivi du commentaire. Si
l’utilisateur est connecté, sur cette page figure également un lien vers la
page d’ajout de commentaire. -->


<meta charset="utf-8" />

<?php

$bdd = new PDO("mysql:host=localhost;DBName=livreor","root",""); 


if (isset($_GET['id']) AND !empty($_GET['id'])) {

    $getid = htmlspecialchars($_GET['id']);

$livreor = $bdd->prepare( 'SELECT * FROM utilisateurs WHERE id = ?');
$livreor->execute(array($getid));
$livreor = $livreor->flech();


if (isset($_POST['submit_commentaire'])) {
    if(isset($POST['pseudo'],$_POST['commentaire']) AND !empty($_POST['pseudo']) AND !empty($_POST['commentaire']
    )){

    } else  {
        $c_erreur = "Tous les champs doivent être complétés";
}
}
}

?>


 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Livre d'Or</title>

 </head>
 <body>
     
<h2>Livre d'Or</h2>
<p><?= $livreor['contenu'] ?></p>

<br />

<h2>Commentaires :</h2>

    <form method="POST">
            <input type="text" name="pseudo" placeholder="Votre pseudo"/><br />
            <textarea name="commentaire" placeholder="Votre commentaire"></textarea><br />
            <input type="submit" value="Poster mon commentaire" name="submit_commentaire"/>
    </form>


        <?php if(isset($c_erreur)) { echo $c_erreur ; } ?>
        
</body>
 </html>
    
