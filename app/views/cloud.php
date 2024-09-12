<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Glubul | Cloud</title>

    <!-- Favicon -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="shortcut icon" href="../assets/images/favicon.ico" />
    <link rel="stylesheet" href="../assets/css/backend-plugin.min.css">
    <link rel="stylesheet" href="../assets/css/backend.css?v=1.0.0">

    <link rel="stylesheet" href="../assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../assets/vendor/line-awesome/dist/line-awesome/css/line-awesome.min.css">
    <link rel="stylesheet" href="../assets/vendor/remixicon/fonts/remixicon.css">

    <!-- Viewer Plugin -->
    <!--PDF-->
    <link rel="stylesheet" href="../assets/vendor/doc-viewer/include/pdf/pdf.viewer.css">
    <!--Docs-->
    <!--PPTX-->
    <link rel="stylesheet" href="../assets/vendor/doc-viewer/include/PPTXjs/css/pptxjs.css">
    <link rel="stylesheet" href="../assets/vendor/doc-viewer/include/PPTXjs/css/nv.d3.min.css">
    <!--All Spreadsheet -->
    <link rel="stylesheet" href="../assets/vendor/doc-viewer/include/SheetJS/handsontable.full.min.css">
    <!--Image viewer-->
    <link rel="stylesheet" href="../assets/vendor/doc-viewer/include/verySimpleImageViewer/css/jquery.verySimpleImageViewer.css">
    <!--officeToHtml-->
    <link rel="stylesheet" href="../assets/vendor/doc-viewer/include/officeToHtml/officeToHtml.css">
</head>

