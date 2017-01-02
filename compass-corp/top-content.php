<?php
	$frontpage_id = get_option('page_on_front');
	$main_pic_alt = get_post_meta($post->ID, 'alt-title', true); 
	$alt_video = get_post_meta($frontpage_id, 'alt-video', true); 
	
?>
	<div id="main_pic">
	<?php if ( function_exists( 'meteor_slideshow' ) ) { meteor_slideshow("	main_pic"); } ?>
	</div>
 <!--img  title="<?php echo $main_pic_alt;?>" alt="<?php echo $main_pic_alt;?>"  src="<?php echo get_template_directory_uri() ?>/images/main_pic.jpg" id="main_pic"/-->
		<?php
         if (is_category('')) { ?>
			<h1 id="h1_title"><?php single_cat_title(); ?></h1>
		<?php  } else {
		$page_h1 = get_post_meta($post->ID, 'h1', true);

		if( $page_h1 != null ) {

			echo '<h1 id="h1_title">',$page_h1,'</h1>';

		}}

		?>
	
	<div id="video">
		<a href="<?php echo get_compass('top_banner_vid'); ?>" rel="vidbox" title="<?php echo $alt_video;?>">
		<img 
		src="<?php 
		if (get_compass('top_banner_vid_th') != null) {
			echo get_compass('top_banner_vid_th');
			} else {
			echo bloginfo('template_directory') . '/images/video_thumb.jpg';
			}
			?>" width="219" height="183" alt="<?php echo $alt_video; ?>"/></a>
	</div><!-- #video -->
		<div id="footer-social">

		

			<?php if ( is_active_sidebar( 'footer-social' ) ) : ?>

				<?php dynamic_sidebar( 'footer-social' ); ?>

			<?php endif; ?>



		</div><!-- #footer-social -->
	
	<br clear="all" />

