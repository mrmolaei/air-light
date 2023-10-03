<article id="post-<?php use function Air_Light\entry_footer;

the_ID(); ?>" <?php post_class('mb-8'); ?>>
  <div class="col-12">
    <div class="ps-1">
      <h1>
          <?php the_title(); ?>
      </h1>

      <p>
        <time class="text-gray" datetime="<?php the_time('c'); ?>">
          <?php echo get_the_date(get_option('date_format')); ?>
        </time>
      </p>

      <div class="content link-gray-light">
        <?php
        the_content();
        entry_footer();
        ?>
      </div>
    </div>
  </div>

</article>
