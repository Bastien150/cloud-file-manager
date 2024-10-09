<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Glubul | Administration</title>

    <!-- Favicon -->
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
                        <li class="">
                            <a href="<?= BASE_URL ?>/index.php?route=project" class="">
                                <i class="las la-stopwatch iq-arrow-left"></i><span>Projets</span>
                            </a>
                            <ul id="page-folders" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                            </ul>
                        </li>
                        <li class="active">
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
                    <p><?= round(disk_free_space(".")/1073741824,2)?> / <?= round(disk_total_space(".")/1073741824,2)?> GB Utilisé</p>
                    <div class="iq-progress-bar mb-3">
                        <span class="bg-primary iq-progress progress-1" data-percent="<?= percentsize()?>">
                        </span>
                    </div>
                    <p><?= percentsize()?>% plein - <?= freesize(); ?> libre</p>
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

                    <!-- Widget User (edit add delete) -->
                    <div class="col-sm-6 col-lg-6">
                        <div class="card card-block card-stretch card-height">
                            <div class="card-body">
                                <h4 class="card-title">Liste des Utilisateurs</h4>
                                <div class="row justify-content-between">
                                    <!-- Search bar -->
                                    <div class="col-sm-6 col-md-6">
                                        <div id="user_list_datatable_info" class="dataTables_filter">
                                            <form class="mr-3 position-relative">
                                                <div class="form-group mb-0">
                                                    <input type="search" class="form-control" id="SearchUser" placeholder="Recherche d'utilisateur" aria-controls="user-list-table">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- btn ajouter + export pdf -->
                                    <div class="col-sm-6 col-md-6">
                                        <div class="user-list-files d-flex">
                                            <a class="bg-secondary" href="javascript:void();">Pdf</a>
                                            <a class="bg-primary" data-toggle="modal" data-target="#addUser" style="cursor:pointer;"><i class="las la-user pr-2"></i>Ajouter</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table id="userTable" class="table table-striped table-bordered mt-4" role="grid">
                                        <thead>
                                            <tr>
                                                <th scope="col"></th>
                                                <th scope="col">Nom</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Date</th>
                                            </tr>
                                        </thead>
                                        <tbody id=UserInfoTable>
                                            <?php foreach ($users as $user) { ?>
                                                <tr name="info-user" class="rowUser">
                                                    <td class="text-center">
                                                        <input type="text" id="Useridinput<?php echo $user['id']; ?>" value='<?php echo json_encode($user); ?>' hidden>
                                                        <img class="rounded img-fluid avatar-25" src="../assets/images/user/01.jpg" alt="profile">
                                                    </td>
                                                    <td class="username-info"><?php echo $user['username']; ?></td>
                                                    <td class="usermemail-info"><?php echo $user['email']; ?></td>
                                                    <td class="userdate-info"><?php
                                                                                $date = new DateTime($user['created_at']);
                                                                                $dateCreated = $date->format('d/m/Y');
                                                                                echo $dateCreated; ?></td>
                                                    <td>
                                                        <div class="flex align-items-center list-user-action">
                                                            <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Supprimer" href="<?= BASE_URL ?>/index.php?route=delUserAdmin&uid=<?= $user['id'] ?>"><i class="ri-delete-bin-line"></i></a>
                                                            <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Réinitialiser le mdp" href="#"><i class="fa-solid fa-arrows-rotate"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="d-flex justify-content-center mt-3">
                                    <nav aria-label="Page navigation" id="userPagination">
                                        <ul class="pagination">
                                            <li class="page-item" id="previousPage">
                                                <a class="page-link" href="#" tabindex="-1">Précédent</a>
                                            </li>
                                            <li class="page-item active"><a class="page-link" href="#" data-page="1">1</a></li>
                                            <li class="page-item"><a class="page-link" href="#" data-page="2">2</a></li>
                                            <li class="page-item"><a class="page-link" href="#" data-page="3">3</a></li>
                                            <li class="page-item" id="nextPage">
                                                <a class="page-link" href="#">Suivant</a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Widget project (edit add delete) -->
                    <div class="col-sm-6 col-lg-6">
                        <div class="card card-block card-stretch card-height">
                            <div class="card-body">
                                <h4 class="card-title">Liste des Projets</h4>
                                <div class="row justify-content-between">
                                    <!-- Search bar -->
                                    <div class="col-sm-6 col-md-6">
                                        <div id="user_list_datatable_info" class="dataTables_filter">
                                            <form class="mr-3 position-relative">
                                                <div class="form-group mb-0">
                                                    <input type="search" class="form-control" id="SearchProject" placeholder="Recherche d'utilisateur" aria-controls="user-list-table">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- btn ajouter + export pdf -->
                                    <div class="col-sm-6 col-md-6">
                                        <div class="user-list-files d-flex">
                                            <a class="bg-primary" data-toggle="modal" data-target="" style="cursor:pointer;"><i class="las la-user pr-2"></i>Ajouter</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table id="projectTable" class="table table-striped table-bordered mt-4" role="grid">
                                        <thead>
                                            <tr>
                                                <th scope="col">Nom</th>
                                                <th scope="col">Date</th>
                                            </tr>
                                        </thead>
                                        <tbody id="ProjectInfoTable">
                                            <?php foreach ($projects as $project) { ?>
                                                <tr class="rowProject">
                                                    <td class="projectname-info" name="<?php echo $project['id']; ?>"><?php echo $project['title']; ?></td>
                                                    <td class="projectdate-info"><?php echo $project['project_date']; ?>
                                                    <input type="text" id="projectidinput<?php echo $project['id']; ?>" value='<?php echo json_encode($project); ?>' hidden>
                                                </td>
                                                    <td>
                                                        <div class="flex align-items-center list-user-action">
                                                            <a style="color: #8f93f6;" class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Modifier"><i data-toggle="modal" data-target="#EditProject" class="ri-pencil-line"></i></a>
                                                            <a style="color: #8f93f6;" class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Supprimer"><i class="ri-delete-bin-line"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="d-flex justify-content-center mt-3">
                                    <nav aria-label="Page navigation" id="projectPagination">
                                        <ul class="pagination">
                                            <li class="page-item disabled">
                                                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Précédent</a>
                                            </li>
                                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                                            <li class="page-item">
                                                <a class="page-link" href="#">Suivant</a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Widget File (edit add delete) -->
                    <div class="col-lg-12">
                        <div class="card card-block card-stretch card-height">
                            <div class="card-header d-flex flex-column flex-md-row justify-content-between pb-0">
                                <!-- chemin -->
                                <span class="mt-2 mt-md-0">Chemin : <a href="<?= BASE_URL ?>/index.php?route=admin"><?php if ($userselect != null) {
                                                                                                                        echo $infoUserSelect['username'];
                                                                                                                    } ?></a>
                                    <?php foreach ($currentPath as $folder) : ?>
                                        / <a href="<?= BASE_URL ?>/index.php?route=admin&parent_id=<?= $folder['id'] ?>"><?= htmlspecialchars($folder['name']) ?></a>
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
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table mb-0 table-borderless tbl-server-info">
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
                                            if ($files != null) {
                                                foreach ($files as $file) : ?>
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="icon-small mr-2">
                                                                    <img width="38" src="../assets/images/icon/<?= $file['is_directory'] ? 'folder.png' : $this->getFileIcon($file['name']) ?>" alt="File">
                                                                </div>
                                                                <div>
                                                                    <?php if ($file['is_directory']) : ?>
                                                                        <a href="<?= BASE_URL ?>/index.php?route=admin&parent_id=<?= $file['id'] ?>&userselect=<?= $file['user_id'] ?>" class="folder"><?= htmlspecialchars($file['name']) ?></a>
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
                                                                    <a class="dropdown-item" href="#"><i class="ri-eye-fill mr-2"></i>Ouvrir</a>
                                                                    <a class="dropdown-item" href="<?= BASE_URL ?>/index.php?route=delete&id=<?= $file['id'] ?>"><i class="ri-delete-bin-6-fill mr-2"></i>Supprimer</a>
                                                                    <a class="dropdown-item" href="#"><i class="ri-pencil-fill mr-2"></i>Modifier</a>
                                                                    <?php if (!$file['is_directory']) : ?>
                                                                        <a class="dropdown-item" href="<?= BASE_URL ?>/index.php?route=download&id=<?= $file['id'] ?>"><i class="ri-file-download-fill mr-2"></i>Télécharger</a>
                                                                    <?php endif; ?>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php endforeach;
                                            } else {
                                                foreach ($users as $user) { ?>
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="icon-small mr-2">
                                                                    <img class="rounded img-fluid avatar-25" src="../assets/images/user/01.jpg" alt="profile">
                                                                </div>
                                                                <div>
                                                                    <!-- username -->
                                                                    <?php if ($user['username']) { ?>
                                                                        <!-- faire comme au dessus pour le chemin -->
                                                                        <a href="<?= BASE_URL ?>/index.php?route=admin&userselect=<?= $user['id'] ?>" class="folder"><?php echo $user['username']; ?></a>
                                                                    <?php } ?>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>tailles des fichiers</td>
                                                        <td>--</td>
                                                    </tr>
                                            <?php }
                                            } ?>
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

    <!-- Modal user add -->
    <div class="modal fade" id="addUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form method="POST" action="<?= BASE_URL ?>/index.php?route=addUserAdmin">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Ajouter un utilisateur</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="instaurl">Nom :</label>
                            <input type="text" class="form-control" name="addUserAdminName" placeholder="Ex : John">
                        </div>
                        <div class="form-group">
                            <label for="instaurl">Mdp :</label>
                            <input type="text" class="form-control" name="addUserAdminPass" placeholder="">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn btn-primary">Ajouter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal EditProject -->
    <div class="modal fade" id="EditProject" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Modifier un projet</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="<?= BASE_URL ?>/index.php?route=editproject">
                    <div class="modal-body">
                        <div class="form-group mt-1 mb-1">
                            <label for="instaurl">Nom :</label>
                            <input type="text" class="form-control" id="ProjNom" name="ProjNom" placeholder="Ex : John">
                        </div>
                        <div class="form-group mt-1 mb-1">
                            <label for="instaurl">Description :</label>
                            <input type="text" class="form-control" id="ProjDesc" name="ProjDesc" placeholder="Ex : Calculatrice égyptienne">
                        </div>
                        <div class="form-group mt-1 mb-1">
                            <label for="instaurl">Langage :</label>
                            <input type="text" class="form-control" id="ProjLang" name="ProjLang" placeholder="Ex : Java">
                        </div>
                        <div class="form-group mt-1 mb-1">
                            <label for="instaurl">icon :</label>
                            <input type="text" class="form-control" id="ProjImg"  name="ProjImg" placeholder="Ex : fas fa-....">
                        </div>
                        <div class="form-group mt-1 mb-1">
                            <label for="instaurl">Date :</label>
                            <input type="text" class="form-control" id="ProjDate" name="ProjDate" placeholder="Ex : Fait le mm/aaaa">
                        </div>
                        <div class="form-group mt-1 mb-1">
                            <label for="instaurl">Chemin :</label>
                            <input class="form-control" id="ProjChemin" name="ProjChemin" placeholder="Ex : ./" list="ProjectsPath">
                            <input hidden id="Projid" name="Projid">
                            

                            <datalist id="ProjectsPath">
                                <?php foreach ($projectPathList as $path) { ?>
                                    <option value="<?= substr($path, 12) ?>"></option>
                                <?php } ?>
                            </datalist>
                        </div>

                    </div>
                    <div class="modal-footer mt-0">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn btn-primary">Modifier</button>
                    </div>
                </form>
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
                    </span> <a href="" class="">Glubul</a>
                </div>
            </div>
        </div>
    </footer>
    <script>
        // Fonction pour normaliser les accents
        function normalizeString(str) {
            return str.normalize("NFD").replace(/[\u0300-\u036f]/g, "").toLowerCase();
        }
        // Fonction de recherche
        function searchUsers() {
            const searchTerm = normalizeString(document.getElementById('SearchUser').value);
            const RowinfoUser = document.querySelectorAll('#UserInfoTable .rowUser');

            RowinfoUser.forEach(card => {
                const Name = normalizeString(card.querySelector('.username-info').textContent);
                const email = normalizeString(card.querySelector('.usermemail-info').textContent);
                const date = normalizeString(card.querySelector('.userdate-info').textContent);

                if (Name.includes(searchTerm) || email.includes(searchTerm) || date.includes(searchTerm)) {
                    card.style.display = '';
                } else {
                    card.style.display = 'none';
                }
            });
        }

        function searchProjects() {
            const searchTerm = normalizeString(document.getElementById('SearchProject').value);
            const RowinfoProject = document.querySelectorAll('#ProjectInfoTable .rowProject');

            RowinfoProject.forEach(card => {
                const Name = normalizeString(card.querySelector('.projectname-info').textContent);
                const date = normalizeString(card.querySelector('.projectdate-info').textContent);

                if (Name.includes(searchTerm) || date.includes(searchTerm)) {
                    card.style.display = '';
                } else {
                    card.style.display = 'none';
                }
            });
        }

        // Écouteur d'événement pour la recherche
        document.getElementById('SearchUser').addEventListener('input', searchUsers);
        document.getElementById('SearchProject').addEventListener('input', searchProjects);
    </script>
    <script>
        //permet de récup l'id pour del ou edit projet
        document.addEventListener('DOMContentLoaded', function() {
            const table = document.getElementById('projectTable');

            table.addEventListener('click', function(e) {
                const target = e.target.closest('a');
                if (!target) return;

                const row = target.closest('tr');
                if (!row) return;

                const idCell = row.querySelector('td[name]');
                if (!idCell) return;

                const projectId = idCell.getAttribute('name');

                if (target.querySelector('.ri-pencil-line')) {
                    inputProject = JSON.parse(document.getElementById('projectidinput' + projectId).value)
                    console.log(inputProject);

                    document.getElementById('ProjNom').value = inputProject['title']
                    document.getElementById('ProjDesc').value = inputProject['spe_title']
                    document.getElementById('ProjLang').value = inputProject['content']
                    document.getElementById('ProjImg').value = inputProject['icon']
                    document.getElementById('ProjDate').value = inputProject['project_date']
                    document.getElementById('ProjChemin').value = inputProject['path']
                    document.getElementById('Projid').value = inputProject['id']
                } else if (target.querySelector('.ri-delete-bin-line')) {
                    console.log('Supprimer le projet avec l\'ID:', projectId);
                }
            });
        });
    </script>
    <!-- Backend Bundle JavaScript -->
    <script src="../assets/js/backend-bundle.min.js"></script>
    <!-- Chart Custom JavaScript -->
    <script src="../assets/js/customizer.js"></script>
    <script src="../assets/js/chart-custom.js"></script>
    <script src="../assets/js/pagination.js"></script>

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
    <script src="https://kit.fontawesome.com/6e4a6423de.js" crossorigin="anonymous"></script>
    <script src="../assets/vendor/doc-viewer/include/officeToHtml/officeToHtml.js"></script>
    <script src="../assets/js/doc-viewer.js"></script>
    <!-- app JavaScript -->
    <script src="../assets/js/app.js"></script>
</body>

</html>