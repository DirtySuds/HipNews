<!-- google_ad_section_end -->
</div>
<div id="sidebar">
<form action="<?php echo home_url() ?>/" id="search_form" method="get">
<input type="text" id="searchbox" name="s" value="<?php the_search_query(); ?>" />
<input type="submit" id="searchsubmit" value="Search" title="Search" />
</form>
<?php

if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : 

echo 'No Sidebar';

endif;

?>
</div>
</div>