<title>Connexion</title>
<link rel="stylesheet" href="styler.css">
</head>
<body>
<header>
    <h1>SOC</h1>
    <p>Connectez-vous pour accéder au tableau de bord</p>
</header>
<main>
    <?php
    if(isset($_GET['erreur'])){
        echo "<h5 style='color:red;'>Accès Refusé. Vérifier vos informations</h5>";
    } else if(isset($_GET['succes'])){
        echo "<h4 style='color:blue;'>Bienvenue cher(e) collègue</h4>";
    }
    ?>
    <form method='post' action='connexion.php'>
        <div>
            <label for='name'>Identifiant</label>
            <input type='text' name='name' id='name' required>
        </div>
        <div>
            <label for='mdp'>Mot de passe</label>
            <input type='password' name='mdp' id='mdp' required>
        </div>
        <div>
            <button type='submit'>Connexion</button>
        </div>
        <a href='inscription.php'>S'inscrire</a>
    </form>
</main>
</body>