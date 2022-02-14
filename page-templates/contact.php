<?php
/**
 * ============== Template Name: Contact Page Template
 *
 * @package ridgeway
 */
get_header();?>
<!-- ******************* Hero Content ******************* -->

<?php get_template_part("template-parts/contacthero"); ?>

<!-- ******************* Hero Content END ******************* -->

<div class="contact-title-block">
    <div class="row">
        <div class="container">
            <div class="subhero-title">
                <h1 class="heading-hero"><?php the_field('heading');?></h1>
            </div>

        </div>
    </div>
</div>
<div class="right-bleed">
    <div class="row">
        <div class="container">
            <div class="contact-page">
                <div class="contact-page__sidebar">
                    <div class="contact-logo"><?php get_template_part("inc/img/featherlogo");?></div>
                    <div class="contact-details">


                        <?php if( have_rows('team_member_details', 'options') ): ?>
                        <?php while( have_rows('team_member_details', 'options') ): the_row(); ?>
                        <div class="team-block">
                            <h2 class="heading-secondary"><?php the_sub_field('team_name'); ?></h2>
                            <h3 class="pub-date"><a class="robo-font"
                                    href="tel:<?php the_sub_field('team_phone_number');?>"><?php the_sub_field('team_phone_number');?></a>
                            </h3>
                            <h3 class="pub-date"><a class="robo-font"
                                    href="mailto:<?php the_sub_field('team_email_address');?>"><?php the_sub_field('team_email_address');?></a>
                            </h3>
                        </div>


                        <?php endwhile; ?>
                        <?php endif; ?>

                        <div class="address-block">

                            <p><?php the_field('address_block', 'options');?></p>

                        </div>


                    </div>


                </div>
                <div class="contact-page__main"><?php the_field('copy');?>
                    <?php echo do_shortcode('[contact-form-7 id="3897" title="Contact Form"]');?>
                </div>

            </div>
        </div>
    </div>
</div>
<?php get_footer();?>