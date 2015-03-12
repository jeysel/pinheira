<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!--<title><?php if (is_home () ) { bloginfo('name'); } elseif (is_category() || is_tag()) { single_cat_title(); echo ' &bull; ' ; bloginfo('name'); } elseif (is_single() || is_page()) { single_post_title(); } else { wp_title('',true); } ?></title>-->
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<link rel="shortcut icon" href="<?php bloginfo('stylesheet_directory'); ?>/favicon.ico" />
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<div id="site">
<div id="wrap">
<!-- Colocar feeds de redes sociais -->
<div id="toplist">
    <div class="feed"><a href="<?php bloginfo('rss2_url'); ?>" title="RSS">RSS</a></div>
</div>
<!-- Fim feeds de redes sociais -->



<div id="header">
	<h1>
    <p> <a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>" name="top"><?php bloginfo('name'); ?></a> </p>
    <span><?php bloginfo('description'); ?> </span>
  </h1>


<!-- 
================================================================================================================================
                                                    INICIO DA NAV-BAR 
================================================================================================================================
-->

<nav class="navbar navbar-inverse " role="navigation">
	  <!-- Monta Tela Inicio -->
  	<div class="container-fluid">
   	    <div class="navbar-header">
      		  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        		  <span class="sr-only">Toggle navigation</span>
        		  <span class="icon-bar"></span>
        		  <span class="icon-bar"></span>
        		  <span class="icon-bar"></span>
      		  </button>
      			<a class="navbar-brand" href="<?php echo home_url(); ?>">
                	<?php bloginfo('name'); ?>

      			</a>    
   	    </div>
    <!-- Monta Tela Fim --> 
    <!-- Monta Nav-Bar Inicio -->
        <?php
            wp_nav_menu( array(
                'menu'              => 'primary',
                'theme_location'    => 'primary',
                'depth'             => 2,
                'container'         => 'div',
                'container_class'   => 'collapse navbar-collapse',
        		    'container_id'      => 'bs-example-navbar-collapse-1',
                'menu_class'        => 'nav navbar-nav',
                'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                'walker'            => new wp_bootstrap_navwalker())
            );
        ?>
    <!-- Monta Nav-Bar Fim -->
    
    </div>
</nav>


<!-- 
================================================================================================================================
   													                        FIM DA NAV-BAR 
================================================================================================================================
-->
</div>



<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Submenu') ) : ?><?php endif; ?>
<div id="blog">