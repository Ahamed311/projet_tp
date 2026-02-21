<?php
include 'connexion.php';

// Récupération sécurisée de l'ID passé en paramètre GET
$courses_id = (int) $_GET['id'];

if ($courses_id > 0) {
    $requete = "DELETE FROM courses WHERE courses_id = $courses_id";
    $execution = mysqli_query($connexion, $requete);

    if ($execution) {
        header("location: index.php?delete=1");
    } else {
        header("location: index.php?error=1");
    }
} else {
    header("location: index.php");
}
?>
