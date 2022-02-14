<?php
/**
 * The template for displaying the footer
 * @package chelipeacock
 */
?>
<footer class="footer">
    <?php $footerSwitch = get_field('footer_override');
            if ($footerSwitch == 'alternate'): ?>


    <?php $footerImage = get_field('footer_image'); ?>
    <div class="gradient-footer">
        <div class="footer-hero" style="background-image:  url(<?php echo $footerImage['url']; ?>)">
            <div class="footer-text-container">
                <div class="row centre-line w40">
                    <div class="line"></div>
                    <div></div>
                </div>
                <div class="row w40">
                    <div class="footer_text">
                        <h1 class="heading-secondary">
                            <span class="heading-secondary"><?php the_field('footer_main_text'); ?></span>
                        </h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="footer_link">
                    <?php 
$link = get_field('footer_link');
if( $link ): 
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';
    ?>
                    <a class="footer_button" href="<?php echo esc_url( $link_url ); ?>"
                        target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?><span
                            class="link-arrow arrow-right"></span></a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <?php elseif ($footerSwitch == 'main'):?>
    <?php $footerImage = get_field('footer_image','options'); ?>
    <div class="gradient-footer">
        <div class="footer-hero" style="background-image: url(<?php echo $footerImage['url']; ?>)">
            <div class="footer-text-container">

                <div class="row">
                    <div class="footer-contact">
                        <!-- <div class="logo"><a
                                href="<?php echo site_url(); ?>"><?php get_template_part("inc/img/radlogo"); ?></a> -->
                    </div>
                    <div class="footer-newsletter">

                        <h3 class="heading-tertiary">
                            <?php the_field('footer_main_text','options'); ?>
                        </h3>
                        <?php
        if ( get_field('footer_shortcode','options') ) {
            echo do_shortcode( get_field('footer_shortcode','options') );
        }
        ?>
                        <?php the_field('newsletter_text','options'); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-link-container">
            <div class="row">
                <div class="footer-navbar">
                    <div class="footer-social">
                        <?php if( have_rows('social_media_links','options') ): ?>
                        <ul class="icons">
                            <?php while( have_rows('social_media_links','options') ): the_row();?>
                            <li>
                                <?php 
$link = get_sub_field('link','options');
if( $link ): 
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';
    ?>
                                <a href="<?php echo esc_url( $link_url ); ?>"
                                    target="<?php echo esc_attr( $link_target ); ?>"><?php the_sub_field('font_awesome_icon','options'); ?></a>
                                <?php endif; ?>
                            </li>
                            <?php endwhile; ?>
                        </ul>
                        <?php endif; ?>
                    </div>
                    <div class="nav-area">
                        <menu>
                            <?wp_nav_menu( array( 
                        'theme_location' => 'footer-menu',
                    ) ); ?>
                        </menu>
                    </div>
                </div>
            </div>


            <div class="row footer-privacy">
                <div class="copyright"><?php the_field('copy_text','options'); ?></div>
                <div class="silverless">

                    <a href="https://silverless.co.uk">

                        <?php get_template_part('inc/img/silverless', 'logo');?>

                    </a>

                </div>
                <div class="filler"></div>
            </div>
        </div>
    </div>
    </div>
    <?php endif;?>

</footer>
</main>
<div class="sidebar">
    <?wp_nav_menu( array( 
                        'theme_location' => 'mobile-menu',
                        'container' => false,
                        'menu_class' => 'sidebar-list',
                        'list_item_class'  => 'sidebar-item',
    'link_class'   => 'sidebar-anchor'
					) ); ?>
</div>


<?php wp_footer(); ?>
</body>

</html>