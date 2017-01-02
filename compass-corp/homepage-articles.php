<p class="articles-title">Learning Center</p>
<hr />

<?php
$recent = new WP_Query("category_name=articles&showposts=15");
	while($recent->have_posts()) : $recent->the_post();
	
		global $more;
		$more = 0; // set $more to 0 in order to only get the first part of the post
?>
<h3><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
<?php the_excerpt(); ?>
	<?php endwhile; ?>
