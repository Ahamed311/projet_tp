<?php
include 'connexion.php';

if (isset($_POST['submit'])) {

    $courses_id = (int) $_POST['courses_id'];

    if ($courses_id > 0) {

        // Mise à jour du statut à "terminée"
        $requete = "UPDATE courses
                    SET statut = 'terminee'
                    WHERE courses_id = $courses_id AND statut = 'en cours'";
        $execution = mysqli_query($connexion, $requete);

        if ($execution && mysqli_affected_rows($connexion) > 0) {
            header("location: terminer_course.php?success=1");
        } else {
            header("location: terminer_course.php?error=1");
        }
    } else {
        header("location: terminer_course.php?error=1");
    }
} else {
    header("location: terminer_course.php");
}
?>
