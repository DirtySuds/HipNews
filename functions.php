<?php

add_editor_style();

if ( ! isset( $content_width ) ) $content_width = 606;

add_action( 'after_setup_theme', 'add_theme_post_formats' );
add_action( 'after_setup_theme', 'hipnews_setup' );

function dirtysuds_themebox( $atts, $content=null ) {
	extract( shortcode_atts( array(
		'class' => '',
		'id' => '',
		'title' => '',
	), $atts ) );
	
	$embed = '';
	$embed .= '<div class="themebox '.$class.'"';
	if ($id)
		$embed .= ' id="'.$id.'"';
	$embed .= '>';
	if ($title)
		$embed .= '<h2 class="sectiontitle">'.$title.'</h2>';
	$embed .= do_shortcode($content);
	$embed .= '</div>';
	return $embed;
}

add_shortcode( 'themebox', 'dirtysuds_themebox' );

function dirtysuds_themehome( $atts, $content=null ) {
	extract( shortcode_atts( array(
		'cata' => '4',
		'catb' => '9',
	), $atts ) );
	
	$cata = (int)$cata;
	$catb = (int)$catb;
	
	$embed = '';
	
	$embed .= '<link rel="'.get_option('embed_autourls').'" />';
	
	$embed .= '
<style type="text/css">
#topbox li {border-top:1px solid #000;padding:5pt 0 5pt 20pt;text-align:right;clear:both;}
#topbox li a {font-size:12pt;line-height:1.6em}
#topbox li span, #topbox li span a {font-size:10pt}
#topbox li span a {line-height:1.6em}
#secondbox {display:block;position:relative}
#secondbox li {width:303px;float:left;text-align:center;display:block;position:relative}
#secondbox li.i2 {border-left:1px solid #000;width:287px;position:absolute;top:0;right:0}
#secondbox li h3 {text-align:center;text-transform:uppercase;font-size:10pt;line-height:14pt}
.tab {
	background: #0c7518;
	border: 1px solid #000000;
	margin: 0;
	position: absolute;
	width: 100px;
	height: 30px;
	padding: 0;
	text-align: center;
	line-height: 30px;
	-webkit-box-shadow: 2px 2px 2px #303030;
	-moz-box-shadow: 2px 2px 2px #303030;
	box-shadow: 2px 2px 2px #303030;
}
.tab a {
	color: #ffffff;
	font-size: 9pt;
	font-weight: bold;
	text-decoration: none;
	-webkit-transition-property: color;
	-webkit-transition-duration: 0.3s;
}
.tab a:hover {
	color: #e7ed35;
}
</style>
<div class="themebox" style="margin: 0 0 40pt 0;text-align:right;">';

// First Post

	$posts = get_posts(array('cat'=>$cata,'showposts'=>1,'post__in'  => get_option( 'sticky_posts' ),));
	if ($posts):
		foreach( $posts as $post ) : setup_postdata($post);
//		$embed .=  '<div style="text-align:right;margin:0;padding:0">';
		$imageid = get_post_thumbnail_id($post->ID);
		if($imageid) {
			$embed .=  '<a href="'.get_permalink($post->ID).'" title="'.$post->post_title.'" style="float:left;margin:0 8pt 10pt 0">';
			$embed .= '<img src="'.wp_get_attachment_thumb_url($imageid).'" alt="'.get_the_title($imageid).'" style="border:1px solid #999;" />';
			$embed .=  '</a>';
		}
		$embed .=   '<h2 style="text-align:right;width:100%;margin:18pt 0 0 0;padding:0;font-size:22pt;line-height:24pt"><a href="'.get_permalink($post->ID).'" rel="bookmark">'.$post->post_title.'</a></h2>';
		$embed .=   str_replace("\n","<br />",htmlspecialchars($post->post_excerpt, ENT_QUOTES));
		$embed .=   '<a style="font-weight:bold;display:block;text-align:right;margin:10px 0 10px auto" href="'.get_permalink($post->ID).'" title="Read More">Click to Continue &raquo;</a>';
		$topPost = $post->ID;
//		$embed .=  '</div>';
	endforeach; endif;
	
	
	$posts = get_posts(array('cat'=>$cata,'showposts'=>2,'post__not_in' => array($topPost),'ignore_sticky_posts' => 1));
	if ($posts):
		$embed .= '<ul id="topbox">';
		foreach( $posts as $post ) : setup_postdata($post);
			$embed .= '<li><a style="font-weight:bold;" href="'.get_permalink($post->ID).'">'.$post->post_title.'</a><br /><span>'.htmlspecialchars($post->post_excerpt, ENT_QUOTES).'<br /><a style="font-weight:bold;" href="'.get_permalink($post->ID).'" title="Read More">Click to Continue &raquo;</a></span></li>';
		endforeach;
		$embed .=  '</ul>';
	endif;

	$embed .= '
	
		<div class="tab" style="border-top: 0;
		bottom:-31px;
		right:20px;
		-moz-border-radius-bottomleft: 4px;
		-moz-border-radius-bottomright: 4px;
		-webkit-border-bottom-right-radius: 4px;
		-webkit-border-bottom-left-radius: 4px;">
			<a href="/category/news">MORE NEWS</a>
		</div>
		<div class="tab" style="
			border-bottom: 0;
			bottom: -46px;
			left: 20px;
			-moz-border-radius-topleft: 4px;
			-moz-border-radius-topright: 4px;
			-webkit-border-top-right-radius: 4px;
			-webkit-border-top-left-radius: 4px;">
			<a href="/category/blogs">RECENT BLOGS</a>
		</div>
		<div class="tab" style="border-bottom: 0;
			bottom: -46px;
			left: 135px;
			-moz-border-radius-topleft: 4px;
			-moz-border-radius-topright: 4px;
			-webkit-border-top-right-radius: 4px;
			-webkit-border-top-left-radius: 4px;">
			<a href="/blogs/">ALL BLOGS</a>
		</div>
	</div>
	
	<div class="themebox" style="height:40px;z-index:2;margin:-10px 0 10px;">
';
//	$embed .= '<div class="shadow"><div class="entry">';
//	[postlist query="cat=9&showposts=2"]

	$posts = get_posts(array('cat'=>$catb,'showposts'=>2,'post__not_in' => array($topPost),'ignore_sticky_posts' => 1));
	if ($posts):
		$embed .= '<ul id="secondbox">';
		$i = 0;
		foreach( $posts as $post ) : setup_postdata($post);
			$i += 1;
			$category = get_the_category($post->ID);
			$embed .= '<li class="i'.$i.'"><h3>'; 
			$embed .= '<a href="'.get_category_link($category[sizeof($category)-1]).'">';
			$embed .= $category[sizeof($category)-1]->cat_name.'</a></h3>';
			$embed .= '<a style="font-weight:bold;" href="'.get_permalink($post->ID).'">'.$post->post_title.'</a></li>';
		endforeach;
		$embed .=  '</ul>';
	endif;


//	$embed .= '</div></div>
	$embed .= '</div>';
	
	return $embed;
}
add_shortcode( 'themehome', 'dirtysuds_themehome' );

