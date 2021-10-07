<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title><?= $data['page_title'] . WEBSITE_TITLE ?> </title>
    <link rel="icon" type="image/x-icon" href="<?= ASSETS .THEME ?>images/home/icon.png">

    <!-- custom css -->
    <?php if ($data['page_title']=="Product Details"): ?>
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <?php endif; ?>

    <?php if ($data['page_title']=="Home"): ?>
        <!-- I use echo time() to refresh page when I change something in css -->
        <link href="<?= ASSETS .THEME ?>css/index.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css">
    
    <?php else: ?>

        <?php if ($data['page_title']=="Post Details"): ?>
            <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
        <?php endif; ?>

        <link href="<?= ASSETS .THEME ?>css/<?= strtolower($data['page_title']) ?>.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css">
    <?php endif; ?>

    <?php if ($data['page_title']=="Post Details"): ?>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
        
    <?php endif; ?>

    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/95dc93da07.js"></script>

    <!-- sweetAlert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>

<body>

    <?php if ($data['page_title']!="Home"): ?>
        <main>
    <?php endif; ?>

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
                        <li><a href="<?=ROOT?>home" class="active"><i class="fas fa-home fa-fw fa-lg"></i></a></li>
                        <?php $this->view("inc/links_item",$data); ?>
                        <li id="close-flyout"><span class="fas fa-times"></span></li>
                    </ul>
                </nav>
            </div>
        </header>

        <?php if ($data['page_title']=="Home"): ?>
            <!-- start: hero -->
            <section id="hero">
                <div class="fade"></div>
                <div class="hero-text">
                    <h1>Pronađite automobil, oldtimer, motocikl, kamion ili kamper po vašoj želji</h1>
                    <p>Kupi auto.hr je oglasnik sa više od 500.000 posjeta dnevno i više od 10.000 novih oglasa svaki dan.</p>
                </div>
            </section>
            <!-- end: hero -->        
        <?php endif; ?>

    </div>

    <?php if ($data['page_title']!="Home"): ?>
        </main>
    <?php endif; ?>
    <!-- end: header -->