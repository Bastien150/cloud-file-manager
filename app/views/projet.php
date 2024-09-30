<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Glubul | Projet</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<!-- Favicon -->
<link rel="stylesheet" href="../assets/css/style.css">
<link rel="shortcut icon" href="../assets/images/favicon.ico" />
<link rel="stylesheet" href="../assets/css/backend-plugin.min.css">
<link rel="stylesheet" href="../assets/css/backend.css?v=1.0.0">

<link rel="stylesheet" href="../assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">
<link rel="stylesheet" href="../assets/vendor/line-awesome/dist/line-awesome/css/line-awesome.min.css">
<link rel="stylesheet" href="../assets/vendor/remixicon/fonts/remixicon.css">
<style>
    .card-h:first-child {
        border-radius: 7px 7px 0 0 !important;
    }

    .card {
        transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        height: 100%;
        border-radius: 10px !important;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    .card-h {
        padding: 0.5em 1em !important;
        background-color: #8a8ef7 !important;
        color: white;
        font-weight: bold;
    }
</style>
</head>

<body>
    <!-- loader -->
    <div id="loading">
        <div id="loading-center">
        </div>
    </div>
    <div class="wrapper">
        <!-- Bandeau navigation gauche  -->
        <div class="iq-sidebar  sidebar-default ">
            <div class="iq-sidebar-logo d-flex align-items-center justify-content-between">
                <a href="" class="header-logo">
                    <img src="../assets/images/logo.png" class="img-fluid rounded-normal light-logo" alt="logo">
                </a>
                <div class="iq-menu-bt-sidebar">
                    <i class="las la-bars wrapper-menu"></i>
                </div>
            </div>
            <div class="data-scrollbar" data-scroll="1">
                <nav class="iq-sidebar-menu">
                    <ul id="iq-sidebar-toggle" class="iq-menu">
                        <li class=" ">
                            <a href="<?= BASE_URL ?>/index.php?route=dash" class="">
                                <i class="las la-home iq-arrow-left"></i><span>Dashboard</span>
                            </a>
                            <ul id="dashboard" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                            </ul>
                        </li>
                        <li class="">
                            <a href="<?= BASE_URL ?>/index.php?route=files" class="">
                                <i class="las la-hdd iq-arrow-left"></i><span>Fichiers</span>
                            </a>
                            <ul id="page-files" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                            </ul>
                        </li>
                        <li class="active">
                            <a href="<?= BASE_URL ?>/index.php?route=project" class="">
                                <i class="las la-stopwatch iq-arrow-left"></i><span>Projets</span>
                            </a>
                            <ul id="page-folders" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                            </ul>
                        </li>
                        <li class=" ">
                            <a href="" class="">
                                <i class="lar la-star"></i><span>Autre</span>
                            </a>
                            <ul id="page-fevourite" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                            </ul>
                        </li>
                    </ul>
                </nav>
                <div class="sidebar-bottom">
                    <h4 class="mb-3"><i class="las la-cloud mr-2"></i>Stockage</h4>
                    <p>17.1 / 20 GB Utilisé</p>
                    <div class="iq-progress-bar mb-3">
                        <span class="bg-primary iq-progress progress-1" data-percent="67">
                        </span>
                    </div>
                    <p>75% plein - 3.9 GB Dispo</p>
                </div>
                <div class="p-3"></div>
            </div>
        </div>

        <!-- bar de navigation (logo, search-bar, icon)-->
        <div class="iq-top-navbar">
            <div class="iq-navbar-custom">
                <nav class="navbar navbar-expand-lg navbar-light p-0">
                    <div class="iq-navbar-logo d-flex align-items-center justify-content-between">
                        <i class="ri-menu-line wrapper-menu"></i>
                        <a href="index.html" class="header-logo">
                            <img src="../assets/images/logo.png" class="img-fluid rounded-normal light-logo" alt="logo">
                            <img src="../assets/images/logo-white.png" class="img-fluid rounded-normal darkmode-logo" alt="logo">
                        </a>
                    </div>

                    <!-- Bar de recherche en haut -->
                    <div class="iq-search-bar device-search">
                        <form>
                            <div class="input-prepend input-append">
                                <div class="btn-group">
                                    <label class="dropdown-toggle searchbox" data-toggle="dropdown">
                                        <input class="dropdown-toggle search-query text search-input" type="text" placeholder="Type here to search..."><span class="search-replace"></span>
                                        <a class="search-link" href="#"><i class="ri-search-line"></i></a>
                                        <span class="caret"><!--icon--></span>
                                    </label>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">
                                                <div class="item"><i class="far fa-file-pdf bg-info"></i>PDFs</div>
                                            </a></li>
                                        <li><a href="#">
                                                <div class="item"><i class="far fa-file-alt bg-primary"></i>Documents</div>
                                            </a></li>
                                        <li><a href="#">
                                                <div class="item"><i class="far fa-file-excel bg-success"></i>Spreadsheet</div>
                                            </a></li>
                                        <li><a href="#">
                                                <div class="item"><i class="far fa-file-powerpoint bg-danger"></i>Presentation</div>
                                            </a></li>
                                        <li><a href="#">
                                                <div class="item"><i class="far fa-file-image bg-warning"></i>Photos & Images</div>
                                            </a></li>
                                        <li><a href="#">
                                                <div class="item"><i class="far fa-file-video bg-info"></i>Videos</div>
                                            </a></li>
                                    </ul>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="d-flex align-items-center">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-label="Toggle navigation">
                            <i class="ri-menu-3-line"></i>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ml-auto navbar-list align-items-center">
                                <li class="nav-item nav-icon search-content">
                                    <a href="#" class="search-toggle rounded" id="dropdownSearch" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="ri-search-line"></i>
                                    </a>
                                    <div class="iq-search-bar iq-sub-dropdown dropdown-menu" aria-labelledby="dropdownSearch">
                                        <form action="#" class="searchbox p-2">
                                            <div class="form-group mb-0 position-relative">
                                                <input type="text" class="text search-input font-size-12" placeholder="type here to search...">
                                                <a href="#" class="search-link"><i class="las la-search"></i></a>
                                            </div>
                                        </form>
                                    </div>
                                </li>

                                <!-- Icon paramètre -->
                                <li class="nav-item nav-icon dropdown">
                                    <a href="#" class="search-toggle dropdown-toggle" id="dropdownMenuButton02" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="ri-settings-3-line"></i>
                                    </a>
                                    <div class="iq-sub-dropdown dropdown-menu" aria-labelledby="dropdownMenuButton02">
                                        <div class="card shadow-none m-0">
                                            <div class="card-body p-0 ">
                                                <div class="p-3">
                                                    <a href="#" class="iq-sub-card pt-0"><i class="ri-settings-3-line"></i> Settings</a>
                                                    <a href="#" class="iq-sub-card"><i class="ri-hard-drive-line"></i> Get Drive for desktop</a>
                                                    <a href="#" class="iq-sub-card"><i class="ri-keyboard-line"></i> Keyboard Shortcuts</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <!-- Profile icon + info -->
                                <li class="nav-item nav-icon dropdown caption-content">
                                    <a href="#" class="search-toggle dropdown-toggle" id="dropdownMenuButton03" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <div class="caption bg-primary line-height"><?php if (isset($_SESSION['info_user'])) {
                                                                                        $infouser = $_SESSION['info_user'][0];
                                                                                        echo substr($infouser['username'], 0, 1);
                                                                                    } ?></div>
                                    </a>
                                    <div class="iq-sub-dropdown dropdown-menu" aria-labelledby="dropdownMenuButton03">
                                        <div class="card mb-0">
                                            <div class="card-header d-flex justify-content-between align-items-center mb-0">
                                                <div class="header-title">
                                                    <h4 class="card-title mb-0">Profile</h4>
                                                </div>
                                                <div class="close-data text-right badge badge-primary cursor-pointer "><i class="ri-close-fill"></i></div>
                                            </div>
                                            <div class="card-body">
                                                <div class="profile-header">
                                                    <div class="cover-container text-center">
                                                        <div class="rounded-circle profile-icon bg-primary mx-auto d-block">
                                                            <?php if (isset($infouser)) {
                                                                echo substr($infouser['username'], 0, 1);
                                                            } ?></div>
                                                        <div class="profile-detail mt-3">
                                                            <h5><a href="../app/user-profile-edit.html"><?php if (isset($_SESSION['info_user'])) {
                                                                                                            $infouser = $_SESSION['info_user'][0];
                                                                                                            echo $infouser['username'];
                                                                                                        } ?></a></h5>
                                                            <p><?php if (isset($infouser['email'])) {
                                                                    echo $infouser['email'];
                                                                } ?></p>
                                                        </div>
                                                        <a href="<?= BASE_URL ?>/index.php?route=logout" class="btn btn-primary">Se déconnecter</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>

        <div class="content-page">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-block card-stretch card-transparent">
                            <div class="card-header d-flex flex-column flex-md-row justify-content-between pb-0">
                                <div class="container mt-5">
                                    <h1 class="mb-4 text-center">Projets réalisés</h1>

                                    <div class="mb-4">
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fas fa-search"></i></span>
                                            <input type="text" id="searchInput" class="form-control" placeholder="Rechercher un projet...">
                                        </div>
                                    </div>

                                    <div id="cardContainer" class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 g-4">
                                        <!-- Les cartes seront générées ici dynamiquement -->
                                        <?php foreach ($projects as $project) : ?>
                                            <div class="col">
                                                <div class="card h-100 shadow-sm">
                                                    <div class="card-h card-header d-flex justify-content-between align-items-center">
                                                        <span><?= htmlspecialchars($project['title']) ?></span>
                                                        <i class="<?= htmlspecialchars($project['icon']) ?>"></i>
                                                    </div>
                                                    <div class="card-body d-flex flex-column">
                                                        <h5 class="card-title"><?= htmlspecialchars($project['spe_title']) ?></h5>
                                                        <p class="card-text flex-grow-1"><?= htmlspecialchars($project['content']) ?></p>
                                                        <a href="#" class="btn btn-primary mt-auto">Voir le projet</a>
                                                    </div>
                                                    <div class="card-footer text-muted"><?= htmlspecialchars($project['project_date']) ?></div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- footer copyright -->
    <footer class="iq-footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 text-right">
                    <span class="mr-1">
                        <script>
                            document.write(new Date().getFullYear())
                        </script> ©
                    </span> <a href="<?= BASE_URL ?>/index.php?route=admin" class="">
                                Glubul
                            </a>
                </div>
            </div>
        </div>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Fonction pour normaliser les accents
        function normalizeString(str) {
            return str.normalize("NFD").replace(/[\u0300-\u036f]/g, "").toLowerCase();
        }

        // Fonction de recherche
        function searchCards() {
            const searchTerm = normalizeString(document.getElementById('searchInput').value);
            const cards = document.querySelectorAll('#cardContainer .col');

            cards.forEach(card => {
                const title = normalizeString(card.querySelector('.card-header span').textContent);
                const speTitle = normalizeString(card.querySelector('.card-title').textContent);
                const content = normalizeString(card.querySelector('.card-text').textContent);
                const date = normalizeString(card.querySelector('.card-footer').textContent);

                if (title.includes(searchTerm) || speTitle.includes(searchTerm) || content.includes(searchTerm) || date.includes(searchTerm)) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        }

        // Écouteur d'événement pour la recherche
        document.getElementById('searchInput').addEventListener('input', searchCards);
    </script>
</body>

<!-- Backend Bundle JavaScript -->
<script src="../assets/js/backend-bundle.min.js"></script>

<!-- Chart Custom JavaScript -->
<script src="../assets/js/customizer.js"></script>
<script src="../assets/js/chart-custom.js"></script>
<script src="../assets/js/app.js"></script>

</html>