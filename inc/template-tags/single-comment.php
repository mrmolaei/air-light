<?php
/**
 * Single comment callback
 *
 * Callback for a single comment.
 *
 * @Author:		Roni Laukkarinen
 * @Date:   		2022-06-30 16:24:47
 * @Last Modified by:   Roni Laukkarinen
 * @Last Modified time: 2022-08-25 14:16:38
 *
 * @package air-light
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 */

namespace Air_Light;

function single_comment( $comment, $args, $depth ) { ?>
  <li id="li-comment-<?php comment_ID(); ?>" <?php comment_class('py-4 border-bottom'); ?>>
    <div id="comment-<?php comment_ID(); ?>">
      <div class="d-flex gap-2 align-items-center">
        <?php echo get_avatar( $comment, '62' ); ?>
        <div class="">
        <div class="comment-author"><?php echo get_comment_author_link(); ?></div>
          <a class="text-decoration-none" href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
            <time class="small text-gray" datetime="<?php echo esc_attr( get_comment_date( 'c' ) ); ?>"><?php printf( esc_attr( __( '%1$s at %2$s', 'air-light' ) ), esc_attr( get_comment_date() ), esc_attr( get_comment_time() ) ); ?></time>
          </a>
        </div>
      </div>
      <div class="ps-8 mt-2">
      <?php if ( '0' === $comment->comment_approved ) : ?>
        <p><em><?php esc_html_e( 'Your comment is awaiting approval.', 'air-light' ); ?></em></p>
      <?php endif; ?>

      <?php comment_text();

      comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) );
      edit_comment_link( __( '&mdash; Edit', 'air-light' ), ' ', '' );
      ?>
      </div>
    </div>
  </li>
<?php }
