<?php
require_once("./include/bd.php");
ob_start('ob_gzhandler');

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
    <link rel="stylesheet" href="./style/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous" defer></script>

</head>

<body>
    <?php require_once('./include/header.php') ?>

    <h1 class="text-center m-4 text-white">History of Attendance Request</h1>
    <main class="d-flex justify-content-center">
        <section>
            <h2 class="text-center text-danger">Declined</h2>
            <?php
            $request = $bdd->prepare("SELECT * FROM presence");
            $request->execute();
            $result = $request->fetchAll(PDO::FETCH_ASSOC);
            foreach ($result as $key => $value) { ?>
                <?php if ($value['isAccepted'] == "declined") { ?>
                    <div class="border rounded p-2 mb-2 bg-danger-subtle">
                        <p class="m-0">Date : <?= $value['date'] ?></p>
                        <p class="m-0">User : <?= $value['username'] ?></p>
                        <p class="m-0">Condition : <?= $value['isAccepted'] ?></p>
                    </div>
            <?php
                }
            }

            ?>
        </section>
        <section class="m-4 mt-0">
            <h2 class="text-center text-success">Accepted</h2>

            <?php
            $request = $bdd->prepare("SELECT * FROM presence");
            $request->execute();
            $result = $request->fetchAll(PDO::FETCH_ASSOC);
            foreach ($result as $key => $value) { ?>
                <?php if ($value['isAccepted'] == "accepted") { ?>
                    <div class="border rounded p-2 mb-2 bg-success-subtle">
                        <p class="m-0">Date : <?= $value['date'] ?></p>
                        <p class="m-0">User : <?= $value['username'] ?></p>
                        <p class="m-0">Condition : <?= $value['isAccepted'] ?></p>
                    </div>
            <?php
                }
            }

            ?>

        </section>
        <section>
            <h2 class="text-center text-secondary">Waiting</h2>

            <?php
            $request = $bdd->prepare("SELECT * FROM presence");
            $request->execute();
            $result = $request->fetchAll(PDO::FETCH_ASSOC);
            foreach ($result as $key => $value) { ?>
                <?php if ($value['isAccepted'] == "waiting") { ?>
                    <div class="border rounded p-2 mb-2 bg-secondary-subtle">
                        <p class="m-0">Date : <?= $value['date'] ?></p>
                        <p class="m-0">User : <?= $value['username'] ?></p>
                        <p class="m-0">Condition : <?= $value['isAccepted'] ?></p>
                    </div>
            <?php
                }
            }

            ?>

        </section>


    </main>
</body>

</html>