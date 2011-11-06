<?php
if (have_posts()) {
$curauth = get_query_var( 'author' );
$paged   = get_query_var( 'page' );
?>
<div style="margin:0">
<?php
if ( $paged < 2 ) {
if(userphoto_exists($curauth))
    echo str_replace('<img ','<img style="float:right;margin:0 1em 2em 1em;" ',userphoto__get_userphoto($curauth->ID, USERPHOTO_FULL_SIZE, '', '', '', ''));
}
if ( $paged < 2 ) {
if (get_the_author_meta('description',$curauth) || get_the_author_meta('twitter',$curauth) || (get_the_author_meta('user_email',$curauth) && !strstr(get_the_author_meta('user_email',$curauth),'+NA+'))) { ?>
<div style="margin:6px 1em 1.1em 3em;">
<?php 
if (get_the_author_meta('description',$curauth)) {
	echo get_the_author_meta('description',$curauth),'<br />';
}
if (get_the_author_meta('user_email',$curauth) && !strstr(get_the_author_meta('user_email',$curauth),'+NA+')) {
	echo '<a rel="me" href="mailto:',get_the_author_meta('user_email',$curauth),'">Email</a> ';
}
if (get_the_author_meta('user_url',$curauth)) {
	echo '<a rel="me" href="',get_the_author_meta('user_url',$curauth),'">Blog</a> ';
}
if (get_the_author_meta('authorbox_twitter',$curauth)) {
	echo '<a rel="me" href="http://twitter.com/',get_the_author_meta('authorbox_twitter',$curauth),'">@',get_the_author_meta('authorbox_twitter',$curauth),'</a> ';
} else if (get_the_author_meta('twitter',$curauth)) {
	echo '<a rel="me" href="http://twitter.com/',get_the_author_meta('twitter',$curauth),'">@',get_the_author_meta('twitter',$curauth),'</a> ';
	}
?>
</div>
<?php } } ?>
</div>
<?php } if (have_posts()) : while (have_posts()) : the_post(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<header>
<h3><a href="<?php echo get_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title_attribute(); ?>">
<?php 
$cat = get_the_category();
if ((get_the_author_meta('ID')==94) && ($cat[0]->cat_name == 'Opinion') && ( get_the_ID() != 4147)) {
echo '<span style="font-size:10pt;line-height:10pt;text-transform:uppercase;margin-bottom:2pt;display:block">I\'m not a damned idiot</span>';
}
 ?>
<?php the_title(); ?></a></h3>
<?php

if(has_post_thumbnail()) { ?>
<a href="<?php the_permalink() ?>" style="float:right; margin-left:10px;" title="<?php the_title() ?>">
<?php the_post_thumbnail(array(300,100)); ?>
</a>
<?php }

?>
<?php if (!is_page()) { ?>
<?php } ?>
</header>
<div style="margin:6px 1em 0 3em;">
<?php
	the_excerpt();
?>
</div>
<a href="<?php $fontpagepostlink = get_permalink(); the_permalink(); ?>" title="Read More">
Read More &raquo;</a><br style="clear:both;display:block" />
</article>
<?php 
endwhile;
endif;
wp_reset_query();