<?php
function menu_arrayConvert($menu_name) {
    // Obtém os itens do menu
    $menu_items = wp_get_nav_menu_items($menu_name);

    // Inicializa um array vazio para armazenar os itens formatados
    $formatted_menu = array();

    // Verifica se existem itens no menu
    if ($menu_items) {
        foreach ($menu_items as $item) {
            // Adiciona o item formatado ao array
            $formatted_menu[] = array(
                'label' => $item->title,
                'link' => $item->url,
            );
        }
    }

    // Retorna o array formatado
    return $formatted_menu;
}
