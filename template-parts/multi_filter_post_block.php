<?php $bgColor = get_sub_field('bg_colour');
$noMobile = get_sub_field('hide_on_mobile');?>
<section
    class="post-block <?php if($bgColor == true): echo 'alt-bg'; endif; ?> <?php the_sub_field('margin_size'); ?> <?php if($noMobile == true): echo 'no-mob'; endif; ?>"
    <?php if( get_sub_field('section_id') ): ?>id="<?php the_sub_field('section_id'); ?>" <?php endif; ?>>

    <div class="row <?php the_sub_field('column_size'); ?>">
        <div class="controls">
            <ul data-filter-group>
                <?php $all_categories = get_categories(array(
        'hide_empty' => true
    ));?>
                <li>Filter</li>
                <li type="button" data-toggle="all">All</li>
                <?php foreach($all_categories as $category): ?>
                <li type="button" data-toggle=".<?php echo $category->slug; ?>">
                    <?php echo $category->name; ?></li>
                <?php endforeach; ?>
            </ul>
        </div>

        <div class="multi-grid">
            <div class="second-filter">

                <div class="type-controls">
                    <ul data-filter-group>
                        <?php $terms = get_terms(
    array(
        'taxonomy'   => 'propertystyle',
        'hide_empty' => false,
    )
);?>
                        <li type="button" data-toggle="all">All Lodge Types</li>
                        <?php if ( ! empty( $terms ) && is_array( $terms ) ) {
    foreach ( $terms as $term ) { ?>
                        <li type="button" data-toggle=".<?php echo $term->slug; ?>">
                            <?php echo $term->name; ?></li>
                        <?php
    }
} ?>
                    </ul>
                </div>



            </div>

            <div class="flex-split-col filter-grid">
                <?php
            $numberPosts = get_sub_field('posts_to_show');
$loop = new WP_Query(
    array(
        'posts_per_page' => $numberPosts,
    )
);
$counter = 0;
while ( $loop->have_posts() ) : $loop->the_post();
$mainImage = get_the_post_thumbnail_url(get_the_ID(),'large');
$counter++;

?>
                <?php $terms = get_the_category( $post->ID );
                $secondarys = wp_get_post_terms($post->ID,'propertystyle'); ?>

                <div
                    class="card-item mix tile <?php foreach( $terms as $term ) echo ' ' . $term->slug; ?> <?php foreach( $secondarys as $secondary ) echo ' ' . $secondary->slug; ?>">
                    <div class="card-image">
                        <a href="<?php the_permalink(); ?>"><img
                                src="<?php echo get_the_post_thumbnail_url($post->ID, 'medium_large'); ?>"></a>
                    </div>
                    <div class="post-text">
                        <span class="meta"><?php echo get_the_date(); ?></span>
                        <h2 class="heading-secondary">
                            <a href="<?php echo get_permalink( $post->ID ); ?>">
                                <span class="heading-secondary--sub underscores"><?php the_title(); ?></span>
                            </a>
                        </h2>
                        <p><?php echo wp_trim_words( get_the_excerpt(), 15, '...' ); ?></p>
                    </div>
                    <div class="post-link">
                        <a class="button text" href="<?php echo get_permalink( $post->ID ); ?>">
                            Read more
                        </a>
                    </div>
                </div>
                <?php endwhile;
wp_reset_postdata();
?>
            </div>
        </div>
    </div>

</section>