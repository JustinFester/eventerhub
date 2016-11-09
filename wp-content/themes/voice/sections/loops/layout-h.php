<article <?php post_class( 'vce-post vce-lay-h' ); ?>>
	<div class="img-wrap">

		<?php if ( $fimage = vce_featured_image( 'vce-fa-grid' ) ): ?>
		 	<div class="meta-image">
				<?php echo $fimage; ?>	
			</div>
		<?php endif; ?>

		<a href="<?php echo esc_url(get_permalink()); ?>" class="vce-overlay"></a>
		<header class="entry-header">
			<?php if ( vce_get_option( 'lay_h_cat' ) ) : ?>
				<span class="meta-category"><?php echo vce_get_category(); ?></span>
			<?php endif; ?>
			<h2 class="entry-title">
				<a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo esc_attr( get_the_title() ); ?>">
					<?php echo vce_get_title( 'lay-h' ); ?>
				</a>
			</h2>
			<?php if ( $meta = vce_get_meta_data( 'lay-h' ) ): ?><div class="entry-meta"><?php echo $meta; ?></div><?php endif; ?>
		</header>
	</div>

	<?php if ( vce_get_option( 'lay_h_excerpt' ) ) : ?>
		<div class="entry-content">
			<p><?php echo vce_get_excerpt( 'lay-h' ); ?></p>
		</div>
	<?php endif; ?>
</article>