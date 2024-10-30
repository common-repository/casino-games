<?php

/**

* Plugin Name: Casino Games

* Plugin URI: http://www.flytonic.com

* Description: Casino Games WordPress

* Version: 1.38

* Author: Flytonic

* Author URI: Flytonic.com

* License:

*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

define('CASINO_GAMES_PLUGIN_PATH', WP_PLUGIN_URL . '/' . plugin_basename( dirname(__FILE__) ) . '/' );

add_action('plugins_loaded', 'casino_games_load_textdomain');

function casino_games_load_textdomain() {
	load_plugin_textdomain( 'casino-games', false, dirname( plugin_basename(__FILE__) ) . '/languages/' );
}

//---Casino Game Custom meta fields
include(plugin_dir_path(__FILE__).'/includes/casino-game-custom_meta_fields.php');

//---Plugin Setup
include(plugin_dir_path(__FILE__).'/includes/casino-game-plugin-setup.php');

//---Add Options Page
include(plugin_dir_path(__FILE__).'/includes/casino-game-options-page.php');

//---Casino Game Shortcode
include(plugin_dir_path(__FILE__).'/includes/shortcodes/shortcode.php');

//---Casino Game Document  

include(plugin_dir_path(__FILE__).'/includes/casino_game_document.php');

class casino_game_configuration {
 
	//create custom post type
	
    function __construct() {
        add_action( 'init', array( $this, 'casino_games_custom_post_type' ) );
		add_action( 'add_meta_boxes', array($this, 'casino_games_add_meta_box'));
    }
	public function casino_games_add_meta_box() {
        add_meta_box('games_meta', __('Game Options','casino-games'), 'casino_games_post_meta_fields', 'casino_game', 'advanced', "low");
    }
   
	
    function casino_games_custom_post_type() {
		
		$args = array(
				'labels' => array(            
				'name' => __( 'Casino Games' , 'casino-games'),
				'singular_name' => __( 'Casino Games', 'casino-games' ),
				'add_new' => __( 'Add New Game', 'casino-games' ),
				'add_new_item' => __( 'Add New Game', 'casino-games' ),
				'edit' => __( 'Edit Game' , 'casino-games'),
				'edit_item' => __( 'Edit Game', 'casino-games' ),
				'new_item' => __( 'New Game', 'casino-games' ),
				'view' => __( 'View Game', 'casino-games' ),
				'view_item' => __( 'View Game' , 'casino-games'),
				'search_items' => __( 'Search Game' , 'casino-games'),
				'not_found' => __( 'No Games found', 'casino-games' ),
				'not_found_in_trash' => __( 'No Games found in Trash' , 'casino-games'),
				'parent' => __( 'Parent Game' , 'casino-games'),
							),
				'public' => false,
				'show_ui' => true,
				'capability_type' => 'post',
				'hierarchical' => false,
				'rewrite' => array( 'slug' => 'casino_game', 'with_front' => false ),
				'supports' => array('title','thumbnail')  
			);

			register_post_type('casino_game',$args);
		
		if ( function_exists( 'add_image_size' ) ) { 
		   add_image_size( 'casino-game-logo', 300, 300, false ); 
		}
			
    }
	
}
new casino_game_configuration();

?>