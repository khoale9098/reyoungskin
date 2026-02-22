<?php

/**
 * Results Gallery Teaser Section
 * 
 * @package ReyoungSkin
 */

// Sample images data - replace with ACF fields or custom fields
$images = array(
  'before_after_mini_1' => 'https://cdn.jsdelivr.net/gh/khoale9098/reyoungskin@main/imgs/ba1.jpg',
  'before_after_mini_2' => 'https://cdn.jsdelivr.net/gh/khoale9098/reyoungskin@main/imgs/ba4.jpg',
  'before_after_horizontal' => 'https://cdn.jsdelivr.net/gh/khoale9098/reyoungskin@main/imgs/ba2.jpg',
  'portrait_large' => 'https://cdn.jsdelivr.net/gh/khoale9098/reyoungskin@main/imgs/ba5.jpg',
  'landscape_large' => 'https://cdn.jsdelivr.net/gh/khoale9098/reyoungskin@main/imgs/ba3.jpg',
);

// Allow override via custom fields
$section_title = get_post_meta(get_the_ID(), 'results_gallery_title', true);
if (empty($section_title)) {
  $section_title = 'Witness the great results';
}

$gallery_link = get_post_meta(get_the_ID(), 'results_gallery_link', true);
if (empty($gallery_link)) {
  $gallery_link = '/gallery';
}
?>

<!-- Results Gallery Teaser Section -->
<section class="w-full py-12 md:py-16 lg:py-20" style="background-color: #E8F5E9;">
  <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-screen-2xl">

    <!-- Section Title -->
    <h2 class="text-center mb-10 md:mb-14 lg:mb-16 text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-serif italic text-primary" style="letter-spacing: 0.02em;">
      <?php echo esc_html($section_title); ?>
    </h2>

    <!-- Gallery Grid (5 images + CTA like mockup) -->
    <div class="grid grid-cols-1 md:grid-cols-12 gap-6 items-start">

      <!-- 1) Top-left small -->
      <div class="md:col-span-3 md:row-start-1">
        <div class="w-full aspect-square overflow-hidden rounded-lg shadow-md" data-anim="fade-up" data-anim-delay="100">
          <img src="<?php echo esc_url($images['before_after_mini_1']); ?>"
            alt="Before After Result 1"
            class="w-full h-full object-cover hover:scale-105 transition-transform duration-300"
            loading="lazy">
        </div>
      </div>

      <!-- 2) Top-center wide -->
      <div class="md:col-span-6 md:row-start-1">
        <div class="w-full aspect-[16/9] overflow-hidden rounded-lg shadow-md" data-anim="fade-up" data-anim-delay="150">
          <img src="<?php echo esc_url($images['before_after_horizontal']); ?>"
            alt="Before After Result"
            class="w-full h-full object-cover hover:scale-105 transition-transform duration-300"
            loading="lazy">
        </div>
      </div>

      <!-- 3) Top-right tall portrait -->
      <div class="md:col-span-3 md:row-start-1">
        <div class="w-full aspect-[3/4] overflow-hidden rounded-lg shadow-md" data-anim="fade-up" data-anim-delay="200">
          <img src="<?php echo esc_url($images['portrait_large']); ?>"
            alt="Treatment Result"
            class="w-full h-full object-cover hover:scale-105 transition-transform duration-300"
            loading="lazy">
        </div>
      </div>

      <!-- 4) Bottom-left large landscape -->
      <div class="md:col-span-5 md:row-start-2">
        <div class="w-full aspect-square overflow-hidden rounded-lg shadow-md" data-anim="fade-up" data-anim-delay="250">
          <img src="<?php echo esc_url($images['landscape_large']); ?>"
            alt="Treatment Process"
            class="w-full h-full object-cover hover:scale-105 transition-transform duration-300"
            loading="lazy">
        </div>
      </div>

      <!-- 5) Bottom-center portrait (use mini_2 as the 5th image) -->
      <div class="md:col-span-3 md:row-start-2">
        <div class="w-full aspect-[3/4] overflow-hidden rounded-lg shadow-md" data-anim="fade-up" data-anim-delay="300">
          <img src="<?php echo esc_url($images['before_after_mini_2']); ?>"
            alt="Treatment Detail"
            class="w-full h-full object-cover hover:scale-105 transition-transform duration-300"
            loading="lazy">
        </div>
      </div>

      <!-- CTA (bottom-right) -->
      <!-- <div class="md:col-span-4 md:row-start-2 flex items-center justify-center md:justify-start">
        <a href="<?php echo esc_url($gallery_link); ?>"
          class="inline-flex items-center justify-center px-10 lg:px-12 py-5 text-xl lg:text-2xl font-medium text-white rounded-full transition-all duration-300 hover:shadow-lg hover:scale-105 focus:outline-none focus:ring-4 focus:ring-primary/30"
          style="background-color:#6B9B9E; letter-spacing:0.05em;"
          aria-label="View full gallery">
          SEE GALLERY
          <svg class="ml-3 w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
          </svg>
        </a>
      </div> -->

    </div>
  </div>
</section>