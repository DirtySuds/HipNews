<footer>
<?php wp_nav_menu(array(
  'menu'            => 'foot_menu', 
  'container'       => 'ul', 
  'container_id'    => 'nav_footer', 
  'menu_class'      => 'menu', 
  'menu_id'         => 'nav_footer',
  'depth'           => 1 )
);?>
<?php wp_footer(); ?>
</footer>
</div>
</body>
</html>