<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package honeyHome
 */

?>

<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
    <!-- mobile configuration -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

  	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> id="body">
  </head>
  <body >
    <!-- Preloader -->
    <div id="preloader">
      <div id="load">&nbsp;</div>
    </div>
    <!--Preloader End -->
    <!-- Navigation-->
    <?php if(is_front_page()){?>
    <nav class="main-nav dark transparent stick-fixed">
      <div class="full-wrapper relative clearfix">
        <!-- Logo-->
        <div class="nav-logo-wrap local-scroll">
          
          <?php if(current_theme_supports('custom-logo')){
                            
                    the_custom_logo();
                }
                 ?>
          
        </div>
        <div class="mobile-nav">
          <i class="fa fa-bars"></i>
        </div>
        <!-- Main Menu -->
        <div class="col-offset-3 col-md-9"> 
        <div class="inner-nav desktop-nav">
          <?php 
              wp_nav_menu(array(
                'theme_location' => 'menu-1',
                'menu_class' => 'clearlist',
                'walker' => new honeyhome_nav_walker,
              ));

           ?>
             
        </div>
        </div> 
        <!-- End Main Menu -->
      </div>
    </nav>
  <?php } ?>  
  <?php if(!is_front_page()){?>
    <nav class="main-nav dark stick-fixed">
      <div class="full-wrapper relative clearfix">
        <!-- Logo-->
        <div class="nav-logo-wrap local-scroll">
          <a href="index-2.html" class="logo">
          <img src="<?php echo get_template_directory_uri() ?>/assets/images/logo.png" alt="" />
          </a>
        </div>
        <div class="mobile-nav">
          <i class="fa fa-bars"></i>
        </div>
        <!-- Main Menu -->
        <div class="col-offset-3 col-md-9"> 
        <div class="inner-nav desktop-nav">
          <?php 
              wp_nav_menu(array(
                'theme_location' => 'menu-1',
                'menu_class' => 'clearlist',
              ));
           ?>
        </div>
        </div>
        <!-- End Main Menu -->
      </div>
    </nav>
  <?php } ?>
    <!-- End Navigation-->


