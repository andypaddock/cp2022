<?php
/**
 * The template for displaying all single posts
 *
 * @package chelipeacock
 */
get_header(); ?>
<?php if( !get_field('hide_previous') ): ?>
<span id="content"></span>
<?php $bgColor = get_sub_field('bg_colour');
$noMobile = get_sub_field('hide_on_mobile');?>
<section class="section-text <?php if($bgColor == true): echo 'alt-bg'; endif; ?>
    <?php the_sub_field('margin_size'); ?> <?php if($noMobile == true): echo 'no-mob'; endif; ?>"
    <?php if( get_sub_field('section_id') ): ?>id="<?php the_sub_field('section_id'); ?>" <?php endif; ?>>
    <div class="row w60">

        <?php if (get_sub_field('text_block_header')):?>
        <h2 class="heading-<?php the_sub_field('header_size'); ?>">
            <?php the_sub_field('text_block_header'); ?> </h2>
        <?php endif; ?>

        <div class="text-para count2">
            <?php the_content(); ?>
            <?php 
$link = get_sub_field('link');
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
</section>

<?php $bgColor = get_sub_field('bg_colour');
$noMobile = get_sub_field('hide_on_mobile');?>
<section
    class="faq-block <?php if($bgColor == true): echo 'alt-bg'; endif; ?> <?php the_sub_field('margin_size'); ?> <?php if($noMobile == true): echo 'no-mob'; endif; ?>"
    <?php if( get_sub_field('section_id') ): ?>id="<?php the_sub_field('section_id'); ?>" <?php endif; ?>>
    <div class="row w60">
        <div class="col toggle-block block accordion">



            <?php if( have_rows('questions') ): 
            
                     while ( have_rows('questions') ) : the_row(); ?>


            <div class="block__item">
                <div class="block__title">
                    <h3 class="heading"><?php the_sub_field('question'); ?>
                    </h3>
                </div>
                <div class="block__text">
                    <?php the_sub_field('answer'); ?>
                    <?php 
$link = get_sub_field('faq_link');
$callBack = get_sub_field('call_back');
if( $link ): 
	$link_url = $link['url'];
	$link_title = $link['title'];
	$link_target = $link['target'] ? $link['target'] : '_self';
	?>
                    <a class="button" href="<?php echo esc_url( $link_url ); ?>"
                        target="<?php echo esc_attr( $link_target ); ?>"><?php if($callBack == true): echo '<i class="fas fa-phone"></i>'; endif;?>
                        <?php echo esc_html( $link_title ); ?></a>
                    <?php endif; ?>
                </div>

            </div>

            <?php endwhile; endif; ?>


        </div>
    </div>
</section>



<?php $bgColor = get_sub_field('bg_colour');
$noMobile = get_sub_field('hide_on_mobile');
 ?>
<section
    class="gallery<?php if($bgColor == true): echo 'alt-bg'; endif; ?> <?php the_sub_field('margin_size'); ?> <?php if($noMobile == true): echo 'no-mob'; endif; ?>"
    <?php if( get_sub_field('section_id') ): ?>id="<?php the_sub_field('section_id'); ?>" <?php endif; ?>>
    <div class="row <?php the_sub_field('column_size'); ?>">
        <?php 
$images = get_field('gallery');
if( $images ): ?>
        <div id="parent">
            <?php foreach( $images as $image ): ?>
            <div class="child tile">
                <a class="lightbox-gallery" href="<?php echo esc_url($image['url']); ?>">
                    <img src="<?php echo esc_url($image['sizes']['large']); ?>"
                        alt="<?php echo esc_attr($image['alt']); ?>" />
                </a>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>




    </div>
</section>







<?php
$featured_posts = get_field('relational_itineraries');
if( $featured_posts ): ?>


<section class="section-title">
    <div class="row centre-line w50 fmbottom">
        <div class="line"></div>
        <div></div>
    </div>
    <div class="row w60">
        <h3 class="heading-secondary fmbottom">
            <span class="heading-secondary--main"><?php the_sub_field('title'); ?></span>
            <span class="heading-secondary--sub">Itineraries Featuring <?php the_title(); ?></span>
        </h3>
    </div>
</section>



<?php $bgColor = get_sub_field('bg_colour');
$noMobile = get_sub_field('hide_on_mobile');
 ?>
<section
    class="triple-slider linked-slider <?php if($bgColor == true): echo 'alt-bg'; endif; ?> <?php the_sub_field('margin_size'); ?> <?php if($noMobile == true): echo 'no-mob'; endif; ?>"
    <?php if( get_sub_field('section_id') ): ?>id="<?php the_sub_field('section_id'); ?>" <?php endif; ?>>
    <div class="row <?php the_sub_field('column_size'); ?> row-extended">





        <div class="triple-blocks">
            <?php foreach( $featured_posts as $post ): 
$experienceImage = get_the_post_thumbnail_url( get_the_ID(), 'medium_large' );
// Setup this post for WP functions (variable must be named $post).
setup_postdata($post); ?>

            <div class="triple-slider--item">
                <div class="image-advert" style="background-image: url(<?php echo $experienceImage; ?>)">
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
                        <h3 class="heading-tertiary <?php
if(get_sub_field('switch_text'))
{
	echo 'alt-color';
}
?>"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
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
            <?php endforeach; ?>
        </div>
        <?php 
    // Reset the global post object so that the rest of the page works correctly.
    wp_reset_postdata(); ?>
        <?php endif; ?>
    </div>
