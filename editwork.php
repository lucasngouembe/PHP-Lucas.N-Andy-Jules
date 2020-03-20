<!DOCTYPE html>
<?php
session_start();
include_once("php/code.php");

$user = new Users;
$work = new Works;

if(isset($_POST["submit"]))
{
    if($_POST["submit"] === "EDIT")
    {
        if($_POST['title'] != NULL  && $_POST['description'] != NULL )
        {
            $work->update($_POST["title"], $_POST["description"], $_POST["id"]);
            header("Location: /");
        }
        else
        {
            echo("Attention le formulaire n'est pas rempli correctement.");
        }
    }
}

$id = $_GET["id"];
$w = $work->get_work($id);

?>

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <a href="newwork.php">Ajouter un projet</a>
    <title>php</title>
</head>
<body>
    <form action="editwork.php" method="post">
        <div style="display: none">
            <label for="id" >Project n°</label> :<input class="form-control" id="disabledInput" type="text" name="id" value="<?php echo($id); ?>"></input>
        </div>

            <label for="title" >Titre du Projet</label> : <input value="<?php echo($w["title"]); ?>" type="text" name="title"/></input>

            <label for="description" >Description</label> : <textarea type="text" rows='4' name="description"><?php echo($w["description"]); ?></textarea>

        <button type="submit" name="submit"  value="EDIT">Modifier le projet</button>
    </form>
</body>