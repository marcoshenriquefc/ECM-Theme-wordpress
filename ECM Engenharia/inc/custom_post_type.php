<?php 
// /*
// Plugin Name: Custom Post Types
// Author: Italo Gabriel(Eviltsuma)
// */
    function cpt() {
        $post_types = array(
            array(
                'title'    => 'Lancamento',
                'slug'     => 'lancamentos',
                'taxonomy' => true,
                'icon'     => 'dashicons-book-alt',
                'cap'      => 'Lancamento',
                'show'     => true,
                'position' => 6 ,
            ),  
            array(
                'title'    => 'Empreendimento',
                'slug'     => 'empreendimentos',
                'taxonomy' => true,
                'icon'     => 'dashicons-book-alt',
                'cap'      => 'Empreendimento',
                'show'     => true,
                'position' => 7 ,
            ),                                    
       );


        foreach ($post_types as $key => $value) {
            
            if($value['taxonomy']){
                register_taxonomy( $value['slug'].'_categories', array( $value['slug'] ), array(
                    'hierarchical'      => true, // Set this to 'false' for non-hierarchical taxonomy (like tags)
                    'labels'            => array(
                        'name'              => _x( 'Categorias de '.$value['title'], 'taxonomy general name' ),
                        'singular_name'     => _x( 'Categoria de '.$value['title'], 'taxonomy singular name' ),
                        'search_items'      => __( 'Buscar Categorias de '.$value['title'] ),
                        'all_items'         => __( 'Todas as Categorias de '.$value['title'] ),
                        'parent_item'       => __( 'Categoria Pai' ),
                        'parent_item_colon' => __( 'Categoria Pai:' ),
                        'edit_item'         => __( 'Editar categoria' ),
                        'update_item'       => __( 'Atualizar categoria' ),
                        'add_new_item'      => __( 'Adicionar nova categoria' ),
                        'new_item_name'     => __( 'Novo nome' ),
                        'menu_name'         => __( 'Categorias de '.$value['title'] ),
                    ),
                    'show_ui'           => true,
                    'show_admin_column' => true,
                    'query_var'         => true,
                    'show_in_rest'      => true,
                    'rewrite'           => array( 'slug' => $value['slug'].'_categories' ),
                ));                                     
            }
            
            register_post_type($value['slug'], array(
                'labels' => array(
                    'name' => _x($value['title'], 'post type general name'),
                    'singular_name' => _x($value['title'], 'post type singular name'),
                    'add_new' => _x('Novo', $value['title']),
                    'add_new_item' => __('Novo '.$value['title']),
                    'edit_item' => __('Editar '.$value['title']),
                    'new_item' => __('Novo '.$value['title']),
                    'view_item' => __('Ver '.$value['title']),
                    'search_items' => __('Buscar '.$value['title']),
                    'not_found' =>  __('Nada encontrado'),
                    'not_found_in_trash' => __('Nada encontrado'),
                    'parent_item_colon' => ''
                ),
                
                'menu_icon' => $value['icon'],
                'exclude_from_search' => false, // the important line here!
                'public' => true,
                'publicly_queryable' => true,
                'has_archive' => true,
                'show_ui' => $value['show'],
                'show_in_menu'        => true,
                'show_in_admin_bar'   => true,
                'show_in_nav_menus' => true,
                'query_var' => true,
                'rewrite' => true,
                'hierarchical' => false,
                'show_in_rest' => true,
                'menu_position' => $value['position'],
                'supports' => array('title', 'editor', 'excerpt', 'thumbnail'),
                'hierarchical'        => false,
            ));
        }
    }     


if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Home', //change to the client name
		'menu_title'	=> 'Home', //change to the client name
		'menu_slug' 	=> 'home', //change to the client name without space and special chars
		'capability'	=> 'edit_posts',
		'redirect'		=> true,
		'position'      => 2,
	));
    
	
}

cpt();