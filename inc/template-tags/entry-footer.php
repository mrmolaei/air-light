<?php
/**
 * Entry footer
 *
 * Show categories, tags, comment and edit links after post.
 *
 * @Author:		Roni Laukkarinen
 * @Date:   		2021-04-22 08:06:03
 * @Last Modified by:   Roni Laukkarinen
 * @Last Modified time: 2023-01-06 20:43:03
 *
 * @package air-light
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 */

namespace Air_Light;

function entry_footer() {
  if (!is_single())
    return;

  echo '<div class="entry-footer">';

  if ( 'post' === get_post_type() ) :
    if ( has_category() ) : ?>
      <div class="d-flex gap-1 mb-2">
    <small><?php _e('Categories'); ?>:</small>
      <ul class="nav d-flex gap-1">
        <?php $categories = wp_get_post_categories( get_the_id(), [ 'fields' => 'all' ] );
          if ( ! empty( $categories ) ) {
            foreach ( $categories as $category ) {
              echo '<li><a class="badge text-bg-gray text-decoration-none" href="' . esc_url( get_category_link( $category ) ) . '">' . esc_html( $category->name ) . '</a></li>';
            }
        } ?>
      </ul>
      </div>
    <?php	endif;

    $tags_list = get_the_tag_list( '', esc_attr_x( ', ', 'list item separator', 'air-light' ) );
    $tags_list = str_replace('<a ', '<a class="badge text-bg-gray text-decoration-none" ', $tags_list);
    $tags_list = str_replace(', ', '', $tags_list);
    if ( $tags_list ) {
      echo '<div class="d-flex gap-1">';
      echo '<small>' . __('Tags') . ':</small>';
      echo '<div class="nav d-flex gap-1">' . $tags_list .'</div>';
      echo '</div>';
    }
  endif;

  echo '</div>';
}
