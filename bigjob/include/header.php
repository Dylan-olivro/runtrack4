<header>
    <nav>
        <?php
        if (isset($_SESSION['id'])) { ?>
            <a href="index.php">index</a>
            <a href="calendar.php">Calendar</a>
            <a href="disconnect.php">Deconnexion</a>
            <?php
            if ($_SESSION['role'] > 0) { ?>
                <a href="checking.php">Checking</a>
                <a href="admin.php">admin</a>
            <?php
            }
        } else { ?>
            <a href="index.php">index</a>
            <a href="inscription.php">inscription</a>
            <a href="connexion.php">connexion</a>

        <?php
        }
        ?>

    </nav>
</header>