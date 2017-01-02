<?php get_header(); ?>

	<div id="sidebar">
		<?php get_sidebar(); ?>
	</div><!-- #sidebar -->
	<div id="top-content">
		<?php include(TEMPLATEPATH."/top-content.php");?>
	</div><!-- #top-content -->

	
	
		<div id="main-content" style="min-height:830px">
		

			<?php get_template_part( 'loop', 'index' ); ?>

		</div><!-- #main-content -->	
		

			
				<?php include(TEMPLATEPATH."/sidebar-right.php");?>
            
      
<?php get_footer(); ?>