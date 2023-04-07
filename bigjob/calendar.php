<?php
require_once("./include/bd.php");
ob_start('ob_gzhandler');

if (!isset($_SESSION['id'])) {
    header('Location: index.php');
}
if (isset($_POST['submit'])) {
    $date = $_POST['date'];
    $message = $_POST['message'];
    $user = $_SESSION['username'];
    $today = date('Y-m-d H:i:s');

    if ($date) {
        if ($date < $today) {
            $error = "The date has already passed, you can no longer apply.";
        } else if (strlen($message) > 255) {
            $error = "Message too long, 255 characters maximum.";
        } else {
            $request = $bdd->prepare("INSERT INTO presence(date,request,username)VALUES(?,?,?)");
            $request->execute([$date, $message, $user]);
            $success = "Your request has been registered.";
        }
    } else {
        $error = "Please enter a date.";
    }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendar</title>
    <link rel="stylesheet" href="./styles/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous" defer></script>

</head>

<body>
    <?php require_once('./include/header.php') ?>

    <main class="d-flex flex-column align-items-center">
        <h1 class="text-white m-4">Calendrier</h1>
        <form method="post" class="border rounded p-3 w-50 text-center bg-primary-subtle ">
            <p>Please select a date:</p>
            <input type="datetime-local" name="date">
            <p>Please enter a message:</p>
            <div class="form-floating">
                <textarea class="form-control calendarTextarea bg-primary-subtle border-primary border-3" placeholder=" Leave a comment here" id="floatingTextarea" name="message"></textarea>
                <label for="floatingTextarea">Message</label>
            </div>
            <br><br>
            <?php
            if (isset($error)) { ?>
                <p style="color: red;"><?php echo $error; ?></p>
            <?php
            } else if (isset($succes)) { ?>
                <p style="color: green;"><?php echo $success; ?></p>
            <?php } ?>
            <input type="submit" name="submit" value="Submit" class="bg-primary rounded text-white">
        </form>

        <?php

        ?>
        <!-- else if (strlen($message) > 250) {
    $error = "Message trop long, 255 caractères max.";
    } -->
    </main>
</body>

</html>