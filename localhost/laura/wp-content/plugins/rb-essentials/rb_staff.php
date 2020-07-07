<?php

add_action( "init", "register_rb_staff_department", 4 );
add_action( "init", "register_rb_staff_position", 5 );
add_action( "init", "register_rb_staff", 6 );

//Register staff post type
function register_rb_staff (){
	$rewrite_slug = rb_get_slug('staff');

	// var_dump($rewrite_slug);

	$labels = array(
		'name' => esc_html_x( 'Staff', 'backend', 'ogo' ),
		'singular_name' => esc_html_x( 'Staff Item', 'backend', 'ogo' ),
		'menu_name' => esc_html_x( 'Our team', 'backend', 'ogo' ),
		'all_items' => esc_html_x( 'All', 'backend', 'ogo' ),
		'add_new' => esc_html_x( 'Add New', 'backend', 'ogo' ),
		'add_new_item' => esc_html_x( 'Add New Staff Item', 'backend', 'ogo' ),
		'edit_item' => esc_html_x('Edit Staff Item\'s Info', 'backend', 'ogo' ),
		'new_item' => esc_html_x( 'New Staff Item', 'backend', 'ogo' ),
		'view_item' => esc_html_x( 'View Staff Item\'s Info', 'backend', 'ogo' ),
		'search_items' => esc_html_x( 'Find Staff Item', 'backend', 'ogo' ),
		'not_found' => esc_html_x( 'No Staff Items Found', 'backend', 'ogo' ),
		'not_found_in_trash' => esc_html_x( 'No Staff Items Found in Trash', 'backend', 'ogo' ),
		'parent_item_colon' => '',
	);

	register_post_type( 'rb_staff', array(
		'label' => esc_html_x( 'Staff Items', 'backend', 'ogo' ),
		'labels' => $labels,
		'public' => true,
		'rewrite' => array( 'slug' => $rewrite_slug,'with_front' => false ),
		'capability_type' => 'post',
		'supports' => array(
			'title',
			'editor',
			'excerpt',
			'page-attributes',
			'thumbnail'
		),
		'menu_position' => 24,
		'menu_icon' => 'dashicons-groups',
		'taxonomies' => array( 'rb_staff_member_position', 'rb_staff_member_department' ),
		'has_archive' => true,
		'show_in_rest' => true
	));
}

//Register staff department taxonomy
function register_rb_staff_department(){
	$rewrite_slug = rb_get_slug('staff');

	$labels = array(
		'name' => esc_html_x( 'Departments', 'backend', 'ogo' ),
		'singular_name' => esc_html_x( 'Staff Department', 'backend', 'ogo' ),
		'all_items' => esc_html_x( 'All Staff Departments', 'backend', 'ogo' ),
		'edit_item' => esc_html_x( 'Edit Staff Department', 'backend', 'ogo' ),
		'view_item' => esc_html_x( 'View Staff Department', 'backend', 'ogo' ),
		'update_item' => esc_html_x( 'Update Staff Department', 'backend', 'ogo' ),
		'add_new_item' => esc_html_x( 'Add Staff Department', 'backend', 'ogo' ),
		'new_item_name' => esc_html_x( 'New Staff Department', 'backend', 'ogo' ),
		'parent_item' => esc_html_x( 'Parent Staff Department', 'backend', 'ogo' ),
		'parent_item_colon' => esc_html_x( 'Parent Staff Department:', 'backend', 'ogo' ),
		'search_items' => esc_html_x( 'Search Staff Departments', 'backend', 'ogo' ),
		'popular_items' => esc_html_x( 'Popular Staff Departments', 'backend', 'ogo' ),
		'separate_items_width_commas' => esc_html_x( 'Separate with commas', 'backend', 'ogo' ),
		'add_or_remove_items' => esc_html_x( 'Add or Remove Staff Departments', 'backend', 'ogo' ),
		'choose_from_most_used' => esc_html_x( 'Choose from the most used Staff Departments', 'backend', 'ogo' ),
		'not_found' => esc_html_x( 'No Staff Departments Found', 'backend', 'ogo' )
	);
	register_taxonomy( 'rb_staff_member_department', 'rb_staff', array(
		'labels' => $labels,
		'hierarchical' => true,
		'show_admin_column' => true,
		'rewrite' => array( 'slug' => $rewrite_slug . '_department' ),
		'show_in_rest' => true
	));
}

//Register staff position taxonomy
function register_rb_staff_position(){
	$rewrite_slug = rb_get_slug('staff');

	$labels = array(
		'name' => esc_html_x( 'Positions', 'backend', 'ogo' ),
		'singular_name' => esc_html_x( 'Staff Position', 'backend', 'ogo' ),
		'all_items' => esc_html_x( 'All Staff Positions', 'backend', 'ogo' ),
		'edit_item' => esc_html_x( 'Edit Staff Position', 'backend', 'ogo' ),
		'view_item' => esc_html_x( 'View Staff Position', 'backend', 'ogo' ),
		'update_item' => esc_html_x( 'Update Staff Position', 'backend', 'ogo' ),
		'add_new_item' => esc_html_x( 'Add Staff Position', 'backend', 'ogo' ),
		'new_item_name' => esc_html_x( 'New Staff Position', 'backend', 'ogo' ),
		'search_items' => esc_html_x( 'Search Staff Positions', 'backend', 'ogo' ),
		'popular_items' => esc_html_x( 'Popular Staff Positions', 'backend', 'ogo' ),
		'separate_items_width_commas' => esc_html_x( 'Separate with commas', 'backend', 'ogo' ),
		'add_or_remove_items' => esc_html_x( 'Add or Remove Staff Positions', 'backend', 'ogo' ),
		'choose_from_most_used' => esc_html_x( 'Choose from the most used Staff Positions', 'backend', 'ogo' ),
		'not_found' => esc_html_x( 'No Staff Member positions found', 'backend', 'ogo' )
	);
	register_taxonomy( 'rb_staff_member_position', 'rb_staff', array(
		'labels' => $labels,
		'show_admin_column' => true,
		'rewrite' => array( 'slug' => $rewrite_slug . '_position' ),
		'show_tagcloud' => false,
		'show_in_rest' => true
	));
}

//Add staff orders
function add_order_column( $columns ) {
  $columns['menu_order'] = "Order";
  return $columns;
}
add_action('manage_edit-rb_staff_columns', 'add_order_column');

//Show staff order on 'edit all' page
function show_order_column($name){
  global $post;
  switch ($name) {
    case 'menu_order':
      $order = $post->menu_order;
      echo $order;
      break;
   default:
      break;
   }
}
add_action('manage_rb_staff_posts_custom_column','show_order_column');

//Show staff thumbnails on 'edit all' page
function add_rb_staff_thumb_name ($columns) {
	$columns = array_slice($columns, 0, 1, true) +
				array('rb_staff_thumbnail' => esc_html_x('Thumbnails', 'backend', 'ogo')) +
				array_slice($columns, 1, NULL, true);
	return $columns;
}
add_filter('manage_rb_staff_posts_columns', 'add_rb_staff_thumb_name');

function add_rb_staff_thumb ($column, $id) {
	if ('rb_staff_thumbnail' === $column) {
		echo the_post_thumbnail('thumbnail');
	}
}
add_action('manage_rb_staff_posts_custom_column', 'add_rb_staff_thumb', 5, 2);