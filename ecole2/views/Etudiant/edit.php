<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification étudiant</title>
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

        .form-container {
            background-color: #1a1a1a;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.6);
            width: 100%;
            max-width: 600px;
            animation: fadeInUp 0.8s ease forwards;
        }

        .table {
            color: #e0e0e0;
        }

        .table th, .table td {
            vertical-align: middle;
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
        }

        .btn-submit:hover {
            background-color: #17a554;
            box-shadow: 0 0 10px rgba(29, 185, 84, 0.6);
        }
        
    </style>
</head>
<body>

    <h1>Formulaire modification étudiant</h1>
  
    <?php
        $matricule = $_GET['matricule'];
        require_once('../../models/EtudiantService.php');
        $etService = new EtudiantService();
        $etudiant = $etService->getByMatricule($matricule);
    ?>
  
    <div class="form-container">
        <form action="../../controllers/EtudiantCtrl.php" method="post">
            <label for="matricule">MATRICULE</label>
            <input type="text" name="matricule" id="matricule" value="<?= $etudiant['matricule'] ?>" readOnly autocomplete="off" required>

            <label for="nom">NOM</label>
            <input type="text" name="nom" id="nom" value="<?= $etudiant['nom'] ?>" autocomplete="off" required>

            <label for="prenom">PRENOM</label>
            <input type="text" name="prenom" id="prenom" value="<?= $etudiant['prenom'] ?>" required>

            <label for="sexe">SEXE</label>
            <select name="sexe" id="sexe" required>
                <option value="">Veuillez choisir le sexe de l'étudiant</option>
                <option value="H" <?php if($etudiant['sexe'] == 'H') echo 'selected'; ?>>Homme</option>
                <option value="F" <?php if($etudiant['sexe'] == 'F') echo 'selected'; ?>>Femme</option>
            </select>

            <label for="tel">TELEPHONE</label>
            <input type="number" name="tel" id="tel" value="<?= $etudiant['tel'] ?>" required>

            <label for="ddn">DATE DE NAISSANCE</label>
            <input type="date" name="ddn" id="ddn" value="<?= $etudiant['ddn'] ?>" required>

            <input type="hidden" name="action" value="modifier">
            <button type="submit" class="btn-submit">MODIFIER</button>
        </form>
    </div>

</body>
</html>
