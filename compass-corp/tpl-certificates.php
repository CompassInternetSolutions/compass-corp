<?php
/*

Template Name: Certificates Template

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
			<div id="certificates">
						
			<?php query_posts('category_name=certificates'); ?>
			<?php
			global $more;
			$more = 0;
				while (have_posts()) : the_post(); 
			?>
					<p><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail');?><br />
					<?php the_title(); ?></a></p>
				<?php 
				endwhile;
				wp_reset_query(); //Reset the loop to original state
				?>
				<br clear="all" />
			</div><!-- #certificates -->
			
		</div><!-- #main-content -->	
		
				<?php include(TEMPLATEPATH."/sidebar-right.php");?>

			
<?php get_footer(); ?>