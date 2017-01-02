<br clear="all" />

</div><!-- #main --></div><!-- #wrapper -->
		<center>
		<img src="<?php bloginfo('template_directory'); ?>/images/stroke.png" width="390" height="12"  alt="" />
		</center>
	<br clear="all" />
	<?php if ( is_front_page() ) : ?>
	
	<div id="footer-top">  
		<div id="footer-top-inner">
			<div class="footer-links-one_forth">
				<?php if ( is_active_sidebar( 'footer-links-dallas' ) ) : ?>
					<?php dynamic_sidebar( 'footer-links-dallas' ); ?>
				<?php endif; ?>
			</div>
			<div class="footer-links-one_forth">
				<?php if ( is_active_sidebar( 'footer-links-houston' ) ) : ?>
					<?php dynamic_sidebar( 'footer-links-houston' ); ?>
				<?php endif; ?>
			</div>
			<div class="footer-links-one_forth sac">
				<?php if ( is_active_sidebar( 'footer-links-fortworth' ) ) : ?>
					<?php dynamic_sidebar( 'footer-links-fortworth' ); ?>
				<?php endif; ?>
			</div>

	

		
	<br clear="all" />
	
		<!--center><img src="<?php bloginfo('template_directory'); ?>/images/footer_top_img.jpg" width="188" height="52" class="footer-separator-img" alt="" /></center-->
		</div>
	</div><!-- #footer-top -->
	<?php endif; ?>


	<div id="footer">
	
	<?php $phone_number = get_post_meta($post->ID, 'phone', true);
		if ($phone_number == null)
		{
			$phone_number = get_compass('phone_number');
		}
		$frontpage_id = get_option('page_on_front');
		$footer_text = get_post_meta($frontpage_id, 'footer_text', true);
	?>
<br clear="all" />
		<div id="footer-inner">
		<?php wp_nav_menu( array(
				  'theme_location'  => 'footersitemap',
				  'menu'            => '', 
				  'container'       => 'div', 
				  'container_class' => '', 
				  'container_id'    => 'footer-sitemap', 
				  'menu_class'      => '', 
				  'menu_id'         => '',
				  'echo'            => true,
				  'fallback_cb'     => 'wp_page_menu',
				  'before'          => '',
				  'after'           => '',
				  'link_before'     => '',
				  'link_after'      => '',
				  'depth'           => 0,
				  'walker'          => ''
				  ) );
		?><!-- #footer-sitemap -->
		</div>
		
<br clear="all" />

			<div id="footer-disclaimer">
			
			<?php echo get_compass('footer_disc'); ?>
			
			
			
			</div><!-- #footer-disclaimer -->
<?php //wp_footer(); ?>
		</div>
	</div><!-- #footer -->

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-46356183-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>


<?php wp_footer(); ?>
</body>
</html>