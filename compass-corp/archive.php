<?php get_header(); ?>

	<div id="sidebar">
		<?php get_sidebar(); ?>
	</div><!-- #sidebar -->

	<div id="top-content">
		<?php include(TEMPLATEPATH."/top-content.php");?>
	</div><!-- #top-content -->
	
	<div id="breadcrumbs">
		<?php if (function_exists('bcn_display')) {
			bcn_display();
			}
			else {
			echo "Please enable Breadcrumb NavXT";
			}
		?>
		<br clear="all" />
	</div><!-- #breadcrumbs -->
	
	<div id="main-content">
	<?php
		if ( have_posts() )
			the_post();
	?>
<h1>
<?php if ( is_day() ) : ?>
<?php printf( __( 'Daily Archives: <span>%s</span>', 'twentyten' ), get_the_date() ); ?>
<?php elseif ( is_month() ) : ?>
<?php printf( __( 'Monthly Archives: <span>%s</span>', 'twentyten' ), get_the_date('F Y') ); ?>
<?php elseif ( is_year() ) : ?>
<?php printf( __( 'Yearly Archives: <span>%s</span>', 'twentyten' ), get_the_date('Y') ); ?>
<?php else : ?>
<?php _e( 'Blog Archives', 'twentyten' ); ?>
<?php endif; ?>
</h1>

<?php rewind_posts(); get_template_part( 'loop', 'archive' ); ?>
		<div class="entry-content">
			<?php the_content('Read More'); ?>
		</div><!-- .entry-content -->
	</div><!-- #post-## -->

<?php endwhile; ?>

	</div><!-- #main-content -->
		
				<?php include(TEMPLATEPATH."/sidebar-right.php");?>

			
<?php get_footer(); ?>