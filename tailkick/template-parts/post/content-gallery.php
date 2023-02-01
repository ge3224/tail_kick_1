<?php

/**
 * Template part for displaying gallery posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage TailKick
 * @since TailKick 0.1
 * @version 0.1
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('mb-8'); ?>>
  <?php
  if (is_sticky() && is_home()) {
    echo tailkick_get_svg(array('icon' => 'thumb-tack'));
  }
  ?>
  <header class="entry-header">
    <?php
    if ('post' === get_post_type()) {
      echo '<div class="flex items-center entry-meta">';
      if (is_single()) {
        tailkick_posted_on();
      } else {
        echo '<div class="rtl:px-1">';
        echo tailkick_time_link();
        echo '</div>';
        echo '<div class="ml-auto mr-0 rtl:ml-0 rtl:mr-auto">';
        tailkick_edit_link();
        echo '</div>';
      }
      echo '</div>';
    }


    if (is_single()) {
      the_title('<h1 class="font-bold text-3xl entry-title">', '</h1>');
    } elseif (is_front_page() && is_home()) {
      the_title('<h3 class="font-bold text-2xl entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h3>');
    } else {
      the_title('<h2 class="pt-3 pb-0 font-bold text-black text-2xl entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
    }
    ?>
  </header>

  <div class="mb-4 border-b pb-4 entry-content">

    <?php if ('' !== get_the_post_thumbnail() && !is_single() && !get_post_gallery()) : ?>
      <div class="post-thumbnail">
        <a href="<?php the_permalink(); ?>">
          <?php the_post_thumbnail('tailkick-featured-image'); ?>
        </a>
      </div>
    <?php endif; ?>

    <?php
    if (!is_single()) {

      // If not a single post, highlight the gallery.
      if (get_post_gallery()) {
        echo '<div class="entry-gallery">';
        echo the_content();
        echo '</div>';
      }
    }

    if (is_single() || !get_post_gallery()) {

      $before = '<span class="underline text-sm text-teal-600 visited:text-teal-600 hover:text-teal-500 active:text-teal-400">';
      the_content(
        sprintf(
          /* translators: %s: Post title. Only visible to screen readers. */
          $before . 'Continue Reading</span><span class="' . sr_only_classes(array('screen-reader-text')) . '">' . esc_html__('%s', 'tailkick') . '</span>',
          get_the_title()
        )
      );

      wp_link_pages(
        array(
          'before'      => '<div class="page-links">' . __('Pages:', 'tailkick'),
          'after'       => '</div>',
          'link_before' => '<span class="page-number">',
          'link_after'  => '</span>',
        )
      );
    }
    ?>

  </div>

  <?php
  if (is_single()) {
    tailkick_entry_footer();
  }
  ?>

</article>
