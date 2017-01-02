<?php 
/**
 * If there are no posts to display, such as an empty archive page
 */ 
?>
<?php if ( !have_posts() ) : ?>
		<div id="404error">
				<p class="entry-title">Not Found</p>
			<div class="entry-content">
				<p>Apologies, but the page you requested could not be found.<br />Perhaps searching will help.</p>
				<br />
				<?php get_search_form(); ?>
			</div><!-- .entry-content -->
		</div><!-- #404error -->
<?php endif; ?>

<?php
/**
 * The Loop
 */
?>
<?php while ( have_posts() ) : the_post(); ?>

<?php 
/* 
 * How to display posts in the Gallery category.
 */
?>

	<?php if ( in_category( _x('gallery', 'gallery category slug', 'twentyten') ) ) : ?>
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'twentyten' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>

			<div class="entry-content">
<?php if ( post_password_required() ) : ?>

				<?php the_content('Read More'); ?>

<?php else : ?>			

				<?php 
				$images = get_children( array( 'post_parent' => $post->ID, 'post_type' => 'attachment', 'post_mime_type' => 'image', 'orderby' => 'menu_order', 'order' => 'ASC', 'numberposts' => 999 ) );
				if ( $images ) :
						$total_images = count( $images );
						$image = array_shift( $images );
						$image_img_tag = wp_get_attachment_image( $image->ID, 'thumbnail' );
				?>
				<div class="gallery-thumb">
					<a class="size-thumbnail" href="<?php the_permalink(); ?>"><?php echo $image_img_tag; ?></a>
				</div><!-- .gallery-thumb -->
				<p><em><?php 
				printf( __( 'This gallery contains <a %1$s>%2$s photos</a>.', 'twentyten' ), 
				'href="' . get_permalink() . '" title="' . sprintf( esc_attr__( 'Permalink to %s', 'twentyten' ), the_title_attribute( 'echo=0' ) ) . '" rel="bookmark"',
						$total_images
				); ?></em></p>
				<?php endif; ?>
				
						<?php the_excerpt(); ?>
						
<?php endif; ?>
			</div><!-- .entry-content -->
		</div><!-- #post-## -->

<?php 
/* 
 * How to display posts in the asides category
 */
 ?>
<?php elseif ( in_category( _x('asides', 'asides category slug', 'twentyten') ) ) : ?>
	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<?php if ( is_archive() || is_search() ) : // Display excerpts for archives and search. ?>
			<div class="entry-summary">
				<?php the_excerpt(); ?>
			</div><!-- .entry-summary -->
		<?php else : ?>
			<div class="entry-content">
				<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentyten' ) ); ?>
			</div><!-- .entry-content -->
		<?php endif; ?>

	</div><!-- #post-## -->

<?php 
/*
 * How to display all other posts.
 */
?>
<?php else : ?>

	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
	<?php if ( is_archive() || is_search() ) : ?>
			<div class="entry-summary">
				<h3><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h3>
				<?php the_excerpt('Read More'); ?>
			</div><!-- .entry-summary -->
	<?php else : ?>
			<div class="entry-content">
				<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentyten' ) ); ?>
			</div><!-- .entry-content -->
	<?php endif; ?>

	</div><!-- #post-## -->

<?php endif; // This was the if statement that broke the loop into three parts based on categories. ?>

<?php endwhile; // End the loop. Whew. ?>

<?php 
/**
 * Display navigation to next/previous pages when applicable
 */
?>
<?php if ( $wp_query->max_num_pages > 1 ) : ?>
	<div class="navigation">
		<div class="next-posts"><?php next_posts_link('&laquo; Older Entries') ?></div>
		<div class="prev-posts"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
	</div>
<?php endif; ?>