<link type="text/css" rel="stylesheet" href="/lightbox-form.css">
<script src="/lightbox-form.js" type="text/javascript"></script>
<?php 
/**
 * If there are no posts to display, such as an empty archive page
 */ 
?>
<?php if ( !have_posts() ) : ?>
		<div id="404error">
				<p class="entry-title">The page you where looking for couldn't be found</p>
			<div class="entry-content">
				<h2>Here are some options that might help you find what you where looking for</h2>
<h3>Where You Looking For One of the articles?</h3>
    
    <div class="categories">
    <h4 class>Here Are Some Of Our Most Popular Categories</h4>
        <ul>
        <?php wp_list_categories(array(
        'order by'   => 'date',
        'order'      => 'ASC',
        'show_count' => 1,
        'title_li'   => '',
        'number'     => 10
    
    
)); ?>
        </ul><!--end ul-->
    </div><!--end widget-->
				<?php get_search_form(); ?>
			</div><!-- .entry-content -->
		</div><!-- #404error -->
<?php endif; ?>

<?php
/**
 * The Loop
 */
?>
<?php while ( have_posts() ) : the_post(); ?>

<?php 
/* 
 * How to display posts in the Gallery category.
 */
?>

	<?php if ( in_category( _x('gallery', 'gallery category slug', 'twentyten') ) ) : ?>
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'twentyten' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>

			<div class="entry-content">
<?php if ( post_password_required() ) : ?>

				<?php the_content('Read More'); ?>

<?php else : ?>			

				<?php 
				$images = get_children( array( 'post_parent' => $post->ID, 'post_type' => 'attachment', 'post_mime_type' => 'image', 'orderby' => 'menu_order', 'order' => 'ASC', 'numberposts' => 999 ) );
				if ( $images ) :
						$total_images = count( $images );
						$image = array_shift( $images );
						$image_img_tag = wp_get_attachment_image( $image->ID, 'thumbnail' );
				?>
				<div class="gallery-thumb">
					<a class="size-thumbnail" href="<?php the_permalink(); ?>"><?php echo $image_img_tag; ?></a>
				</div><!-- .gallery-thumb -->
				<p><em><?php 
				printf( __( 'This gallery contains <a %1$s>%2$s photos</a>.', 'twentyten' ), 
				'href="' . get_permalink() . '" title="' . sprintf( esc_attr__( 'Permalink to %s', 'twentyten' ), the_title_attribute( 'echo=0' ) ) . '" rel="bookmark"',
						$total_images
				); ?></em></p>
				<?php endif; ?>
				
						<?php the_excerpt(); ?>
						
<?php endif; ?>
			</div><!-- .entry-content -->
		</div><!-- #post-## -->

<?php 
/* 
 * How to display posts in the asides category
 */
 ?>
<?php elseif ( in_category( _x('asides', 'asides category slug', 'twentyten') ) ) : ?>
	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<?php if ( is_archive() || is_search() ) : // Display excerpts for archives and search. ?>
			<div class="entry-summary">
			<div id="sidebar-right-bg" style="height:190px;">
				<?php the_excerpt(); ?>
				</div>
			</div><!-- .entry-summary -->
		<?php else : ?>
		<div id="sidebar-right-bg" style="height:190px;">
			<div class="entry-summary">
				<?php the_excerpt(); ?>
				</div>
			</div><!-- .entry-summary -->
		<?php endif; ?>

	</div><!-- #post-## -->

<?php 
/*
 * How to display all other posts.
 */
?>
<?php else : ?>

	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
	<?php if ( is_archive() || is_search() ) : ?>
		
<div style="border:1px solid;height:165px">

<TABLE cellspacing="5" cellpadding="5">
<TR>
	<TD width="160" style="padding:5px"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a></TD>
	<TD style="vertical-align:top;padding:10px"><h2><a href="<?php the_permalink(); ?>" style="font-size:18px;color:#e3c205;font-weight:bold;text-decoration:none"><?php the_title();?></a></h2>
				<?php the_excerpt('Read More'); ?></TD>
</TR>
</TABLE>
				
				
			</div><BR>
			
			

			<!-- .entry-summary -->
	<?php else : ?>
			<div class="entry-content">

<!-- store -->

