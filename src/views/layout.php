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
        </nav>
    </header>
    <main>
        <?php require '../src/controllers/' . $route . '_controller.php'; ?>
    </main>
</body>
</html>