/** This function will hold our new calls and over-rides */
if ( !function_exists( 'child_theme_setup' ) ):
function add_theme_post_formats() {
add_theme_support( 'post-formats', array( 'link', 'gallery','image','video' ) );;
}
endif;

if ( function_exists('register_sidebar') )
    register_sidebar(array(
        'before_widget' => '<div class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widgettitle">',
        'after_title' => '</h2>',
    ));

if (!function_exists('txfx_nice_search')) {
function txfx_nice_search() {
    if ( is_search() && strpos($_SERVER['REQUEST_URI'], '/wp-admin/') === false && strpos($_SERVER['REQUEST_URI'], '/search/') === false ) {
        wp_redirect(get_bloginfo('home') . '/search/' . str_replace(' ', '+', str_replace('%20', '+', get_query_var('s'))));
        exit();
    }
}
}

add_action('template_redirect', 'txfx_nice_search');

if ( ! function_exists( 'hipnews_setup' ) ):
function hipnews_setup() {

	// This theme styles the visual editor with editor-style.css to match the theme style.
//	add_editor_style();

	// This theme uses post thumbnails
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'single-post-thumbnail', 290, 160, true );

	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );

	// This theme uses wp_nav_menu() in one location.
  if ( function_exists( 'register_nav_menus' ) ) {
  	register_nav_menus(
  		array(
  		  'header_tabs' => 'Header Tabs',
  		  'foot_menu' => 'Footer Navigation'
  		)
  	);
  }
	define('HEADER_IMAGE', get_bloginfo('stylesheet_directory') . '/images/header.png');
	define('HEADER_IMAGE_WIDTH', 915);
	define('HEADER_IMAGE_HEIGHT', 155);
}
endif;

function dirtysuds_request_type() {
	if (is_front_page())
		return 'home';
	if (is_single())
		return 'single';
	if (is_category())
		return 'category';
	if (is_author())
		return 'author';
	
	return 'index';
}