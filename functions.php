<?php
load_theme_textdomain("notesblog");
$content_width = 580;
// widgets
	if ( function_exists('register_sidebar') )
	    register_sidebar(array('name'=>'Sidebar'));
	    register_sidebar(array('name'=>'Footer A'));
	    register_sidebar(array('name'=>'Footer B'));
	    register_sidebar(array('name'=>'Footer C'));
	    register_sidebar(array('name'=>'Footer D'));
	    register_sidebar(array(
			'name' => 'Submenu',
			'id' => 'submenu',
			'before_widget' => '<div id="submenu-nav">',
			'after_widget' => '</div>',
			'before_title' => false,
			'after_title' => false
		));
// ends ---
// pullquote shortcode
function pullquote( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'float' => '$align',
	), $atts));
   return '<blockquote class="pullquote ' . $float . '">' . $content . '</blockquote>';
}
add_shortcode('pull', 'pullquote');
// ends ---
// admin page
add_action('admin_menu', 'nbcore_menu');
function nbcore_menu() {
  add_theme_page('Notes Blog Core', 'Notes Blog Core', 8, 'your-unique-identifier', 'nbcore_options');
}
function nbcore_options() {
  echo '<div class="wrap"><h2>Notes Blog Core</h2>';
  echo '<p>This is a placeholder for upcoming admin options for the Notes Blog Core theme. These things aren\'t due yet, in fact, they are pretty far away, so just forget about this page for now huh?</p><p>Get the latest Notes Blog and Notes Blog Core news from <a href="http://notesblog.com" title="Notes Blog">http://notesblog.com</a> - it\'s that sweet!</p>';
  echo '<h3>Pullquote Shortcode</h3><p>Notes Blog Core has support for pullquotes. Either you use the <em>pullquote</em> class on a <em>blockquote</em> tag along with the <em>alignleft</em> or <em>alignright</em> tags, or you use shortcode to do the same.</p><p>Usage is simple: <code>[pull float="X"]Your pullqoute text[/pull]</code> will output att pullquote aligned either to the left or right. The key is <em>float="X"</em>, where X can be <strong>either</strong> <em>alignleft</em> or <em>alignright</em>. Simple huh?</p>';
  echo '<h3>Custom Login Screen <small style="color:#f00; text-transform:uppercase;">beta</small></h3><p>Want a custom login form? Then you can play with <code>login.css</code> in the new <code>custom</code> folder. Remember: This is overwritten when updating! <strong>Experimental!</strong></p>';
  echo '</div>';
}
// ends ---
// custom login form
function nbcustom_login() {
	echo '<link rel="stylesheet" href="' . get_bloginfo('stylesheet_directory') . '/custom/login.css" type="text/css" media="screen" />';
}
add_action('login_head', 'nbcustom_login');
// ends ---




/*
============================================
	INICIO DAS FUN합ES PERSONALIZADAS
============================================
*/


/*
============================================
	 ADICIONA BOOTSTRAP NO TEMA
============================================
*/
function default_jeysel_init() {
	wp_enqueue_style(
		'bootstrap',
		get_stylesheet_directory_uri().
		'/bootstrap/css/bootstrap.min.css',
			'style',
			'3.0'
	);
	wp_enqueue_script(
		'bootstrap',
		get_stylesheet_directory_uri().
		'/bootstrap/js/bootstrap.min.js',
		'jquery',
		'3.0'
	);
}
add_action( 'init', 'default_jeysel_init' );

/*
=============================================
	FIM FUN플O ADICIONA BOOTSTRAP NO TEMA
=============================================
*/


/*
=============================================
  INICIO DA FUN플O WALKER NAV-BAR BOOTSTRAP
=============================================
*/

// Register Custom Navigation Walker
require_once('wp_bootstrap_navwalker.php');


