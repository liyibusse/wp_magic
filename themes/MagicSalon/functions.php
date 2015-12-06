<?php 

//add_filter('show_admin_bar', '__return_false');
 show_admin_bar(false);

//show menu in admin panel
register_nav_menus(array(
	'top'    => 'Top menu',
));

class Bootstrap_Walker_Nav_Menu extends Walker_Nav_Menu {
 
  /**
   * Display Element
   */
  function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {
    $id_field = $this->db_fields['id'];
 
    if ( isset( $args[0] ) && is_object( $args[0] ) )
    {
      $args[0]->has_children = ! empty( $children_elements[$element->$id_field] );
 
    }
 
    return parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
  }
 
  /**
   * Start Element
   */
  function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
    if ( is_object($args) && !empty($args->has_children) )
    {
      $link_after = $args->link_after;
      $args->link_after = ' <b class="caret"></b>';
    }
 
    parent::start_el($output, $item, $depth, $args, $id);
 
    if ( is_object($args) && !empty($args->has_children) )
      $args->link_after = $link_after;
  }
 
  /**
   * Start Level
   */
  function start_lvl( &$output, $depth = 0, $args = array() ) {
    $indent = str_repeat("t", $depth);
    $output .= "$indent<ul class=\"dropdown-menu\" >";
  }
}

add_filter('nav_menu_link_attributes', function($atts, $item, $args) {
  if ( $args->has_children )
  {
    $atts['data-toggle'] = 'dropdown';
    $atts['class'] = 'dropdown-toggle';
  }
 
  return $atts;
}, 10, 3);


/*support images*/
add_theme_support( 'post-thumbnails' );

//excerpt
function new_excerpt_length($length) {

	return 50;

}

add_filter('excerpt_length', 'new_excerpt_length');

//widgets
register_sidebar(array('name' => 'Price text top', 'id' => 'pricetext1', 'before_widget' => '', 'after_widget'  => ''));
register_sidebar(array('name' => 'Price text bottom', 'id' => 'pricetext2', 'before_widget' => '', 'after_widget'  => ''));
register_sidebar(array('name' => 'Copyright', 'id' => 'copy', 'before_widget' => '', 'after_widget'  => ''));
register_sidebar(array('name' => 'Address', 'id' => 'address', 'before_widget' => '', 'after_widget'  => ''));
register_sidebar(array('name' => 'Work time', 'id' => 'work_time', 'before_widget' => '', 'after_widget'  => ''));
register_sidebar(array('name' => 'Phone', 'id' => 'phone', 'before_widget' => '', 'after_widget'  => ''));
register_sidebar(array('name' => 'E-mail', 'id' => 'email', 'before_widget' => '', 'after_widget'  => ''));
register_sidebar(array('name' => 'Map', 'id' => 'map', 'before_widget' => '', 'after_widget'  => ''));


//slider
function main_slider()
{
  $labels = array(
	'name' => 'Main Slider', 
	'singular_name' => 'Slider',
	'add_new' => 'Add new',
	'add_new_item' => 'Add new item',
	'edit_item' => 'Edit',
	'new_item' => 'New slider',
	'view_item' => 'view',
	'search_items' => 'search',
	'not_found' =>  'not found',
	'not_found_in_trash' => 'not found in trash',
	'parent_item_colon' => '',
	'menu_name' => 'Main Slider'

  );
  $args = array(
	'labels' => $labels,
	'public' => true,
	'publicly_queryable' => true,
	'show_ui' => true,
	'show_in_menu' => true,
	'query_var' => true,
	'rewrite' => true,
	'capability_type' => 'post',
	'has_archive' => true,
	'hierarchical' => false,
	'menu_position' => null,
	'menu_icon' => 'dashicons-images-alt2',
	'supports' => array('title','editor','thumbnail', 'excerpt')
  );
  register_post_type('main_slider',$args);
}
add_action('init', 'main_slider');

function kriesi_pagination($pages = '', $range = 2)
{
     $showitems = ($range * 2)+1;
     global $paged;
     if(empty($paged)) $paged = 1;
     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }
     if(1 != $pages)
     {
         echo "<ul class='pagenavi'>";
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."#link_article'>«</a>";
         if($paged > 1 && $showitems < $pages) echo "<li><a href='".get_pagenum_link($paged - 1)."#link_article'>‹</a></li>";
         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<li><span>".$i."</span></li>":"<li><a href='".get_pagenum_link($i)."#link_article' class='inactive' >".$i."</a></li>";
             }
         }
         if ($paged < $pages && $showitems < $pages) echo "<li><a href='".get_pagenum_link($paged + 1)."#link_article'>›</a></li>";
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<li><a href='".get_pagenum_link($pages)."#link_article'>»</a></li>";
         echo "</ul>\n";
     }
}

?>