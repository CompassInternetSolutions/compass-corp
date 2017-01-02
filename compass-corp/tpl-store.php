<?php
/*

Template Name: Store Template

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
			
			<div id="store">

			<?php query_posts('category_name=store&posts_per_page=-1'); ?>
			<?php
			global $more;
			$more = 0;
			$counter = 0;
				while (have_posts()) : the_post();
				$counter++;
				$stars = get_post_meta($post->ID, 'stars', true);
				$price = get_post_meta($post->ID, 'price', true);
				$price_save = get_post_meta($post->ID, 'price_save', true);
				$SKU = get_post_meta($post->ID, 'sku', true);
				$order_button_img = get_post_meta($post->ID, 'order_button_img', true);
				$order_button_url = get_post_meta($post->ID, 'order_button_url', true);
			?>
			<?php if($counter == '1') { ?>
			<div id="item-featured">

				<div class="featuredImg"><?php the_post_thumbnail(); ?></div>

				<div class="itemInfo">

				<div class="itemTitle"><p><?php the_title(); ?></p></div>
				<div class="itemDesc"><p><?php excerpt(15); ?></p></div>

				<div class="itemStars">
				<?php
				switch($stars) {
				case 5:
					echo '<img src="' .get_template_directory_uri(). '/images/store/stars/5.png" alt="5 Stars" width="80" height="15" />';
					break;
				case 4:
					echo '<img src="' .get_template_directory_uri(). '/images/store/stars/4.png" alt="4 Stars" width="80" height="15" />';
					break;
				case 3:
					echo '<img src="' .get_template_directory_uri(). '/images/store/stars/3.png" alt="3 Stars" width="80" height="15" />';
					break;
				case 2:
					echo '<img src="' .get_template_directory_uri(). '/images/store/stars/2.png" alt="2 Stars" width="80" height="15" />';
					break;
				case 1:
					echo '<img src="' .get_template_directory_uri(). '/images/store/stars/1.png" alt="1 Star" width="80" height="15" />';
					break;
				default:
					echo '<img src="' .get_template_directory_uri(). '/images/store/stars/no-rating.png" alt="No Rating" width="80" height="15" />';
					break;
				}
				?>
				</div><!-- .itemStars -->
				<div class="itemPrice">
				<p>Our Price: $<?php $exists = empty($price) ? '100' : $price; echo $exists; ?><br />
				<span class="itemPriceS">You Save: $<?php $exists = empty($price_save) ? '0' : $price_save; echo $exists; ?></span></p>
				</div><!-- .itemPrice -->

				</div><!-- .itemInfo -->

				<div class="sku">
					<?php $the_sku = empty($SKU) ? 'A7X-1337' : $SKU; echo $the_sku; ?>
				</div><!-- .sku -->

				<div class="order">

      				<a href="<?php bloginfo('template_directory') ?>/store/form.php?sku=<?php echo $the_sku; ?>"><img src="<?php
      				if ($order_button_img != null) {
      					echo $order_button_img;
      				} else {
      					echo get_template_directory_uri() . '/images/store/order-now.jpg';
      				}
      				?>" alt="" width="130" height="35" /></a>

				<?php /*
					<a href="<?php $exists = empty($order_button_url) ? '#' : $order_button_url; echo $exists; ?>"><img src="<?php
					if ($order_button_img != null) {
						echo $order_button_img;
					} else {
						echo get_template_directory_uri() . '/images/store/order-now.jpg';
					}
					?>" alt="" width="130" height="35" /></a>
				*/ ?>
				</div><!-- .order -->

			</div><!-- #item-featured -->

			<?php } else { ?>

			<div id="item">

				<div class="itemTitle"><p><?php the_title(); ?></p></div>
				<div class="featuredImg"><?php the_post_thumbnail(); ?></div>

				<div class="itemInfo">

				<div class="itemDesc"><p><?php excerpt(15); ?></p></div>

				<div class="itemStars">
				<?php
				switch($stars) {
				case 5:
					echo '<img src="' .get_template_directory_uri(). '/images/store/stars/5.png" alt="5 Stars" width="80" height="15" />';
					break;
				case 4:
					echo '<img src="' .get_template_directory_uri(). '/images/store/stars/4.png" alt="4 Stars" width="80" height="15" />';
					break;
				case 3:
					echo '<img src="' .get_template_directory_uri(). '/images/store/stars/3.png" alt="3 Stars" width="80" height="15" />';
					break;
				case 2:
					echo '<img src="' .get_template_directory_uri(). '/images/store/stars/2.png" alt="2 Stars" width="80" height="15" />';
					break;
				case 1:
					echo '<img src="' .get_template_directory_uri(). '/images/store/stars/1.png" alt="1 Star" width="80" height="15" />';
					break;
				default:
					echo '<img src="' .get_template_directory_uri(). '/images/store/stars/no-rating.png" alt="No Rating" width="80" height="15" />';
					break;
				}
				?>
				</div><!-- .itemStars -->
				<div class="itemPrice">
				<p>Our Price: $<?php $exists = empty($price) ? '100' : $price; echo $exists; ?><br />
				<span class="itemPriceS">You Save: $<?php $exists = empty($price_save) ? '0' : $price_save; echo $exists; ?></span></p>
				</div><!-- .itemPrice -->

				</div><!-- .itemInfo -->

				<div class="sku">
					<?php $exists = empty($SKU) ? 'A7X-1337' : $SKU; echo $exists; ?>
				</div><!-- .sku -->

				<div class="order">
					<a href="<?php $exists = empty($order_button_url) ? '#' : $order_button_url; echo $exists; ?>"><img src="<?php
					if ($order_button_img != null) {
						echo $order_button_img;
					} else {
						echo get_template_directory_uri() . '/images/store/order-now.jpg';
					}
					?>" alt="" width="92" height="25" /></a>
				</div><!-- .order -->

			</div><!-- #item -->

			<?php } //end else ?>

				<?php
				endwhile;
				wp_reset_query();
				?>
				<br clear="all" />

			</div><!-- #store -->
			
		</div><!-- #main-content -->	
		
				<?php include(TEMPLATEPATH."/sidebar-right.php");?>

			
<?php get_footer(); ?>