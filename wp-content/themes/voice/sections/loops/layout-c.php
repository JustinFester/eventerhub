<article <?php post_class( 'vce-post vce-lay-c' ); ?>>

	<?php if ( $fimage = vce_featured_image( 'vce-lay-b' ) ): ?>
	 	<div class="meta-image">
			<a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo esc_attr( get_the_title() ); ?>">
				<?php echo $fimage; ?>
				<?php if ( $icon = vce_post_format_icon( 'lay_c' ) ) :?>
					<span class="vce-format-icon">
					<i class="fa <?php echo $icon; ?>"></i>
					</span>
				<?php endif; ?>
			</a>
		</div>
	<?php endif; ?>

	<header class="entry-header">
		<?php if ( vce_get_option( 'lay_c_cat' ) ) : ?>
			<span class="meta-category"><?php echo vce_get_category(); ?></span>
		<?php endif; ?>
		<h2 class="entry-title"><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo esc_attr( get_the_title() ); ?>"><?php echo vce_get_title( 'lay-c' ); ?></a></h2>
		<?php if ( $meta = vce_get_meta_data( 'lay-c' ) ): ?><div class="entry-meta"><?php echo $meta; ?></div><?php endif; ?>
	</header>

	<?php if ( vce_get_option( 'lay_c_excerpt' ) ) : ?>
		<div class="entry-content">
			<p><?php echo vce_get_excerpt( 'lay-c' ); ?></p>
		</div>
	<?php endif; ?>

	<?php if ( vce_get_option( 'lay_c_readmore' ) ) : ?>
			<a href="<?php echo esc_attr( get_permalink() ); ?>" class="vce-read-more"><?php echo __vce( 'read_more' ) ?></a>
	<?php endif;?>
</article>