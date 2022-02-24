<?php $bgColor = get_sub_field('bg_colour');
$noMobile = get_sub_field('hide_on_mobile');?>
<section
    class="portrait-cards-block <?php if($bgColor == true): echo 'alt-bg'; endif; ?> <?php the_sub_field('margin_size'); ?> <?php if($noMobile == true): echo 'no-mob'; endif; ?>"
    <?php if( get_sub_field('section_id') ): ?>id="<?php the_sub_field('section_id'); ?>" <?php endif; ?>>
    <div class="row <?php the_sub_field('column_size'); ?>">
        <?php if(get_sub_field('show_filters')):?>
        <div class="controls">
            <ul class="flex-col alt-font-pop">
                <?php $all_categories = get_terms( array(
  'taxonomy' => 'destinations',
  'hide_empty' => true,
  'parent'   => 0
) );?>

                <?php foreach($all_categories as $category): ?>
                <li class="flex-items" type="button" data-toggle=".<?php echo $category->slug; ?>">
                    <?php echo $category->name; ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <?php endif; ?>

        <div class="filter-grid quad-col">
            <?php
            $customType = get_sub_field('show_posts_from');
$loop = new WP_Query(
    array(
        'post_type' => $customType, 
        'posts_per_page' => -1,
    )
);
$counter = 0;
while ( $loop->have_posts() ) : $loop->the_post();
$mainImage = get_the_post_thumbnail_url(get_the_ID(),'large');
$counter++;

?>
            <?php $terms = wp_get_post_terms( $post->ID, 'destinations' ); ?>


            <div class="card-item mix <?php foreach( $terms as $term ) echo ' ' . $term->slug; ?>">
                <div class="card-image imageoff-<?php the_field('image_offset');?>"
                    style="background-image: url(<?php echo get_the_post_thumbnail_url($post->ID, 'medium_large'); ?>)">
                    <h3 class="heading-tertiary <?php
if(get_sub_field('switch_text'))
{
	echo 'alt-color';
}
?>">
                        <?php the_title(); ?>
                    </h3>
                    <a class="button" href="<?php echo get_permalink( $post->ID ); ?>">Read More</a>
                </div>

            </div>

            <?php endwhile;
wp_reset_postdata();
?>

        </div>
    </div>
</section>