<?php
/* Template Name: Testing */
?>

<?php
echo do_shortcode('[smartslider3 slider="1"]');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header id="header">
        <div class="container">
            <div class="row">
                <div class="col-xs-8 col-sm-6">
                    <img src="Scooter Haven.png" alt="">
                </div>
                <div class="col-sm-6 hidden-xs">
                    <form id="searchform" class="searchform">
                        <div>
                            <label class="screen-reader-text">Sök efter:</label>
                            <input type="text" />
                            <input type="submit" value="Sök" />
                        </div>
                    </form>
                </div>
                <div class="col-xs-4 text-right visible-xs">
                    <div class="mobile-menu-wrap">
                        <i class="fa fa-search"></i>
                        <i class="fa fa-bars menu-icon"></i>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="mobile-search">
        <form id="searchform" class="searchform">
            <div>
                <label class="screen-reader-text">Sök efter:</label>
                <input type="text" />
                <input type="submit" value="Sök" />
            </div>
        </form>
    </div>

    <nav id="nav">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <ul class="menu">
                        <li class="current-menu-item">
                            <a href="#">Hem</a>
                        </li>
                        <li>
                            <a href="">Produkter</a>
                        </li>
                        <li>
                            <a href="#">Om oss</a>
                        </li>
                        <li>
                            <a href="#">Fisk</a>
                        </li>
                        <li>
                            <a href="#">FAQ</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

<?php get_footer(); ?>