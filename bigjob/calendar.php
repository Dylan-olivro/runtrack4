<?php
require_once("./include/bd.php");

if (!isset($_SESSION['id'])) {
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous" defer></script>

</head>

<body>
    <?php require_once('./include/header.php') ?>

    <h1>Calendrier</h1>
    <p>Veuillez choisir une date :</p>
    <form method="post">
        <input type="datetime-local" name="date">
        <p>Veuillez saisir un message :</p>
        <textarea name="message"></textarea>
        <br><br>
        <input type="submit" name="submit" value="Envoyer la demande">
        <?php
        if (isset($error)) { ?>
            <p style="color: red;"><?php echo $error; ?></p>
        <?php
        } else if (isset($succes)) { ?>
            <p style="color: green;"><?php echo $success; ?></p>
        <?php } ?>
    </form>

    <?php
    // var_dump($_SESSION['username']);
    if (isset($_POST['submit'])) {
        $date = $_POST['date'];
        $message = $_POST['message'];
        $user = $_SESSION['username'];
        $today = date('Y-m-d H:i:s');

        if ($date != null) {
            if ($date < $today) {
                $error = "La date est déjà passée, vous ne pouvez plus faire de demande.";
            } else {
                $request = $bdd->prepare("INSERT INTO presence(date,request,username)VALUES(?,?,?)");
                $request->execute([$date, $message, $user]);
                $success = "Votre demande a été enregistrée.";
            }
        } else {
            $error = "Veuillez rentrez une date.";
        }
    }
    var_dump($_SESSION);
    ?>


</body>

</html>