<?php

get_header();
$term = get_queried_object();
$taxonomy = $term->taxonomy;
$term_id = $term->term_id;  

    ?>
<!-- ******************* Hero Content ******************* -->
<header class="header v100">
    <?php get_template_part("template-parts/archivehero"); ?>
</header>

<!-- ******************* Hero Content END ******************* -->
<?php $largeImage = get_field('background_image', $term);
$mapImage = get_field('map_icon', $term); ?>
<section class="image-text">
    <div class="row">

        <div class="split-col">

            <div class="image-advert fmleft background-image"
                style="background-image: url(<?php echo $largeImage['url']; ?>)">
            </div>
            <div class="text-box fmright">

                <img src="<?php echo $mapImage['url']; ?>">
                <h3 class="heading-secondary"><?php echo single_term_title(); ?></h3>



                <article>
                    <?php echo term_description(); ?>
                </article>

                <?php 
$link = get_sub_field('link', $term);
if( $link ): 
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';
    ?>
                <a class="button" href="<?php echo esc_url( $link_url ); ?>"
                    target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                <?php endif; ?>
            </div>
        </div>


    </div>
</section>


<section class="section-title">
    <div class="row centre-line w50 fmbottom">
        <div class="line"></div>
        <div></div>
    </div>
    <div class="row w60">
        <h3 class="heading-secondary fmbottom">
            <span class="heading-secondary--main"><?php the_sub_field('title'); ?></span>
            <span class="heading-secondary--sub">Experiences in <?php echo single_term_title(); ?></span>
        </h3>
    </div>
</section>



<?php $bgColor = get_sub_field('bg_colour');
$noMobile = get_sub_field('hide_on_mobile');
 ?>
<section class="experience-slider">
    <div class="row full">

        <div class="experience-blocks">

            <?php
                $args = array(
                    'post_type' => 'safari_types',
                    'tax_query' => array(
                    'relation' => 'AND',
                        array(
                            'taxonomy' => 'destinations',
                            'field' => 'slug',
                            'terms' => array( $term->slug )
                        ),
                    )
                );
                $query = new WP_Query($args);
                if ( $query->have_posts() ): while ( $query->have_posts() ):
                $query->the_post();
                $campImage = get_sub_field('hero_image');?>


            <div class="image-advert"
                style="background-image: url(<?php echo get_the_post_thumbnail_url( get_the_ID(), 'large' ); ?>)">
                <div class="tri-col revealup">

                    <div class="title">
                        <h3 class="heading-tertiary alt-font-pop alt-color"><?php $postType = get_post_type_object(get_post_type());
if ($postType) {
    echo esc_html($postType->labels->singular_name);
} ?></h3>
                        <h3 class="heading-secondary alt-color"><?php the_title(); ?></h3>
                    </div>
                    <div class="text alt-color">
                        <p><?php echo wp_trim_words( get_the_excerpt(), 20, '...' ); ?></p>
                    </div>
                    <div class="link">
                        <a class="button" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </div>
                </div>
            </div>

            <?php endwhile; endif;?>
        </div>
        <?php wp_reset_postdata(); ?>
    </div>
</section>

<section class="section-title">
    <div class="row centre-line w50 fmbottom">
        <div class="line"></div>
        <div></div>
    </div>
    <div class="row w60">
        <h3 class="heading-secondary fmbottom">
            <span class="heading-secondary--main"><?php the_sub_field('title'); ?></span>
            <span class="heading-secondary--sub">Itineraries in <?php echo single_term_title(); ?></span>
        </h3>
    </div>
</section>



<?php $bgColor = get_sub_field('bg_colour');
$noMobile = get_sub_field('hide_on_mobile');
 ?>
