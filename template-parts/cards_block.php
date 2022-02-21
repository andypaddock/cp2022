<?php $bgColor = get_sub_field('bg_colour');
$noMobile = get_sub_field('hide_on_mobile');?>
<section
    class="cards-block <?php if($bgColor == true): echo 'alt-bg'; endif; ?> <?php the_sub_field('margin_size'); ?> <?php if($noMobile == true): echo 'no-mob'; endif; ?>"
    <?php if( get_sub_field('section_id') ): ?>id="<?php the_sub_field('section_id'); ?>" <?php endif; ?>>
    <div class="row <?php the_sub_field('column_size'); ?>">
        <?php
$featured_posts = get_sub_field('select_items');
if( $featured_posts ): ?>
        <div class="flex-split-col">
            <?php foreach( $featured_posts as $post ): 
        $permalink = get_permalink( $post->ID );
        $title = get_the_title( $post->ID );
        $custom_field = get_field( 'call_to_action_text', $post->ID );
        $days_field = get_field( 'how_long', $post->ID );
        $safariType = get_the_terms( $post->ID, 'safaritype' );
        setup_postdata($post); ?>
            <div class="card-item">
                <div class="card-image">
                    <img src="<?php echo get_the_post_thumbnail_url($post->ID, 'medium_large'); ?>">
                </div>
                <div class="text-box">
                    <div class="card-details">
                        <h3 class="heading-secondary <?php
if(get_sub_field('switch_text'))
{
	echo 'alt-color';
}
?>">
                            <span class="heading-secondary--tertiary"><?php echo esc_html( $title ); ?></span>
                        </h3>
                        <span class="nights">12 Nights</span>
                    </div>
                    <div class="card-meta">
                        <div class="main"><?php $terms = get_the_terms( $post->ID, array('destination') ); ?>

                            <?php foreach ( $terms as $term ) : ?>
                            <?php $placeType = get_field('dest_type', $term);?>
                            <?php if ($placeType == 'country'):?>
                            <span class="<?php the_field('dest_type', $term)?>"><?php echo $term->name; ?></span>
                            <?php endif;?>
                            <?php endforeach; ?>
                        </div>
                        <div class="sub">

                            <?php foreach ( $terms as $term ) : ?>
                            <?php $placeType = get_field('dest_type', $term);?>
                            <?php if ($placeType == 'place'):?>
                            <span class="<?php the_field('dest_type', $term)?>"><?php echo $term->name; ?></span>
                            <?php endif;?>
                            <?php endforeach; ?>
                        </div>
                    </div>

                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php 
    // Reset the global post object so that the rest of the page works correctly.
    wp_reset_postdata(); ?>
        <?php endif; ?>
    </div>
</section>