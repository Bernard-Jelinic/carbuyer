<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title><?= $data['page_title'] . WEBSITE_TITLE ?> </title>
    <link rel="icon" type="image/x-icon" href="<?= ASSETS .THEME ?>images/home/icon.png">

    <!-- custom css -->
    <link href="<?= ASSETS .THEME ?>admin/css/<?= strtolower($data['page_title']) ?>.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css">

    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/95dc93da07.js"></script>

    <!-- sweetAlert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>

<body>

    <!-- start: header -->
    <div id="header-hero-container">
        <header>
            <div class="flex container">
                <a id="logo" href="<?=ROOT?>home">Kupi auto.hr</a>
                <nav>
                    <button id="nav-toggle" class="hamburger-menu">
                        <span class="strip"></span>
                        <span class="strip"></span>
                        <span class="strip"></span>
                    </button>
                    <ul id="nav-menu">
                        <li><a href="<?=ROOT?>admin" class="active"><i class="fas fa-home fa-fw fa-lg"></i></a></li>
                        <li><a href="<?= ROOT ?>admin/posts">Oglasi</a></li>
                        <li><a href="<?= ROOT ?>admin/categories">Kategorije</a></li>
                        <li><a href="<?=ROOT?>home">Nazad na stranicu</a></li>
                        <li><a href="<?=ROOT?>logout"><i class="fa fa-lock"></i> Odjava</a></li>
                        <li id="close-flyout"><span class="fas fa-times"></span></li>
                    </ul>
                </nav>
            </div>
        </header>
    </div>
    <!-- end: header -->