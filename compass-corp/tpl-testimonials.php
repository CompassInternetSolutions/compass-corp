<?php
/*

Template Name: Testimonials Template

*/
?>
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
			
			<?php get_template_part( 'loop', 'index' ); ?>
			<hr />
			<div id="testimonials">
						
			<?php query_posts('category_name=testimonials'); ?>
			<?php
			global $more;
			$more = 0;
				while (have_posts()) : the_post(); 
			?>
			
				<?php the_excerpt(10); ?>
				<span class="clientname">- <?php the_title(); ?></span>
				
				<?php 
				endwhile;
				wp_reset_query(); //Reset the loop to original state
				?>
				<br clear="all" />
			</div><!-- #testimonials -->
			
		</div><!-- #main-content -->	
		
				<?php include(TEMPLATEPATH."/sidebar-right.php");?>

			
<?php get_footer(); ?>