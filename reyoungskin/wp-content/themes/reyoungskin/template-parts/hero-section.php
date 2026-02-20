<?php

/**
 * Template part for displaying hero section on front page
 *
 * @package ReyoungSkin
 */

// Get theme customizer options
$hero_image = get_theme_mod('reyoungskin_hero_image', 'https://cdn.jsdelivr.net/gh/khoale9098/reyoungskin@main/imgs/Hero%20banner%20image.jpeg');
$hero_logo = get_theme_mod('reyoungskin_hero_logo', 'https://cdn.jsdelivr.net/gh/khoale9098/reyoungskin@main/imgs/logo.png');
?>

<section class="w-full">
  <div class="flex flex-col lg:flex-row min-h-[600px] md:min-h-[700px] lg:min-h-[800px] mx-auto max-w-screen-2xl">
    <div class="w-full lg:w-1/2 min-h-[400px] lg:min-h-full bg-cover bg-center bg-no-repeat hero-image-animate"
      style="background-image: url('<?php echo esc_url($hero_image); ?>');" role="img"
      aria-label="<?php echo esc_attr(get_bloginfo('name')); ?> Treatment">
    </div>
    <div
      class="w-full lg:w-1/2 flex items-center justify-center px-6 md:px-12 lg:px-16 xl:px-20 py-12 md:py-16 lg:py-20 bg-white">
      <div class="w-full max-w-xl text-center">

        <!-- Logo -->
        <div class="mb-8 md:mb-10 w-32 h-32 md:w-40 md:h-40 lg:w-48 mx-auto lg:h-48 lg:mb-12 flex justify-center" data-anim="fade-up" data-anim-trigger="load" data-anim-delay="100">
          <img src="<?php echo esc_url($hero_logo); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?> Logo"
            class="w-full h-full object-contain">
        </div>

        <!-- Headline -->
        <h1 class="mb-6 md:mb-8 text-4xl md:text-5xl lg:text-7xl  !font-thin font-serif"
          style="color: rgb(148, 187, 156); font-kerning: none; text-decoration-line: none; text-decoration-thickness: initial; text-decoration-style: initial;"
          data-anim="fade-up" data-anim-trigger="load" data-anim-delay="200">
          <span class="block">Reyoung.</span>
          <span class="block">Renew.</span>
          <span class="block">Restore.</span>
        </h1>

        <!-- Subheadline -->
        <p class="mb-8 md:mb-10 lg:mb-12 text-base md:text-lg lg:text-3xl font-medium"
          data-anim="fade-up" data-anim-trigger="load" data-anim-delay="300">
          Strengthen your skin from<br class="hidden sm:block">
          within and enjoy a more<br class="hidden sm:block">
          youthful look wth Reyoung.
        </p>

        <!-- CTA Button -->
        <a href="https://www.fresha.com/a/beauty-bar-n-makeup-lash-n-brows-auckland-437-remuera-road-al4mar88/booking?menu=true&offerItems=sv%3A25356601&pId=758924&dppub=true&utm_content=link_in_bio&utm_medium=social&utm_source=ig&employeeId=2577179&cartId=4fa72077-b048-4326-8ab5-55611323aa81"
          target="_blank" rel="noopener noreferrer"
          class="btn-cta inline-block px-12 md:px-16 lg:px-20 !no-underline py-4 md:py-5 font-serif text-2xl md:text-3xl lg:text-4xl font-normal text-white rounded-full mb-8 "
          style="background: linear-gradient(90deg, #1F8E9A 0%, #9ACB7A 100%); letter-spacing: 0.1em; box-shadow: 0 8px 20px rgba(0,0,0,0.12);"
          data-anim="fade-up" data-anim-trigger="load" data-anim-delay="400"
          aria-label="Book your appointment now">
          BOOK NOW
        </a>

        <!-- Hotline -->
        <div class="flex flex-col items-center gap-2" data-anim="fade-up" data-anim-trigger="load" data-anim-delay="500" data-anim-duration="600">
          <a href="tel:0212315978" class="link-hover !no-underline flex items-center gap-3"
            aria-label="Call us at 021 231 5978">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
              class="flex-shrink-0">
              <path
                d="M20.01 15.38c-1.23 0-2.42-.2-3.53-.56-.35-.12-.74-.03-1.01.24l-1.57 1.97c-2.83-1.35-5.48-3.9-6.89-6.83l1.95-1.66c.27-.28.35-.67.24-1.02-.37-1.11-.56-2.3-.56-3.53 0-.54-.45-.99-.99-.99H4.19C3.65 3 3 3.24 3 3.99 3 13.28 10.73 21 20.01 21c.71 0 .99-.63.99-1.18v-3.45c0-.54-.45-.99-.99-.99z"
                fill="currentColor" />
            </svg>
            <span class="text-xl md:text-3xl font-medium ">021 231 5978</span>
          </a>
          <span class="text-sm md:text-xl italic">Call for faster service</span>
        </div>

      </div>
    </div>

  </div>
</section>