<?php
$category = get_the_category(); 
$category_name = $category[0]->cat_name;
if ($category_name == 'store'){
?>



<style type="text/css" media="screen"> 

#box 
{
	display: none;
	position: fixed;
		top: 20%;
	left: 20%;
	width: 593px;
	height: 305px;
	padding: 48px;
	margin:0;
	border: 1px solid black;
	background-color: white;
	z-index:101;
	background-image:url(/gta-safes.jpg);
	background-repeat: no-repeat;
}
#shadowing
{
	display: none;
	position: fixed;
	top: 0%;
	left: 0%;
	width: 100%;
	height: 100%;
	background-color: #CCA;
	z-index:10;
	opacity:0.5;
	filter: alpha(opacity=50);
}

#boxtitle
{
	position:absolute;
	float:center;
	top:0;
	left:0;
	width:696px;
	height:24px;
	padding:0;
	padding-top:20px;
	padding-left:78px;
	margin:0;
	color:white;
	font-size:25px;
	text-align:center;
}
.op
	{
	position:absolute;
	float:center;
	top:0;
	left:0;
	width:696px;
	height:24px;
	padding:0;
	padding-top:20px;
	padding-left:78px;
	margin:0;
	color:white;
	font-size:25px;
	text-align:center;
}

</style>





<?php
			global $more;
			$more = 0;
			$counter = 0;
				
				$counter++;
				$stars = get_post_meta($post->ID, 'stars', true);
				$price = get_post_meta($post->ID, 'price', true);
				$price_save = get_post_meta($post->ID, 'price_save', true);
				$SKU = get_post_meta($post->ID, 'sku', true);
				$order_button_img = get_post_meta($post->ID, 'order_button_img', true);
				$order_button_url = get_post_meta($post->ID, 'order_button_url', true);
			?>
<div id="item-featured">

<TABLE>
<TR>
	<TD valign=top><H1><?php the_title(); ?></H1>
				<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentyten' ) ); ?></TD>
	<TD><BR><BR>
	<?php the_post_thumbnail(); ?>

				

				

				<div class="itemStars" style="margin-top:5px">
				<?php
				switch($stars) {
				case 5:
					echo '&nbsp;&nbsp;&nbsp;&nbsp;<img src="' .get_template_directory_uri(). '/images/store/stars/5.png" alt="5 Stars" width="80" height="15" />';
					break;
				case 4:
					echo '&nbsp;&nbsp;&nbsp;&nbsp;<img src="' .get_template_directory_uri(). '/images/store/stars/4.png" alt="4 Stars" width="80" height="15" />';
					break;
				case 3:
					echo '&nbsp;&nbsp;&nbsp;&nbsp;<img src="' .get_template_directory_uri(). '/images/store/stars/3.png" alt="3 Stars" width="80" height="15" />';
					break;
				case 2:
					echo '&nbsp;&nbsp;&nbsp;&nbsp;<img src="' .get_template_directory_uri(). '/images/store/stars/2.png" alt="2 Stars" width="80" height="15" />';
					break;
				case 1:
					echo '&nbsp;&nbsp;&nbsp;&nbsp;<img src="' .get_template_directory_uri(). '/images/store/stars/1.png" alt="1 Star" width="80" height="15" />';
					break;
				default:
					echo '&nbsp;&nbsp;&nbsp;&nbsp;<img src="' .get_template_directory_uri(). '/images/store/stars/no-rating.png" alt="No Rating" width="80" height="15" />';
					break;
				}
				?>
				</div><!-- .itemStars -->
				<div class="itemPrice">
				<p>Our Price: $<?php $exists = empty($price) ? '100' : $price; echo $exists; ?><br />
				</p>
				</div><!-- .itemPrice -->

				

				
				<div class="order">

      				<a href="#" onClick="openbox('Important Advice', 1)"><img src="<?php
      				if ($order_button_img != null) {
      					echo $order_button_img;
      				} else {
      					echo get_template_directory_uri() . '/images/store/order-now.jpg';
      				}
      				?>" alt="" width="130" height="35" /></a>

				
				</div><!-- .order -->

	
	</TD>
</TR>
</TABLE>
<script type='text/javascript'>
function openbox(formtitle, fadin)
{
  var box = document.getElementById('box'); 
  document.getElementById('shadowing').style.display='block';

  var btitle = document.getElementById('boxtitle');
  btitle.innerHTML = formtitle;
  
  if(fadin)
  {
	 gradient("box", 0);
	 fadein("box");
  }
  else
  { 	
    box.style.display='block';
  }  	
}


// Close the lightbox

function closebox()
{
   document.getElementById('box').style.display='none';
   document.getElementById('shadowing').style.display='none';
}

</script>
				

<div id="shadowing"></div>
<div id="box">
<div style="padding-left:190px">
  <span id="boxtitle"></span>
  <h1 style="font-size:21px;color:#b80303">&nbsp;&nbsp;Buying a safe is not something trivial</h1><BR>
  For that reason we prefer preventing you from buying a safe that is not what you expected or that doesn't fit the place where you want to install it.<BR><BR>

Our expert advisers are ready to assist you select which is the safe that fits best to your requirements.<BR><BR>

Feel free to fill out the following form and we will call you back within the next few minutes!<BR><BR>
  <CENTER><form method="POST" action="/mailer.php" target="_parent" name="form1">
    
    Name: 
      <input type="text" name="name" value="" maxlength="60" size="20">
    <BR>
<BR>
	Phone: 
      <input type="text" name="phone" value="" maxlength="60" size="20">
    
      
      
    
   
   <BR>
      <input type="image" name="submit" src="/sub.gif">
	  <input type="hidden" name="sku" value="<?=$the_sku?>">
      <!-- <input type="button" name="cancel" value="Cancel" onClick="closebox()"> -->
	  <a style="padding-left:400px;padding-bottom:50px;font-size:18px;text-decoration:none" href="#" onClick="closebox()"><B>[X]</B></a>
   
  </form></CENTER> 
  </div>
</div>



				

			</div><!-- #item-featured -->



<?}?>
<!-- /store -->


<?if ($category_name <> 'store'){?>
				<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentyten' ) ); ?>

				<?}?>
			</div><!-- .entry-content -->
	<?php endif; ?>

	</div><!-- #post-## -->

<?php endif; // This was the if statement that broke the loop into three parts based on categories. ?>

<?php endwhile; // End the loop. Whew. ?>

<?php 
/**
 * Display navigation to next/previous pages when applicable
 */
?>
<?php if ( $wp_query->max_num_pages > 1 ) : ?>
	<div class="navigation">
		<div class="next-posts"><?php next_posts_link('&laquo; Older Entries') ?></div>
		<div class="prev-posts"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
	</div>
<?php endif; ?>