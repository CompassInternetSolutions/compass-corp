<?php get_header(); ?>

	<div id="sidebar">
		<?php get_sidebar(); ?>
	</div><!-- #sidebar -->

<?php
$category = get_the_category(); 
$catn= $category[0]->cat_name;
?>

<?if ($catn<>"store"){?>
	<div id="top-content">
		<?php include(TEMPLATEPATH."/top-content.php");?>
	</div><!-- #top-content -->
<?}?>
<?if ($catn=="store"){?>
<div id="top-content">
		<?php// include(TEMPLATEPATH."/top-content.php");?>

	</div>
<?}?>
	
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

		<div id="main-content"  style="min-height:830px;margin-top:-15px;">
			<?php get_template_part( 'loop', 'index' ); ?>


			<?if ($catn=="blog"){
				error_reporting(0);
				?>
				<?php comments_template(); ?>
        <?}?>
			
			<?php if (is_front_page()) : ?> 
			<div id="homepage-articles"> 
				<?php include(TEMPLATEPATH."/homepage-articles.php");?>
			</div>
			<?php endif; ?>
			
		</div><!-- #main-content -->	

				<?php include(TEMPLATEPATH."/sidebar-right.php");?>


 
			
<?php get_footer(); ?>