<?php require_once("./include/bd.php");
ob_start('ob_gzhandler'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="./style/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous" defer></script>

</head>

<body>
    <?php require_once('./include/header.php') ?>
    <main>

        <section class="d-flex">

            <div class="w-75">
                <h1 class="text-center m-4 text-white">All Users</h1>
                <?php
                if (isset($_SESSION['role']) > 0) {
                    $request = $bdd->prepare("SELECT * FROM users ");
                    $request->execute();
                    $result = $request->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($result as $key => $value) {
                ?>
                        <form method="post" class="d-flex flex-wrap justify-content-center">
                            <div class="w-25 border rounded text-center m-2 pb-2 bg-primary-subtle">
                                <p class="m-1">User : <?= $value['username'] ?></p>
                                <p class="m-1">Email : <?= $value['email'] ?></p>
                                <p class="m-1">Role :
                                    <?php if ($value['role'] == 2) {
                                        echo 'Administrateur';
                                    } else if ($value['role'] == 1) {
                                        echo 'Modérateur';
                                    } else {
                                        echo 'Aucun';
                                    } ?></p>
                                <?php
                                if ($_SESSION['role'] == 2) {
                                ?>
                                    <label for="<?= $value['id'] ?>">Admin</label>
                                    <input type="radio" id="<?= $value['id'] ?>" value="2" name="role">
                                    <label for="<?= $value['id'] ?>">Modo</label>
                                    <input type="radio" id="<?= $value['id'] ?>" value='1' name="role">
                                    <label for="<?= $value['id'] ?>">Aucun</label>
                                    <input type="radio" id="<?= $value['id'] ?>" value="0" name="role">
                                    <br>
                                    <input type="submit" id="<?= $value['id'] ?>" value="Update" name="update<?= $value['id'] ?>" class="bg-black rounded text-white mt-2">
                            </div>
                <?php }
                                if (isset($_POST['update' . $value['id']])) {

                                    $accept = $bdd->prepare("UPDATE users SET role = ? WHERE id = ? ");
                                    $accept->execute([$_POST['role'], $value['id']]);
                                    header('Location: ./admin.php');
                                }
                            }
                        } ?>
                        </form>
            </div>
            <div>
                <h2 class="mt-4 mb-4 text-white">Moderator & Administrator</h2>
                <div>

                    <!-- Affichage Administrateur -->
                    <h4 class="text-white">Admin</h4>
                    <?php
                    foreach ($result as $key => $value) {
                        if ($value['role'] == 2) : ?>
                            <p class="text-warning fw-bold fs-5"><?= $value['username'] ?>, <?= $value['email'] ?>,
                                <?php
                                if ($value['role'] == 2) {
                                    echo 'Administrateur';
                                }
                                ?>
                            </p>
                    <?php
                        endif;
                    }
                    ?>

                    <!-- Affichage modérateur -->
                    <h4 class="text-white">Moderator</h4>
                    <?php
                    foreach ($result as $key => $value) {
                        if ($value['role'] == 1) : ?>
                            <p class="text-warning fw-bold fs-5"><?= $value['username'] ?>, <?= $value['email'] ?>,
                                <?php
                                if ($value['role'] == 1) {
                                    echo 'Moderator';
                                }
                                ?>
                            </p>

                    <?php
                        endif;
                    }

                    ?>
                </div>
            </div>
        </section>
    </main>
</body>

</html>