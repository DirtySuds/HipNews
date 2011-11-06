<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<header>
<?php if (!is_page() && get_the_author_meta('last_name') != 'Staff') { ?>
<p class="byline author vcard"><strong><a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" rel="author">
By <span class="fn instapaper_author"><?php echo get_the_author_meta('first_name') .' '. get_the_author_meta('last_name'); ?></span>
</a></strong>
<?php if (!strstr(get_the_author_meta('nickname'),get_the_author_meta('last_name'))) { ?>
<br />
<em><?php
if (get_the_author_meta('ID')==1 && (get_the_time('Y') < 2005)) {
echo 'Editor In Chief';
} else {
the_author_meta('nickname');
}
?></em>
<?php }
if (!strstr(get_the_author_meta('email'), '+NA+') && (get_the_author_meta('user_level')!=0) ) { ?>
<br /><a style="font-size:.8em;" href="mailto:<?php echo antispambot(get_the_author_meta('email')); ?>"><?php echo antispambot(strtolower(get_the_author_meta('email'))); ?></a>
<?php } ?>
</p>
<?php
// is_single()
}

?>
<h2 class="entry-title instapaper_title"><a href="<?php echo get_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title_attribute(); ?>">
<?php 
$cat = get_the_category();
if ((get_the_author_meta('ID')==94) && ($cat[0]->cat_name == 'Opinion') && ( get_the_ID() != 4147)) {
echo '<span style="font-size:10pt;line-height:10pt;text-transform:uppercase;margin-bottom:2pt;display:block">I\'m not a damned idiot</span>';
}
 ?>
<?php the_title(); ?></a></h2>
<?php if (!is_page()) { ?>
<p><strong><?php
$arc_year = get_the_time('Y');
$arc_month = get_the_time('m');
?><a class="monthlink instapaper_date" href="<?php echo get_month_link("$arc_year", "$arc_month"); ?>">
<time datetime="<?php the_time('c') ?>" pubdate class="updated" title="<?php the_time('F j, Y') ?>">
<?php the_time('F Y') ?>
</time>
</a></strong></p>
<?php } ?>
</header>
<div class="entry-content instapaper_body">
<?php
	the_content(); 
	if (!is_page()) { ?>
<p class="postmetadata">
<?php
get_template_part( 'share', 'single' );
edit_post_link('Edit this entry &gt;&gt;', '<p>', '</p>'); ?>
</p>
<?php 
// !is_page()
}?>
</div>
</article>
<?php

comments_template( '', true );

endwhile;
endif;
wp_reset_query();