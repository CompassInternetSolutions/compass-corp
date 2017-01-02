<!--div id="banner-top">
<p>Our Customers in Town</p>
			<?php if (function_exists('wp_slide')) {
				wp_slide();
				}
				else {
				echo "<p>WP-Slides - 146x65</p>";
				}
				?>
	</div-->	
		<!-- #banner-top -->

		<div id="menu-left">
		
		<?php wp_nav_menu( array(
				  'theme_location'  => 'leftsidebar',
				  'menu'            => '', 
				  'container'       => 'div', 
				  'container_class' => '', 
				  'container_id'    => 'servicesmenu', 
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
		?>
				<br/><br/>
				<?php if ( !dynamic_sidebar( 'left-widget-area' ) ) : ?>
				<?php endif; ?>
			
	
			
			
			
		</div><!-- #menu-left -->
