<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
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

if(has_post_thumbnail() && !has_post_format('gallery')) { ?>
<a href="<?php the_permalink() ?>" style="float:right; margin-left:10px;" title="<?php the_title() ?>">
<?php the_post_thumbnail(array(300,100)); ?>
</a>
<?php }

?>
<?php if (!is_page()) { ?>
<?php } ?>
</header>
<?php
if(has_post_format('gallery'))
	echo '<div style="margin:6px .5em 0 .5em;">';
else
	echo '<div style="margin:6px 1em 0 3em;">';
	
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