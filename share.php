<iframe src="http://www.facebook.com/plugins/like.php?href=<?php echo get_permalink() ?>&amp;layout=button_count&amp;show_faces=true&amp;width=100&amp;action=recommend&amp;colorscheme=light&amp;height=21" scrolling="no" frameborder="0" style="display:inline;border:none; overflow:hidden; width:100px; height:21px;float:left" allowTransparency="true"></iframe>

<iframe frameborder="0" allowtransparency="true" scrolling="no" tabindex="0" src="http://platform.twitter.com/widgets/tweet_button.html?count=none&amp;lang=en&amp;text=<?php echo get_the_title(); ?>&amp;url=<?php echo wp_get_shortlink() ?>&amp;counturl=<?php echo get_permalink() ?>&amp;via=HooverHigh<?php
if (get_the_author_meta('authorbox_twitter')) {
echo '&amp;related='.get_the_author_meta('authorbox_twitter').':'.get_the_author_firstname().'%20'.get_the_author_lastname();
} ?>" style="width:56px;height:20px;float:left;border:none; overflow:hidden" title="Twitter For Websites: Tweet Button"></iframe>