<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="../../css/style.css">
    <title>Document</title>
</head>

<body>

    <main class="container">
        <?php
        session_start();
        $_SESSION['file'] = basename(__DIR__);
        include_once('../header.php');
        unset($_SESSION['file']);
        ?>

<div class="grid">
  <label for="select-echelle">Sélectionnez l'échelle
  <select name="select-echelle" id="select-echelle" onchange="convertir()">
    <option value="10">1/10</option>
    <option value="25">1/25</option>
    <option value="50">1/50</option>
    <option value="100">1/100</option>
    <option value="200">1/200</option>
    <option value="1440">1/1440</option>
    <option value="2880">1/2880</option>
  </select>
  </label>
  <button onclick="ajouterLigne()">Ajouter</button>
</div>
<br>
<section id="tables">
  <h2>Tables</h2>
  <div class="overflow-auto">
    <table class="striped">
      <thead>
        <tr>
          <th>Valeur en mètre</th>
          <th>Résultat en centimètre</th>
        </tr>
      </thead>
      <tbody id="table-body">
        <tr>
          <td>
            <input type="number" class="input-metre">
          </td>
          <td>
            <input type="text" class="input-centimetre" readonly>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</section>

<script>
let conv = document.querySelectorAll('.input-metre');

conv.forEach(function(input) {
  input.addEventListener('input', convertir);
});


function convertir() {
  const inputsMetres = document.querySelectorAll('.input-metre');
  const inputsCentimetres = document.querySelectorAll('.input-centimetre');
  const selectEchelle = document.getElementById('select-echelle');
  const echelle = parseFloat(selectEchelle.value);

  inputsMetres.forEach((inputMetre, index) => {
    const inputCentimetre = inputsCentimetres[index];
    const valeurMetre = parseFloat(inputMetre.value);

    if (!isNaN(valeurMetre) && !isNaN(echelle)) {
      const valeurCentimetre = (valeurMetre * 100) / echelle;
      inputCentimetre.value = valeurCentimetre.toFixed(2) + " cm";
    } else {
      inputCentimetre.value = '';
    }
  });
}

function ajouterLigne() {
  const tableBody = document.getElementById('table-body');
  const newRow = document.createElement('tr');

  const metreCell = document.createElement('td');
  const metreInput = document.createElement('input');
  metreInput.type = 'number';
  metreInput.classList.add('input-metre');
  metreInput.oninput = convertir;
  metreCell.appendChild(metreInput);

  const centimetreCell = document.createElement('td');
  const centimetreInput = document.createElement('input');
  centimetreInput.type = 'text';
  centimetreInput.classList.add('input-centimetre');
  centimetreInput.readOnly = true;
  centimetreCell.appendChild(centimetreInput);

  newRow.appendChild(metreCell);
  newRow.appendChild(centimetreCell);
  tableBody.appendChild(newRow);
}
</script>

    </main>
</body>
<script src="../../js/theme.js"></script>

</html>