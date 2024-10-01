<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Glubul | Accueil</title>
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

</head>
<style>
    .selected-circle {
        border: 2px solid black !important;
        width: 30px !important;
        height: 30px !important;
    }

    .main-container {
        display: flex;
        justify-content: space-around;
        align-items: center;
        margin-bottom: 20px;
    }

    .circles-container {
        display: grid;
        grid-template-columns: repeat(5, 1fr);
        gap: 10px;
    }

    .circle {
        width: 30px;
        height: 30px;
        border-radius: 50%;
        cursor: pointer;
        transition: transform 0.2s;
    }

    .circle:hover {
        transform: scale(1.1);
    }

    .power-button {
        width: 75px;
        height: 75px;
        background-color: #444;
        border: none;
        border-radius: 50%;
        cursor: pointer;
        display: flex;
        justify-content: center;
        align-items: center;
        transition: background-color 0.3s;
    }


    .power-button:hover {
        background-color: #555;
    }

    .power-button img {
        width: 100%;
        height: 100%;
        object-fit: contain;
    }

    #brightness {
        width: 100%;
        margin: 20px 0;
    }

    .button-row {
        display: flex;
        justify-content: space-between;
        gap: 10px;
        margin-bottom: 10px;
    }

    .btn {
        padding: 10px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        flex-grow: 1;
        text-align: center;
    }

    .full-width {
        width: 100%;
    }

    .modal {
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.4);
    }

    .modal-content {
        background-color: #fefefe;
        margin: 15% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
        max-width: 500px;
    }

    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
        cursor: pointer;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }

    @media (max-width: 400px) {
        .widget {
            padding: 15px;
        }

        .power-button {
            width: 50px;
            height: 50px;
        }

        .btn {
            padding: 8px;
            font-size: 14px;
        }
    }
</style>

