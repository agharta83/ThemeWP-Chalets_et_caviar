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

    <section class="hero">
      <div class="hero__bcg-opacity">
        <div class="hero__title-wrapper">
          <h1 class="hero__title">Chalets et caviar</h1>
          <h3 class="hero__description">Agence immobilière de luxe à Courchevel</h3>
        </div>
        <div class="hero__slider-wrapper">
          <div class="hero__slide slide1">
            <p>Devenez propriétaire dans les Alpes</p>
          </div>
          <div class="hero__slide slide2">
             <p>Trouvez un chalet en location pour vos vacances</p>
          </div>
          <div class="hero__slide slide3">
             <p>Découvrez le style de vie alpin, nous vous accompagnons dans votre projet</p>
          </div>
        </div>         
        <div class="hero__arrow-wrapper">
          <a href="#"><i class="hero__arrow fa fa-arrow-down" aria-hidden="true"></i></a>
        </div>
      </div>
    </section>

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

