<?php
/**
 * ============== Template Name: Terms and Privacy
 *
 * @package ridgeway
 */
get_header();?>
<div class="row">
    <div class="container">
        <div class="terms-side-bar">
            <div class="feather-icon">
                <?php get_template_part("inc/img/featherlogo");?></div>
        </div>
        <div class="terms">

            <h2 class="heading-secondary"><?php the_field("page_heading"); ?></h2>
            <?php the_field("main_body_text"); ?>

            <?php if( have_rows('legal_terms_block') ): ?>
            <?php while( have_rows('legal_terms_block') ): the_row(); ?>

            <div class="terms__section">
                <h2 class="heading-secondary-sub"><?php the_sub_field('title'); ?></h2>


                <?php if( have_rows('legal_terms') ): ?>
                <?php while( have_rows('legal_terms') ): the_row(); ?>
                <div class="terms__block">
                    <div class="terms__title">
                        <p><strong><?php the_sub_field('term_title'); ?></strong></p>
                    </div>
                    <div class="terms__copy"><?php the_sub_field('term_copy'); ?></div>
                </div>
                <?php endwhile; ?>
                <?php endif; ?>
            </div>
            <?php endwhile; ?>
            <?php endif; ?>

        </div>
    </div>
</div>

<?php get_footer();?>