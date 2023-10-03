<?php
/**
 * The template for displaying all single posts
 *
 * @Date:   2019-10-15 12:30:02
 * @Last Modified by:   Roni Laukkarinen
 * @Last Modified time: 2022-09-07 11:57:39
 *
 * @package air-light
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 */

namespace Air_Light;

the_post();
get_header(); ?>

  <main class="site-main">
    <div class="container">
      <div class="col-9 mx-auto">
        <section class="block block-single">
          <article class="article-content">
            <?php

            get_template_part('template-parts/posts/content-single');

            // If comments are open or we have at least one comment, load up the comment template.
            if (comments_open() || get_comments_number()) {
              comments_template();
            } ?>
          </article>
        </section>
      </div>
    </div>
  </main>

  <?php get_footer();
