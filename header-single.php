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

  <?php get_template_part( 'template-parts/content/single', 'hero' ); ?>

    <header class="header">
      <div class="header__logo">
        <a href="#">Chalets et caviar</a>
      <div class="header__logo-baseline">Agence immobilière à Courchevel</div>
      </div>
      <nav class="main-nav">
        <a href="<?php echo home_url('/'); ?>" class="main-nav__link">Accueil</a>
        <a href="#ventes" class="main-nav__link">Ventes</a>
        <a href="#location" class="main-nav__link">Locations</a>
        <a href="#contact" class="main-nav__link">Contact</a>
      </nav>
    </header>

