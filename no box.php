<?php

function dirtysuds_nobox_css() {
echo '
<style type="text/css">
.leftbox {float:left;margin:0 15px 10px 0!important;}
.rightbox {clear:right!important;margin:0 0 10px 15px!important;}
.rightbox, .leftbox {width:289px;height:300px;overflow:hidden;padding:0 10px;}
.themebox a img {-moz-border-radius-bottomleft: 0px;-moz-border-radius-bottomright: 0px;-webkit-border-bottom-left-radius: 0px;-webkit-border-bottom-right-radius: 0px;-webkit-box-shadow: none;-moz-box-shadow: none;box-shadow: none; margin-bottom:0}
.themebox .sectiontitle, .themebox ul {margin:0!important;padding:0!important}
.themebox ul li {font-weight:bold;margin:0 0 .6em;}
</style>
';
}
add_action( 'wp_print_styles', 'dirtysuds_nobox_css' );

get_header();
if (have_posts()) : while (have_posts()) : the_post();
the_content();
endwhile; endif;
get_sidebar();
get_footer();