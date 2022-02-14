<section class="gallery">
    <?php 
$images = get_sub_field('gallery');
$counter = 0;
$galleryCount = get_sub_field('select_gallery_size');

if( $images && $counter < $galleryCount) : ?>
    <div class="row w60">
        <div class="parent parent__<?php echo ($galleryCount); ?>">

            <?php foreach( $images as $image ):
            $counter++; ?>
            <?php if( $counter <= $galleryCount) : ?>
            <?php $caption = $image['caption'];?>
            <div class="div<?php echo ($counter); ?> fmtop gallery-images"><a href="<?php echo $image['url']; ?>"
                    class="lightbox-gallery"><img src="<?php echo esc_url($image['sizes']['large']); ?>"
                        alt="<?php echo $image['alt']; ?>" /></a>
            </div>
            <?php endif; ?>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>

    </div>
</section>