<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <title><?php bloginfo('name'); ?></title>
    <meta charset="utf-8">
    <meta name="author" content="Luis Guilherme Seidel">
    <meta name="description" content="https://luisseidel.netlify.app/">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<style>
    html {
        margin: 0 !important;
    }
</style>

<body data-spy="scroll" data-offset="200" data-target="#openCloseMenu" class="" tabindex="0">

    <?php
    $logo_id = get_theme_mod('custom_logo');
    $logo_url = wp_get_attachment_image_src($logo_id, 'full');

    if ($logo_url != null && $logo_url != "") :
        $logo_img =  "<img src='{$logo_url[0]}' alt='logo' class='logo' />";
        $logo = $logo_img;
    else :
        $logo = get_bloginfo('name');
    endif;
    ?>

    <header class="fixed-top">

        <nav class="navbar navbar-expand-lg navbar-light container justify-content-between bg-second-color">
            <div class="container-fluid">

                <a href="<?= get_site_url(); ?>">
                    <?= $logo ?>
                </a>

                <button id="open-btn" class="navbar-toggler menu" type="button" data-toggle="collapse" data-target="#openCloseMenu" aria-expanded="false" aria-controls="openCloseMenu" onclick="this.classList.toggle('opened');this.setAttribute('aria-expanded', this.classList.contains('opened'))">
                    <svg width="60" height="60" viewBox="0 0 100 100">
                        <path class="line line1" d="M 20,29.000046 H 80.000231 C 80.000231,29.000046 94.498839,28.817352 94.532987,66.711331 94.543142,77.980673 90.966081,81.670246 85.259173,81.668997 79.552261,81.667751 75.000211,74.999942 75.000211,74.999942 L 25.000021,25.000058" />
                        <path class="line line2" d="M 20,50 H 80" />
                        <path class="line line3" d="M 20,70.999954 H 80.000231 C 80.000231,70.999954 94.498839,71.182648 94.532987,33.288669 94.543142,22.019327 90.966081,18.329754 85.259173,18.331003 79.552261,18.332249 75.000211,25.000058 75.000211,25.000058 L 25.000021,74.999942" />
                    </svg>
                </button>

                <div class="collapse navbar-collapse justify-content-end" id="openCloseMenu">
                    <ul class="navbar-nav nav-pills">
                        <li class="nav-item">
                            <a class="nav-link" href="#home" onclick="closeMenu()">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#pneus" onclick="closeMenu()">Pneus</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#servicos" onclick="closeMenu()">Serviços</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#sobre-nos" onclick="closeMenu()">Sobre Nós</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#contato" onclick="closeMenu()">Contato</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- <div id="progress-bar"></div> -->
    </header>
