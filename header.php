<?php
/**
 * Template for header
 *
 * <head> section and everything up until <div id="content">
 *
 * @Author: Roni Laukkarinen
 * @Date: 2020-05-11 13:17:32
 * @Last Modified by:   Tuomas Marttila
 * @Last Modified time: 2023-02-27 10:46:23
 *
 * @package air-light
 */

namespace Air_Light;

?>

<!doctype html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="http://gmpg.org/xfn/11">

  <?php wp_head(); ?>
</head>

<body <?php body_class( 'no-js' ); ?>>
  <a class="skip-link screen-reader-text js-trigger" href="#content"><?php echo esc_html( get_default_localization( 'Skip to content' ) ); ?></a>

  <?php wp_body_open(); ?>
  <div id="page" class="site">

    <header class="navbar">
      <div class="container">
      <?php get_template_part( 'template-parts/header/branding' ); ?>
      <?php get_template_part( 'template-parts/header/navigation' ); ?>
      </div>
    </header>

    <div class="site-content mt-lg-5 mt-2">
