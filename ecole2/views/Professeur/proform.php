<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un professeur</title>
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
            height: 100vh;
            font-family: Arial, sans-serif;
            overflow: hidden;
            background: #000;
        }

        /* Animation de dégradé de fond */
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

        /* Cercles lumineux flottants */
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

        /* Conteneur du formulaire */
        .form-container {
            background-color: #1a1a1a;
            border-radius: 15px;
            padding: 40px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.6);
            width: 100%;
            max-width: 500px;
            opacity: 0;
            transform: translateY(20px);
            animation: fadeInUp 0.8s ease forwards;
        }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        h1 {
            font-size: 2.5rem;
            font-weight: bold;
            color: #1db954;
            text-align: center;
            margin-bottom: 20px;
            text-shadow: 0px 0px 6px rgba(29, 185, 84, 0.6);
            animation: textGlow 2s ease-in-out infinite alternate;
        }

        @keyframes textGlow {
            0% {
                text-shadow: 0 0 6px rgba(29, 185, 84, 0.6), 0 0 20px rgba(29, 185, 84, 0.4);
            }
            100% {
                text-shadow: 0 0 12px rgba(29, 185, 84, 0.8), 0 0 30px rgba(29, 185, 84, 0.6);
            }
        }

        .form-group label {
            font-weight: 600;
            color: #a0a0a0;
            display: block;
            opacity: 0;
            animation: fadeInLabel 0.5s ease forwards;
        }

        @keyframes fadeInLabel {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .form-control {
            background-color: #121212;
            color: #e0e0e0;
            border: 1px solid #333;
            border-radius: 8px;
            padding: 14px;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        .form-control:focus {
            border-color: #1db954;
            box-shadow: 0 0 10px rgba(29, 185, 84, 0.5);
        }

        .btn-custom, .btn-reset {
            border-radius: 25px;
            font-size: 1.1rem;
            padding: 10px 0;
            width: 100%;
            text-transform: uppercase;
            border: none;
            letter-spacing: 0.05rem;
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
            box-shadow: 0 0 10px rgba(29, 185, 84, 0.5);
        }

        .btn-custom {
            background-color: #1db954;
            color: white;
        }

        .btn-reset {
            background-color: #ff5252;
            color: white;
            margin-top: 15px;
            box-shadow: 0 0 10px rgba(255, 82, 82, 0.5);
        }

        .btn-custom:hover {
            background-color: #17a554;
            box-shadow: 0 0 20px rgba(29, 185, 84, 0.8);
        }

        .btn-reset:hover {
            background-color: #ff3b3b;
            box-shadow: 0 0 20px rgba(255, 82, 82, 0.8);
        }

        .text-center a {
            color: #1db954;
            font-size: 1rem;
            font-weight: bold;
            text-decoration: none;
            animation: fadeInUp 1.5s ease forwards;
        }

        .form-container .form-group {
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

    <div class="form-container">
        <h1>Ajouter un professeur</h1>

        <form action="../../controllers/ProfesseurCtrl.php" method="post">
            <input type="hidden" name="action" value="ajout">

            <div class="form-group">
                <label for="matricule"><i class="fas fa-id-card"></i> MATRICULE</label>
                <input type="text" class="form-control" id="matricule" name="matricule" autocomplete="off" required>
            </div>

            <div class="form-group">
                <label for="nom"><i class="fas fa-user"></i> NOM</label>
                <input type="text" class="form-control" id="nom" name="nom" autocomplete="off" required>
            </div>

            <div class="form-group">
                <label for="prenom"><i class="fas fa-user-tag"></i> PRENOM</label>
                <input type="text" class="form-control" id="prenom" name="prenom" required>
            </div>

            <div class="form-group">
                <label for="matiere"><i class="fas fa-book"></i> SPECIALITE</label>
                <input type="text" class="form-control" id="matiere" name="matiere" required>
            </div>

            <div class="form-group">
                <label for="sexe"><i class="fas fa-venus-mars"></i> SEXE</label>
                <select name="sexe" id="sexe" class="form-control" required>
                    <option value="">Choisir le sexe</option>
                    <option value="H">Homme</option>
                    <option value="F">Femme</option>
                </select>
            </div>

            <div class="form-group">
                <label for="tel"><i class="fas fa-phone"></i> TEL</label>
                <input type="tel" class="form-control" id="tel" name="tel" required>
            </div>

            <div class="form-group">
                <label for="ddn"><i class="fas fa-calendar-alt"></i> DATE DE NAISSANCE</label>
                <input type="date" class="form-control" id="ddn" name="ddn" required>
            </div>

            <div class="text-center">
                <button type="reset" class="btn btn-reset">VIDER</button>
                <button type="submit" class="btn btn-custom">AJOUTER</button>
            </div>
        </form>

        <div class="text-center mt-3">
            <a href="../../controllers/ProfesseurCtrl.php?action=liste" class="btn btn-link"><i class="fas fa-users"></i> Voir la liste des professeurs</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
