
<header>
<ul>

  <li><a href="index.php" class="active">Page d'accueil</a></li>
  <li><a href="livre-or.php">Livre d'or</a></li>

  <?php

if(isset(  $_SESSION['userconnect'])) {
    echo'<li><a href="commentaire.php">Commentaire</a></li>';
    echo' <li><a href="profil.php">Profil</a></li>';
    echo '<li style="float:right"><a href="deconnexion.php">Deconnexion</a></li>';

} else {
    echo '<li><a href="inscription.php">Inscription</a></li>';
    echo '<li><a href="connexion.php">Connexion</a></li>';
}

  ?>

</ul>

</header>

    
