<?php
include 'connexion.php';

if (isset($_POST['submit'])) {
    // Récupération des données du formulaire
    $point_depart = mysqli_real_escape_string($connexion, $_POST['point_depart']);
    $point_darrivee = mysqli_real_escape_string($connexion, $_POST['point_darrivee']);
    $date_heure = mysqli_real_escape_string($connexion, $_POST['date_heure']);

    // Gestion de l'image
    $image_vehicule = '';
    if (isset($_FILES['image_vehicule']) && $_FILES['image_vehicule']['error'] == UPLOAD_ERR_OK) {
        $dossier_upload = 'uploads/'; // Assurez-vous que ce dossier existe et est accessible en écriture
        $nom_fichier = basename($_FILES['image_vehicule']['name']);
        $chemin_fichier = $dossier_upload . $nom_fichier;

        if (move_uploaded_file($_FILES['image_vehicule']['tmp_name'], $chemin_fichier)) {
            $image_vehicule = $chemin_fichier;
        }
    }

    // Insertion dans la base de données
    $requete = "INSERT INTO courses (point_depart, point_darrivee, date_heure, image_vehicule, statut)
                VALUES ('$point_depart', '$point_darrivee', '$date_heure', '$image_vehicule', 'en attente')";

    $execution = mysqli_query($connexion, $requete);

    if ($execution) {
        header("location: courses.php?success=1");
    } else {
        header("location: courses.php?error=1&msg=" . urlencode(mysqli_error($connexion)));
    }
} else {
    header("location: courses.php");
}
?>
