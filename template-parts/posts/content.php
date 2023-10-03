<article id="post-<?php use function Air_Light\entry_footer;

the_ID(); ?>" <?php post_class('row mb-8'); ?>>
  <div class="col-4">
    <div class="pe-1">
      <a href="<?php echo esc_url(get_the_permalink()); ?>" aria-label="Read More <?php the_title(); ?>" title="Read More <?php the_title(); ?>">
      <?php the_post_thumbnail('medium', array('loading' => 'eager','class' => "w-100 h-auto")); ?>
      </a>
    </div>
  </div>
  <div class="col-8">
    <div class="ps-1">
      <h2>
        <a class="text-decoration-none link-dark link-opacity-50-hover" href="<?php echo esc_url(get_the_permalink()); ?>">
          <?php the_title(); ?>
        </a>
      </h2>

      <p>
        <time datetime="<?php the_time('c'); ?>">
          <?php echo get_the_date(get_option('date_format')); ?>
        </time>
      </p>

      <div class="content link-gray-light">
        <?php
        the_excerpt();
        entry_footer();
        ?>
      </div>
    </div>
  </div>

</article>