</section>

<?php endif; ?>



<?php if( have_rows('main_page_elements') ): ?>
<?php while( have_rows('main_page_elements') ): the_row(); ?>
<?php if( get_row_layout() == 'faq_blocks' ): ?>
<?php get_template_part('template-parts/faqblock');?>
<?php elseif( get_row_layout() == 'main_cat_links' ): ?>
<?php get_template_part('template-parts/main-boxes-page');?>
<?php elseif( get_row_layout() == 'text_blocks' ):?>
<?php get_template_part('template-parts/text');?>
<?php elseif( get_row_layout() == 'more_text' ):?>
<?php get_template_part('template-parts/moretext');?>
<?php elseif( get_row_layout() == 'tabbed' ):?>
<?php get_template_part('template-parts/tabs');?>
<?php elseif( get_row_layout() == 'section_title' ):?>
<?php get_template_part('template-parts/title');?>
<?php elseif( get_row_layout() == 'feature_boxes' ):?>
<?php get_template_part('template-parts/boxes');?>
<?php elseif( get_row_layout() == 'testimonial_block' ):?>
<?php get_template_part('template-parts/testimonial_block');?>
<?php elseif( get_row_layout() == 'testimonial_slider' ):?>
<?php get_template_part('template-parts/testimonial');?>
<?php elseif( get_row_layout() == 'single_testimonial' ):?>
<?php get_template_part('template-parts/singletestimonial');?>
<?php elseif( get_row_layout() == 'boxedcontent' ):?>
<?php get_template_part('template-parts/boxedcontent');?>
<?php elseif( get_row_layout() == 'contact_links' ):?>
<?php get_template_part('template-parts/links');?>
<?php elseif( get_row_layout() == 'shortcode' ):?>
<?php get_template_part('template-parts/shortcode');?>
<?php elseif( get_row_layout() == 'blog_posts' ):?>
<?php get_template_part('template-parts/post_block');?>
<?php elseif( get_row_layout() == 'map_locations' ):?>
<?php get_template_part('template-parts/mappins');?>
<?php elseif( get_row_layout() == 'single_button' ):?>
<?php get_template_part('template-parts/singlebutton');?>
<?php elseif( get_row_layout() == 'bordered_text' ):?>
<?php get_template_part('template-parts/borderedcontent');?>
<?php elseif( get_row_layout() == 'image_boxes' ):?>
<?php get_template_part('template-parts/imageboxes');?>
<?php elseif( get_row_layout() == 'advertblock' ):?>
<?php get_template_part('template-parts/advertblock');?>
<?php elseif( get_row_layout() == 'modal_window' ):?>
<?php get_template_part('template-parts/modal');?>
<?php elseif( get_row_layout() == 'logo_large_text' ):?>
<?php get_template_part('template-parts/logo_large_text');?>
<?php elseif( get_row_layout() == 'large_image_link' ):?>
<?php get_template_part('template-parts/large_image_link');?>
<?php elseif( get_row_layout() == 'large_image_text' ):?>
<?php get_template_part('template-parts/large_image_text');?>
<?php elseif( get_row_layout() == 'image_text_repeat' ):?>
<?php get_template_part('template-parts/image_text_repeat');?>
<?php elseif( get_row_layout() == 'staff_block' ):?>
<?php get_template_part('template-parts/staff_block');?>
<?php elseif( get_row_layout() == 'nav_bar' ):?>
<?php get_template_part('template-parts/nav_bar');?>
<?php elseif( get_row_layout() == 'single_slider' ):?>
<?php get_template_part('template-parts/single_slider');?>
<?php elseif( get_row_layout() == 'experience_slider' ):?>
<?php get_template_part('template-parts/experience_slider');?>
<?php elseif( get_row_layout() == 'itinerary_slider' ):?>
<?php get_template_part('template-parts/itinerary_slider');?>
<?php elseif( get_row_layout() == 'itinerary_slider' ):?>
<?php get_template_part('template-parts/itinerary_slider');?>
<?php elseif( get_row_layout() == 'cards_block' ):?>
<?php get_template_part('template-parts/cards_block');?>
<?php elseif( get_row_layout() == 'portrait_block' ):?>
<?php get_template_part('template-parts/portrait_block');?>
<?php elseif( get_row_layout() == 'portrait_block_filter' ):?>
<?php get_template_part('template-parts/portrait_block_filter');?>
<?php elseif( get_row_layout() == 'linked_itinerary_slider' ):?>
<?php get_template_part('template-parts/linked_itinerary_slider');?>
<?php elseif( get_row_layout() == 'gallery_block' ):?>
<?php get_template_part('template-parts/gallery_block');?>
<?php elseif( get_row_layout() == 'gallery_text_repeat' ):?>
<?php get_template_part('template-parts/gallery_text_repeat');?>
<?php elseif( get_row_layout() == 'itin_filter_block' ):?>
<?php get_template_part('template-parts/itin_filter_block');?>
<?php elseif( get_row_layout() == 'cards_block_filter' ):?>
<?php get_template_part('template-parts/cards_block_filter');?>
<?php elseif( get_row_layout() == 'testimonial' ):?>
<?php get_template_part('template-parts/testimonial');?>

<?php endif; ?>
<?php endwhile; ?>
<?php endif; ?>


<?php get_footer(); ?>