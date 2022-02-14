<?php
/**
 * ============== Template Name: Research Template
 *
 * @package messels
 */
get_header();?>

<div class="row">
    <div class="container research-archive">


        <div class="research-archive__sidebar">
            <ul>
                <?php wp_list_categories( array(
        'orderby'    => 'name',
        'show_count' => true,
        'exclude'    => array( 10 ),
        'title_li' => '<h3 class="archive">' . __('Filter', 'textdomain') . '</h3>'
     ) ); ?>
            </ul>
            <h3 class="archive">Arhive</h3>


            <ul>
                <?php
/**/
$years = $wpdb->get_col("SELECT DISTINCT YEAR(post_date)
FROM $wpdb->posts WHERE post_status = 'publish'
AND post_type = 'post' ORDER BY post_date DESC");
foreach($years as $year) :
?>
                <li class="archive-year"><?php echo $year; ?>

                    <ul class="archive-sub-menu">
                        <?    $months = $wpdb->get_col("SELECT DISTINCT MONTH(post_date)
        FROM $wpdb->posts WHERE post_status = 'publish' AND post_type = 'post'
        AND YEAR(post_date) = '".$year."' ORDER BY post_date ASC");
        foreach($months as $month) :
        ?>
                        <li><a href="<?php echo get_month_link($year, $month); ?>">

                                <?php echo date( 'F', mktime(0, 0, 0, $month) );?></a>

                        </li>

                        <?php endforeach;?>

                    </ul>

                </li>

                <?php endforeach; ?>

            </ul>


        </div>
        <div class="research-archive__main"><?php 
// the query
$wpb_all_query = new WP_Query(array('post_type'=>'post', 'post_status'=>'publish', 'posts_per_page'=>-1)); ?>

            <?php if ( $wpb_all_query->have_posts() ) : ?>

            <ul>

                <!-- the loop -->
                <?php while ( $wpb_all_query->have_posts() ) : $wpb_all_query->the_post(); ?>
                <li><?php 
$image = get_field('thumbnail_image');
$fallbackImage = get_field ('fallback_image', 'options'); ?>

                    <?php if (has_post_thumbnail( $post->ID ) ): ?>
                    <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
                    <div class="custom-bg" style="background-image: url('<?php echo $image[0]; ?>')">

                    </div>
                    <?php endif; ?>
                    <div class="research-meta">
                        <span class="pub-date"><?php the_date(); ?></span>
                        <h3 class="heading-tertiary"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h3>
                        <?php if ( is_user_logged_in() ) { ?>
                        <?php the_excerpt(); ?>
                        <a class="research-link alt-font" href="<?php the_permalink(); ?>">Read More <i
                                class="fas fa-arrow-right"></i></a>
                        <?php } else { ?>
                        <a class="research-link alt-font" href="<?php the_permalink(); ?>">Read More <i
                                class="fas fa-arrow-right"></i></a>
                        <span class="pub-date">(Requires Log In)</span>
                        <?php } ?>
                    </div>
                </li>
                <?php endwhile; ?>
                <!-- end of the loop -->

            </ul>

            <?php wp_reset_postdata(); ?>

            <?php else : ?>
            <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
            <?php endif; ?>
        </div>


    </div>
</div>

<?php get_footer();?>