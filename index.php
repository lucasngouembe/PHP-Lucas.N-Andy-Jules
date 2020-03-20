<!DOCTYPE html>
<?php
session_start();
include_once("php/code.php");

$user = new Users;
$work = new Works;
?>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <a href="newwork.php">Ajouter un projet</a>
    <title>php</title>
</head>
<body>
    <p>Bonjour <?php if(isset($_SESSION["account"]["username"]))
    {
        echo($_SESSION["account"]["username"]);
    }
    else
    {
        echo "NOT CONNECTED";
    }
        ?></p>

    <br>
    <?php
        $allworks = $work->get_works();
        foreach($allworks as $w)
        {
            ?>
            <p>
                <a href="editwork.php?id=<?= $w["id"] ?>">
                    <?php
                        echo($w["title"]);
                    ?>
                </a>
                <?php
                    echo(" | ");
                    echo($w["description"]);
                ?>
            </p>
            <?php
        }

    ?>
</body>
</html>