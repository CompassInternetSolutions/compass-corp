<div id="sidebar-right">
	<p class="right-sidebar-title" style="color:#e3c205"><B>Recent Posts</B></p>

<div id="sidebar-right-bg" style="height:190px;">	
<?php
global $post;
$myposts = get_posts('numberposts=4&category=12');
foreach($myposts as $post) :
?>
<h3 style="padding:10px;"><a href="<?php the_permalink(); ?>" style="text-decoration:none"><?php the_title(); ?></a></h3>
<?php endforeach; ?>
</div><!-- #sidebar-right-bg -->
</div><!-- #sidebar-right -->



<div id="sidebar-right" style="margin-top:-120px">
	<p class="right-sidebar-title" style="color:#e3c205"><B>Articles</B></p>

<div id="sidebar-right-bg" style="height:190px;">
	

<?php
global $post;
$myposts = get_posts('numberposts=4&category=7');
foreach($myposts as $post) :
?>
<h4 style="padding:10px;"><a href="<?php the_permalink(); ?>" style="text-decoration:none"><?php the_title(); ?></a></h4>
<?php endforeach; ?>
</div><!-- #sidebar-right-bg -->

</div><!-- #sidebar-right -->







<div id="sidebar-right" style="margin-top:-120px">
	<p class="right-sidebar-title" style="color:#e3c205"><B>Latest Comment</B></p>

<div id="sidebar-right-bg" style="height:190px;">
	

<?php
global $wpdb;
$sql = "SELECT DISTINCT ID, post_title, post_password, comment_ID,
comment_post_ID, comment_author, comment_date_gmt, comment_approved,
comment_type,comment_author_url,
SUBSTRING(comment_content,1,30) AS com_excerpt
FROM $wpdb->comments
LEFT OUTER JOIN $wpdb->posts ON ($wpdb->comments.comment_post_ID =
$wpdb->posts.ID)
WHERE comment_approved = '1' AND comment_type = '' AND
post_password = ''
ORDER BY comment_date_gmt DESC
LIMIT 1";
$comments = $wpdb->get_results($sql);
$output = $pre_HTML;
$output .= "\n<br><div style='padding:5px'>";
foreach ($comments as $comment) {
$output .= "\n\"" . strip_tags($comment->com_excerpt)
."\"<br><br> By ".strip_tags($comment->comment_author)
."" . "";
}
$output .= "\n</div>";
$output .= $post_HTML;
echo $output;?>
</div><!-- #sidebar-right-bg -->

</div><!-- #sidebar-right -->


<div id="sidebar-right" style="margin-top:-120px">
	<p class="right-sidebar-title" style="color:#e3c205"><B>By Category</B></p>

<div id="sidebar-right-bg" style="height:190px;">
	<style>
#sidebar-right-bg li{
font-size:15px;
padding:10px;
list-style-type:none;
font-weight:bold;
}
#sidebar-right-bg li a{
text-decoration:none
}
	</style>

<?php wp_list_cats('sort_column=id&optioncount=1&use_desc_for_title=0&child_of=12'); ?>


</div><!-- #sidebar-right-bg -->

</div><!-- #sidebar-right -->