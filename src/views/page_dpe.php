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
  <div class="background-homepage">
  <div class="container">
    <div class="left-div">
    <a href="?page=homepage">retours</a>
      <ul>
      <span><li>J'ai déjà mon DPE</li></span>
      <span><li>J'importe mon DPE</li></span>
      </ul>
      <form action="?page=infos_dpe" method="post" enctype="multipart/form-data">
        <span><label for="dpe-file">Importer ou déposer le document (Format .pdf, maximum 10 Mo)</label></span>
        <input type="file" id="dpe-file" name="dpe-file">
        <button class="btn-continue" type="submit">Envoyer</button>
      </form>
      <form action="?page=infos_dpe" method="post">
      <span><label for="ademe-number">Je rentre mon numéro Ademe</label></span>
        <input type="text" id="ademe_number" name="ademe_number">
        <button class="btn-continue" type="submit">Valider</button>
      </form>
      <a href="#">Où trouver mon numéro Ademe ?</a>
    </div>
    <div class="right-div">
      <img src="https://app.optimmo-energies.com/assets/building-home.e427e51d.jpg" alt="Building Home">
      <span>
        Vous êtes bien accompagnés<br>
        Optimmo utilise votre DPE pour récupérer les données énergétiques de votre bien et calculer au plus juste les scénarios de travaux optimisés.<br>
        Moteur de calcul de DPE agréé par l'Etat<br>
        Vraies bases de données de travaux pour chiffrer au plus juste<br>
        Algorithme d'optimisation des coûts des travaux<br>
      </span>
    </div>
  </div>
  </div>
</body>
</html>
