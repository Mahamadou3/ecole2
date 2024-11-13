<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil - Royal</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
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
            color: #ff0000;
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

        .navbar {
            background-color: #222222;
        }

        .navbar-brand {
            font-size: 1.8em;
            color: #ff7f00;
        }

        .navbar-nav .nav-item .nav-link {
            color: #fff;
            font-size: 1.2em;
        }

        .navbar-nav .nav-item .nav-link:hover {
            color: #ff7f00;
        }

        .card {
            background-color: #1a1a1a;
            border-radius: 15px;
            color: #fff;
            margin-bottom: 20px;
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-10px);
        }

        .card-header {
            background-color: #ff7f00;
            font-size: 1.5em;
            text-align: center;
            border-radius: 15px 15px 0 0;
        }

        .card-body {
            padding: 20px;
        }

        .card-footer {
            background-color: #1a1a1a;
            text-align: center;
        }

        .btn-custom {
            background-color: #ff7f00;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 1.2em;
        }

        .btn-custom:hover {
            background-color: #e67e00;
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
            color: black;
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

<!-- Navbar -->
<nav class="navbar navbar-expand-lg">
  <div class="container">
    <a class="navbar-brand" href="#">Royal school</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link active" href="index.php">Accueil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="views/Etudiant/liste.php">Étudiants</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="views/Professeur/liste.php">Professeurs</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="views/Salle/liste.php">Salles</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="views/Cours/liste.php">Cours</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="views/Etudiant/form.php">Ajouter Étudiant</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="views/Professeur/form.php">Ajouter Professeur</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="views/Salle/form.php">Ajouter Salle</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="views/Cours/form.php">Ajouter Cours</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- Main Content -->
<div class="container mt-5">
    <h1 class="section-title">Bienvenue à Royal school</h1>
    
    <div class="row">
        <!-- Gestion des étudiants -->
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-graduation-cap"></i> Gestion des Étudiants
                </div>
                <div class="card-body">
                    <p>Ajoutez, modifiez, ou supprimez des étudiants dans le système. Gérez efficacement les inscriptions et la progression des étudiants.</p>
                    <a href="views/Etudiant/liste.php" class="btn-custom">Voir les étudiants</a>
                </div>
                <div class="card-footer">
                    <a href="views/Etudiant/form.php" class="btn-custom">Ajouter un étudiant</a>
                </div>
            </div>
        </div>

        <!-- Gestion des professeurs -->
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-chalkboard-teacher"></i> Gestion des Professeurs
                </div>
                <div class="card-body">
                    <p>Ajoutez, modifiez, ou supprimez des professeurs dans le système. Gérez efficacement les informations des professeurs.</p>
                    <a href="views/Professeur/proliste.php" class="btn-custom">Voir les professeurs</a>
                </div>
                <div class="card-footer">
                    <a href="views/Professeur/proform.php" class="btn-custom">Ajouter un professeur</a>
                </div>
            </div>
        </div>

        <!-- Gestion des salles -->
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-door-open"></i> Gestion des Salles
                </div>
                <div class="card-body">
                    <p>Ajoutez, modifiez, ou supprimez des salles dans le système. Gérez les espaces disponibles pour les cours.</p>
                    <a href="views/Salle/salleListe.php" class="btn-custom">Voir les salles</a>
                </div>
                <div class="card-footer">
                    <a href="views/Salle/formsalle.php" class="btn-custom">Ajouter une salle</a>
                </div>
            </div>
        </div>

        <!-- Gestion des cours -->
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-book-open"></i> Gestion des Cours
                </div>
                <div class="card-body">
                    <p>Ajoutez, modifiez, ou supprimez des cours dans le système. Associez chaque cours à un professeur et une salle.</p>
                    <a href="views/Cours/liste.php" class="btn-custom">Voir les cours</a>
                </div>
                <div class="card-footer">
                    <a href="views/Cour/courForm.php" class="btn-custom">Ajouter un cours</a>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>