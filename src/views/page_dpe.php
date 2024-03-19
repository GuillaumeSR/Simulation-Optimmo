<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ademeNumber = $_POST["ademe_number"];

    $_SESSION["ademeNumber"] = $ademeNumber;

    header("Location: ?page=infos_dpe");
    exit();
}
?>


<body>
  <h1></h1>
  <div class="container">
    <div class="left-div">
    <span><a href="?page=homepage">retours</a></span>
      <ul>
        <li>J'ai déjà mon DPE</li>
        <li>J'importe mon DPE</li>
      </ul>
      <form action="import.php" method="post" enctype="multipart/form-data">
        <label for="dpe-file">Importer ou déposer le document (Format .pdf, maximum 10 Mo)</label>
        <input type="file" id="dpe-file" name="dpe-file">
        <button type="submit">Envoyer</button>
      </form>
      <form action="?page=infos_dpe" method="post">
        <label for="ademe-number">Je rentre mon numéro Ademe</label>
        <input type="text" id="ademe_number" name="ademe_number">
        <button type="submit">Valider</button>
      </form>
      <a href="#">Où trouver mon numéro Ademe ?</a>
    </div>
    <div class="right-div">
      <img src="https://app.optimmo-energies.com/assets/building-home.e427e51d.jpg" alt="Building Home">
      <p>
        Vous êtes bien accompagnés<br>
        Optimmo utilise votre DPE pour récupérer les données énergétiques de votre bien et calculer au plus juste les scénarios de travaux optimisés.<br>
        Moteur de calcul de DPE agréé par l'Etat<br>
        Vraies bases de données de travaux pour chiffrer au plus juste<br>
        Algorithme d'optimisation des coûts des travaux<br>
      </p>
    </div>
  </div>
</body>
</html>
