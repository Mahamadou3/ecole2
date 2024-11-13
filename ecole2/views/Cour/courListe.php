<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Cours</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #000;
            color: #e0e0e0;
            font-family: Arial, sans-serif;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            min-height: 100vh;
        }

        h1 {
            color: #1db954;
            margin-bottom: 20px;
            text-align: center;
        }

        .table-container {
            background-color: #1a1a1a;
            border-radius: 15px;
            padding: 20px;
            width: 100%;
            max-width: 900px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.6);
        }

        .table-hover tbody tr:hover {
            background-color: rgba(29, 185, 84, 0.1);
            transition: background-color 0.3s ease;
        }

        .table th, .table td {
            vertical-align: middle;
            color: #e0e0e0;
        }

        .table th {
            color: #1db954;
        }

        .btn-action {
            font-size: 0.9rem;
            padding: 5px 12px;
            border-radius: 8px;
            color: white;
            transition: all 0.3s ease;
        }

        .btn-edit {
            background-color: green;
        }

        .btn-delete {
            background-color: #ff5252;
        }

        .btn-edit:hover, .btn-delete:hover {
            opacity: 0.8;
        }
    </style>
</head>
<body>

    <h1>Liste des Cours</h1>

    <a href="../../controllers/CoursCtrl.php?action=form" class="btn btn-link text-decoration-none text-success">
        <i class="fas fa-plus-circle"></i> Ajouter un nouveau cours
    </a>

    <?php
        require_once('../../models/CoursService.php');
        $coursService = new CoursService();
        $cours = $coursService->getAll();
    ?>

    <div class="table-container">
        <table class="table table-hover table-dark">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NOM DU COURS</th>
                    <th>PROFESSEUR</th>
                    <th>SALLE</th>
                    <th>ACTIONS</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($cours as $cour): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($cour['id_cours']); ?></td>
                        <td><?php echo htmlspecialchars($cour['nom']); ?></td>
                        <td><?php echo htmlspecialchars($cour['matricule']?? ''); ?></td>
                        <td><?php echo htmlspecialchars(string: $cour['id']); ?></td>
                        <td>
                            <a href="../../controllers/CourCtrl.php?action=editForm&id=<?php echo $cour['id']; ?>" class="btn btn-action btn-edit">MODIFIER</a>
                            <a href="../../controllers/CourCtrl.php?action=courDelete&id=<?php echo $cour['id']; ?>" class="btn btn-action btn-delete" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce cours ?')">SUPPRIMER</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