<section class="triple-slider">
    <div class="row full">
        <div class="triple-blocks">
            <?php
                $args = array(
                    'post_type' => 'itineraries',
                    'tax_query' => array(
                    'relation' => 'AND',
                        array(
                            'taxonomy' => 'destinations',
                            'field' => 'slug',
                            'terms' => array( $term->slug )
                        ),
                    )
                );
                $query = new WP_Query($args);
                if ( $query->have_posts() ): while ( $query->have_posts() ):
                $query->the_post();
                $campImage = get_sub_field('hero_image');
$experienceImage = get_the_post_thumbnail_url( get_the_ID(), 'medium_large' );
        // Setup this post for WP functions (variable must be named $post).
         ?>

            <div class="triple-slider--item">
                <div class="image-advert" style="background-image: url(<?php echo $experienceImage; ?>)">
                    <a href="<?php the_permalink(); ?>"></a>
                </div>
                <div class="item-details">

                    <div class="title">
                        <!-- <h3 class="heading-tertiary <?php
if(get_sub_field('switch_text'))
{
	echo 'alt-color';
}
?>">
<?php $postType = get_post_type_object(get_post_type());
if ($postType) {
    echo esc_html($postType->labels->singular_name);
} ?></h3> -->
                        <h3 class="heading-tertiary"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <span class="alt-font-pop"><?php the_field('length_of_stay'); ?></span>
                    </div>
                    <div class="text <?php
if(get_sub_field('switch_text'))
{
	echo 'alt-color';
}
?>">
                        <div class="destinations alt-font-pop">
                            <?php
$taxonomy = 'destinations'; // change this to your taxonomy
$terms = wp_get_post_terms( $post->ID, $taxonomy, array( "fields" => "ids" ) );
if( $terms ) {
  echo '<ul>';

  $terms = trim( implode( ',', (array) $terms ), ' ,' );
  wp_list_categories( 'title_li=&taxonomy=' . $taxonomy . '&include=' . $terms );

  echo '</ul>';
}
?>
                        </div>
                        <div class="sub">

                        </div>
                    </div>
                </div>
            </div>
            <?php endwhile; endif;?>
        </div>
        <?php 
    // Reset the global post object so that the rest of the page works correctly.
    wp_reset_postdata(); ?>

    </div>
</section>


<section class="section-title">
    <div class="row centre-line w50 fmbottom">
        <div class="line"></div>
        <div></div>
    </div>
    <div class="row w60">
        <h3 class="heading-secondary fmbottom">
            <span class="heading-secondary--main"><?php the_sub_field('title'); ?></span>
            <span class="heading-secondary--sub">Other Destinations</span>
        </h3>
    </div>
</section>



<section class="single-slider">
    <div class="row full">
        <div class="single-slider--blocks">




            <?php
$terms = get_terms( array('destinations') );

foreach ($terms as $term) :

    $term_slug = $term->slug;
    $_posts = new WP_Query( array(
                // 'post_type'         => 'itineraries',
                // 'posts_per_page'    => -1,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'destinations',
                        'field'    => 'slug',
                        'terms'    => $term_slug,
                        'operator' => 'NOT IN'
                    ),
                ),
            ));

    if( $_posts->have_posts() ) :

        $campImage = get_sub_field('hero_image',$term);
        $experienceImage = get_the_post_thumbnail_url( get_the_ID(), 'medium_large' );
        // Setup this post for WP functions (variable must be named $post).
        $image = get_field('background_image',$term);
        $icon = get_field('map_icon',$term);
        ?>
            <div class="single-slider--image">
                <img src="<?php echo $image['url']; ?>" />
                <div class="single-slider--text revealup">
                    <img src="<?php echo $icon['url']; ?>" />
                    <h3 class="heading-secondary"><?php echo esc_html( $term->name ); ?></h3>
                </div>
                <div class="single-slider--link">
                    <a class="button" href="<?php echo esc_url( get_term_link( $term ) ); ?>">Explore
                        <?php echo esc_html( $term->name ); ?></a>
                </div>
            </div>
            <?php endif;
    wp_reset_postdata();
            endforeach; ?>

        </div>






    </div>
</section>


<?php get_footer();?>