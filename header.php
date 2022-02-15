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
    <link rel="stylesheet" href="https://use.typekit.net/vpg4cyy.css">
    <script src="https://kit.fontawesome.com/fbafb66f14.js" crossorigin="anonymous"></script>
    <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
    <!-- Google Tag Manager (noscript) -->

    <!-- End Google Tag Manager (noscript) -->
    <div class="nav-right visible-xs">
        <div class="navbutton" id="btn">
            <div class="bar top"></div>
            <div class="bar middle"></div>
            <div class="bar bottom"></div>
        </div>
    </div>

    <main>

        <!-- <div class="logo-mobile"><a
                href="<?php echo site_url(); ?>"><?php get_template_part("inc/img/cplogolrg"); ?></a>
        </div> -->



        <nav>
            <!-- nav-right -->

            <div class="nav-right hidden-xs">
                <div class="navbutton" id="btn">
                    <div class="bar top"></div>
                    <div class="bar middle"></div>
                    <div class="bar bottom"></div>
                </div>
            </div>


        </nav>

        <header class="header <?php the_field('hero_section_size'); ?>">

            <?php if (is_single()):?>
            <?php get_template_part('template-parts/posthero');?>
            <?php else:?>
            <?php get_template_part('template-parts/hero');?>
            <?php endif; ?>
        </header>

        <!--closes in footer.php-->