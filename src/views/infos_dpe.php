<?php
$_POST['ademe_number'] = '2251E2193714Q' ;
$_POST['username'] = '';
$_POST['password'] = '';
?>

<div class="background-homepage">
  <div>
    <p>Vos scénario sont prêts !</p>
    <br>
    <p>Pour votre bien au : <span id='adresse'></span></p>
    <br>
    <p>La note de votre logement est <span id='note'></span></p> 
  </div>
  <div class="container-info">
    <div>
      <p>Votre étiquette énergie</p>
      <p><span id='score_dpe'></span> kWh/m²/an</p>
      <p><span id='score_ges'></span> kg CO2/m²/an</p>
      <svg viewbox="0 0 209 24" xmlns="http://www.w3.org/2000/svg">
        <rect x="0" y="0" width="15" height="3" />
      </svg>
    </div>
    <div>
      <p>Schéma de déperditions de chaleur</p>
      <p><span id="ventilation"></span></p>
      <p><span id="toit_plafond"></span></p>
      <p><span id="murs"></span></p>
      <p><span id="portes_fenetres"></span></p>
      <p><span id="ponts_thermiques"></span></p>
      <p><span id="sols"></span></p>
    </div>
  </div>
</div>

<div id='calcul'></div>
<br>

<script>
  var token_;

  async function fetchToken() {
    const result = await fetch('https://dpe-api-service-dev-xfyprtzkyq-ew.a.run.app/token', {
    method: 'POST',
    headers: {
      'accept': 'application/json',
      'Content-Type': 'application/x-www-form-urlencoded'
    },
    body: 'grant_type=&username=<?php echo $_POST['username'] ?>&password=<?php echo $_POST['password'] ?>&scope=&client_id=&client_secret='
    })
    .then((response) => {
      if (response.ok) {
        return response.json();
      } else {
        throw new Error("NETWORK RESPONSE ERROR");
      }
    })
    .then(data => {
      token = data.access_token;
    })
    .catch((error) => console.error("FETCH ERROR:", error));
    return token;
  }

  

  async function fetchAdresse(token) {
    const result = await fetch('https://dpe-api-service-dev-xfyprtzkyq-ew.a.run.app/trouve_adresse/<?php echo $_POST['ademe_number'] ?>', {
    headers: {
      'accept': 'application/json',
      'Authorization': 'Bearer '+token
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
  }

  async function fetchDpeNbr(token) {
    const result = await fetch('https://dpe-api-service-dev-xfyprtzkyq-ew.a.run.app/trouve_info/<?php echo $_POST['ademe_number'] ?>', {
    headers: {
      'accept': 'application/json',
      'Authorization': 'Bearer '+token
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
  }

  async function fetchCalcul(token) {
    const result = await fetch('https://dpe-api-service-dev-xfyprtzkyq-ew.a.run.app/calcul_dpe/<?php echo $_POST['ademe_number'] ?>', {
    headers: {
      'accept': 'application/json',
      'Authorization': 'Bearer '+token
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
  }

  fetchToken().then((r) => {
    fetchAdresse(r);
    fetchDpeNbr(r);
    fetchCalcul(r);
  })

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

    const note_dpeSpan = document.getElementById("note");
    note_dpeSpan.innerHTML = classe_dpe
    const score_dpeSpan = document.getElementById("score_dpe");
    score_dpeSpan.innerHTML = score_dpe
    const score_gesSpan = document.getElementById("score_ges");
    score_gesSpan.innerHTML = score_ges
    const ventilationSpan = document.getElementById("ventilation");
    ventilationSpan.innerHTML = deperdition_renouvellement_air
    const toit_plafondSpan = document.getElementById("toit_plafond");
    toit_plafondSpan.innerHTML = deperdition_plancher_haut
    const mursSpan = document.getElementById("murs");
    mursSpan.innerHTML = deperdition_mur
    const portes_fenetresSpan = document.getElementById("portes_fenetres");
    portes_fenetresSpan.innerHTML = deperdition_menuiserie
    const ponts_thermiquesSpan = document.getElementById("ponts_thermiques");
    ponts_thermiquesSpan.innerHTML = deperdition_pont_thermique
    const solsSpan = document.getElementById("sols");
    solsSpan.innerHTML = deperdition_plancher_bas
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