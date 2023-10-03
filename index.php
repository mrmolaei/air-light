<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @Date:   2019-10-15 12:30:02
 * @Last Modified by:   Roni Laukkarinen
 * @Last Modified time: 2022-02-08 17:03:18
 *
 * @package air-light
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 */

namespace Air_Light;

get_header(); ?>

<main class="site-main">

  <section class="block block-blog">
    <div class="container">
      <div class="col-9 mx-auto">
        <?php if ( have_posts() ) : ?>

          <?php while ( have_posts() ) :
            the_post();
            get_template_part('template-parts/posts/content');
          endwhile; ?>

          <?php bootstrap_pagination(); ?>

        <?php endif; ?>
      </div>
    </div>
  </section>

</main>

<?php get_footer();
