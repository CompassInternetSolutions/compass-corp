<?php
/**
 * The Footer widget areas.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
?>



			<div id="footer-widget-area">

<?php if ( is_active_sidebar( 'first-footer-widget-area' ) ) : ?>
				<div id="first" class="widget-area">
					<ul class="xoxo">
						<?php dynamic_sidebar( 'first-footer-widget-area' ); ?>
					</ul>
				</div><!-- #first .widget-area -->
<?php endif; ?>


			</div><!-- #footer-widget-area -->
