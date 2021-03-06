<?php
$heroVideo = get_field('background_video');
$heroMobile = get_field('mobile_video');
$heroPoster = get_field('video_poster'); ?>
<?php $heroSwitch = get_field('hero_type');
if ($heroSwitch == 'video') : ?>


<div class="hero">
    <video playsinline autoplay muted loop poster="<?php echo $heroPoster['url']; ?>" id="bgvideo">
        <?php if ($heroMobile) : ?>
        <source src="<?php echo $heroMobile['url']; ?>" type="video/mp4" media="all and (max-width: 480px)">
        <?php endif; ?>
        <source src="<?php echo $heroVideo['url']; ?>" type="video/mp4">
    </video>
    <div class="row header__text-box">
        <?php if(is_front_page()):?>
        <div class="logo fmtop">
            <?php get_template_part('inc/img/cplogolrg');?>
        </div>
        <?php endif ;?>
        <h1 class="heading-<?php the_field('header_size'); ?> <?php
                                                                    if (get_field('switch_text')) {
                                                                        echo 'alt-color';
                                                                    }
                                                                    ?>">
            <span
                class="heading-<?php the_field('header_size'); ?>--main"><?php if (get_field('header')) : ?><?php the_field('header'); ?><?php else : ?><?php the_title(); ?><?php endif ?></span>
            <span class="heading-<?php the_field('header_size'); ?>--sub"><?php the_field('sub_header'); ?></span>
        </h1>
        <?php if(is_front_page()):?>
        <div class="country-links fmbottom">
            <?php $terms = get_terms(array('taxonomy'=>'destinations','parent'=>0));
echo '<ul>';
foreach ($terms as $term) {
    echo '<li><a href="'.get_term_link($term).'">'.$term->name.'</a></li>';
}
echo '</ul>';
?></div><?php endif ;?>

    </div>
    <div class="down_arrow">
        <div class="arrow bounce">
            <a class="fal fa-chevron-down fa-4x" href="#content"></a>
        </div>
    </div>

</div>

<?php elseif ($heroSwitch == 'image') : ?>
<div class="hero imageoff-<?php the_field('image_offset'); ?>"
    style="background-image: url(<?php echo get_the_post_thumbnail_url( get_the_ID(), 'hero-image' ); ?>)">

    <div class="row header__text-box">
        <?php if(is_front_page()):?>
        <div class="logo fmtop">
            <?php get_template_part('inc/img/cplogolrg');?>
        </div>
        <?php endif ;?>
        <h1 class="heading-<?php the_field('header_size'); ?> fmtop  <?php
                                                                            if (get_field('switch_text')) {
                                                                                echo 'alt-color';
                                                                            }
                                                                            ?>">
            <span
                class="heading-<?php the_field('header_size'); ?>--main"><?php if (get_field('header')) : ?><?php the_field('header'); ?><?php else : ?><?php the_title(); ?><?php endif ?></span>
            <span class="heading-<?php the_field('header_size'); ?>--main"><?php the_field('sub_header'); ?></span>
        </h1>
        <?php if(is_front_page()):?>
        <div class="country-links fmbottom">
            <?php $terms = get_terms(array('taxonomy'=>'destinations','parent'=>0));
echo '<ul>';
foreach ($terms as $term) {
    echo '<li><a href="'.get_term_link($term).'">'.$term->name.'</a></li>';
}
echo '</ul>';
?></div><?php endif ;?>
    </div>
    <div class="down_arrow">
        <div class="arrow bounce">
            <a class="fal fa-chevron-down fa-4x" href="#content"></a>
        </div>
    </div>

</div>
<?php else : ?>
<div class="hero imageoff-50"
    style="background-image: url(<?php echo get_the_post_thumbnail_url( get_the_ID(), 'hero-image' ); ?>)">

    <div class="row header__text-box">
        <?php if(is_front_page()):?>
        <div class="logo fmtop">
            <?php get_template_part('inc/img/cplogolrg');?>
        </div>
        <?php endif ;?>
        <h1 class="heading-primary fmtop alt-color">
            <span
                class="heading-primary--main"><?php if (get_field('header')) : ?><?php the_field('header'); ?><?php else : ?><?php the_title(); ?><?php endif ?></span>
            <span class="heading-primary--main"><?php the_field('sub_header'); ?></span>
        </h1>
        <?php if(is_front_page()):?>
        <div class="country-links fmbottom">
            <?php $terms = get_terms(array('taxonomy'=>'destinations','parent'=>0));
echo '<ul>';
foreach ($terms as $term) {
    echo '<li><a href="'.get_term_link($term).'">'.$term->name.'</a></li>';
}
echo '</ul>';
?></div><?php endif ;?>
    </div>
    <div class="down_arrow">
        <div class="arrow bounce">
            <a class="fal fa-chevron-down fa-4x" href="#content"></a>
        </div>
    </div>

</div>
<?php endif; ?>