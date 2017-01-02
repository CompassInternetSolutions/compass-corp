<?php
/*

Template Name: Houston Template

*/
?>
<?php get_header(); ?>

	<div id="sidebar">
		<?php get_sidebar('houston'); ?>
	</div><!-- #sidebar -->

	<div id="top-content">
		<?php include(TEMPLATEPATH."/top-content.php");?>
	</div><!-- #top-content -->
	

		<div id="main-content">
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
		
		
			<?php get_template_part( 'loop', 'index' ); ?>
			
			<?php if (is_front_page()) : ?> 
			<!-- <div id="homepage-articles">  -->
				<?php// include(TEMPLATEPATH."/homepage-articles.php");?>
			<!-- </div> -->
			<?php endif; ?>
			
		</div><!-- #main-content -->	
		
				<?php include(TEMPLATEPATH."/sidebar-right.php");?>

			
<?php get_footer(); ?>