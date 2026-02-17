<?php
/**
 * Template part for displaying pricing menu
 *
 * @package ReyoungSkin
 */

// Load pricing data
require_once get_template_directory() . '/inc/pricing-data.php';
$pricing_data = reyoungskin_get_pricing_data();
?>

<section class="w-full py-12 md:py-16 lg:py-20 bg-white">
  <div class="mx-auto max-w-screen-2xl px-4 sm:px-6 lg:px-12">

    <!-- Two Column Layout -->
    <div class="flex flex-col lg:flex-row gap-8 md:gap-12 lg:gap-16">

      <!-- Left Column -->
      <div class="space-y-10 md:space-y-12">
        <?php foreach ($pricing_data['left_column'] as $service): ?>
          <div class="space-y-3">
            <!-- Service Title & Price -->
            <h3 class="text-2xl font-serif italic">
              <?php echo esc_html($service['title']); ?>
              <?php if (isset($service['price'])): ?>
                <span class="ml-2 text-base md:text-lg">
                  <?php echo esc_html($service['price']); ?>
                  <?php if (isset($service['was_price'])): ?>
                    <span class="line-through opacity-60 text-base ml-1"><?php echo esc_html($service['was_price']); ?></span>
                  <?php endif; ?>
                </span>
              <?php endif; ?>
            </h3>

            <!-- Paragraphs -->
            <?php if (isset($service['paragraphs'])): ?>
              <div class="space-y-2 text-sm md:text-base leading-relaxed" style="color: #5F8F8B;">
                <?php foreach ($service['paragraphs'] as $paragraph): ?>
                  <p><?php echo esc_html($paragraph); ?></p>
                <?php endforeach; ?>
              </div>
            <?php endif; ?>

            <!-- Subsections -->
            <?php if (isset($service['subsections'])): ?>
              <?php foreach ($service['subsections'] as $subsection): ?>
                <div class="mt-4">
                  <h4 class="text-base md:text-lg font-semibold mb-2 ">
                    <?php echo esc_html($subsection['heading']); ?>
                  </h4>
                  <?php if (isset($subsection['text'])): ?>
                    <p class="text-sm md:text-base leading-relaxed">
                      <?php echo esc_html($subsection['text']); ?>
                    </p>
                  <?php endif; ?>
                  <?php if (isset($subsection['bullets'])): ?>
                    <ul class="space-y-1.5 pl-4 text-sm md:text-base">
                      <?php foreach ($subsection['bullets'] as $bullet): ?>
                        <li class="flex items-start gap-2">
                          <span class="mt-1.5">•</span>
                          <span><?php echo esc_html($bullet); ?></span>
                        </li>
                      <?php endforeach; ?>
                    </ul>
                  <?php endif; ?>
                </div>
              <?php endforeach; ?>
            <?php endif; ?>

            <!-- Note -->
            <?php if (isset($service['note'])): ?>
              <p class="text-sm italic mt-3">
                <?php echo esc_html($service['note']); ?>
              </p>
            <?php endif; ?>
          </div>
        <?php endforeach; ?>
      </div>

      <!-- Right Column -->
      <div class="space-y-10 md:space-y-12">
        <?php foreach ($pricing_data['right_column'] as $service): ?>
          <div class="space-y-3">
            <!-- Service Title & Price -->
            <h3 class="text-2xl font-serif italic">
              <?php echo esc_html($service['title']); ?>
              <?php if (isset($service['price'])): ?>
                <span class="ml-2 text-base md:text-lg">
                  <?php echo esc_html($service['price']); ?>
                  <?php if (isset($service['extra_price'])): ?>
                    <span class="text-sm ml-1">(<?php echo esc_html($service['extra_price']); ?>)</span>
                  <?php endif; ?>
                  <?php if (isset($service['was_price'])): ?>
                    <span class="line-through opacity-60 text-base ml-1"><?php echo esc_html($service['was_price']); ?></span>
                  <?php endif; ?>
                </span>
              <?php endif; ?>
            </h3>

            <!-- Paragraphs -->
            <?php if (isset($service['paragraphs'])): ?>
              <div class="space-y-2 text-sm md:text-base leading-relaxed">
                <?php foreach ($service['paragraphs'] as $paragraph): ?>
                  <p><?php echo esc_html($paragraph); ?></p>
                <?php endforeach; ?>
              </div>
            <?php endif; ?>

            <!-- Subitems (for Plasma Pen) -->
            <?php if (isset($service['subitems'])): ?>
              <div class="space-y-4 mt-4 pl-4">
                <?php foreach ($service['subitems'] as $subitem): ?>
                  <div class="space-y-1">
                    <h4 class="text-base font-medium">
                      <?php echo esc_html($subitem['title']); ?>
                      <?php if (isset($subitem['price'])): ?>
                        <span class="ml-2 text-sm font-normal">
                          <?php echo esc_html($subitem['price']); ?>
                        </span>
                      <?php endif; ?>
                    </h4>
                    <?php if (isset($subitem['text'])): ?>
                      <p class="text-sm">
                        <?php echo esc_html($subitem['text']); ?>
                      </p>
                    <?php endif; ?>
                  </div>
                <?php endforeach; ?>
              </div>
            <?php endif; ?>

            <!-- Subsections -->
            <?php if (isset($service['subsections'])): ?>
              <?php foreach ($service['subsections'] as $subsection): ?>
                <div class="mt-4">
                  <h4 class="text-base md:text-lg font-semibold mb-2 ">
                    <?php echo esc_html($subsection['heading']); ?>
                  </h4>
                  <?php if (isset($subsection['text'])): ?>
                    <p class="text-sm md:text-base leading-relaxed">
                      <?php echo esc_html($subsection['text']); ?>
                    </p>
                  <?php endif; ?>
                  <?php if (isset($subsection['bullets'])): ?>
                    <ul class="space-y-1.5 pl-4 text-sm md:text-base">
                      <?php foreach ($subsection['bullets'] as $bullet): ?>
                        <li class="flex items-start gap-2">
                          <span class="mt-1.5">•</span>
                          <span><?php echo esc_html($bullet); ?></span>
                        </li>
                      <?php endforeach; ?>
                    </ul>
                  <?php endif; ?>
                </div>
              <?php endforeach; ?>
            <?php endif; ?>

            <!-- Note -->
            <?php if (isset($service['note'])): ?>
              <p class="text-sm italic mt-3">
                <?php echo esc_html($service['note']); ?>
              </p>
            <?php endif; ?>
          </div>
        <?php endforeach; ?>
      </div>

    </div>

    <!-- CTA Button -->
    <div class="flex justify-center mt-14 md:mt-16 lg:mt-20">
      <a href="https://www.fresha.com/a/beauty-bar-n-makeup-lash-n-brows-auckland-437-remuera-road-al4mar88/booking?menu=true&offerItems=sv%3A25356601&pId=758924&dppub=true&utm_content=link_in_bio&utm_medium=social&utm_source=ig&employeeId=2577179&cartId=4fa72077-b048-4326-8ab5-55611323aa81"
        target="_blank" rel="noopener noreferrer"
        class="inline-block px-10 py-3 rounded-full text-white uppercase tracking-widest text-sm md:text-base font-medium transition-all duration-300 hover:brightness-110"
        style="background-color: rgba(15, 118, 110, 0.55);"
        onmouseover="this.style.backgroundColor='rgba(15, 118, 110, 0.65)'"
        onmouseout="this.style.backgroundColor='rgba(15, 118, 110, 0.55)'">
        Book Now
      </a>
    </div>

  </div>
</section>