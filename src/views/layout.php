<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.1.0/fonts/remixicon.css" rel="stylesheet" />
    <title>Document</title>
</head>
<body>
    <header>
        <nav>
            <a href="?page=homepage"><img src="https://app.optimmo-energies.com/assets/optimmo-logo.518c2cc5.svg" class="logo"></img></a>
            <button id="settings-btn">Paramètres</button>
            <div id="settings-container">
                <p>Choisissez la couleur de fond :</p>
                <button class="bg-white-btn">Blanc</button>
                <button class="bg-black-btn">Noir</button>
                <p>Choisissez la couleur des pages :</p>
                <button class="bg-default-btn">Couleur de base</button>
                <button class="bg-white-container-btn">Blanc</button>
                <button class="bg-black-container-btn">Noir</button>
                <p>Choisissez la couleur du bouton :</p>
                <button class="bg-green-btn">Vert</button>
                <button class="bg-red-btn">Rouge</button>
                <button class="bg-blue-btn">Bleu</button>
                <p>Choisissez la couleur du texte :</p>
                <button class="text-white-btn">Blanc</button>
                <button class="text-black-btn">Noir</button>
            </div>

        </nav>
    </header>
    
    <main>
        <?php require '../src/controllers/' . $route . '_controller.php'; ?>
    </main>
    
    <script src="../assets/js/script.js"></script>

</body>
</html>
