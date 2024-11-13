<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Cours</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <style>
        /* Styles pour un formulaire moderne */
        body {
            background-color: #000;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            font-family: Arial, sans-serif;
            color: #e0e0e0;
            padding: 0 20px;
        }

        .form-container {
            background-color: #1a1a1a;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.6);
            width: 100%;
            max-width: 500px;
            animation: fadeInUp 0.8s ease forwards;
        }

        .form-container h1 {
            font-size: 2rem;
            color: #1db954;
            text-shadow: 0px 0px 6px rgba(29, 185, 84, 0.6);
            margin-bottom: 20px;
            text-align: center;
        }

        .form-container label {
            font-size: 1.1rem;
            color: #e0e0e0;
        }

        input, select {
            background-color: #2a2a2a;
            border: 1px solid #444;
            color: #e0e0e0;
            padding: 10px;
            font-size: 1rem;
            border-radius: 5px;
            width: 100%;
            margin-bottom: 15px;
            transition: all 0.3s ease;
        }

        input:focus, select:focus {
            background-color: #444;
            outline: none;
            box-shadow: 0 0 5px rgba(29, 185, 84, 0.6);
        }

        .btn-submit {
            background-color: #1db954;
            color: white;
            padding: 12px 30px;
            border: none;
            border-radius: 8px;
            font-size: 1.1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            width: 100%;
        }

        .btn-submit:hover {
            background-color: #17a554;
            box-shadow: 0 0 10px rgba(29, 185, 84, 0.6);
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Ajouter un Cours</h1>
        <?php
            require_once('../../models/ProfesseurService.php');
            require_once('../../models/SalleService.php');
            $profService = new ProfesseurService();
            $salleService = new SalleService();
            $professeurs = $profService->getAll();
            $salles = $salleService->getAll();
        ?>
        <form action="../../controllers/CourCtrl.php" method="POST">
            <div class="mb-3">
                <label for="nom">Nom du cours</label>
                <input type="text" name="nom" id="nom" required>
            </div>
            <div class="mb-3">
                <label for="professeur">Professeur</label>
                <select name="professeur" id="professeur" required>
                    <option value="" disabled selected>Choisissez un professeur</option>
                    <?php foreach ($professeurs as $prof): ?>
                        <option value="<?php echo htmlspecialchars($prof['matricule']); ?>">
                            <?php echo htmlspecialchars($prof['matricule'] ); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="salle">Salle</label>
                <select name="salle" id="salle" required>
                    <option value="" disabled selected>Choisissez une salle</option>
                    <?php foreach ($salles as $salle): ?>
                        <option value="<?php echo htmlspecialchars($salle['id']); ?>">
                            <?php echo htmlspecialchars($salle['nom']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <input type="hidden" name="action" value="ajout">
            <button type="submit" class="btn-submit">Ajouter Cours</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
