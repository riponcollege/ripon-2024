<?php

$menu = get_sub_field( 'nav-menu' );

wp_nav_menu(array(
    'menu' => $menu,
    'menu_class' => 'page-menu'
));

