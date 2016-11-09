<?php if ( vce_use_cover_fimg() ) : ?>
<div class="vce-featured">

    <div class="vce-featured-header">
        <div class="vce-featured-info">
            <div class="vce-hover-effect">

                <?php if ( vce_get_option( 'show_cat' ) ) : ?>
                    <div class="vce-featured-section">
                        <?php echo vce_get_category(); ?>
                    </div>
                <?php endif; ?>

                <h1 class="vce-featured-title vce-featured-link-article"><?php the_title(); ?></h1>

                <?php if ( $meta = vce_get_meta_data( 'single' ) ) : ?>
                    <div class="entry-meta"><?php echo $meta; ?></div>
                <?php endif; ?>

            </div>
        </div>

        <?php if ( vce_get_option( 'show_fimg_cap' ) && $caption = get_post( get_post_thumbnail_id() )->post_excerpt ) : ?>
                        <div class="vce-photo-caption"><?php echo $caption;  ?></div>
                <?php endif; ?>

        <div class="vce-featured-header-background"></div>
    </div>


    <?php if ( $fimage = vce_featured_image( 'vce-fa-full' ) ): ?>
                <?php echo $fimage; ?>
    <?php endif; ?>


</div>
<?php endif;?>