const username = '';
const password = '';
let ademe_number = '2357E1112408F';

async function fetchToken(username, password) {
  const result = await fetch('https://dpe-api-service-dev-xfyprtzkyq-ew.a.run.app/token', {
  method: 'POST',
  headers: {
    'accept': 'application/json',
    'Content-Type': 'application/x-www-form-urlencoded'
  },
  body: 'grant_type=&username='+username+'&password='+password+'&scope=&client_id=&client_secret='
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
  const result = await fetch('https://dpe-api-service-dev-xfyprtzkyq-ew.a.run.app/trouve_adresse/'+ademe_number, {
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
  const result = await fetch('https://dpe-api-service-dev-xfyprtzkyq-ew.a.run.app/trouve_info/'+ademe_number, {
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
  const result = await fetch('https://dpe-api-service-dev-xfyprtzkyq-ew.a.run.app/calcul_dpe/'+ademe_number, {
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

fetchToken(username, password).then((r) => {
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

document.addEventListener('DOMContentLoaded', function() {
    const cards = document.querySelectorAll(".card");
    const button = document.querySelector(".btn-continue");

    cards.forEach(function(card) {
        card.addEventListener('click', function() {
            cards.forEach(function(otherCard) {
                if (otherCard !== card) {
                    otherCard.style.border = "none";
                }
            });
            card.style.border = "1px solid #07755A";
            button.style.backgroundColor = "#07755A";
        });
    });
});

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

// const form = document.getElementById("form_submit");

// function ademeSubmit(event) {
//   const input = document.getElementById("ademe_number");
//   const inputValue = input.value;
//   ademe_number = inputValue;
//   console.log(ademe_number);
//   event.preventDefault();
// }

// form.addEventListener("submit", ademeSubmit)

