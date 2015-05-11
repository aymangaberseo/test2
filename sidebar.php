                <div class="col-md-2">

                    <ul class="nav nav-pills nav-stacked">
                        <?php wp_list_categories('orderby=name&title_li='); ?>
                    </ul>
                                        <?php
if ( is_front_page() && is_home() ) {
  // Default homepage
        if ( is_active_sidebar( 'home_right_1' ) ) : 
            dynamic_sidebar( 'home_right_1' );
        endif;
    
} elseif ( is_single() ) {
  // static homepage
            if ( is_active_sidebar( 'home_left_1' ) ) : 
            dynamic_sidebar( 'home_left_1' );
        endif;
} else {
  //everything else
}
?>

                </div>