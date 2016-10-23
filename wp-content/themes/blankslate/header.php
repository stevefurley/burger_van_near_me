<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <meta name="viewport" content="width=device-width" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/4.2.0/normalize.min.css" type="text/css" />
  <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>" />
  <link href="https://fonts.googleapis.com/css?family=Raleway|Unkempt" rel="stylesheet">
  <script type="text/javascript" src="/scripts/jquery-1.12.4.min.js"></script>
  <script type="text/javascript" src="/scripts/scripts.js"></script>
  <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
  <div id="wrapper" class="hfeed">
    <header id="header" role="banner">
      <div class='header-inner clearfix'>
        <nav id="menu" role="navigation">
          <?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
        </nav>
        
        <section id="branding">
          
          <div class="logo"><img width="140" src="<?php print get_template_directory_uri(); ?>/images/burger-van.svg" alt="Logo" /></div>
          
          <div class="brand">
            <div id="site-title">
              <?php if ( is_front_page() || is_home() || is_front_page() && is_home() ) { echo '<h1>'; } ?>
              <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_html( get_bloginfo( 'name' ) ); ?>" rel="home">
                <?php echo esc_html( get_bloginfo( 'name' ) ); ?>
              </a>
              <?php if ( is_front_page() || is_home() || is_front_page() && is_home() ) { echo '</h1>'; } ?>
            </div>
            
            <div id="site-description">
              <h2>Find burger, hotdog & other food vans near you!</h2>
            </div>
          </div>
        </section>
      </div>

    </header>
    
    <div id="container">