<body class="  ">
    <!-- loader Start -->
    <div id="loading">
        <div id="loading-center">
        </div>
    </div>
    <!-- loader END -->
    <!-- Wrapper Start -->
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
                        <li class="active">
                            <a href="" class="">
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
                        <li class="">
                            <a href="<?= BASE_URL ?>/index.php?route=project" class="">
                                <i class="las la-stopwatch iq-arrow-left"></i><span>Projets</span>
                            </a>
                            <ul id="page-folders" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                            </ul>
                        </li>
                        <li class="">
                            <a href="" class="">
                                <i class="lar la-star"></i><span>Autres</span>
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
                                                            <h5><a href="<?= BASE_URL ?>/index.php?route=editusers"><?php if (isset($_SESSION['info_user'])) {
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
                    <div class="col-lg-9">
                        <div class="card card-block card-stretch card-height iq-welcome" style="background: url(../assets/images/layouts/mydrive/background.png) no-repeat scroll right center; background-color: #ffffff; background-size: contain;">
                            <div class="card-body property2-content">
                                <div class="d-flex flex-wrap align-items-center">
                                    <div class="col-lg-6 col-sm-6 p-0">
                                        <h3 class="mb-3">Bonjour <?php if (isset($infouser)) {
                                                                        echo $infouser['username'];
                                                                    } ?></h3>
                                        <p class="mb-5">Vous etes le plus beau des humains en ce jour ensoleillé</p>
                                        <a href="#">Accès au cloud<i class="las la-arrow-right ml-2"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card card-block card-stretch card-height">
                            <div class="card-header d-flex justify-content-between">
                                <div class="header-title">
                                    <h4 class="card-title">Nombre de projet réalisé</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <h2>52</h2>
                                <!-- a centré et a mettre plus gros + mettre vrais valeur -->
                            </div>
                        </div>
                    </div>

                    <!-- Widjet Stockage -->
                    <div class="col-lg-4">
                        <div class="card card-block card-stretch card-height ">
                            <div class="card-header d-flex justify-content-between">
                                <div class="header-title">
                                    <h4 class="card-title">Stockage</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <div id="layout-1-chart" style="min-height: 220px;"></div>
                                <div class="row mt-2">
                                    <div class="col-lg-6 col-md-6 col-6">
                                        <div class="media align-items-center">
                                            <div class="icon iq-icon-box bg-primary rounded icon-statistic">
                                                <i class="las la-long-arrow-alt-down"></i>
                                            </div>
                                            <div class="media-body ml-3">
                                                <p class="mb-0">Espace restant</p>
                                                <h5>3.9BG</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-6">
                                        <div class="media align-items-center">
                                            <div class="icon iq-icon-box bg-light rounded icon-statistic">
                                                <i class="las la-long-arrow-alt-up"></i>
                                            </div>
                                            <div class="media-body ml-3">
                                                <p class="mb-0">vide</p>
                                                <h5>--</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Widjet Led -->
                    <div class="col-lg-4 col-xl-4">
                        <div class="card card-block card-stretch card-height files-table">
                            <div class="card-header d-flex justify-content-between">
                                <div class="header-title">
                                    <h4 class="card-title">Led</h4>
                                </div>
                                <div class="card-header-toolbar d-flex align-items-center">
                                    <a href="./page-files.html" class=" view-more">View All</a>
                                </div>
                            </div>
                            <div class="card-body pt-0 mt-4">
                                <div class="widget">
                                    <form method="POST" action="<?= BASE_URL ?>/index.php?route=dash">
                                        <div class="main-container">
                                            <div class="circles-container">
                                                <?php
                                                // Lire la luminosité depuis brightness.txt
                                                $brightness = file_get_contents('brightness.txt');
                                                $brightness = max(0, min(255, intval($brightness)));

                                                // Lire l'état LED depuis led_state.txt
                                                $led_state = trim(file_get_contents('led_state.txt'));

                                                list($red, $green, $blue) = explode(',', $led_state);
                                                $red = max(0, min(255, intval($red)));
                                                $green = max(0, min(255, intval($green)));
                                                $blue = max(0, min(255, intval($blue)));
                                                $isPowerOn = ($red > 0 || $green > 0 || $blue > 0);

                                                //api led esp demande  json color + bright
                                                if (isset($_GET['device']) && $_GET['device'] === 'esp8266') {
                                                    header('Content-Type: application/json');
                                                    echo json_encode(['color' => $led_state, 'bright' => $brightness]);
                                                    exit;
                                                }
                                                // Fonction pour déterminer si une couleur est sélectionnée
                                                function isColorSelected($color, $red, $green, $blue)
                                                {
                                                    list($r, $g, $b) = explode(',', $color);
                                                    return trim($r) == $red*2 && trim($g) == $green*2 && trim($b) == $blue*2;
                                                }

                                                $colors = [
                                                    "254, 0, 0",
                                                    "0, 254, 0",
                                                    "0, 0, 254",
                                                    "254, 254, 0",
                                                    "0, 254, 254",
                                                    "254, 0, 254",
                                                    "254, 165, 0",
                                                    "128, 0, 128",
                                                    "0, 128, 0",
                                                    "255, 192, 203",
                                                    "254, 254, 254",
                                                    "254, 215, 0",
                                                    "64, 224, 208",
                                                    "255, 105, 180",
                                                    "30, 144, 254"
                                                ];

                                                foreach ($colors as $color) {
                                                    $isSelected = isColorSelected($color, $red, $green, $blue);
                                                    echo "<div class='cercle btn btn-sm rounded-circle p-0" . ($isSelected ? " selected-circle" : "") . "' style='width: 30px; height: 30px; background-color: rgb($color); opacity: " . ($isPowerOn ? '1' : '0') . "'></div>";
                                                }
                                                ?>
                                            </div>
                                            <button type="button" class="power-button" style="background-color: <?php echo $isPowerOn ? '#444' : '#ff0000'; ?>">
                                                <img src="power-button.png" alt="Power" />
                                            </button>
                                        </div>
                                        <!-- js led -->
                                        <script>
                                            document.addEventListener("DOMContentLoaded", function() {
                                                const brightnessSlider = document.getElementById("brightness");
                                                const circles = document.querySelectorAll(".cercle");
                                                const powerButton = document.querySelector(".power-button");
                                                const redInput = document.getElementById("red");
                                                const greenInput = document.getElementById("green");
                                                const blueInput = document.getElementById("blue");
                                                const powerInput = document.getElementById("power");
                                                let isPowerOn = <?php echo $isPowerOn ? 'true' : 'false'; ?>;

                                                brightnessSlider.addEventListener("input", function() {
                                                    console.log("Luminosité : " + this.value);
                                                });

                                                powerButton.addEventListener("click", function() {
                                                    isPowerOn = !isPowerOn;
                                                    if (isPowerOn) {
                                                        circles.forEach((circle) => (circle.style.opacity = "1"));
                                                        this.style.backgroundColor = "#444";
                                                        powerInput.value = "on";
                                                        if (redInput.value === "0" && greenInput.value === "0" && blueInput.value === "0") {
                                                            redInput.value = greenInput.value = blueInput.value = "255";
                                                        }
                                                    } else {
                                                        circles.forEach((circle) => (circle.style.opacity = "0"));
                                                        this.style.backgroundColor = "#ff0000";
                                                        powerInput.value = "off";
                                                        redInput.value = greenInput.value = blueInput.value = "0";
                                                    }
                                                });

                                                circles.forEach((circle) => {
                                                    circle.addEventListener("click", function() {
                                                        const color = this.style.backgroundColor;
                                                        console.log("Couleur sélectionnée:", color);

                                                        circles.forEach((c) => c.classList.remove("selected-circle"));
                                                        this.classList.add("selected-circle");

                                                        const rgb = color.match(/\d+/g);
                                                        redInput.value = Math.round(rgb[0] / 2);
                                                        greenInput.value = Math.round(rgb[1] / 2);
                                                        blueInput.value = Math.round(rgb[2] / 2);

                                                        if (!isPowerOn) {
                                                            isPowerOn = true;
                                                            powerInput.value = "on";
                                                            powerButton.style.backgroundColor = "#444";
                                                            circles.forEach((circle) => (circle.style.opacity = "1"));
                                                        }
                                                    });
                                                });
                                            });
                                        </script>
                                        <input type="range" id="brightness" name="brightness" min="0" max="255" value="<?php echo $brightness; ?>" />

                                        <div class="button-row">
                                            <button type="button" class="btn btn-primary">Mode 1</button>
                                            <button type="button" class="btn btn-primary">Mode 2</button>
                                        </div>

                                        <input type="hidden" id="red" name="red" value="<?php echo $red; ?>">
                                        <input type="hidden" id="green" name="green" value="<?php echo $green; ?>">
                                        <input type="hidden" id="blue" name="blue" value="<?php echo $blue; ?>">
                                        <input type="hidden" id="power" name="power" value="<?php echo $isPowerOn ? 'on' : 'off'; ?>">

                                        <button type="submit" class="btn btn-primary full-width" id="applyBtn">Appliquer</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        a faire
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Wrapper End-->
    <!-- footer copyright -->
    <footer class="iq-footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 text-right">
                    <span class="mr-1">
                        <script>
                            document.write(new Date().getFullYear())
                        </script> ©
                    </span> <a href="" class="">Glubul</a>
                </div>
            </div>
        </div>
    </footer>
    
    <!-- Backend Bundle JavaScript -->
    <script src="../assets/js/backend-bundle.min.js"></script>

    <!-- Chart Custom JavaScript -->
    <script src="../assets/js/customizer.js"></script>

    <!-- Chart Custom JavaScript -->
    <script src="../assets/js/chart-custom.js"></script>

    <!--PDF-->
    <script src="../assets/vendor/doc-viewer/include/pdf/pdf.js"></script>
    <!--Docs-->
    <script src="../assets/vendor/doc-viewer/include/docx/jszip-utils.js"></script>
    <script src="../assets/vendor/doc-viewer/include/docx/mammoth.browser.min.js"></script>
    <!--PPTX-->
    <script src="../assets/vendor/doc-viewer/include/PPTXjs/js/filereader.js"></script>
    <script src="../assets/vendor/doc-viewer/include/PPTXjs/js/d3.min.js"></script>
    <script src="../assets/vendor/doc-viewer/include/PPTXjs/js/nv.d3.min.js"></script>
    <script src="../assets/vendor/doc-viewer/include/PPTXjs/js/pptxjs.js"></script>
    <script src="../assets/vendor/doc-viewer/include/PPTXjs/js/divs2slides.js"></script>
    <!--All Spreadsheet -->
    <script src="../assets/vendor/doc-viewer/include/SheetJS/handsontable.full.min.js"></script>
    <script src="../assets/vendor/doc-viewer/include/SheetJS/xlsx.full.min.js"></script>
    <!--Image viewer-->
    <script src="../assets/vendor/doc-viewer/include/verySimpleImageViewer/js/jquery.verySimpleImageViewer.js"></script>
    <!--officeToHtml-->
    <script src="../assets/vendor/doc-viewer/include/officeToHtml/officeToHtml.js"></script>
    <script src="../assets/js/doc-viewer.js"></script>
    <!-- app JavaScript -->
    <script src="../assets/js/app.js"></script>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Title</h4>
                    <div>
                        <a class="btn" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </a>
                    </div>
                </div>
                <div class="modal-body">
                    <div id="resolte-contaniner" style="height: 500px;" class="overflow-auto">
                        File not found
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>