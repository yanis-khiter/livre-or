
<?php
require_once 'Message.php';
require_once 'GuestBook.php';
$errors = null;
$success = false;
$guestbook  = new GuestBook(__DIR__ . '/' . 'data' . '/' . 'messages');
// $guestbook  = new GuestBook(__DIR__ . DIRECTORY_SEPERATOR . 'data' . DIRECTORY_SEPERATOR . 'messages');

if (isset($_POST['login'], $_POST['message'])) {
    $message = new Message($_POST['login'], $_POST['message']);

    if ($message->isValid())  {
        $guestbook->addMessage($message);
        $success = true;
        $_POST = [];
} else {
    $errors = $message->getErrors();
}
}
$messages = $guestbook->getMessages();
$title = "Livre d'or";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Mon site' ?></title>
</head>
<body>

    <div class="container">
        <h1>Livre d'or</h1>
        
        <?php if (!empty($errors)): ?>
        <div class="alert alert-danger">
            Formulaire invalide
        </div>
        <?php endif ?>
        
        <?php if ($success): ?>
        <div class="alert alert-success">
            Merci pour votre message !  
        </div>
        <?php endif ?>


    <form action="" method="post">
        <div class="form-group">    
            <input value="<?= htmlentities($_POST['login'] ?? '') ?>" type="text" name="login" placeholder="Votre pseudo" class="form-control <?= isset($errors['login']) ? 'is-invalid' : '' ?>" > 
            <?php if (isset($errors['login'])): ?>
            <div class="invalid-feed"><?= $errors['login'] ?></div>
            <?php endif ?>
        </div>
        <div class="form-group">
            <textarea type="text" name="message" placeholder="Votre message" class="form-control <?= isset($errors['message']) ? 'is-invalid' : '' ?>"><?= htmlentities($_POST['message'] ?? '') ?></textarea> 
            <?php if (isset($errors['message'])): ?>
            <div class="invalid-feed"><?= $errors['message'] ?></div>
            <?php endif ?>
        </div>      
        <button class="btn btn-primary">Envoyer </button> 
    </form>

    <?php if (!empty($messages)): ?>
    <h1 class="mt-4"> Vos messages</h1>

    <?php foreach($messages as $message): ?>
        <?= $message->ToHTML() ?>
    <?php endforeach ?>


    <?php endif ?>


</div>





</head>
<body>