<?php
/**
 * Search Form
 * @type {String}
 * 
 * @package Xcode
 * @author CodeGear Themes
 * 
 */
?>
<div id="search_wrapper" class="search-wrapper clearfix">
    <form role="search" method="get" class="search-form clearfix" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    	<label>
    		<span class="screen-reader-text"><?php _ex( 'Search for:', 'label', 'xcode' ); ?></span>
    		<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'xcode' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s"/>
    	</label>
    	<button type="submit" class="search-submit">
    		<span class="genericon-search"></span>
    	</button>
    </form>
</div>
