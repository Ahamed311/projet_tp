<?php
include "connexion.php";

// Récupérer toutes les courses avec le nom du chauffeur (jointure)
$requete = "SELECT c.courses_id, c.point_depart, c.point_darrivee, c.date_heure, c.image_vehicule, c.statut,
            ch.nom AS chauffeur
            FROM courses c
            LEFT JOIN chauffeurs ch ON c.chauffeur_id = ch.chauffeur_id
            ORDER BY c.date_heure DESC";

// Exécuter la requête
$execution = mysqli_query($connexion, $requete);

// Vérifier si la requête a échoué
if (!$execution) {
    die("Erreur dans la requête SQL : " . mysqli_error($connexion));
}

// Vérifier s'il y a des résultats
if (mysqli_num_rows($execution) == 0) {
    echo "<p>Aucune course trouvée.</p>";
} else {
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RAPIDO - Liste des Courses</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <div class="fixed-top mb-3">
        <?php include("menu.php"); ?>
    </div>

    <div class="container mt-5 pt-5">
        <h3 class="pt-3 mb-3 text-primary fw-bold">Liste de toutes les courses</h3>

        <!-- Alerte de succès pour suppression -->
        <?php if (isset($_GET['delete'])): ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            Course supprimée avec succès !
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        <?php endif; ?>

        <table class="table table-bordered table-hover mt-3">
            <thead class="table-primary">
                <tr>
                    <th>ID</th>
                    <th>Point de Depart</th>
                    <th>Point d'Arrivee</th>
                    <th>Date et Heure</th>
                    <th>Chauffeur</th>
                    <th>Statut</th>
                    <th style="width:120px;">Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($courses = mysqli_fetch_assoc($execution)): ?>
                <tr>
                    <td><?php echo $courses['courses_id']; ?></td>
                    <td><?php echo htmlspecialchars($courses['point_depart']); ?></td>
                    <td><?php echo htmlspecialchars($courses['point_darrivee']); ?></td>
                    <td><?php echo htmlspecialchars($courses['date_heure']); ?></td>
                    <td><?php echo htmlspecialchars($courses['chauffeur'] ?? 'Non affecté'); ?></td>
                    <td>
                        <?php if ($courses['statut'] == "en cours"): ?>
                            <span class="badge bg-warning text-dark">En cours</span>
                        <?php elseif ($courses['statut'] == "terminee"): ?>
                            <span class="badge bg-success">Terminée</span>
                        <?php else: ?>
                            <span class="badge bg-secondary">En attente</span>
                        <?php endif; ?>
                    </td>
                    <td style="width:120px; height: 50px;">
                        <?php
                        $imagePath = $courses['image_vehicule'];
                        if (!empty($imagePath) && file_exists($imagePath)) {
                            echo '<img src="' . $imagePath . '" alt="Image Véhicule" style="width:100px;">';
                        } else {
                            echo "Aucune image";
                        }
                        ?>
                    </td>
                    <td>
                        <a class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr ?')" href="supprimer_course.php?id=<?php echo $courses['courses_id']; ?>">
                            Supprimer
                        </a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
}
?>
