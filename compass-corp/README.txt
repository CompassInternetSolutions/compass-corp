/* ====== Compass Corp Theme README ====== */
Readme Version: 1.1

To access the configuration menu after activation, go to:
Appearance -> Compass Options

/**
 * Default Phone Number:
 ************************************/
	shown at the header when there is no custom phone number is set - numbers only

	to set a custom phone number:
		add the custom field: "phone" with the value which represents the phone number you want to put.

/**
 * Company Logo Full URL:
 ************************************/
	shown at the header
	when there is no value, uses the place holder image with dimensions
	dimensions are predefined
	use full URL only:
		eg.: http://dlocksmith.com/wp-content/themes/compass-corp/images/logo.png

	to upload an image/logo/media, go to:
		Media -> Add New
		fill in all the neccessary data - (required!)
		save
		copy the full URL

/**
 * Header Icons:
 ************************************/
	shown at the header
	accepts only valid XHTML.
	make sure to include the correct images path

example:

<a title="BBB" href="http://www.bbb.org/dallas/business-reviews/locks-and-locksmiths/deltalocksmith-in-dallas-tx-90241181" target="_blank"><img src="http://dlocksmith.com/wp-content/themes/compass-corp/images/header/bbb.jpg" width="47" height="68" alt="BBB"/></a>
<img src="http://dlocksmith.com/wp-content/themes/compass-corp/images/header/icons_separator.jpg" width="5" height="64" alt=""/>
<a href="/certificates" target="_blank"><img src="http://dlocksmith.com/wp-content/themes/compass-corp/images/header/certificates.jpg" width="47" height="68" alt="Certificate" title="Certificate"/></a>

/**
 * Bullets Image Full URL:
 ************************************/
	shown at the top-content area, under the header
	when there is no value, uses the place holder lorem ipsum image
	dimensions are predefined
	use full URL only:
		eg.: http://dlocksmith.com/wp-content/themes/compass-corp/images/bullets.png

	to upload an image/logo/media, go to:
		Media -> Add New
		fill in all the neccessary data - (required!)
		save
		copy the full URL

/**
 * Custom CSS Rules:
 ************************************/
	used to customise the the styling of the theme
	overrides any values set in style.css
	use with CAUTION
	make sure you remove comments /* */ after deployment

	color customisation: (copy and edit it according to given colors)

#header_gradient {
	background-color: #COLOR; 	/* <- BACKGROUND COLOR FOR THE HEADER */
	color: #COLOR; 		/* <- FONT COLOR FOR THE SITE DESCRIPTION AND THE PHONE NUMBER */
	/* gradient background */
	background: -webkit-gradient(linear, left top, left bottom, from(#FROM-COLOR), to(#TO-COLOR));
	background: -moz-linear-gradient(top, #FROM-COLOR, #TO-COLOR);
	filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=#FROM-COLOR, endColorstr=#TO-COLOR);
	-ms-filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=#FROM-COLOR,endColorstr=#TO-COLOR);
	/* round corners - top */
	border: 1px solid #COLOR;
}
/* Top Nav */
#access {
	background-color: #COLOR; 	/* <- BACKGROUND COLOR FOR THE NAV MENU */
	border-top: 1px solid #COLOR; 	/* <- NAV MENU TOP BORDER COLOR */
	border-bottom: 2px solid #COLOR; /* <- NAV MENU BOTTOM BORDER COLOR */
}
#access a {
	color: #COLOR; 	/* <- NAV MENU ANCHOR TEXT COLOR - 1st Tier */
}
#access ul ul a {
	background-color: #COLOR; 	/* <- NAV MENU ANCHOR TEXT BG COLOR - 2nd Tier */
}
#access li:hover > a, #access ul ul:hover > a {
	background-color: #COLOR; 	/* <- NAV MENU ANCHOR BG COLOR WHILE MOUSE OVER - 1st Tier + 2nd Tier */
	color: #COLOR; 		/* <- NAV MENU ANCHOR TEXT COLOR WHILE MOUSE OVER - 1st Tier + 2nd Tier */
}
#access ul li.current_page_item > a, #access ul li.current-menu-ancestor > a, #access ul li.current-menu-item > a, #access ul li.current-menu-parent > a {
	color: #COLOR; 		/* <- NAV MENU ANCHOR TEXT COLOR WHILE CURRENT */
	background-color: #COLOR; 	/* <- NAV MENU ANCHOR BG COLOR WHILE CURRENT */
}
* html #access ul li.current_page_item a, * html #access ul li.current-menu-ancestor a, * html #access ul li.current-menu-item a, * html #access ul li.current-menu-parent a, * html #access ul li a:hover {
	color: #COLOR; 		/* <- NAV MENU ANCHOR TEXT COLOR WHILE CURRENT + MOUSE OVER */
}
/* Sidebar */
#sidebar #servicesmenu a, #sidebar #servicesmenu a:visited {
	color: #COLOR; 		/* <- LEFT SIDEBAR ANCHOR TEXT COLOR */
}
#sidebar #servicesmenu ul li {
	background-color:#COLOR; 		/* <- LEFT SIDEBAR ANCHOR BG COLOR */
	border-bottom: 1px solid #COLOR;
	border-top: 1px solid #COLOR;
}
#sidebar #servicesmenu ul li:hover {
	background-color: #COLOR; 		/* <- LEFT SIDEBAR ANCHOR BG COLOR WHILE MOUSE OVER */
	border-bottom: 1px solid #COLOR;
	border-top: 1px solid #COLOR;
}
