<?php
/**
 * Template Name: Authors
 */
?>
<?php get_header(); ?>

<?php get_template_part( 'sections/ads/below-header' ); ?>

<div id="content" class="container site-content">
<?php while (have_posts()) : the_post();?>
	<?php global $vce_sidebar_opts; ?>
	<?php if ( $vce_sidebar_opts['use_sidebar'] == 'left' ) { get_sidebar(); } ?>

	<div id="primary" class="vce-main-content">

		<div class="main-box">

			<div class="main-box-head">
				<h1 class="main-box-title"><?php the_title(); ?></h1>
			</div>

			<div class="main-box-inside">
			
			<?php
			$meta = vce_get_page_meta( get_the_ID(), 'authors' );
		
			$ids = get_users( array('fields' => 'ID', 'who' => 'authors', 'exclude' => explode(',',$meta['exclude']) ) );

			$users_with_posts = array_filter( count_many_users_posts( $ids, 'post') );
				
			$author_args = array( 
				'include' => array_keys( $users_with_posts ), 
				'order' => $meta['order'], 
				'orderby' => $meta['orderby']
			);

			$authors = get_users( $author_args ); 

			?>

			
			
			<?php foreach ( $authors as $author ) : ?>
				 
				<div class="vce-author-card">
					<div class="data-image">
						<?php echo get_avatar( $author->ID, 112 ); ?>
					</div>
					<div class="data-content">
						<h4 class="author-title"><?php the_author_meta( 'display_name', $author->ID ); ?></h4>
						<div class="data-entry-content">
							<?php echo wpautop( get_the_author_meta( 'description', $author->ID ) ); ?>
						</div>
					</div>

					<div class="vce-content-outside">
						<div class="data-links">
								<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID', $author->ID ) ); ?>" class="vce-author-link vce-button"><?php echo __vce( 'view_all_posts' ); ?></a>
						</div>
						<div class="vce-author-links">
							<?php if ( get_the_author_meta( 'url', $author->ID ) ) {?> <a href="<?php the_author_meta( 'url', $author->ID ); ?>" target="_blank" class="fa fa-link vce-author-website"></a><?php } ?>
							<?php $user_social = vce_get_social(); ?>
							<?php foreach ( $user_social as $soc_id => $soc_name ): ?>
								<?php if ( $social_meta = get_the_author_meta( $soc_id, $author->ID ) ) : ?>
									<a href="<?php echo $social_meta; ?>" target="_blank" class="fa fa-<?php echo $soc_id; ?>"></a>
								<?php endif; ?>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
				  
			<?php endforeach; ?>

			</div>

		</div>

	</div>

	<?php if ( $vce_sidebar_opts['use_sidebar'] == 'right' ) { get_sidebar(); } ?>
<?php endwhile;?>
</div>

<?php get_footer(); ?>