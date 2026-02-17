<?php
/**
 * Template part for displaying "We Care About You" section
 *
 * @package ReyoungSkin
 */

// Get image from theme customizer
$about_image = get_theme_mod('reyoungskin_about_image', 'https://cdn.jsdelivr.net/gh/khoale9098/reyoungskin@main/imgs/about.jpg
');
?>

<!-- About Section -->
<section class="w-full py-20 md:py-24 lg:py-28 xl:py-32" style="background-color: #DDE5CF;">
  <div class="max-w-screen-2xl mx-auto px-6 md:px-8 lg:px-12">
    <div class="flex flex-col lg:flex-row items-center gap-12 md:gap-16 lg:gap-20 xl:gap-24">
      <div class="w-full lg:w-1/2 text-center lg:text-left">
        <h2 class="text-center mb-12 md:mb-16 lg:mb-20 font-serif text-5xl md:text-6xl lg:text-7xl font-light tracking-wider">
          We care<br>
          about you
        </h2>
        <p class="mb-6 md:mb-8 text-xl md:text-2xl lg:text-3xl italic font-light leading-relaxed">
          Youthful skin isn't about looking younger overnight.
        </p>
        <p class="text-base md:text-lg lg:text-xl leading-relaxed max-w-2xl mx-auto lg:mx-0">
          It's about nurturing your skin with treatments that restore its natural balance,
          enhance its radiance, and protect its future. At Reyoung Skin, we combine
          advanced skincare technology with gentle, personalized care to help you achieve
          lasting results that reflect your inner vitality.
        </p>

      </div>

      <div class="w-full lg:w-1/2 flex justify-center lg:justify-end">
        <div class="w-full max-w-md md:max-w-lg lg:max-w-xl">
          <img src="<?php echo esc_url($about_image); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?> Care"
            class="w-full h-auto rounded-t-full shadow-lg object-cover aspect-square">
        </div>
      </div>

    </div>

  </div>
</section>