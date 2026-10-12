<?php

/**
 * Template part for displaying "Our Services" section
 *
 * @package ReyoungSkin
 */

// Section Title
$section_title = function_exists('get_field') && get_field('services_section_title')
    ? get_field('services_section_title')
    : get_theme_mod('reyoungskin_services_title', 'Our Services');

if (empty($section_title)) {
    $section_title = 'Our Services';
}

// Global Button Text & Link
$global_button_text = function_exists('get_field') && get_field('services_cta_text')
    ? get_field('services_cta_text')
    : get_theme_mod('reyoungskin_services_button_text', 'See Pricing');

if (empty($global_button_text)) {
    $global_button_text = 'See Pricing';
}

$global_button_link = function_exists('get_field') && get_field('services_cta_link')
    ? get_field('services_cta_link')
    : get_theme_mod('reyoungskin_services_button_link', home_url('/pricing'));

if (empty($global_button_link)) {
    $global_button_link = home_url('/pricing');
}

// Background Color
$bg_color = get_theme_mod('reyoungskin_services_bg_color', '#CFE1D9');

// Query all service items from Custom Post Type
$args = array(
    'post_type'      => 'service_item',
    'posts_per_page' => -1,
    'orderby'        => 'menu_order title',
    'order'          => 'ASC',
    'post_status'    => 'publish',
);

$services_query = new WP_Query($args);
$services = array();

if ($services_query->have_posts()) {
    while ($services_query->have_posts()) {
        $services_query->the_post();
        $post_id = get_the_ID();

        // 1. Resolve image
        $image_url = '';

        // Check ACF field if available
        if (function_exists('get_field')) {
            $acf_img = get_field('service_image', $post_id);
            if (is_array($acf_img) && !empty($acf_img['url'])) {
                $image_url = $acf_img['url'];
            } elseif (is_numeric($acf_img)) {
                $image_url = wp_get_attachment_image_url($acf_img, 'large');
            } elseif (is_string($acf_img) && !empty($acf_img)) {
                $image_url = $acf_img;
            }
        }

        // Check Featured Image
        if (empty($image_url) && has_post_thumbnail($post_id)) {
            $image_url = get_the_post_thumbnail_url($post_id, 'large');
        }

        // Check Custom Meta Box image ID
        if (empty($image_url)) {
            $meta_img_id = get_post_meta($post_id, '_service_image_id', true);
            if (!empty($meta_img_id)) {
                $image_url = wp_get_attachment_image_url($meta_img_id, 'large');
            }
        }

        // Check Custom Meta Box external URL
        if (empty($image_url)) {
            $meta_img_url = get_post_meta($post_id, '_service_image_url', true);
            if (!empty($meta_img_url)) {
                $image_url = $meta_img_url;
            }
        }

        // Fallback default image
        if (empty($image_url)) {
            $image_url = 'https://cdn.jsdelivr.net/gh/khoale9098/reyoungskin@main/imgs/salman-dna.jpeg';
        }

        $services[] = array(
            'id'    => $post_id,
            'title' => get_the_title(),
            'image' => $image_url,
        );
    }
    wp_reset_postdata();
}

// Fallback to default services data if no posts found
if (empty($services)) {
    if (file_exists(get_template_directory() . '/inc/services-data.php')) {
        require_once get_template_directory() . '/inc/services-data.php';
        if (function_exists('reyoungskin_get_services_data')) {
            $services = reyoungskin_get_services_data();
        }
    }
}

// Chunk services into rows of 3
$service_chunks = !empty($services) ? array_chunk($services, 3) : array();
?>

<!-- Services Section -->
<section class="w-full py-20 md:py-24 lg:py-28 xl:py-32" style="background-color: <?php echo esc_attr($bg_color); ?>;">
  <div class="max-w-screen-2xl mx-auto px-6 md:px-8 lg:px-12">

    <h2
      class="text-center mb-12 md:mb-16 lg:mb-20 font-serif text-5xl md:text-6xl lg:text-7xl font-light"
      data-anim="fade-up">
      <?php echo esc_html($section_title); ?>
    </h2>

    <!-- Services Grid -->
    <div class="space-y-12 md:space-y-16 lg:space-y-20">

      <?php if (!empty($service_chunks)) : ?>
        <?php foreach ($service_chunks as $chunk_index => $chunk) : ?>

          <!-- Services Row <?php echo esc_attr($chunk_index + 1); ?> -->
          <div class="grid grid-cols-1 md:grid-cols-3 gap-6 md:gap-8 lg:gap-10" data-anim="stagger" data-anim-stagger="100">
            <?php foreach ($chunk as $service) : ?>
              <?php
                $item_title = isset($service['title']) ? $service['title'] : '';
                $item_image = isset($service['image']) ? $service['image'] : '';
              ?>

              <!-- Service Card -->
              <div class="group" data-anim-child>
                <div class="relative overflow-hidden rounded-lg card-hover">
                  <div
                    class="absolute top-0 left-0 right-0 z-10 px-4 py-3 text-center text-white text-sm md:text-lg font-medium bg-primary">
                    <?php echo esc_html($item_title); ?>
                  </div>
                  <div class="aspect-[4/3] mt-11 md:mt-12 img-hover">
                    <img loading="lazy"
                      src="<?php echo esc_url($item_image); ?>"
                      alt="<?php echo esc_attr($item_title); ?>"
                      class="w-full h-full object-cover object-center">
                  </div>
                </div>
              </div>

            <?php endforeach; ?>
          </div>

          <!-- CTA Button for Row <?php echo esc_attr($chunk_index + 1); ?> -->
          <div class="flex justify-center" data-anim="fade-up">
            <a href="<?php echo esc_url($global_button_link); ?>"
              class="btn-cta inline-block px-12 md:px-16 py-3 md:py-4 !no-underline text-base md:text-lg font-semibold text-white rounded-full"
              style="background: linear-gradient(135deg, #58A19E 0%, #82BF9D 50%, #BAD4C0 100%);"
              aria-label="<?php echo esc_attr($global_button_text); ?>">
              <?php echo esc_html($global_button_text); ?>
            </a>
          </div>

        <?php endforeach; ?>
      <?php endif; ?>

    </div>

  </div>
</section>