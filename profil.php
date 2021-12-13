<!-- - Une page permettant de modifier son profil (profil.php) :
Cette page possède un formulaire permettant à l’utilisateur de modifier son
login et son mot de passe. -->

<?php


session_start();

include 'connect.php' ;


$message = '';

if(isset($_POST['login'])&& isset($_POST['password'])&&  isset($_POST['confirmepassword']))


{ 


$login = $_POST['login']; 
$password = $_POST['password']; 
$password_confirme = $_POST['confirmepassword'];
$id = $_SESSION['userconnect']['id'];


if ($password != $password_confirme) {
    $message = 'Les deux mots de passes ne sont pas identique'; }
    
else {
        $sql="UPDATE `utilisateurs` SET `login`='$login',`password`='$password' WHERE `id`= '$id' ";
        $requete= mysqli_query($bdd, $sql);
                
        header('Location: commentaire.php');
}
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css"> 
    
    <title>Profil</title>

</head>

<body class="bodyprof">

   <?php include 'header.php'; ?>

        <main>
       
            <div class="box-p">

                <div class="profi">

                        <h1 class="h1profil">Profil !</h1>
                        <h2 class ="h2prof"> Bienvenue sur ton profil Clint Eastwood </h2>

                                 <form class="form-pro"  method="post" action="profil.php" class="form" >

                                    <input type="text" name="login" value = "<?php echo $_SESSION['userconnect']['login'];?>" placeholder='Login : "Arthur"' required><br>
                                    <input type="password" name="password" value = "<?php echo $_SESSION['userconnect']['password'];?>" placeholder='Mot de passe : *****' required><br>
                                    <input type="password" name="confirmepassword" placeholder='Confirmation : *****' required><br>


                                    <div class="message">
                                    <?php
                                    echo "<p class='msg'>". $message. '</p>' ;
                                    ?>
                                    </div>
           

                                    <div id="buttonpro">
                                    <input class="inputpro" type="submit"value="Modifier">
                                    </div> 

                                </form>
                                    
                </div>

            </div>

        </main>

</body>
</html>