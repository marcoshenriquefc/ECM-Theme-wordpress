<?php 
function menu () {
    // register_nav_menu('ECM-menu',__( 'ECM menu' ));
    register_nav_menus(
        array(

            'header' => __( 'Header' ),
            'footer' => __( 'Footer' ),

        ));
}

add_action( 'init', 'menu' );

?>