<body>
    <!-- loader -->
    <div id="loading">
        <div id="loading-center">
        </div>
    </div>

    <!-- Content -->
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
                        <li class="active">
                            <a href="" class="">
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
                        <li class=" ">
                            <a href="<?= BASE_URL ?>/index.php?route=admin" class="">
                                <i class="lar la-star"></i><span>Admin</span>
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
                                <div class="header-title mb-5 mb-md-0 mt-3 mt-md-0"> <!-- Ajout de mt-3 pour les petits écrans -->
                                    <h4 class="card-title">Vos documents</h4>
                                </div>
                                <!-- chemin -->
                                <span class="mt-2 mt-md-0">Chemin : <a href="<?= BASE_URL ?>/index.php?route=files">Accueil</a>
                                    <?php foreach ($currentPath as $folder) : ?>
                                        / <a href="<?= BASE_URL ?>/index.php?route=files&parent_id=<?= $folder['id'] ?>"><?= htmlspecialchars($folder['name']) ?></a>
                                    <?php endforeach; ?>
                                </span>
                                <!-- trie -->
                                <div class="card-header-toolbar d-flex align-items-center mt-2 mt-md-0">
                                    <div class="dropdown">
                                        <span>Trié par : </span>
                                        <span class="dropdown-toggle dropdown-bg btn bg-white" id="dropdownMenuButton001" data-toggle="dropdown">
                                            Ordre alphabétique<i class="ri-arrow-down-s-line ml-1"></i>
                                        </span>
                                        <div class="dropdown-menu dropdown-menu-right shadow-none" aria-labelledby="dropdownMenuButton001">
                                            <a class="dropdown-item">Ordre alphabétique</a>
                                            <a class="dropdown-item">Croissant</a>
                                            <a class="dropdown-item">Décroissant</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Tableau file storage -->
                    <div class="col-lg-12">
                        <div class="card card-block card-stretch card-height">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table mb-0 table-borderless tbl-server-info">
                                        <div class="select-dropdown input-prepend input-append">
                                            <div class="btn-group">
                                                <div class="search-query selet-caption" id="createNewFile" style="cursor:pointer;"><i class="las la-plus pr-2"></i>Ajouter</div>
                                            </div>
                                        </div>
                                        <thead>
                                            <tr>
                                                <th scope="col">Nom</th>
                                                <th scope="col">Type</th>
                                                <th scope="col">Taille</th>
                                                <th scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($files as $file) : ?>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="icon-small mr-2">
                                                                <img width="38" src="../assets/images/icon/<?= $file['is_directory'] ? 'folder.png' : $this->getFileIcon($file['name']) ?>" alt="File">
                                                            </div>
                                                            <div>
                                                                <?php if ($file['is_directory']) : ?>
                                                                    <a href="<?= BASE_URL ?>/index.php?route=files&parent_id=<?= $file['id'] ?>" class="folder"><?= htmlspecialchars($file['name']) ?></a>
                                                                <?php else : ?>
                                                                    <span class="file"><?= htmlspecialchars($file['name'])  ?></span>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td><?= $file['is_directory'] ? 'Dossier' : pathinfo($file['name'], PATHINFO_EXTENSION) ?></td>
                                                    <td><?= $file['is_directory'] ? '-' : $this->formatSize($file['size']) ?></td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <span class="dropdown-toggle" id="dropdownMenuButton10" data-toggle="dropdown">
                                                                <i class="ri-more-fill"></i>
                                                            </span>
                                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton10">
                                                                <?php if ($file['is_directory']) : ?>
                                                                    <a class="dropdown-item" href="<?= BASE_URL ?>/index.php?route=files&parent_id=<?= $file['id'] ?>"><i class="ri-eye-fill mr-2"></i>Ouvrir</a>
                                                                <?php else : ?>
                                                                    <!-- a faire ouvrir tout sorte de fichier et telecharger -->
                                                                    <a class="dropdown-item" href="#"><i class="ri-eye-fill mr-2"></i>Ouvrir</a>
                                                                    <a class="dropdown-item" href="<?= BASE_URL ?>/index.php?route=download&id=<?= $file['id'] ?>"><i class="ri-download-fill mr-2"></i>Télécharger</a>

                                                                <?php endif; ?>
                                                                <a class="dropdown-item" href="#"><i class="ri-pencil-fill mr-2"></i>Modifier</a>
                                                                <a class="dropdown-item" href="<?= BASE_URL ?>/index.php?route=delete&id=<?= $file['id'] ?>"><i class="ri-delete-bin-6-fill mr-2"></i>Supprimer</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                        <!-- nouveau dossiers -->
                                        <tbody id="nf"></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- FIN Tableau file storage -->
                </div>
            </div>
        </div>
    </div>

    <!-- Popup uploads files -->
    <div>
        <!-- Bouton open popup -->
        <button id="toggle-btn">
            <i class="fas fa-chevron-up"></i>
        </button>

        <!-- drag and drop popup upload fichiers -->
        <div id="popup" class="p-4">
            <h4 class="mb-4">Déposez vos fichiers</h4>
            <form id="upload-form" action="<?= BASE_URL ?>/index.php?route=upload" method="post" enctype="multipart/form-data">
                <div id="dropzone" class="mb-2">
                    <i class="fas fa-cloud-upload-alt mb-3" style="font-size: 48px;"></i><br>
                    Glissez et déposez vos fichiers ou cliquez
                </div>
                <div id="file-list" class="mb-3"></div>
                <input type="hidden" name="parent_id" value="<?php echo $parentId; ?>"> <!-------------------  A FAIRE ----------------------- -->
                <button id="validate-btn" class="btn btn-primary" disabled>Valider les fichiers</button>
            </form>
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
                    </span> <a href="" class="">Glubul</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Backend Bundle JavaScript -->
    <script src="../assets/js/backend-bundle.min.js"></script>

    <!-- Chart Custom JavaScript -->
    <script src="../assets/js/customizer.js"></script>
    <script src="../assets/js/chart-custom.js"></script>

    <!--ouvrir PDF-->
    <script src="../assets/vendor/doc-viewer/include/pdf/pdf.js"></script>
    <!--ouvrir Docs-->
    <script src="../assets/vendor/doc-viewer/include/docx/jszip-utils.js"></script>
    <script src="../assets/vendor/doc-viewer/include/docx/mammoth.browser.min.js"></script>
    <!--ouvrir PPTX-->
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
    <!--ouvrir officeToHtml-->
    <script src="../assets/vendor/doc-viewer/include/officeToHtml/officeToHtml.js"></script>
    <script src="../assets/js/doc-viewer.js"></script>
    <!-- app JavaScript -->
    <script src="../assets/js/app.js"></script>
    <script src="../assets/js/file.js"></script>
</body>

</html>