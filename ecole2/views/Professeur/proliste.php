<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des professeurs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        /* Arrière-plan AMOLED avec animation */
        body {
            margin: 0;
            padding: 0 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            min-height: 100vh;
            font-family: Arial, sans-serif;
            background: #000;
            overflow: hidden;
            color: #e0e0e0;
        }

        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #000000, #0f0f0f, #000000);
            animation: gradientAnimation 6s infinite alternate;
            z-index: -2;
        }

        @keyframes gradientAnimation {
            0% {
                background: linear-gradient(135deg, #000000, #0f0f0f, #000000);
            }

            100% {
                background: linear-gradient(135deg, #000000, #1a1a1a, #0f0f0f);
            }
        }

        body::after {
            content: '';
            position: absolute;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(29, 185, 84, 0.4), transparent 60%);
            filter: blur(100px);
            animation: floatingCircles 10s infinite alternate;
            z-index: -1;
        }

        @keyframes floatingCircles {
            0% {
                transform: translate(-30%, -30%);
            }

            100% {
                transform: translate(10%, 10%);
            }
        }

        h1 {
            font-size: 2.5rem;
            font-weight: bold;
            color: #1db954;
            text-shadow: 0px 0px 6px rgba(29, 185, 84, 0.6);
            animation: textGlow 2s ease-in-out infinite alternate;
            margin-bottom: 20px;
        }

        @keyframes textGlow {
            0% {
                text-shadow: 0 0 6px rgba(29, 185, 84, 0.6), 0 0 20px rgba(29, 185, 84, 0.4);
            }

            100% {
                text-shadow: 0 0 12px rgba(29, 185, 84, 0.8), 0 0 30px rgba(29, 185, 84, 0.6);
            }
        }

        .table-container {
            background-color: #1a1a1a;
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.6);
            width: 100%;
            max-width: 800px;
            animation: fadeInUp 0.8s ease forwards;
        }

        .table {
            color: #e0e0e0;
        }

        .table th,
        .table td {
            vertical-align: middle;
        }

        .table-hover tbody tr:hover {
            background-color: rgba(29, 185, 84, 0.1);
            transition: background-color 0.3s ease;
        }

        .table th {
            color: #1db954;
        }

        .table a {
            color: #1db954;
            font-weight: bold;
            text-decoration: none;
        }

        .table a:hover {
            color: #17a554;
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
            color: white;
        }

        .btn-edit:hover {
            background-color: #17a554;
            box-shadow: 0 0 10px rgba(29, 185, 84, 0.6);
        }

        .btn-delete {
            background-color: #ff5252;
        }

        .btn-delete:hover {
            background-color: #ff3b3b;
            box-shadow: 0 0 10px rgba(255, 82, 82, 0.6);
        }

        .message {
            color: #1db954;
            font-size: large;
            font-weight: bold;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

    <h1>Liste des professeurs</h1>

    <a href="../../controllers/ProfesseurCtrl.php?action=form" class="btn btn-link"><i class="fas fa-user-plus"></i> Ajouter un professeur</a>

    <?php if (isset($_GET['message'])) : ?>
        <div class="message">
            <?php echo $_GET['message']; ?>
        </div>
    <?php endif; ?>

    <?php
    require_once('../../models/ProfesseurService.php');
    $profService = new ProfesseurService();
    $professeurs = $profService->getAll();
    ?>

    <div class="table-container">
        <table class="table table-hover table-dark">
            <thead>
                <tr>
                    <th>MATRICULE</th>
                    <th>NOM</th>
                    <th>PRENOM</th>
                    <th>SEXE</th>
                    <th>SPECIALITE</th>
                    <th>TELEPHONE</th>
                    <th>DATE DE NAISSANCE</th>
                    <th>ACTIONS</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($professeurs as $prof) : ?>
                    <tr>
                        <td><?php echo $prof['matricule']; ?></td>
                        <td><?php echo $prof['nom']; ?></td>
                        <td><?php echo $prof['prenom']; ?></td>
                        <td><?php echo $prof['sexe']; ?></td>
                        <td><?php echo $prof['matiere']; ?></td>   
                        <td><?php echo $prof['tel']; ?></td>
                        <td><?php echo $prof['ddn']; ?></td>
                        <td>
                            <a href="../../controllers/ProfesseurCtrl.php?action=editForm&matricule=<?php echo $prof['matricule']; ?>" class="btn btn-action btn-edit">MODIFIER</a>
                            <a href="../../controllers/ProfesseurCtrl.php?action=delete&matricule=<?php echo $prof['matricule']; ?>" class="btn btn-action btn-delete" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce professeur ?')">SUPPRIMER</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</body>

</html>
