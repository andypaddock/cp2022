<?php
/**
 * ============== Template Name: Home Page
 *
 * @package messels
 */
get_header();?>


<?php get_template_part("template-parts/hero"); ?>




<section class="section-about">
    <div class="row">
        <div class="container">
            <div class="about-heading narrow">
                <h2 class="heading-primary heading-primary--main u-margin-bottom-small">
                    <?php the_field("about_title"); ?></h2>
            </div>
            <div class="about-copy">
                <?php the_field("about_copy"); ?>
            </div>
        </div>
    </div>
</section>
<section class="section-features right-background">
    <div class="row">
        <div class="container">
            <?php $featureImage = get_field('feature_image');?>
            <div class="flex-link narrow" style="background-image: url(<?php echo $featureImage['url']; ?>">
                <div class="flex-text">
                    <h2 class="heading-primary heading-primary--main u-margin-bottom-small">
                        <?php the_field("hosting_title"); ?></h2>
                    <?php the_field("hosting_copy"); ?>
                    <?php 
$link = get_field('hosting_link');
if( $link ): 
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';
    ?>
                    <a class="btn btn--darkblue" href="<?php echo esc_url( $link_url ); ?>"
                        target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                    <?php endif; ?>
                </div>

                <div class="flex-image">

                </div>
            </div>
        </div>
    </div>
</section>
<section class="section-about section-about__team">
    <div class="row">
        <div class="container">
            <div class="about-heading narrow">
                <h2 class="heading-primary heading-primary--main u-margin-bottom-small">
                    <?php the_field("about_team_title"); ?></h2>
            </div>
            <div class="about-copy">
                <?php the_field("about_team_copy"); ?>
                <?php 
$link = get_field('team_link');
if( $link ): 
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';
    ?>
                <a class="btn btn--white" href="<?php echo esc_url( $link_url ); ?>"
                    target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>


<?php get_footer();?>