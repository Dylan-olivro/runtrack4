<?php
require_once("./include/bd.php");

if (isset($_SESSION['id']) != null) {
    header('Location: index.php');
}


?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <script src="./js/script.js" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous" defer></script>

</head>

<body>
    <?php require_once('./include/header.php') ?>

    <main>

        <form method="POST" action="" id="signup">
            <h3>Sign Up</h3>

            <!-- <label for="nom">Nom</label> -->
            <!-- <label for="prenom">Prenom</label> -->
            <input type="text" id="username" name="username" placeholder="Username">
            <!-- <label for="login">Login</label> -->
            <input type="email" id="email" name="email" placeholder="Email">
            <!-- <label for="password">Password</label> -->
            <input type="password" id="password" name="password" placeholder="Password">
            <!-- <label for="cpassword">Confirmation</label> -->
            <input type="password" id="cpassword" name="cpassword" placeholder="Confirmation">
            <?php

            if (isset($_POST['envoi'])) {
                $username = $_POST['username'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $cpassword = $_POST['cpassword'];

                $insertUser = $bdd->prepare("INSERT INTO users (username, email, password)VALUES(?,?,?)");
                $insertUser->execute([$username, $email, $password]);
                header("Location: connexion.php");
            }
            ?>
            <button type="submit" name="envoi" class="button" value="Sign Up" id="button">envoyer</button>
        </form>
        <p id="message"></p>
    </main>

</body>

</html>