<section class="faq-block">
    <div class="row w60">
        <div class="col toggle-block block accordion">
            <?php $altColor = get_sub_field('alternate_colour');
            $oneOnly = get_sub_field('display_settings'); ?>


            <?php if( have_rows('faq_item') ): 
            
                     while ( have_rows('faq_item') ) : the_row(); ?>


            <div class="block__item">
                <div
                    class="block__title <?php if($altColor == true): echo 'alt-color'; endif;?> <?php if($oneOnly == true): echo 'one'; endif;?>">
                    <h3 class="heading"><span
                            class="highlight-letter"><?php the_sub_field('letter'); ?></span><?php the_sub_field('title'); ?>
                    </h3>
                </div>
                <div class="block__text <?php if($altColor == true): echo 'alt-color'; endif;?>">
                    <?php the_sub_field('description'); ?>
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