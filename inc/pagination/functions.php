<?php

function bootstrap_pagination( $echo = true ) {
  global $wp_query;

  $big = 999999999; // need an unlikely integer

  $pages = paginate_links( array(
      'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
      'format' => '?paged=%#%',
      'current' => max( 1, get_query_var('paged') ),
      'total' => $wp_query->max_num_pages,
      'type'  => 'array',
      'prev_next'   => true,
      'prev_text'    => __('Previous'),
      'next_text'    => __('Next'),
    )
  );

  if( is_array( $pages ) ) {
    $paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');

    $pagination = '<ul class="pagination">';

    foreach ( $pages as $page ) {
      $page = str_replace('<a ', '<a class="page-link"', $page);
      $page = str_replace('<span ', '<span class="page-link active"', $page);
      $pagination .= "<li class='page-item'>$page</li>";
    }

    $pagination .= '</ul>';

    if ( $echo ) {
      echo $pagination;
    } else {
      return $pagination;
    }
  }
}
