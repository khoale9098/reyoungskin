<?php
/**
 * Template Name: Pricing Page
 * Template Post Type: page
 * 
 * @package ReyoungSkin
 */

// Get hero image - use custom field if set, otherwise default
$hero_image = get_post_meta(get_the_ID(), 'pricing_hero_image', true);
if (empty($hero_image)) {
  $hero_image = 'https://cdn.jsdelivr.net/gh/khoale9098/reyoungskin@main/imgs/pricing.jpeg';
}

// Get logo - try custom logo first, then fallback to default
$custom_logo_id = get_theme_mod('custom_logo');
if ($custom_logo_id) {
  $logo_image = wp_get_attachment_image_src($custom_logo_id, 'full');
  $hero_logo = $logo_image ? $logo_image[0] : 'https://cdn.jsdelivr.net/gh/khoale9098/reyoungskin@main/imgs/logo.png';
} else {
  $hero_logo = 'https://cdn.jsdelivr.net/gh/khoale9098/reyoungskin@main/imgs/logo.png';
}

get_header();
?>

<main class="w-full">
  <?php
  // Check if page has Gutenberg blocks
  if (has_blocks() && !empty(get_the_content())) {
    // Use Gutenberg content
    while (have_posts()):
      the_post();
      ?>
      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="entry-content">
          <?php the_content(); ?>
        </div>
      </article>
      <?php
    endwhile;
  } else {
    // Fallback to default pricing hero section
    ?>
    <!-- Pricing Hero Section -->
    <section class="w-full" style="background-color: rgb(237, 247, 219);">
      <div class="flex flex-col lg:flex-row min-h-[400px] md:min-h-[500px] lg:min-h-[600px] mx-auto max-w-screen-2xl">
        <!-- Hero Image -->
        <div class="w-full lg:w-1/2 min-h-[300px] md:min-h-[400px] lg:min-h-full bg-cover bg-center bg-no-repeat hero-image-animate"
          style="background-image: url('<?php echo esc_url($hero_image); ?>');" role="img"
          aria-label="<?php echo esc_attr(get_bloginfo('name')); ?> Pricing">
        </div>

        <!-- Hero Content -->
        <div
          class="w-full lg:w-1/2 flex items-center justify-center px-4 sm:px-6 md:px-8 lg:px-12 xl:px-16 py-8 md:py-12 lg:py-16">
          <div class="w-full max-w-xl text-center">

            <!-- Logo -->
            <div class="mb-6 md:mb-8 lg:mb-10 flex justify-center" data-anim="fade-up" data-anim-trigger="load" data-anim-delay="100">
              <img src="<?php echo esc_url($hero_logo); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?> Logo"
                class="w-24 h-24 sm:w-28 sm:h-28 md:w-32 md:h-32 lg:w-40 lg:h-40 object-contain" loading="eager">
            </div>

            <h2
              class="mb-6 md:mb-8 font-serif lg:mb-10 text-lg sm:text-xl md:text-2xl lg:text-4xl leading-relaxed font-light"
              data-anim="fade-up" data-anim-trigger="load" data-anim-delay="200">
              Service Details
              <br class="hidden sm:block">
              & Pricing
            </h2>

            <!-- CTA Button -->
            <a href="https://www.fresha.com/a/beauty-bar-n-makeup-lash-n-brows-auckland-437-remuera-road-al4mar88/booking?menu=true&offerItems=sv%3A25356601&pId=758924&dppub=true&utm_content=link_in_bio&utm_medium=social&utm_source=ig&employeeId=2577179&cartId=4fa72077-b048-4326-8ab5-55611323aa81"
              target="_blank" rel="noopener noreferrer"
              class="btn-cta inline-block px-8 sm:px-10 md:px-12 lg:px-16 py-3 sm:py-3.5 md:py-4 lg:py-5 font-serif text-xl sm:text-2xl md:text-3xl !no-underline font-normal text-white rounded-full mb-6 md:mb-8 lg:mb-10"
              style="background: linear-gradient(90deg, #1F8E9A 0%, #9ACB7A 100%); letter-spacing: 0.1em; box-shadow: 0 8px 20px rgba(0,0,0,0.12);"
              data-anim="fade-up" data-anim-trigger="load" data-anim-delay="300"
              aria-label="Book your appointment now">
              BOOK NOW
            </a>

            <!-- Hotline -->
            <div class="flex flex-col items-center gap-1.5 sm:gap-2" data-anim="fade-up" data-anim-trigger="load" data-anim-delay="400" data-anim-duration="600">
              <a href="tel:0212315978"
                class="link-hover flex items-center gap-2 sm:gap-3"
                style="color: #5F8F8B;" aria-label="Call us at 021 231 5978">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                  class="flex-shrink-0 sm:w-6 sm:h-6">
                  <path
                    d="M20.01 15.38c-1.23 0-2.42-.2-3.53-.56-.35-.12-.74-.03-1.01.24l-1.57 1.97c-2.83-1.35-5.48-3.9-6.89-6.83l1.95-1.66c.27-.28.35-.67.24-1.02-.37-1.11-.56-2.3-.56-3.53 0-.54-.45-.99-.99-.99H4.19C3.65 3 3 3.24 3 3.99 3 13.28 10.73 21 20.01 21c.71 0 .99-.63.99-1.18v-3.45c0-.54-.45-.99-.99-.99z"
                    fill="currentColor" />
                </svg>
                <span class="text-lg sm:text-xl md:text-2xl font-medium">021 231 5978</span>
              </a>
              <span class="text-xs sm:text-sm md:text-base" style="color: #5F8F8B;">Call for faster service</span>
            </div>

          </div>
        </div>

      </div>
    </section>

    <!-- Pricing Menu Section -->
    <?php get_template_part('template-parts/pricing-menu'); ?>
    <?php get_template_part('template-parts/footer-contact-section'); ?>
    <?php
  }
  ?>
</main>

<?php
get_footer();
?>