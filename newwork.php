<!DOCTYPE html>
<?php
session_start();
include_once("php/code.php");

$user = new Users;
$work = new Works;

if(isset($_POST["submit"]))
{
    if($_POST["submit"] === "ADD")
	{
    	if($_POST['title'] != NULL && $_POST['description'] != NULL)
    	{
        	$work->create($_POST["title"], $_POST["description"]);
        	//header("Location: /");
    	}
    	else
    	{
        	echo("Veuillez remplir tout le formulaire.");
    	}
	}
}

?>
<html lang="fr">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouveau Projet</title>

</head>
<body>


    <a href="login.php">LOGIN</a>
    <a href="logout.php">LOGOUT</a>

    <form action="newwork.php" method="post">
    	
        <label for="title" >Titre du Projet</label> : <input class="form-control" type="text" name="title"/></input>

        <label for="description" >Description</label> : <input class="form-control" type="text" name="description"/></input>

        <button type="submit" name="submit" value="ADD">Ajouter le projet</button>

    </form>

    <a href=index.php>Page d'accueil</a>
