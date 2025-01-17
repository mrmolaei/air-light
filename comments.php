<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @Date:   2019-10-15 12:30:02
 * @Last Modified by:   Timi Wahalahti
 * @Last Modified time: 2021-01-12 17:30:20
 *
 * @package air-light
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 */

namespace Air_Light;

 /*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
} ?>

<div id="comments" class="comments-area">

  <?php // You can start editing here -- including this comment!
  if ( have_comments() ) : ?>
    <h2 class="comments-title mb-4">
      <?php $comment_count = get_comments_number();
      if ( '1' === $comment_count ) {
        printf(
          /* translators: 1: title. */
          esc_html__( 'One thought on &ldquo;%1$s&rdquo;', 'air-light' ),
          '<span>' . wp_kses_post( get_the_title() ) . '</span>'
        );
      } else {
        printf(
          /* translators: 1: comment count number, 2: title. */
          esc_html( _nx( '%1$s comment %2$s', '%1$s comments %2$s', $comment_count, 'comments title', 'air-light' ) ),
          esc_html( number_format_i18n( $comment_count ) ),
          '<span class="screen-reader-text">on &ldquo;' . wp_kses_post( get_the_title() ) . '&rdquo;</span>'
        );
      }
      ?>
    </h2>

    <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
      <nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
        <h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'air-light' ); ?></h2>
        <div class="nav-links">

          <div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'air-light' ) ); ?></div>
          <div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'air-light' ) ); ?></div>

        </div><!-- .nav-links -->
      </nav><!-- #comment-nav-above -->
    <?php endif; // Check for comment navigation. ?>

    <ol class="list-unstyled">
      <?php
        wp_list_comments( array(
          'style'      => 'ol',
          'short_ping' => true,
          'callback'   => __NAMESPACE__ . '\single_comment',
        ) );
      ?>
    </ol><!-- .comment-list -->

    <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
      <nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
        <h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'air-light' ); ?></h2>
        <div class="nav-links">

          <div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'air-light' ) ); ?></div>
          <div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'air-light' ) ); ?></div>

        </div><!-- .nav-links -->
      </nav><!-- #comment-nav-below -->
    <?php endif; // Check for comment navigation.

  endif; // Check for have_comments().


  // If comments are closed and there are comments, let's leave a little note, shall we?
  if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
    <p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'air-light' ); ?></p>
  <?php endif; ?>

  <?php
  $comment_args = array(
    'class_submit' => 'btn btn-primary submit',
    'comment_field' => '<p class="comment-form-comment"><label for="comment">' . _x( 'Comment', 'noun' ) . '</label> <textarea id="comment" name="comment" class="form-control" cols="45" rows="8" aria-required="true" required="required"></textarea></p>',
    'fields' => array(
      'author' => '<p class="comment-form-author">' . '<label for="author">' . __( 'Name' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
        '<input id="author" name="author" class="form-control" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . $html_req . ' /></p>',
      'email'  => '<p class="comment-form-email"><label for="email">' . __( 'Email' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
        '<input id="email" name="email" class="form-control" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" aria-describedby="email-notes"' . $aria_req . $html_req  . ' /></p>',
      'url'    => '<p class="comment-form-url"><label for="url">' . __( 'Website' ) . '</label> ' .
        '<input id="url" name="url" class="form-control" ' . ( $html5 ? 'type="url"' : 'type="text"' ) . ' value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></p>',
    )
  );
  comment_form($comment_args);
  ?>


</div><!-- #comments -->
