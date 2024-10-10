<?php
// Simulation des données pour le tableau des ventes
$salesData = [
    ['Ordinateur', 50, 800, 40000],
    ['Smartphone', 100, 500, 50000],
    ['Tablette', 30, 300, 9000],
    ['Écran', 80, 200, 16000],
    ['Clavier', 120, 50, 6000],
    ['Souris', 150, 30, 4500],
    ['Imprimante', 25, 150, 3750],
    ['Disque dur', 60, 100, 6000],
    ['Webcam', 40, 70, 2800],
    ['Ordinateur', 50, 800, 40000],
    ['Smartphone', 100, 500, 50000],
    ['Tablette', 30, 300, 9000],
    ['Écran', 80, 200, 16000],
    ['Clavier', 120, 50, 6000],
    ['Souris', 150, 30, 4500],
    ['Imprimante', 25, 150, 3750],
    ['Disque dur', 60, 100, 6000],
    ['Webcam', 40, 70, 2800],
    ['Ordinateur', 50, 800, 40000],
    ['Smartphone', 100, 500, 50000],
    ['Tablette', 30, 300, 9000],
    ['Écran', 80, 200, 16000],
    ['Clavier', 120, 50, 6000],
    ['Souris', 150, 30, 4500],
    ['Imprimante', 25, 150, 3750],
    ['Disque dur', 60, 100, 6000],
    ['Webcam', 40, 70, 2800],
    ['Enceintes', 35, 80, 2800]
];

// Simulation des données pour le tableau des employés
$employeesData = [
    ['Alice Dupont', 'Développeur', 'IT', 5],
    ['Bob Martin', 'Designer', 'Marketing', 3],
    ['Charlie Brown', 'Manager', 'Ventes', 7],
    ['Diana Prince', 'Analyste', 'Finance', 4],
    ['Ethan Hunt', 'Développeur', 'IT', 2],
    ['Fiona Green', 'RH', 'Ressources Humaines', 6],
    ['George White', 'Comptable', 'Finance', 8],
    ['Hannah Black', 'Chef de projet', 'IT', 5],
    ['Ian Foster', 'Commercial', 'Ventes', 3],
    ['Alice Dupont', 'Développeur', 'IT', 5],
    ['Bob Martin', 'Designer', 'Marketing', 3],
    ['Charlie Brown', 'Manager', 'Ventes', 7],
    ['Diana Prince', 'Analyste', 'Finance', 4],
    ['Ethan Hunt', 'Développeur', 'IT', 2],
    ['Fiona Green', 'RH', 'Ressources Humaines', 6],
    ['George White', 'Comptable', 'Finance', 8],
    ['Hannah Black', 'Chef de projet', 'IT', 5],
    ['Ian Foster', 'Commercial', 'Ventes', 3],
    ['Alice Dupont', 'Développeur', 'IT', 5],
    ['Bob Martin', 'Designer', 'Marketing', 3],
    ['Charlie Brown', 'Manager', 'Ventes', 7],
    ['Diana Prince', 'Analyste', 'Finance', 4],
    ['Ethan Hunt', 'Développeur', 'IT', 2],
    ['Fiona Green', 'RH', 'Ressources Humaines', 6],
    ['George White', 'Comptable', 'Finance', 8],
    ['Hannah Black', 'Chef de projet', 'IT', 5],
    ['Ian Foster', 'Commercial', 'Ventes', 3],
    ['Julia Chen', 'Designer', 'Marketing', 4]
];

// Fonction pour filtrer les données en fonction de la recherche
function filterData($data, $search) {
    return array_filter($data, function($row) use ($search) {
        return array_reduce($row, function($carry, $item) use ($search) {
            return $carry || stripos($item, $search) !== false;
        }, false);
    });
}

// Traitement de la requête AJAX
if (isset($_GET['action'])) {
    $action = $_GET['action'];
    $search = isset($_GET['search']) ? $_GET['search'] : '';
    $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
    $perPage = 5; // Nombre d'éléments par page

    if ($action === 'getSales') {
        $filteredData = filterData($salesData, $search);
    } elseif ($action === 'getEmployees') {
        $filteredData = filterData($employeesData, $search);
    } else {
        echo json_encode(['error' => 'Action non valide']);
        exit;
    }

    $total = count($filteredData);
    $totalPages = ceil($total / $perPage);
    $offset = ($page - 1) * $perPage;
    $paginatedData = array_slice($filteredData, $offset, $perPage);

    echo json_encode([
        'data' => $paginatedData,
        'total' => $total,
        'totalPages' => $totalPages,
        'currentPage' => $page
    ]);
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tables avec recherche et pagination</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .searchInput {
            margin-bottom: 10px;
            padding: 5px;
            width: 200px;
        }
        .pagination {
            margin-top: 10px;
        }
        .pageButton {
            margin-right: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h2>Tableau 1: Ventes</h2>
    <input type="text" id="searchInput1" class="searchInput" placeholder="Rechercher..." />
    <table id="dataTable1">
        <thead>
            <tr>
                <th>Produit</th>
                <th>Quantité</th>
                <th>Prix Unitaire</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
    <div id="pagination1" class="pagination"></div>

    <h2>Tableau 2: Employés</h2>
    <input type="text" id="searchInput2" class="searchInput" placeholder="Rechercher..." />
    <table id="dataTable2">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Poste</th>
                <th>Département</th>
                <th>Ancienneté</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
    <div id="pagination2" class="pagination"></div>

    <script>
        function loadData(tableId, action) {
            const searchInput = document.getElementById(`searchInput${tableId.slice(-1)}`);
            const table = document.getElementById(tableId);
            const pagination = document.getElementById(`pagination${tableId.slice(-1)}`);
            let currentPage = 1;

            function fetchData() {
                const search = searchInput.value;
                fetch(`?action=${action}&search=${search}&page=${currentPage}`)
                    .then(response => response.json())
                    .then(data => {
                        updateTable(data.data);
                        updatePagination(data.totalPages);
                    });
            }

            function updateTable(data) {
                const tbody = table.querySelector('tbody');
                tbody.innerHTML = '';
                data.forEach(row => {
                    const tr = document.createElement('tr');
                    row.forEach(cell => {
                        const td = document.createElement('td');
                        td.textContent = cell;
                        tr.appendChild(td);
                    });
                    tbody.appendChild(tr);
                });
            }

            function updatePagination(totalPages) {
                pagination.innerHTML = '';
                for (let i = 1; i <= totalPages; i++) {
                    const button = document.createElement('button');
                    button.textContent = i;
                    button.classList.add('pageButton');
                    if (i === currentPage) {
                        button.disabled = true;
                    }
                    button.addEventListener('click', () => {
                        currentPage = i;
                        fetchData();
                    });
                    pagination.appendChild(button);
                }
            }

            searchInput.addEventListener('input', () => {
                currentPage = 1;
                fetchData();
            });

            fetchData();
        }

        loadData('dataTable1', 'getSales');
        loadData('dataTable2', 'getEmployees');
    </script>
</body>
</html>