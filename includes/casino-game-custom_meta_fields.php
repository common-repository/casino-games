<?php 

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

	function casino_games_post_meta_fields($post) {

		// Use nonce for verification
		
		wp_nonce_field(plugin_basename( __FILE__ ), 'casino_game_metabox_nonce');
?>

	<table style="width: 100%;">
	
		<tr>
			<td><?php _e('Affiliate Referral URL', 'casino-games'); ?>:<?php _e('Enter the full referral or affiliate url provided by your affiliate program to track your visitors.', 'casino-games'); ?></td>
			<td><label for="casinoGameAffiliatUrl"><input type="text" name="casinoGameAffiliatUrl" id="casinoGameAffiliatUrl" value="<?php if(!empty(get_post_meta($post->ID, 'casinoGameAffiliatUrl', true))){ echo esc_attr(get_post_meta($post->ID, 'casinoGameAffiliatUrl', true)); } ?>" /></label></td>
		</tr>
		
		<tr>
			<td><?php _e('Bonus Display Text', 'casino-games'); ?>:</td>
			<td><label for="casinoGameBonusDisplayText"><input type="text" name="casinoGameBonusDisplayText" id="casinoGameBonusDisplayText" value="<?php if(!empty(get_post_meta($post->ID, 'casinoGameBonusDisplayText', true))){ echo esc_attr(get_post_meta($post->ID, 'casinoGameBonusDisplayText', true)); } ?>" /></label></td>
		</tr>
		
		<tr>
			<td><?php _e('Editor Rating', 'casino-games'); ?>:<?php _e('This is the main star rating/overall rating.', 'casino-games'); ?></td>
			<td>
				<select name="casinoGameEditorRating" id="casinoGameEditorRating">
					<option value=""><?php _e('Select', 'casino-games'); ?></option>
					<?php $x=1; while ($x<=5){ ?>
					<option <?php if(!empty(get_post_meta($post->ID, 'casinoGameEditorRating', true)) && (esc_attr(get_post_meta($post->ID, 'casinoGameEditorRating', true))==esc_attr($x))){ echo esc_attr('selected'); } ?> value="<?php echo esc_attr($x); ?>"><?php echo esc_attr($x); ?></option>
					<?php $x=$x+1; } ?>
			   </select>
			</td>
		</tr>
		
		<tr>
			<td><?php _e('Game Features, separate each by |', 'casino-games'); ?>:</td>
			<td><label for="casinoGameFeatures"><input type="text" name="casinoGameFeatures" id="casinoGameFeatures" value="<?php if(!empty(get_post_meta($post->ID, 'casinoGameFeatures', true))){ echo esc_attr(get_post_meta($post->ID, 'casinoGameFeatures', true)); } ?>" /></label></td>
		</tr>
		
		<tr>
			<td><?php _e('Casino Game URL', 'casino-games'); ?>:</td>
			<td><label for="casinoGameUrl"><input type="text" name="casinoGameUrl" id="casinoGameUrl" value="<?php if(!empty(get_post_meta($post->ID, 'casinoGameUrl', true))){ echo esc_attr(get_post_meta($post->ID, 'casinoGameUrl', true)); } ?>" /></label></td>
		</tr>
		
	</table>

<?php
      }

	//Save post meta data when post is saved
	
	add_action( 'save_post', 'casino_game_save_post_meta_data');
	
	function casino_game_save_post_meta_data($post_id) {	

		if ((isset( $_POST['casino_game_metabox_nonce'])) && (wp_verify_nonce( $_POST['casino_game_metabox_nonce'], plugin_basename( __FILE__ )))) {
	
			if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
				return;
		
				if (current_user_can('manage_options')) {
				
					if (isset($_POST['casinoGameAffiliatUrl'])) { update_post_meta($post_id, 'casinoGameAffiliatUrl', sanitize_text_field($_POST['casinoGameAffiliatUrl'])); }
					
					if (isset($_POST['casinoGameBonusDisplayText'])) { update_post_meta($post_id, 'casinoGameBonusDisplayText', sanitize_text_field($_POST['casinoGameBonusDisplayText'])); }
					
					if (isset($_POST['casinoGameEditorRating'])) { update_post_meta($post_id, 'casinoGameEditorRating', sanitize_text_field($_POST['casinoGameEditorRating'])); }
					
					if (isset($_POST['casinoGameFeatures'])) { update_post_meta($post_id, 'casinoGameFeatures', sanitize_text_field($_POST['casinoGameFeatures'])); }
					
					if (isset($_POST['casinoGameUrl'])) { update_post_meta($post_id, 'casinoGameUrl', sanitize_text_field($_POST['casinoGameUrl'])); }
					
				}

		}
	}	

?>