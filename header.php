<!DOCTYPE html>
<?php 
$menu_name = 'headermenu'; //menu slug
$menu = wp_get_nav_menu_object( $menu_name );
$menuitems = wp_get_nav_menu_items( $menu->term_id, array( 'order' => 'DESC' ) );
?>

<head>
    <title>Wordpress Exo</title>
    <?php wp_head(); ?>
</head>

<body>
<header class="header">
    <?php wp_nav_menu(array ('menu' => $menu_name, 'menu_class' => 'headerMenu ')); ?>
    <img class="ampoule" src="<?= get_template_directory_uri()?>/assets/images/ampoule.png" alt="header logo" />
</header>