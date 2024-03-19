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
            <img src="https://app.optimmo-energies.com/assets/optimmo-logo.518c2cc5.svg" class="logo"></img>
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

    <script>
        var settingsContainer = document.getElementById('settings-container');
        var bgWhiteBtn = document.querySelector('.bg-white-btn');
        var bgBlackBtn = document.querySelector('.bg-black-btn');
        var bgDefaultBtn = document.querySelector('.bg-default-btn');
        var bgWhiteContainerBtn = document.querySelector('.bg-white-container-btn');
        var bgBlackContainerBtn = document.querySelector('.bg-black-container-btn');
        var bgGreenBtn = document.querySelector('.bg-green-btn');
        var bgRedBtn = document.querySelector('.bg-red-btn');
        var bgBlueBtn = document.querySelector('.bg-blue-btn');
        var textWhiteBtn = document.querySelector('.text-white-btn');
        var textBlackBtn = document.querySelector('.text-black-btn');

        document.getElementById('settings-btn').addEventListener('click', function() {
            if (settingsContainer.style.display === 'block') {
                settingsContainer.style.display = 'none';
            } else {
                settingsContainer.style.display = 'block';
            }
        });

        bgWhiteBtn.addEventListener('click', function() {
            document.body.style.backgroundColor = 'white';
            settingsContainer.style.display = 'none'; 
        });

        bgBlackBtn.addEventListener('click', function() {
            document.body.style.backgroundColor = 'black';
            settingsContainer.style.display = 'none'; 
        });

        bgDefaultBtn.addEventListener('click', function() {
            document.querySelector('.background-homepage').style.backgroundColor = ''; 
            settingsContainer.style.display = 'none'; 
        });

        bgWhiteContainerBtn.addEventListener('click', function() {
            document.querySelector('.background-homepage').style.backgroundColor = 'white';
            settingsContainer.style.display = 'none'; 
        });

        bgBlackContainerBtn.addEventListener('click', function() {
            document.querySelector('.background-homepage').style.backgroundColor = 'black';
            settingsContainer.style.display = 'none'; 
        });

        bgGreenBtn.addEventListener('click', function() {
        document.querySelector('.btn-continue').style.backgroundColor = '#07755A';
        settingsContainer.style.display = 'none'; 
        });


        bgRedBtn.addEventListener('click', function() {
        document.querySelector('.btn-continue').style.backgroundColor = 'red';
        settingsContainer.style.display = 'none';
        });

        bgBlueBtn.addEventListener('click', function() {
        document.querySelector('.btn-continue').style.backgroundColor = 'blue';
        settingsContainer.style.display = 'none'; 
        });

        document.querySelector('.text-white-btn').addEventListener('click', function() {
            var spans = document.querySelectorAll('span');
            spans.forEach(function(span) {
                span.style.color = 'white';
            });
            settingsContainer.style.display = 'none';
        });


        document.querySelector('.text-black-btn').addEventListener('click', function() {
            var spans = document.querySelectorAll('span');
            spans.forEach(function(span) {
                span.style.color = 'black';
            });
            settingsContainer.style.display = 'none'; 
        });

    </script>
</body>
</html>
