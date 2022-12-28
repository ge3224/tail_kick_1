<?php
/**
 * The front page template file
 *
 * If the user has selected a static page for their homepage, this is what will appear. 
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage TailKick
 * @since TailKick 0.1
 * @version 0.1
 */
?>

<!DOCTYPE html>
<html class="h-full" <?php language_attributes(); ?>>
<?php get_header(); ?>

<body <?php body_class('min-h-full flex flex-col'); ?>>
  <header>
    <?php get_template_part('nav_primary', get_post_format()); ?>
  </header>
    <section
      id="hero"
      style="background:url('<?php echo get_theme_mod('hero_home_image', get_bloginfo('template_url').'/images/tailkick-hero-home-wide.jpg'); ?>') no-repeat <?php echo get_theme_mod('hero_home_image_position_x', '35%'); ?> <?php echo get_theme_mod('hero_home_image_position_y', 'center'); ?>; background-size: cover;"
      class="bg-gray-200 lg:h-2/3 xl:h-[<?php echo get_theme_mod('home_hero_height', '48.5rem'); ?>] w-full"
    >
    <div class="w-full h-[767px] max-w-6xl mx-auto flex flex-col justify-center items-start">
      <div class="w-1/5 ml-auto mr-0">
        <h1 class="text-6xl font-bold"><?php echo get_theme_mod('hero_home_heading', 'Buy. Sell. Discover.'); ?></h1>
        <p class="mt-3"><?php echo get_theme_mod('hero_home_text', 'Interdum et malesuada fames ac ante ipsum primis in faucibus. Vestibulum luctus gravida neque, et fringilla erat aliquet id.'); ?></p>
        <a
          class="mt-3 px-4 py-2 font-bold bg-teal-300 border border-black shadow-[5px_5px_0_0] shadow-teal-700/30"
          style="background-color: <?php echo get_theme_mod('global_color_primary'); ?>;"
          type="button"
        ><?php echo get_theme_mod('btn_text', 'Download'); ?></a>
      </div>
    </div>
  </section>
  <main>
    <?php if (get_theme_mod('showcase_panel_include') == "true") : ?>
    <?php get_template_part('showcase-panel', get_post_format()); ?>
    <?php endif; ?>
    <?php get_template_part('feat-1', get_post_format()); ?>
    <?php get_template_part('feat-2', get_post_format()); ?>
    <?php get_template_part('feat-3', get_post_format()); ?>
    <?php get_template_part('testimonials', get_post_format()); ?>
    <?php get_template_part('banner-1', get_post_format()); ?>
  </main>
  <footer>
    <?php get_footer(); ?>
  </footer>
</body>

</html>
