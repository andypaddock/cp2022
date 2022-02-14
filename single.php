<?php
/**
 * The template for displaying all single posts
 *
 * @package chelipeacock
 */
get_header(); ?>



<section class="post-content">
    <div class="row w60">
        <div class="flex-container">

            <?php
 
if ( have_posts() ) : 
    while ( have_posts() ) : the_post();
        // the_content();
        get_template_part('template-parts/postcontent');
        endwhile;
        else :
        _e( 'Sorry, no posts matched your criteria.', 'textdomain' );
        endif;

        ?>

        </div>
    </div>
</section>
<span id="content"></span>
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
<?php elseif( get_row_layout() == 'gallery_block' ):?>
<?php get_template_part('template-parts/gallery');?>
<?php endif; ?>
<?php endwhile; ?>
<?php endif; ?>
<?php get_template_part('template-parts/blog_feed');?>
<?php get_footer(); ?>