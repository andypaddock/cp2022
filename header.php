<?php
/**
 * Header
 *
 * @package chelipeacock
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->


    <!-- End Google Tag Manager -->
    <meta charset="UTF-8">
    <meta name="description" content="<?php echo $excerpt; ?>">
    <meta name="keywords" content=" ">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo the_title(); ?></title>
    <!-- <link rel="stylesheet" href="https://use.typekit.net/vpg4cyy.css"> -->
    <link rel="stylesheet" href="https://use.typekit.net/xlx7xrg.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,500&display=swap"
        rel="stylesheet">

    <script src="https://kit.fontawesome.com/b7821303ab.js" crossorigin="anonymous"></script>
    <script src='https://api.mapbox.com/mapbox-gl-js/v2.0.0/mapbox-gl.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.0.0/mapbox-gl.css' rel='stylesheet' />
    <script src='https://api.mapbox.com/mapbox.js/plugins/turf/v3.0.11/turf.min.js'></script>
    <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
    <!-- Google Tag Manager (noscript) -->

    <!-- End Google Tag Manager (noscript) -->
    <div class="nav-left visible-xs">
        <div class="navbutton" id="btn">
            <div class="bar top"></div>
            <div class="bar middle"></div>
            <div class="bar bottom"></div>
        </div>
    </div>

    <main>
        <?php if(!is_front_page()):?>
        <div class="top-logo"><a href="<?php echo site_url(); ?>"><?php get_template_part("inc/img/cplogotxt"); ?></a>
        </div>
        <?php endif;?>



        <nav>
            <!-- nav-right -->

            <div class="nav-left hidden-xs">
                <div class="navbutton" id="btn">
                    <div class="bar top"></div>
                    <div class="bar middle"></div>
                    <div class="bar bottom"></div>
                </div>
            </div>


        </nav>


        <?php if (!is_archive()):?>

        <header class="header <?php the_field('hero_section_size'); ?>">

            <?php get_template_part('template-parts/hero');?>

        </header>
        <?php endif; ?>
        <!--closes in footer.php-->