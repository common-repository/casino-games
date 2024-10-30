<?php 

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

	function casino_game_shortcode($atts) {
	
		extract(shortcode_atts(array(
			'game_id' => ''
		), $atts));

		global $post;

		$html = '<div class="cgp_game_wrap"><h3>' . esc_attr(get_the_title($game_id)) . '</h3><div class="cgp_game_detblock"><div class="cgp_game_detblock_col1"><div class="cgp-game_screen"><a href="';
		
		if(!empty(get_post_meta($game_id,'casinoGameAffiliatUrl',true))){
			$html .= esc_url(get_post_meta($game_id,'casinoGameAffiliatUrl',true));
		}
		
		$html .='">';
				
		if(has_post_thumbnail( $game_id )){
		
			$html .= '<img src="'.esc_url(wp_get_attachment_image_src( get_post_thumbnail_id($game_id), 'casino-game-logo', true )[0]).'" class="cgp-reviewlogo" />';
			
			
		}else{
			
			$html .= '<img class="cgp-reviewlogo" src="'.esc_url(WP_PLUGIN_URL).'/casino-games/assets/images/game.jpg" >';
			
		}
			
		$html .=' </a><div class="cgp_gmrate_area"><span class="cgp_gmrate_text">'.__('Rating', 'casino-games').': </span><span class="cgp-rate frleft "><span class="cgp-rate-total">';
						
		if(!empty(get_post_meta($game_id,'casinoGameEditorRating',true))){
			
			if(get_post_meta($game_id,'casinoGameEditorRating',true)==1){
				
				$html .='<div><span class="stars-container stars-10">★★★★★</span></div>';
				
			}else if(get_post_meta($game_id,'casinoGameEditorRating',true)==2){
				
				$html .='<div><span class="stars-container stars-20">★★★★★</span></div>';
				
			}else if(get_post_meta($game_id,'casinoGameEditorRating',true)==3){
				
				$html .='<div><span class="stars-container stars-30">★★★★★</span></div>';
				
			}else if(get_post_meta($game_id,'casinoGameEditorRating',true)==4){
				
				$html .='<div><span class="stars-container stars-40">★★★★★</span></div>';
				
			}else if(get_post_meta($game_id,'casinoGameEditorRating',true)==5){
				
				$html .='<div><span class="stars-container stars-50">★★★★★</span></div>';
				
			}
			
		}
			
		$html .='</span></span></div></div><div class="cgp_gamefeat_site"><div class="cgpleft_featgm"><a href="';
		
		if(!empty(get_post_meta($game_id,'casinoGameAffiliatUrl',true))){
			
			$html .= esc_url(get_post_meta($game_id,'casinoGameAffiliatUrl',true));
			
		}
		$html .='">'; 
					
		if(has_post_thumbnail( $game_id )){
	
			$html .= '<img src="'.esc_url(wp_get_attachment_image_src( get_post_thumbnail_id($game_id), 'casino-game-logo', true )[0]).'" class="cgp-reviewlogo" />';
			
		}else{
			
			$html .= '<img class="cgp-reviewlogo" src="'.esc_url(WP_PLUGIN_URL).'/casino-games/assets/images/game.jpg" >';
			
		}
							 
		$html .='</a></div><div class="cgpright_featgm"><span class="cgpbonus_text">';
					
		if(!empty(get_post_meta($game_id,'casinoGameBonusDisplayText',true))){
			$html .= esc_attr(get_post_meta($game_id,'casinoGameBonusDisplayText',true));
		}
		
		$html .='</span><a class="cgp-button playb" href="';
		
		if(!empty(get_post_meta($game_id,'casinoGameAffiliatUrl',true))){
			$html .= esc_url(get_post_meta($game_id,'casinoGameAffiliatUrl',true));
		}
		
		$html .='">'.__('Play Now', 'casino-games').'</a></div></div></div><div class="cgp_game_detblock_col2"><h4>'.__('Features', 'casino-games').' </h4><ul class="cgp_game_list1">';
		
		if(!empty(get_post_meta($game_id, 'casinoGameFeatures', true))){
		
			$features = explode("|", esc_attr(get_post_meta($game_id, 'casinoGameFeatures', true)));
			
			for($i = 0; $i < count($features); $i++){
				
				$html .= '<li><span></span>'. $features[$i] .'</li>';
			
			}

		}
		
		$html .= ' </ul></div></div>';
	
		if (get_post_meta($game_id, 'casinoGameUrl', true)){
		
			$html .= '<div class="cgp_game_demoblock">
			<h4>' . esc_attr(get_the_title($game_id)) . '</h4>
			<div class="cgp_game_demoarea"><iframe frameborder="0" scrolling="no" allowfullscreen="" src="'. esc_attr(get_post_meta($game_id, 'casinoGameUrl', true)).'"></iframe>
			</div></div>';
		
		}

		$html .= '</div>';

		return $html;
	
	}

add_shortcode('cgshortcode', 'casino_game_shortcode');

?>