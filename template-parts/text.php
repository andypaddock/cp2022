<?php $textBGImage = get_sub_field('background_image');?>
<?php $backgroundSwitch = get_sub_field('select_background');
$centerText = get_sub_field('centered_text');
$paraImage = get_sub_field('para_image');
            if ($backgroundSwitch == 'full'): ?>
<section id="<?php the_sub_field('section_id'); ?>"
    class="section-text <?php if($paraImage == true): echo 'para-image'; endif;?> <?php if($centerText == true): echo 'center-text'; endif;?>"
    style="background-image: linear-gradient(rgba(0, 0, 0, <?php the_sub_field('image_overlay'); ?>), rgba(0, 0, 0, <?php the_sub_field('image_overlay'); ?>)), url(<?php echo $textBGImage['url']; ?>)">
    <div class="row">
        <?php elseif ($backgroundSwitch == 'back'): ?>
        <section id="<?php the_sub_field('section_id'); ?>"
            class="section-text <?php if($centerText == true): echo 'center-text'; endif;?>">
            <div class="row <?php if($paraImage == true): echo 'para-image'; endif;?>"
                style="background-image:linear-gradient(rgba(0, 0, 0, <?php the_sub_field('image_overlay'); ?>), rgba(0, 0, 0, <?php the_sub_field('image_overlay'); ?>)), url(<?php echo $textBGImage['url']; ?>)">
                <?php else :?>
                <section id="<?php the_sub_field('section_id'); ?>"
                    class="section-text <?php if($centerText == true): echo 'center-text'; endif;?>">
                    <div class="row <?php if($paraImage == true): echo 'para-image'; endif;?>">
                        <?php endif;?>
                        <div class="row w40">
                            <?php if (get_sub_field('text_block_header')):?>
                            <h2 class="heading-<?php the_sub_field('header_size'); ?> <?php

if(get_sub_field('white_text'))
{
	echo 'alt-text';
}

?>">
                                <?php the_sub_field('text_block_header'); ?> </h2>
                            <div class="slash">/</div>
                            <?php endif; ?>
                        </div>
                        <div class="row w40 text-para">
                            <?php the_sub_field('paragraphs'); ?>
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