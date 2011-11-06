<?php while (have_posts()) : the_post(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<header>
<h2 class="entry-title instapaper_title" style="margin-bottom:.5em"><a href="<?php echo get_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title_attribute(); ?>">
<?php the_title(); ?></a></h2>
</header>
<div class="entry-content instapaper_body">
<?php
	the_content(); ?>
<p class="postmetadata">
<?php
edit_post_link('Edit this entry &gt;&gt;', '<p>', '</p>'); ?>
</p>
</div>
</article>
<?php

endwhile;
wp_reset_query();