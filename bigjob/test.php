<?php require_once("./include/bd.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous" defer></script>

</head>

<body>
    <?php require_once('./include/header.php') ?>

    <?php
    if (isset($_SESSION['role']) > 0) {
        $request = $bdd->prepare("SELECT * FROM users ");
        $request->execute();
        $result = $request->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $key => $value) {
    ?>
            <form method="post" class="d-flex">
                <?php
                if ($value['role'] == 0) { ?>
                    <div>
                        <p>User : <?= $value['username'] ?></p>
                        <p>Email : <?= $value['email'] ?></p>
                        <p>Role :
                            <?php if ($value['role'] == 2) {
                                echo 'Admin';
                            } else if ($value['role'] == 1) {
                                echo 'Modo';
                            } else {
                                echo 'Aucun';
                            } ?></p>
                    </div>
                <?php } ?>
                <?php
                if ($value['role'] == 1) { ?>
                    <div>
                        <p>User : <?= $value['username'] ?></p>
                        <p>Email : <?= $value['email'] ?></p>
                        <p>Role : <?= $value['role'] ?></p>
                    </div>
                <?php } ?>
                <?php
                if ($value['role'] == 2) { ?>
                    <div>
                        <p>User : <?= $value['username'] ?></p>
                        <p>Email : <?= $value['email'] ?></p>
                        <p>Role : <?= $value['role'] ?></p>
                    </div>
                <?php } ?>
                <!-- <fieldset> -->

        <?php
        }
    }
        ?>
        <!-- </fieldset> -->

            </form>

</body>

</html>