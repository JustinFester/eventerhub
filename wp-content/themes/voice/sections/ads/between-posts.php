<?php if( $ad = vce_get_option('ad_between_posts') ): ?>
	<div class="vce-ad-between-posts vce-ad-container"><?php echo do_shortcode( $ad ); ?></div>
<?php endif; ?>