class wp_bootstrap_navwalker extends Walker_Nav_Menu {
	/**
	 * @see Walker::start_lvl()
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param int $depth Depth of page. Used for padding.
	 */
	public function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat( "\t", $depth );
		$output .= "\n$indent<ul role=\"menu\" class=\" dropdown-menu\">\n";
	}
	/**
	 * @see Walker::start_el()
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param object $item Menu item data object.
	 * @param int $depth Depth of menu item. Used for padding.
	 * @param int $current_page Menu item ID.
	 * @param object $args
	 */
	public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
		/**
		 * Dividers, Headers or Disabled
		 * =============================
		 * Determine whether the item is a Divider, Header, Disabled or regular
		 * menu item. To prevent errors we use the strcasecmp() function to so a
		 * comparison that is not case sensitive. The strcasecmp() function returns
		 * a 0 if the strings are equal.
		 */
		if ( strcasecmp( $item->attr_title, 'divider' ) == 0 && $depth === 1 ) {
			$output .= $indent . '<li role="presentation" class="divider">';
		} else if ( strcasecmp( $item->title, 'divider') == 0 && $depth === 1 ) {
			$output .= $indent . '<li role="presentation" class="divider">';
		} else if ( strcasecmp( $item->attr_title, 'dropdown-header') == 0 && $depth === 1 ) {
			$output .= $indent . '<li role="presentation" class="dropdown-header">' . esc_attr( $item->title );
		} else if ( strcasecmp($item->attr_title, 'disabled' ) == 0 ) {
			$output .= $indent . '<li role="presentation" class="disabled"><a href="#">' . esc_attr( $item->title ) . '</a>';
		} else {
			$class_names = $value = '';
			$classes = empty( $item->classes ) ? array() : (array) $item->classes;
			$classes[] = 'menu-item-' . $item->ID;
			$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
			if ( $args->has_children )
				$class_names .= ' dropdown';
			if ( in_array( 'current-menu-item', $classes ) )
				$class_names .= ' active';
			$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
			$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
			$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';
			$output .= $indent . '<li' . $id . $value . $class_names .'>';
			$atts = array();
			$atts['title']  = ! empty( $item->title )	? $item->title	: '';
			$atts['target'] = ! empty( $item->target )	? $item->target	: '';
			$atts['rel']    = ! empty( $item->xfn )		? $item->xfn	: '';
			// If item has_children add atts to a.
			if ( $args->has_children && $depth === 0 ) {
				$atts['href']   		= '#';
				$atts['data-toggle']	= 'dropdown';
				$atts['class']			= 'dropdown-toggle';
				$atts['aria-haspopup']	= 'true';
			} else {
				$atts['href'] = ! empty( $item->url ) ? $item->url : '';
			}
			$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );
			$attributes = '';
			foreach ( $atts as $attr => $value ) {
				if ( ! empty( $value ) ) {
					$value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
					$attributes .= ' ' . $attr . '="' . $value . '"';
				}
			}
			$item_output = $args->before;
			/*
			 * Glyphicons
			 * ===========
			 * Since the the menu item is NOT a Divider or Header we check the see
			 * if there is a value in the attr_title property. If the attr_title
			 * property is NOT null we apply it as the class name for the glyphicon.
			 */
			if ( ! empty( $item->attr_title ) )
				$item_output .= '<a'. $attributes .'><span class="glyphicon ' . esc_attr( $item->attr_title ) . '"></span>&nbsp;';
			else
				$item_output .= '<a'. $attributes .'>';
			$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
			$item_output .= ( $args->has_children && 0 === $depth ) ? ' <span class="caret"></span></a>' : '</a>';
			$item_output .= $args->after;
			$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		}
	}
	/**
	 * Traverse elements to create list from elements.
	 *
	 * Display one element if the element doesn't have any children otherwise,
	 * display the element and its children. Will only traverse up to the max
	 * depth and no ignore elements under that depth.
	 *
	 * This method shouldn't be called directly, use the walk() method instead.
	 *
	 * @see Walker::start_el()
	 * @since 2.5.0
	 *
	 * @param object $element Data object
	 * @param array $children_elements List of elements to continue traversing.
	 * @param int $max_depth Max depth to traverse.
	 * @param int $depth Depth of current element.
	 * @param array $args
	 * @param string $output Passed by reference. Used to append additional content.
	 * @return null Null on failure with no changes to parameters.
	 */
	public function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {
        if ( ! $element )
            return;
        $id_field = $this->db_fields['id'];
        // Display this element.
        if ( is_object( $args[0] ) )
           $args[0]->has_children = ! empty( $children_elements[ $element->$id_field ] );
        parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
    }
	/**
	 * Menu Fallback
	 * =============
	 * If this function is assigned to the wp_nav_menu's fallback_cb variable
	 * and a manu has not been assigned to the theme location in the WordPress
	 * menu manager the function with display nothing to a non-logged in user,
	 * and will add a link to the WordPress menu manager if logged in as an admin.
	 *
	 * @param array $args passed from the wp_nav_menu function.
	 *
	 */
	public static function fallback( $args ) {
		if ( current_user_can( 'manage_options' ) ) {
			extract( $args );
			$fb_output = null;
			if ( $container ) {
				$fb_output = '<' . $container;
				if ( $container_id )
					$fb_output .= ' id="' . $container_id . '"';
				if ( $container_class )
					$fb_output .= ' class="' . $container_class . '"';
				$fb_output .= '>';
			}
			$fb_output .= '<ul';
			if ( $menu_id )
				$fb_output .= ' id="' . $menu_id . '"';
			if ( $menu_class )
				$fb_output .= ' class="' . $menu_class . '"';
			$fb_output .= '>';
			$fb_output .= '<li><a href="' . admin_url( 'nav-menus.php' ) . '">Add a menu</a></li>';
			$fb_output .= '</ul>';
			if ( $container )
				$fb_output .= '</' . $container . '>';
			echo $fb_output;
		}
	}
}



register_nav_menus( array(
    'primary' => __( 'Primary Menu', 'default_jeysel' ),
) );


/*
======================================================
			FIM DA FUN플O NAV-BAR BOOTSTRAP
======================================================
*/







/*
===============================
FIM DAS FUN합ES PERSONALIZADAS
===============================
*/


?>