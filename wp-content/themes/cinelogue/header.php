<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package cinelogue
 */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, user-scalable=no">
    <title><?php wp_title( '|', true, 'right' ); ?>Cinelogue</title>
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url');?>">
    <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.png" />
    <?php wp_head(); ?>
    <script src="//use.typekit.net/bce2hnh.js"></script>
    <script>try{Typekit.load({ async: true });}catch(e){}</script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
    <script src="http://prod3.agileticketing.net/websales/agile_widget.ashx?orgid=2553&epgid=292&" type="text/javascript"></script>
  </head>

  <body>
    
    <header class="global-header push-menu-right">
      
      <div class="header-content">

        <a href="#" class="logo">Cinelogue</a>

        <?php
          $defaults = array(
            'theme_location'  => '',
            'menu'            => 'main',
            'container'       => 'nav',
            'container_class' => 'nav-main',
            'menu_class'      => '',
            'echo'            => true,
            'fallback_cb'     => 'wp_page_menu',
            'before'          => '',
            'after'           => '',
            'link_before'     => '',
            'link_after'      => '',
            'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
            'depth'           => 0,
            'walker'          => ''
          );

          wp_nav_menu( $defaults );

          ?>
      
      </div>
      
    </header>

    <button type="button" role="button" class="lines-button toggle-push-right"><span class="lines"></span></button>

    <main>