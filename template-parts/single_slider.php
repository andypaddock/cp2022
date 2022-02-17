<?php $bgColor = get_sub_field('bg_colour');
$noMobile = get_sub_field('hide_on_mobile');?>
<section
    class="single-slider <?php if($bgColor == true): echo 'alt-bg'; endif; ?> <?php the_sub_field('margin_size'); ?> <?php if($noMobile == true): echo 'no-mob'; endif; ?>"
    <?php if( get_sub_field('section_id') ): ?>id="<?php the_sub_field('section_id'); ?>" <?php endif; ?>>
    <div class="row <?php the_sub_field('column_size'); ?>">
        <div class="single-slider--blocks">
            <div class="single-slider--image">
                <img src="<?php echo get_template_directory_uri(); ?>/inc/img/dark-place.webp)" />
                <div class="single-slider--text revealup">
                    <?php get_template_part("inc/img/uganda"); ?>
                    <h3 class="heading-secondary">Uganda</h3>
                </div>
                <div class="single-slider--link">
                    <a class="button" href="<?php echo esc_url( $link_url ); ?>"
                        target="<?php echo esc_attr( $link_target ); ?>">Explore Uganda</a>
                </div>
            </div>
            <div class="single-slider--image">
                <img src="<?php echo get_template_directory_uri(); ?>/inc/img/dark-place.webp)" />
                <div class="single-slider--text revealup">
                    <?php get_template_part("inc/img/uganda"); ?>
                    <h3 class="heading-secondary">Uganda</h3>
                </div>
                <div class="single-slider--link">
                    <a class="button" href="<?php echo esc_url( $link_url ); ?>"
                        target="<?php echo esc_attr( $link_target ); ?>">Explore Uganda</a>
                </div>
            </div>
            <div class="single-slider--image">
                <img src="<?php echo get_template_directory_uri(); ?>/inc/img/dark-place.webp)" />
                <div class="single-slider--text revealup">
                    <?php get_template_part("inc/img/uganda"); ?>
                    <h3 class="heading-secondary">Uganda</h3>
                </div>
                <div class="single-slider--link">
                    <a class="button" href="<?php echo esc_url( $link_url ); ?>"
                        target="<?php echo esc_attr( $link_target ); ?>">Explore Uganda</a>
                </div>
            </div>
        </div>

    </div>
</section>