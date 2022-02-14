<?php
/**
 * ============== Template Name: Historical Data
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
        <div class="terms historical">

            <h2 class="heading-secondary"><?php the_field("page_heading"); ?></h2>
            <?php the_field("main_body_text"); ?>

            <?php if( have_rows('legal_terms_block') ): ?>
            <?php while( have_rows('legal_terms_block') ): the_row(); ?>

            <div class="terms__section">
                <h2 class="heading-secondary-sub"><?php the_sub_field('title'); ?></h2>


                <?php if( have_rows('legal_terms') ): ?>
                <?php while( have_rows('legal_terms') ): the_row(); ?>

                <?php if ( get_sub_field( 'header' ) ): ?>
                <div class="terms__block table_header">
                    <?php else: ?>
                    <div class="terms__block">
                        <?php endif; ?>
                        <div class="terms__title">
                            <p><?php the_sub_field('term_title'); ?></p>
                        </div>
                        <div class="terms__copy">
                            <p><?php the_sub_field('term_copy'); ?></p>
                        </div>
                    </div>
                    <?php endwhile; ?>
                    <?php endif; ?>
                </div>
                <?php endwhile; ?>
                <?php endif; ?>
                <div class="terms__docs">
                    <?php if( have_rows('report_documents') ): ?>
                    <?php while( have_rows('report_documents') ): the_row(); ?>
                    <div class="document-block">
                        <p><?php the_sub_field("recent_year_report"); ?></p>
                        <?php
$file = get_sub_field('report_link');
if( $file ): ?>
                        <a class="doc-download" href="<?php echo $file['url']; ?>"><i
                                class="fas fa-download"></i><?php echo $file['filename']; ?></a>
                    </div>
                    <?php endif; ?>
                    <?php endwhile; ?>
                    <?php endif; ?>
                </div>

            </div>
        </div>
    </div>

    <?php get_footer();?>