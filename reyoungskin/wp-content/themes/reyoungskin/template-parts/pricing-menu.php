<?php
/**
 * Template part for displaying pricing menu
 *
 * @package ReyoungSkin
 */

$booking_link = get_theme_mod('reyoungskin_booking_link', 'https://www.fresha.com/book-now/reyoung-skin-r31eq3r8/services?lid=2890981&eid=5108859&share=true&pId=2795259');

$pricing_book_now_text = function_exists('get_field') && get_field('pricing_book_now_text') ? get_field('pricing_book_now_text') : 'Book Now';

// Query all pricing items
$args = array(
    'post_type' => 'pricing_item',
    'posts_per_page' => -1,
    'order' => 'ASC',
    'orderby' => 'menu_order title',
);
$pricing_query = new WP_Query($args);

$left_column = array();
$right_column = array();

if ($pricing_query->have_posts()) {
    while ($pricing_query->have_posts()) {
        $pricing_query->the_post();
        
        $price = function_exists('get_field') ? get_field('price') : '';
        $was_price = function_exists('get_field') ? get_field('was_price') : '';
        $extra_price = function_exists('get_field') ? get_field('extra_price') : '';
        $column = function_exists('get_field') ? get_field('column') : 'left';
        
        $item = array(
            'title' => get_the_title(),
            'price' => $price,
            'was_price' => $was_price,
            'extra_price' => $extra_price,
            'content' => get_the_content(),
        );
        
        if ($column === 'right') {
            $right_column[] = $item;
        } else {
            $left_column[] = $item;
        }
    }
    wp_reset_postdata();
}
?>

<style>
.pricing-content-wrapper p { margin-top: 0.5rem; margin-bottom: 0.5rem; }
.pricing-content-wrapper p:first-child { margin-top: 0; }
.pricing-content-wrapper p:last-child { margin-bottom: 0; }
.pricing-content-wrapper ul { padding-left: 1.25rem; list-style-type: disc; margin-top: 0.5rem; margin-bottom: 1rem; }
.pricing-content-wrapper li { margin-bottom: 0.25rem; }
.pricing-content-wrapper h4, .pricing-content-wrapper h3 { font-size: 1.125rem; font-weight: 600; margin-top: 1rem; margin-bottom: 0.5rem; color: var(--color-primary); }
</style>

<section class="w-full py-12 md:py-16 lg:py-20 bg-white">
  <div class="mx-auto max-w-screen-2xl px-4 sm:px-6 lg:px-12">

    <!-- Two Column Layout -->
    <div class="flex flex-col lg:flex-row gap-8 md:gap-12 lg:gap-16">

      <!-- Left Column -->
      <div class="space-y-10 md:space-y-12 lg:w-1/2">
        <?php if (!empty($left_column)): ?>
          <?php foreach ($left_column as $service): ?>
            <div class="space-y-3">
              <!-- Service Title & Price -->
              <h3 class="text-3xl font-serif italic text-primary">
                <?php echo esc_html($service['title']); ?>
                <?php if (!empty($service['price'])): ?>
                  <span class="ml-2 text-base md:text-xl">
                    <?php echo esc_html($service['price']); ?>
                    <?php if (!empty($service['extra_price'])): ?>
                      <span class="text-base ml-1">(<?php echo esc_html($service['extra_price']); ?>)</span>
                    <?php endif; ?>
                    <?php if (!empty($service['was_price'])): ?>
                      <span class="line-through opacity-60 text-base ml-1"><?php echo esc_html($service['was_price']); ?></span>
                    <?php endif; ?>
                  </span>
                <?php endif; ?>
              </h3>

              <!-- Content -->
              <?php if (!empty($service['content'])): ?>
                <div class="text-sm md:text-base leading-relaxed pricing-content-wrapper" style="color: #5F8F8B;">
                  <?php echo apply_filters('the_content', $service['content']); ?>
                </div>
              <?php endif; ?>
            </div>
          <?php endforeach; ?>
        <?php else: ?>
          <p class="text-gray-500 italic">No pricing items found for this column. Please add them in the WordPress admin under "Pricing Items".</p>
        <?php endif; ?>
      </div>

      <!-- Right Column -->
      <div class="space-y-10 md:space-y-12 lg:w-1/2">
        <?php if (!empty($right_column)): ?>
          <?php foreach ($right_column as $service): ?>
            <div class="space-y-3">
              <!-- Service Title & Price -->
              <h3 class="text-3xl font-serif italic text-primary">
                <?php echo esc_html($service['title']); ?>
                <?php if (!empty($service['price'])): ?>
                  <span class="ml-2 text-base md:text-xl">
                    <?php echo esc_html($service['price']); ?>
                    <?php if (!empty($service['extra_price'])): ?>
                      <span class="text-base ml-1">(<?php echo esc_html($service['extra_price']); ?>)</span>
                    <?php endif; ?>
                    <?php if (!empty($service['was_price'])): ?>
                      <span class="line-through opacity-60 text-base ml-1"><?php echo esc_html($service['was_price']); ?></span>
                    <?php endif; ?>
                  </span>
                <?php endif; ?>
              </h3>

              <!-- Content -->
              <?php if (!empty($service['content'])): ?>
                <div class="text-sm md:text-base leading-relaxed pricing-content-wrapper">
                  <?php echo apply_filters('the_content', $service['content']); ?>
                </div>
              <?php endif; ?>
            </div>
          <?php endforeach; ?>
        <?php else: ?>
          <p class="text-gray-500 italic">No pricing items found for this column. Please add them in the WordPress admin under "Pricing Items".</p>
        <?php endif; ?>
      </div>

    </div>

    <!-- CTA Button -->
    <div class="flex justify-center mt-14 md:mt-16 lg:mt-20">
      <a href="<?php echo esc_url($booking_link); ?>"
        target="_blank" rel="noopener noreferrer"
        class="inline-block px-10 py-3 rounded-full text-white uppercase tracking-widest text-sm md:text-base font-medium transition-all duration-300 hover:brightness-110"
        style="background-color: rgba(15, 118, 110, 0.55);"
        onmouseover="this.style.backgroundColor='rgba(15, 118, 110, 0.65)'"
        onmouseout="this.style.backgroundColor='rgba(15, 118, 110, 0.55)'">
        <?php echo esc_html($pricing_book_now_text); ?>
      </a>
    </div>

  </div>
</section>