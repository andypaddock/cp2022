<?php $bgColor = get_sub_field('bg_colour');
$noMobile = get_sub_field('hide_on_mobile');?>
<section
    class="day-planner <?php if($bgColor == true): echo 'alt-bg'; endif; ?> <?php the_sub_field('margin_size'); ?> <?php if($noMobile == true): echo 'no-mob'; endif; ?>"
    <?php if( get_sub_field('section_id') ): ?>id="<?php the_sub_field('section_id'); ?>" <?php endif; ?>>
    <div class="row <?php the_sub_field('column_size'); ?>">

        <div class="half-col">
            <div class="days-block">
                <?php if( have_rows('days_plan') ): ?>
                <?php while( have_rows('days_plan') ): the_row(); 
        $daysImage = get_sub_field('day_image');
        ?>
                <div class="days-item"><img src="<?php echo esc_url($daysImage['sizes']['large']); ?>">
                    <p class="days alt-font-pop"><?php the_sub_field('days'); ?></p>
                    <h3 class="heading-tertiary alt-font-pop"><?php the_sub_field('title'); ?></h3>
                    <div class="days-text alt-font-pop"><?php the_sub_field('description'); ?></div>
                </div>
                <?php endwhile; ?>

                <?php endif; ?>
            </div>
            <?php get_template_part("template-parts/route-map"); ?>
        </div>
    </div>
</section>