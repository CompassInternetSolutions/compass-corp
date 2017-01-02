<?php get_header(); ?>

	<div id="sidebar">
		<?php get_sidebar(); ?>
	</div><!-- #sidebar -->

	<div id="top-content">
		<?php include(TEMPLATEPATH."/top-content.php");?>
	</div><!-- #top-content -->
	
	

	<div id="main-content">
		<div id="404error">
				<h1 class="h1-404">The Page You Were Looking For Couldn't Be Found</h1>
			<div class="entry-content">
				<h2 class="h2-404">Here are some options that might help you find what you were looking for</h2>
    
    <div class="categories-404">
    <h3 class="h3-404">Here Are Some Of Our Most Popular Categories</h3>
        <ul class="ul-404">
        <?php wp_list_categories(array(
        'order by'   => 'name',
        'order'      => 'ASC',
        'show_count' => 1,
        'title_li'   => '',
        'number'     => 3
    
    
)); ?>
        </ul><!--end ul-->
    </div><!--end widget-->
<h3 class="h3-404">....Or Maybe One Of Our Articles?</h3>
<!-----------asdas---->
<?php
query_posts(array(
		'orderby' => 'rand',
		'category_name' => 'blog',
		'showposts' => 3));

if (have_posts() ) :
while (have_posts()) : the_post(); ?>
<div class="container-404">
<h3 class="h3-404"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>


<div class="post-image-404">
     <?php the_post_thumbnail();?>
</div><!--end post-image-->
<div class="excerpt-404">
<?php the_excerpt(); ?>
</div>
</div>
<?php endwhile;
endif; ?>
<?php wp_reset_query(); ?>
<!-----------asdas---->

<h3 class="h3-404">Still Can't Find It?</h3>
				<span id="search-404"><?php get_search_form(); ?></span>
			</div><!-- .entry-content -->
		</div><!-- #404error -->
 

	</div><!-- #main-content -->
		
				

			
<?php get_footer(); ?>