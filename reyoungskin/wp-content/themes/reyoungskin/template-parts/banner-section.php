<?php
/**
 * Template part for displaying banner section with background image
 *
 * @package ReyoungSkin
 */

// Get background image from theme customizer
$banner_bg = get_theme_mod('reyoungskin_banner_bg', 'https://cdn.jsdelivr.net/gh/khoale9098/reyoungskin@main/imgs/Divider%20image.png');
?>

<section class="relative w-full min-h-[520px] md:min-h-[600px] lg:min-h-[640px] flex items-center overflow-hidden">
  <div class="absolute inset-0 z-0">
    <div class="absolute inset-0 bg-cover bg-center bg-no-repeat"
      style="background-image: url('<?php echo esc_url($banner_bg); ?>');">
    </div>
    <div class="absolute inset-0 bg-black opacity-[0.12]"></div>
  </div>

  <div class="relative z-10 w-full max-w-screen-2xl mx-auto px-6 md:px-10 lg:px-12">
    <div class="flex justify-center md:justify-end">
      <div class="max-w-lg md:max-w-xl lg:max-w-2xl text-center md:text-left">
        <h2 class="text-center mb-12 md:mb-16 lg:mb-20 font-serif text-5xl md:text-6xl lg:text-7xl font-light tracking-wider" style="color: #1F1F1F;">
          Designed to<br>
          help your skin<br>
          stay reyoung.
        </h2>

      </div>
    </div>

  </div>

</section>