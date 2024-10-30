<?php

/*--------------------------------------------------------------*/
/*                   Plugin Setup Items           */                      
/*--------------------------------------------------------------*/

//---------------------Add Css----------------------

function casino_game_initial_script() {

	wp_enqueue_style('casino-game-css', CASINO_GAMES_PLUGIN_PATH.'assets/css/style.min.css');	 
}
add_action('wp_enqueue_scripts', 'casino_game_initial_script',15);

//Add Columns to Casino Game Post Type

function casino_game_columns_add($columns){
	
  @$columns = array(
  
	 "cb" => "<input type=\"checkbox\" />",
	 
     "title" => __( 'Title' , 'casino-games'),
	 
     "ReviewSC" =>__("Game Shortcode", 'casino-games'),
	 
	 "date" => __( 'Post Date' , 'casino-games'),
	 
  );
 
  return @$columns;
  
}

//Add Columns to Casino Post Type

function casino_game_edit_columns($column){
	
  global $post;

  switch ($column) {
	  
	  case 'ReviewSC':
	  
		echo '[cgshortcode game_id="'.$post->ID.'"]';
		
      break;

  }
}
add_action("manage_casino_game_posts_columns",  "casino_game_columns_add");
add_filter("manage_casino_game_posts_custom_column", "casino_game_edit_columns");


?>