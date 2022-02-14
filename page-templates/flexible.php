<?php
/**
 * ============== Template Name: Flexible Page
 *
 * @package messels
 */
get_header();?>

<?php get_template_part('template-parts/subhero');?>




<?php get_template_part('template-parts/tabs');?>



<?php if( have_rows('flexible_blocks') ): ?>
<?php while( have_rows('flexible_blocks') ): the_row(); ?>

<?php if( get_row_layout() == 'text_block' ):?>

<?php get_template_part('template-parts/text');?>

<?php elseif( get_row_layout() == 'process_block' ): ?>

<?php get_template_part('template-parts/process');?>



<?php elseif( get_row_layout() == 'double_image_links' ): ?>

<?php get_template_part('template-parts/double', 'links');?>


<?php elseif( get_row_layout() == 'background_bleed' ): ?>

<?php get_template_part('template-parts/bleed');?>

<?php elseif( get_row_layout() == 'product_feed' ): ?>

<?php get_template_part('template-parts/product', 'feed');?>

<?php elseif( get_row_layout() == 'full_width_image' ): ?>

<?php get_template_part('template-parts/full', 'image');?>



<?php endif; ?>
<?php endwhile; ?>
<?php endif; ?>


<?php get_footer();?>