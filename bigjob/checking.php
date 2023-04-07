<?php
require_once("./include/bd.php");
ob_start('ob_gzhandler');

if (isset($_SESSION['role']) < 1) {
    header("Location: index.php");
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checking</title>
    <link rel="stylesheet" href="./styles/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous" defer></script>
</head>

<body>
    <?php require_once('./include/header.php') ?>
    <main>
        <h1 class="text-center m-4 text-white">Attendance Request</h1>
        <?php

        if (isset($_SESSION['role']) > 0) {
            $request = $bdd->prepare("SELECT * FROM presence WHERE isAccepted = 'waiting' ");
            $request->execute();
            $result = $request->fetchAll(PDO::FETCH_ASSOC);
            foreach ($result as $key => $value) {
        ?>
                <form method="post" class="d-flex flex-wrap justify-content-center">
                    <!-- <fieldset> -->
                    <div class="w-25 border rounded text-center m-2 pb-2 bg-warning-subtle">
                        <p>Date :<?= $value['date'] ?></p>
                        <p>User :<?= $value['username'] ?></p>
                        <p class="text-break">Message :<?= $value['request'] ?></p>
                        <input type="submit" id="<?= $value['id'] ?>" value="Accept" name="accept<?= $value['id'] ?>" class="bg-warning rounded ">
                        <input type="submit" id="<?= $value['id'] ?>" value="Decline" name="decline<?= $value['id'] ?>" class="bg-warning rounded">
                        <!-- </fieldset> -->
                    </div>



            <?php
                if (isset($_POST['accept' . $value['id']])) {
                    $accept = $bdd->prepare("UPDATE presence SET isAccepted = ? WHERE id = ? ");
                    $accept->execute(["accepted", $value['id']]);
                    header("Location: checking.php");
                } elseif (isset($_POST['decline' . $value['id']])) {
                    $accept = $bdd->prepare("UPDATE presence SET isAccepted = ? WHERE id = ?");
                    $accept->execute(["declined", $value['id']]);
                    header("Location: checking.php");
                }
            }
        }
            ?>
                </form>

    </main>
</body>

</html>