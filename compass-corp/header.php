<?php

$frontpage_id = get_option('page_on_front');

$local_logo_title = get_post_meta($frontpage_id, 'alt-logo', true);

/* Phone Numbers */
global $phone_number;
$local_phone_number = get_post_meta($post->ID, 'phone', true);
if (!isset( $_COOKIE["PhoneNumber"] )) {

	if ($local_phone_number != null) {

		$phone_number = $local_phone_number;

		//1 day

		setcookie('PhoneNumber', $local_phone_number, time()+60*60*24,'/');



	} else {

		$phone_number = get_compass('phone_number');

		//1 day

		setcookie('PhoneNumber', $phone_number, time()+60*60*24,'/');

	}

} else {

	$phone_number = $_COOKIE["PhoneNumber"];

}

$bullet1 = get_post_meta($frontpage_id, 'bullet1', true);

$bullet2 = get_post_meta($frontpage_id, 'bullet2', true);



?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">



<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<meta name="google-site-verification" content="l_qQBkjcLhdRHthCkF0Z_LKgjnWNrj3VhdvcLIekYtM" />

<meta name="msvalidate.01" content="920F98577EC8DC0571002BEB01C355AD" />

<title><?php

	global $page, $paged;

	wp_title( '|', true, 'right' );

	bloginfo( 'name' );

	$site_description = get_bloginfo( 'description', 'display' );

	if ( $site_description && ( is_home() || is_front_page() ) )

		echo " | $site_description";

	if ( $paged >= 2 || $page >= 2 )

		echo ' | ' . sprintf( __( 'Page %s', 'compass' ), max( $paged, $page ) );

	?></title>



	<link rel="shortcut icon" href="<?php echo get_bloginfo('url') ?>/favicon.ico" type="image/x-icon" />

	

	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" />

	<!--font Awesome library-->

	<link rel="stylesheet" href="http://cdn.jsdelivr.net/fontawesome/4.4.0/css/font-awesome.css">

	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />



	<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

	<?php $tCard = twitterCard(); ?>

    	<meta name="twitter:card" content="<?php echo $tCard['twitterCard'] ;?>" />

	<meta name="twitter:site" content="<?php echo $tCard['twitterUsername'] ;?>" />

	<meta name="twitter:title" content="<?php echo $tCard['twitterTitle'] ;?>" />

	<meta name="twitter:description" content="<?php echo $tCard['twitterDescription'];?>" />

	<meta name="twitter:image" content="<?php echo $tCard['twitterImageSrc'] ;?>" />
	<script type="text/javascript" async defer
 	 src="https://apis.google.com/js/platform.js?publisherid=114455932224387641093">
	</script>

	<?php wp_head(); ?>



<?php

/**

 * Scripts Section 

 */

?>

<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/videobox.css" type="text/css" media="screen" />

<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/mootools.js"></script>

<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/swfobject.js"></script>

<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/videobox.js"></script>

<!--[if IE 7]>

<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/ie7.css" />

<![endif]-->

<link rel="author" href="https://plus.google.com/u/0/108931160889687349668/posts"/> 

<script src="//load.sumome.com/" data-sumo-site-id="0d7582bc0106bb781848adf71f38b40fc0beac49ce3a1f83adf2fdeb22b86729" async="async"></script>

<!-- Hotjar Tracking Code for dlocksmith.com -->

<script>

    (function(h,o,t,j,a,r){

        h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};

        h._hjSettings={hjid:69417,hjsv:5};

        a=o.getElementsByTagName('head')[0];

        r=o.createElement('script');r.async=1;

        r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;

        a.appendChild(r);

    })(window,document,'//static.hotjar.com/c/hotjar-','.js?sv=');

</script>

<!-- Hotjar Tracking Code for dlocksmith.com -->

<script>

    (function(h,o,t,j,a,r){

        h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};

        h._hjSettings={hjid:69417,hjsv:5};

        a=o.getElementsByTagName('head')[0];

        r=o.createElement('script');r.async=1;

        r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;

        a.appendChild(r);

    })(window,document,'//static.hotjar.com/c/hotjar-','.js?sv=');

</script>



</head>

<body <?php body_class(); ?>>

<div id="wrapper">

 <div id="header">

	<div id="header_gradient">

		<div id="branding">

			<div id="site-logo">

			<a href="<?php echo home_url( '/' ); ?>" >

			<img src="<?php if (get_compass('logo_url') != null) {
			echo get_compass('logo_url');
			} else {
			echo bloginfo('template_directory') . '/images/logo.png';
			}
			?>" width="291" height="89" alt="<?php echo $local_logo_title; ?>" title="<?php echo $local_logo_title; ?>"/>

			</a>

			</div><!-- #site-logo -->

			<div id="phone-number">

				<p><?php echo $phone_number ?></p>

			</div><!-- #phone-number -->

			

			<div id="header-icons">

				

				<div id="icons-bar">

				

				<?php echo get_compass('header_icons'); ?>

				

				</div><!-- #icons-bar -->

			</div><!-- #header-icons -->

			

	

			

			<div id="header_text"><img alt="" title=""  src="<?php echo get_template_directory_uri() ?>/images/header_text.png"/ ></div>

			<!--div id="site-description"><?php bloginfo( 'description' ); ?></div-->

			<br clear="all" />

		</div><!-- #branding -->

	</div><!-- #header_gradient -->

 </div><!-- #header -->

			

		<div id="access">

			<?php wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary' ) ); ?>

		</div><!-- #access -->

		<div id="bullets" style="z-index:-10">

			<div class="bullet1"><img alt="" title=""  src="<?php echo get_template_directory_uri() ?>/images/bullet.png"/ class="bullet_img"></div>

			<div class="bullet_text1"><?php echo $bullet1;?></div>

			<div class="bullet2"><img alt="" title=""  src="<?php echo get_template_directory_uri() ?>/images/bullet.png"/ class="bullet_img"></div>

			<div class="bullet_text2"><?php echo $bullet2;?></div>

		</div

<div id="main">