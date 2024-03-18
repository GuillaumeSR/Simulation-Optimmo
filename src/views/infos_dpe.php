<?php
$_POST['ademe_number'] = '2251E2193714Q' ;
$_POST['api_token'] = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiJjb2RhX3NjaG9vbF9zdHVkZW50IiwiZXhwIjoxNzEwNzgxNTc4fQ._BEEJ5oeq6CawxXMtww13M6Q99I78XvO-q2ccjA1tVw' ;
?>

<p>Votre situation DPE au :</p>
<div id='adresse'></div>
<br>
<div id='dpe_nbr'></div>
<br>
<div id='calcul'></div>
<br>

<script>
  fetch('https://dpe-api-service-dev-xfyprtzkyq-ew.a.run.app/trouve_adresse/<?php echo $_POST['ademe_number'] ?>', {
  headers: {
    'accept': 'application/json',
    'Authorization': 'Bearer <?php echo $_POST['api_token'] ?>'
  }
  })
  .then((response) => {
    if (response.ok) {
      return response.json();
    } else {
      throw new Error("NETWORK RESPONSE ERROR");
    }
  })
  .then(data => {
    console.log(data);
    displayAdresse(data)
  })
  .catch((error) => console.error("FETCH ERROR:", error));

  fetch('https://dpe-api-service-dev-xfyprtzkyq-ew.a.run.app/trouve_info/<?php echo $_POST['ademe_number'] ?>', {
  headers: {
    'accept': 'application/json',
    'Authorization': 'Bearer <?php echo $_POST['api_token'] ?>'
  }
  })
  .then((response) => {
    if (response.ok) {
      return response.json();
    } else {
      throw new Error("NETWORK RESPONSE ERROR");
    }
  })
  .then(data => {
    console.log(data);
    displayDpeNbr(data)
  })
  .catch((error) => console.error("FETCH ERROR:", error));

  fetch('https://dpe-api-service-dev-xfyprtzkyq-ew.a.run.app/calcul_dpe/<?php echo $_POST['ademe_number'] ?>', {
    headers: {
      'accept': 'application/json',
      'Authorization': 'Bearer <?php echo $_POST['api_token'] ?>'
    }
  })
  .then((response) => {
    if (response.ok) {
      return response.json();
    } else {
      throw new Error("NETWORK RESPONSE ERROR");
    }
  })
  .then(data => {
    console.log(data);
    displayCalcul(data)
  })
  .catch((error) => console.error("FETCH ERROR:", error));

  function displayAdresse(data) {
    const adresse = data.adresse;
    const code_postal = data.code_postal;
    const ville = data.ville;
    const adresseDiv = document.getElementById("adresse");
    adresseDiv.innerHTML = adresse + ', ' + code_postal + ', ' + ville;
  }

  function displayDpeNbr(data) {
    const classe_dpe = data.classe_dpe;
    const classe_ges = data.classe_ges;
    const score_dpe = data.score_dpe;
    const score_ges = data.score_ges;
    const deperdition_renouvellement_air = data.deperdition_renouvellement_air;
    const deperdition_mur = data.deperdition_mur;
    const deperdition_plancher_bas = data.deperdition_plancher_bas;
    const deperdition_plancher_haut = data.deperdition_plancher_haut;
    const deperdition_pont_thermique = data.deperdition_pont_thermique;
    const deperdition_menuiserie = data.deperdition_menuiserie;

    const dpe_nbrDiv = document.getElementById("dpe_nbr");
    dpe_nbrDiv.innerHTML = classe_dpe + ' ' + score_dpe + ' ' + classe_ges + ' ' + score_ges;
  }

  function displayCalcul(data) {
    const scenarios = data.Scenarios;

    const eco = scenarios[0];
    const ancienne_note_eco = eco.Ancienne_note;
    const nouvelle_note_eco = eco.Nouvelle_note;
    const cout_bas_eco = eco.Cout_bas;
    const cout_haut_eco = eco.Cout_haut;
    const economie_energie_bas_eco = eco.Economie_energie_bas;
    const economie_energie_haut_eco = eco.Economie_energie_haut;

    const opti = scenarios[1];
    const ancienne_note_opti = opti.Ancienne_note;
    const nouvelle_note_opti = opti.Nouvelle_note;
    const cout_bas_opti = opti.Cout_bas;
    const cout_haut_opti = opti.Cout_haut;
    const economie_energie_bas_opti = opti.Economie_energie_bas;
    const economie_energie_haut_opti = opti.Economie_energie_haut;

    console.log(scenarios);

    const calculDiv = document.getElementById("calcul");
    // dpe_nbrDiv.innerHTML = classe_dpe + ' ' + score_dpe + ' ' + classe_ges + ' ' + score_ges;
  }
</script>