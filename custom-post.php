<?php
function create_posttype() {
register_post_type( 'news',
// CPT Options
array(
  'labels' => array(
   'name' => __( 'news' ),
   'singular_name' => __( 'News' )
  ),
  'public' => true,
  'has_archive' => false,
  'rewrite' => array('slug' => 'news'),
 )
);
}
// Hooking up our function to theme setup
add_action( 'init', 'create_posttype' );
/* Custom Post Type End */

?>
