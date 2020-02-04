<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package mytheme
 */
?>

<?php

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset=<?php bloginfo('charset'); ?>>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
  <div class="wrapper">   

  <?php get_template_part( 'template-parts/content/frontpage', 'hero' ); ?>

    <header class="header">
      <div class="header__logo">
        <a href="#">Chalets et caviar</a>
      <div class="header__logo-baseline">Agence immobilière à Courchevel</div>
      </div>
      <?php
      ?>

      <nav class="main-nav">
        <div class="menu-toggle">
          
            <a href="" class="main-nav__link menu-burger"><i class="fa fa-bars hamburger" aria-hidden="true"></i></a>
            <ul class="mobile">
              <li><a href="<?php echo home_url('/'); ?>" class="main-nav__link">Accueil</a></li>
              <li><a href="<?php echo get_term_link($term = 'vente', $taxonomy = 'type_annonce'); ?>" class="main-nav__link">Ventes</a></li>
              <li><a href="<?php echo get_term_link($term = 'location', $taxonomy = 'type_annonce'); ?>" class="main-nav__link">Locations</a></li>
              <li><a href="#contact" class="main-nav__link">Contact</a></li>
            </ul>

        </div>
        <ul class="desktop">
          <li><a href="<?php echo home_url('/'); ?>" class="main-nav__link">Accueil</a></li>
          <li><a href="<?php echo get_term_link($term = 'vente', $taxonomy = 'type_annonce'); ?>" class="main-nav__link">Ventes</a></li>
          <li><a href="<?php echo get_term_link($term = 'location', $taxonomy = 'type_annonce'); ?>" class="main-nav__link">Locations</a></li>
          <li><a href="#contact" class="main-nav__link">Contact</a></li>
        </ul>
      </nav>
      
      
    </header>

