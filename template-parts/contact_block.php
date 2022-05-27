<?php $bgColor = get_sub_field('bg_colour');
$noMobile = get_sub_field('hide_on_mobile');?>
<section
    class="contact-block <?php if($bgColor == true): echo 'alt-bg'; endif; ?> <?php the_sub_field('margin_size'); ?> <?php if($noMobile == true): echo 'no-mob'; endif; ?>"
    <?php if( get_sub_field('section_id') ): ?>id="<?php the_sub_field('section_id'); ?>" <?php endif; ?>>
    <div class="row <?php the_sub_field('column_size'); ?>">

        <div class="contact-wrapper">
            <div class="address-blocks toggle-block block">


                <?php if( have_rows('address_blocks') ): ?>
                <?php while( have_rows('address_blocks') ): the_row(); ?>
                <div class="block__item">
                    <div class="block__title">
                        <h3 class="title"><i class="fa-solid fa-location-dot"></i><?php the_sub_field('title'); ?></h3>
                    </div>
                    <div class="block__text">
                        <i class="fa-solid fa-location-dot"></i>
                        <p><?php the_sub_field('address'); ?></p>
                        <?php 
$link = get_sub_field('email_one');
if( $link ): 
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';
    ?>
                        <i class="fa-thin fa-envelope"></i><a href="<?php echo esc_url( $link_url ); ?>"
                            target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                        <?php endif; ?>
                        <?php 
$link = get_sub_field('email_two');
if( $link ): 
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';
    ?>
                        <a href="<?php echo esc_url( $link_url ); ?>"
                            target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                        <?php endif; ?>
                        <?php 
$link = get_sub_field('phone_1');
if( $link ): 
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';
    ?>
                        <i class="fa-solid fa-phone"></i><a href="<?php echo esc_url( $link_url ); ?>"
                            target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>

                        <?php the_sub_field('phone_1_text'); ?><?php endif; ?>
                        <?php 
$link = get_sub_field('phone_2');
if( $link ): 
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';
    ?>
                        <a href="<?php echo esc_url( $link_url ); ?>"
                            target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>

                        <?php the_sub_field('phone_2_text'); ?><?php endif; ?>
                    </div>
                </div>
                <?php endwhile; ?>
                <?php endif; ?>







            </div>
            <div class="form-shortcode"><?php
        if ( get_sub_field('shortcode') ) {
            echo do_shortcode( get_sub_field('shortcode') );
        }
        ?></div>
        </div>
    </div>
</section>