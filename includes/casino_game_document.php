<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


function casino_game_document(){
?>	
<table style="width: 100%;">
<tr>
<td><h1><?php _e('Document', 'casino-games' ); ?></h1></td>        
</tr>		
<tr>
<td><?php _e("1. Create game using 'Add New Game'", 'casino-games' ); ?></td>        
</tr>
<tr>
<td><?php _e('2. Use the Game Shortcode as shown below', 'casino-games' ); ?></td>        
</tr>
<tr>
<td><?php _e('Example', 'casino-games' ); ?>:-[cgshortcode id='6']</td>
</tr>
<tr>
<td>
<a href="<?php echo esc_url('https://www.flytonic.com/free-casino-game-plugin-documentation/'); ?>" target="_blank"><input type="button" value="<?php _e('Click Here to check User Manual/Documentation of the plugin', 'casino-games' ); ?>" class="button button-primary button-large req_btn" /></a>
</td>        
</tr>

<tr>
<td>
<a href="<?php echo esc_url('https://www.flytonic.com/product/casino-review-plugin/'); ?>" target="_blank"><input type="button" value="<?php _e('Upgrade to Pro', 'sports-betting-odds' ); ?>" class="button button-primary button-large req_btn" /></a>
</td>
</tr>

</table>
<?php
}
?>