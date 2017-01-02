<div id="sidebar-right">
<?php $frontpage_id = get_option('page_on_front');$video_alt = get_post_meta($frontpage_id, 'video_alt', TRUE);$video_link = get_post_meta($frontpage_id, 'video_link', TRUE);?>
<center>
	<div id="video_menu">
	<a href="<?php echo $video_link;?>"><img  title="<?php echo $video_alt;?>" alt="<?php echo $video_alt;?>"  src="<?php echo get_template_directory_uri() ?>/images/videos.png" /></a>
	</div>	
</center>

<div id="banner-top">
<p>Our satisfied customers</p>
<div id="banner_images">
<?php if ( function_exists( 'meteor_slideshow' ) ) { meteor_slideshow("small_banners","height: 65, width: 146"); } ?>
</div>
</div>
</div><!-- #sidebar-right -->