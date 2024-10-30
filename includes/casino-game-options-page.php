<?php 
	
	if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
	
	//Add Menu 

	function casino_game_menu() {

		

		add_submenu_page(         

			'edit.php?post_type=casino_game', 

			__( 'Document', 'casino-games' ),    

			__( 'Document', 'casino-games' ),   

			'manage_options',    

			'casino_game_document',   

			'casino_game_document'

		);

		

	}

	

	add_action('admin_menu', 'casino_game_menu');
	
?>