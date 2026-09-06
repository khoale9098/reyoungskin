<?php

/**
 * Template part for displaying "We Care About You" section
 *
 * @package ReyoungSkin
 */

// Get image from theme customizer
$about_image = get_theme_mod('reyoungskin_about_image', 'https://cdn.jsdelivr.net/gh/khoale9098/reyoungskin@main/imgs/about.jpg');

// ACF Fields
$about_title = function_exists('get_field') && get_field('about_title') ? get_field('about_title') : 'We care<br>about you';
$about_subtitle = function_exists('get_field') && get_field('about_subtitle') ? get_field('about_subtitle') : 'Youthful skin isn’t about <br>looking younger overnight';
$about_content = function_exists('get_field') && get_field('about_content') ? get_field('about_content') : "It's about nurturing your skin with treatments that restore its natural balance,\nenhance its radiance, and protect its future. At Reyoung Skin, we combine\nadvanced skincare technology with gentle, personalized care to help you achieve\nlasting results that reflect your inner vitality.";
?>

<!-- About Section -->
<section class="w-full py-20 md:py-24 lg:py-28 xl:py-32" style="background-color: #DDE5CF;">
  <div class="max-w-screen-2xl mx-auto px-6 md:px-8 lg:px-12">
    <div class="flex flex-col lg:flex-row items-center gap-12 md:gap-16 lg:gap-20 xl:gap-24">
      <div class="w-full lg:w-1/2 text-left">
        <h2 class="text-left mb-8 font-serif text-5xl md:text-6xl lg:text-7xl font-light"
          data-anim="fade-down" data-anim-duration="800">
          <?php echo wp_kses_post($about_title); ?>
        </h2>
        <p class="mb-6 md:mb-8 text-2xl lg:text-4xl font-serif italic font-light"
          data-anim="fade-right" data-anim-delay="100" data-anim-duration="800">
          <?php echo wp_kses_post($about_subtitle); ?>
        </p>
        <p class="text-lg lg:text-xl leading-relaxed max-w-2xl mx-auto lg:mx-0"
          data-anim="fade-right" data-anim-delay="200" data-anim-duration="800">
          <?php echo wp_kses_post($about_content); ?>
        </p>

      </div>

      <div class="w-full lg:w-1/2 flex justify-center lg:justify-end" data-anim="fade-left" data-anim-duration="900" data-anim-delay="100">
        <div class="w-full max-w-md md:max-w-lg lg:max-w-xl img-hover">
          <img src="<?php echo esc_url($about_image); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?> Care"
            class="w-full h-auto rounded-t-full shadow-lg object-cover aspect-square">
        </div>
      </div>

    </div>

  </div>
</section>