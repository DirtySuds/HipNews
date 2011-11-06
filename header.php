<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head>
<title><?php wp_title(); ?></title>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<!--[if lt IE 9]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js">
</script>
<![endif]-->
<link rel="stylesheet" href="<?php echo get_stylesheet_uri() ?>" type="text/css" />
<?php wp_head(); ?>
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
</head>
<body <?php body_class(); ?>>
<div id="container">
<div id="header">
<h1 id="sitename"><a href="http://hooverchallenger.com/">
<img src="<?php header_image() ?>" width="<?php echo HEADER_IMAGE_WIDTH; ?>" height="<?php echo HEADER_IMAGE_HEIGHT; ?>" />
</a></h1>
    
		<?php wp_nav_menu(array(
  'theme_location'  => '',
  'menu'            => '', 
  'container'       => 'nav', 
  'container_class' => '', 
  'container_id'    => '', 
  'menu_class'      => '', 
  'menu_id'         => '',
  'echo'            => true,
  'fallback_cb'     => 'wp_page_menu',
  'before'          => '',
  'after'           => '',
  'link_before'     => '',
  'link_after'      => '',
  'depth'           => 0,
  'walker'          => '')
    );?>
</div>
<div id="main_content">
<?php 
if (is_author()) {
	$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
}
echo '<h2 class="sectiontitle">';
single_term_title();
if (is_author()) {
	echo $curauth->first_name.' '.$curauth->last_name;
}
echo '</h2>';
?>
        
<noscript>
  <strong>
    JavaScript is required for this website to be displayed correctly.
    Please enable JavaScript before continuing...
  </strong>
</noscript>
        
<div id="content_left">
<!-- google_ad_section_start -->