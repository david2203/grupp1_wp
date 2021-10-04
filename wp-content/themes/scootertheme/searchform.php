<?php
/**
 * Template för sökrutan
 
 */
?>
    <form method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
        
        <label for="s" class="screen-reader-text"><?php _e( 'Sök efter:', 'shape' ); ?></label>
        <input type="text" class="field" name="s" value="<?php echo esc_attr( get_search_query() ); ?>" id="s" placeholder="<?php esc_attr_e( '' ); ?>" />
        <input type="submit" class="submit" name="submit" id="searchsubmit" value="<?php esc_attr_e( 'Sök', 'shape' ); ?>" />
        
    </form>