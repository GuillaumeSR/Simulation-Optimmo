<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <title>Optimmo</title>
  <style>
    .container {
      display: flex;
      justify-content: space-between;
    }
    .left-div {
      width: 45%;
      margin-left: 20px; 
    }
    .right-div {
      width: 45%; 
      background-color: #04755a;
      color: #fff;
    }
    .right-div img {
      display: block;
      margin: 0 auto; 
      max-width: 100%;
      height: auto;
    }
    body {
  font-family: Arial, sans-serif;
  font-size: 16px;
  line-height: 1.5;
  color: #333;
  padding: 20px;
}

p {
  margin-bottom: 20px;
}

a {
  color: #007bff;
  text-decoration: none;
}

a:hover {
  text-decoration: underline;
}

button, input[type="submit"] {
  background-color: #007bff;
  color: #fff;
  border: none;
  padding: 5px 10px;
  border-radius: 5px;
  cursor: pointer;
}

button:hover, input[type="submit"]:hover {
  background-color: #0056b3;
}

input[type="file"] {
  margin-top: 5px;
}

input[type="text"] {
  padding: 5px;
  border: 1px solid #ccc;
  border-radius: 5px;
  width: 100%;
}
  </style>
</head>
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
      <form action="ademe.php" method="post" onsubmit="saveAdemeNumber()">
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

  <script>
    function saveAdemeNumber() {
      var ademeNumber = document.getElementById("ademe_number").value;
      localStorage.setItem("ademeNumber", ademeNumber);
    }
  </script>
</body>
</html>