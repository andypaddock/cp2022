<section class="testimonial-slider">
    <div class="row w60">
        <div class="owl-carousel owl-theme testimonial-carousel">

            <?php if( have_rows('short_testimonial','options') ): ?>
            <?php while( have_rows('short_testimonial','options') ): the_row(); ?>

            <div class="quote">
                <?php get_template_part("inc/img/quote"); ?>
                <div class="copy"><?php the_sub_field('testimonial');?></div>
                <!-- <div class="centre-line">
                    <div class="line"></div>
                    <div></div>
                </div> -->
                <p class="quote-cite"><?php the_sub_field('name');?></p>

            </div>
            <?php endwhile; ?>
            <?php endif; ?>

        </div>
        <?php $moreButton = get_sub_field('hide_button');
        if($moreButton == false):?>
        <?php 
$link = get_field('testimonial_link', 'options');
if( $link ): 
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';
    ?>
        <a class="button" href="<?php echo esc_url( $link_url ); ?>"
            target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
        <?php endif; ?>
    </div>
    <?php endif; ?>
</section>