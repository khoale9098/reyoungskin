<?php

/**
 * Template part for displaying "Our Services" section
 *
 * @package ReyoungSkin
 */
?>

<!-- Services Section -->
<section class="w-full py-20 md:py-24 lg:py-28 xl:py-32" style="background-color: #CFE1D9;">
  <div class="max-w-screen-2xl mx-auto px-6 md:px-8 lg:px-12">

    <h2
      class="text-center mb-12 md:mb-16 lg:mb-20 font-serif text-5xl md:text-6xl lg:text-7xl font-light "
      data-anim="fade-up">
      Our Services
    </h2>

    <!-- Services Grid -->
    <div class="space-y-12 md:space-y-16 lg:space-y-20">

      <!-- ROW 1: Services 1-3 -->
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6 md:gap-8 lg:gap-10" data-anim="stagger" data-anim-stagger="100">

        <!-- Service Card 1 -->
        <div class="group" data-anim-child>
          <div class="relative overflow-hidden rounded-lg card-hover">
            <div
              class="absolute top-0 left-0 right-0 z-10 px-4 py-3 text-center text-white text-sm md:text-base font-medium  bg-primary">
              Salmon DNA Microneedling
            </div>
            <div class="aspect-[4/3] mt-11 md:mt-12 img-hover">
              <img loading="lazy"
                src="<?php echo esc_url('https://cdn.jsdelivr.net/gh/khoale9098/reyoungskin@main/imgs/salman-dna.jpeg'); ?>"
                alt="Salmon DNA Microneedling" class="w-full h-full object-cover object-center">
            </div>
          </div>
        </div>

        <!-- Service Card 2 -->
        <div class="group" data-anim-child>
          <div class="relative overflow-hidden rounded-lg card-hover">
            <div
              class="absolute top-0 left-0 right-0 z-10 px-4 py-3 text-center text-white text-sm md:text-base font-medium  bg-primary">
              Nano Hydration Infusion
            </div>
            <div class="aspect-[4/3] mt-11 md:mt-12 img-hover">
              <img
                src="<?php echo esc_url('https://cdn.jsdelivr.net/gh/khoale9098/reyoungskin@main/imgs/Nano%20Hydration.jpeg'); ?>"
                alt="Nano Hydration Infusion" class="w-full h-full object-cover object-center">
            </div>
          </div>
        </div>

        <!-- Service Card 3 -->
        <div class="group" data-anim-child>
          <div class="relative overflow-hidden rounded-lg card-hover">
            <div
              class="absolute top-0 left-0 right-0 z-10 px-4 py-3 text-center text-white text-sm md:text-base font-medium  bg-primary">
              INNO-EXOMA Exosome Skin
            </div>
            <div class="aspect-[4/3] mt-11 md:mt-12 img-hover">
              <img
                src="<?php echo esc_url('https://cdn.jsdelivr.net/gh/khoale9098/reyoungskin@main/imgs/INNO-EXOMA%20Exosome%20Skin%20Treatment.jpeg'); ?>"
                alt="INNO-EXOMA Exosome Skin" class="w-full h-full object-cover object-center">
            </div>
          </div>
        </div>

      </div>

      <div class="flex justify-center" data-anim="fade-up">
        <a href="<?php echo esc_url(home_url('/pricing')); ?>"
          class="btn-cta inline-block px-12 md:px-16 py-3 md:py-4 !no-underline text-base md:text-lg font-semibold text-white rounded-full"
          style="background: linear-gradient(135deg, #58A19E 0%, #82BF9D 50%, #BAD4C0 100%);"
          aria-label="See pricing for Microneedling, Hydration and Exosome treatments">
          See Pricing
        </a>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-6 md:gap-8 lg:gap-10" data-anim="stagger" data-anim-stagger="100">
        <div class="group" data-anim-child>
          <div class="relative overflow-hidden rounded-lg card-hover">
            <div
              class="absolute top-0 left-0 right-0 z-10 px-4 py-3 text-center text-white text-sm md:text-base font-medium  bg-primary">
              Chemical Peel
            </div>
            <div class="aspect-[4/3] mt-11 md:mt-12 img-hover">
              <img loading='lazy'
                src="<?php echo esc_url('https://cdn.jsdelivr.net/gh/khoale9098/reyoungskin@main/imgs/chemical%20peel.jpeg'); ?>"
                alt="Chemical Peel" class="w-full h-full object-cover object-center">
            </div>
          </div>
        </div>

        <!-- Service Card 5 -->
        <div class="group" data-anim-child>
          <div class="relative overflow-hidden rounded-lg card-hover">
            <div
              class="absolute top-0 left-0 right-0 z-10 px-4 py-3 text-center text-white text-sm md:text-base font-medium  bg-primary">
              Hair Growth Support
            </div>
            <div class="aspect-[4/3] mt-11 md:mt-12 img-hover">
              <img loading='lazy'
                src="<?php echo esc_url('https://cdn.jsdelivr.net/gh/khoale9098/reyoungskin@main/imgs/Scalp%20Microneedling%20(Hair%20Growth%20Support).jpeg'); ?>"
                alt="Hair Growth Support" class="w-full h-full object-cover object-center">
            </div>
          </div>
        </div>

        <!-- Service Card 6 -->
        <div class="group" data-anim-child>
          <div class="relative overflow-hidden rounded-lg card-hover">
            <div
              class="absolute top-0 left-0 right-0 z-10 px-4 py-3 text-center text-white text-sm md:text-base font-medium  bg-primary">
              Purifying Facial
            </div>
            <div class="aspect-[4/3] mt-11 md:mt-12 img-hover">
              <img loading='lazy'
                src="<?php echo esc_url('https://cdn.jsdelivr.net/gh/khoale9098/reyoungskin@main/imgs/Purifying%20Facial%20(Enzyme%20Exfoliation).jpeg'); ?>"
                alt="Purifying Facial" class="w-full h-full object-cover object-center">
            </div>
          </div>
        </div>

      </div>

      <!-- See Pricing Button Row 2 -->
      <div class="flex justify-center" data-anim="fade-up">
        <a href="<?php echo esc_url(home_url('/pricing')); ?>"
          class="btn-cta inline-block px-12 md:px-16 py-3 md:py-4 !no-underline text-base md:text-lg font-semibold text-white rounded-full"
          style="background: linear-gradient(135deg, #58A19E 0%, #82BF9D 50%, #BAD4C0 100%);"
          aria-label="See pricing for Chemical Peel, Hair Growth and Purifying Facial">
          See Pricing
        </a>
      </div>

      <!-- ROW 3: Services 7-9 -->
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6 md:gap-8 lg:gap-10" data-anim="stagger" data-anim-stagger="100">

        <!-- Service Card 7 -->
        <div class="group" data-anim-child>
          <div class="relative overflow-hidden rounded-lg card-hover">
            <div
              class="absolute top-0 left-0 right-0 z-10 px-4 py-3 text-center text-white text-sm md:text-base font-medium  bg-primary">
              Facial Massage & Reflexology
            </div>
            <div class="aspect-[4/3] mt-11 md:mt-12 img-hover">
              <img loading='lazy'
                src="<?php echo esc_url('https://cdn.jsdelivr.net/gh/khoale9098/reyoungskin@main/imgs/Facial%20Massage%20%26%20Reflexology.jpeg'); ?>"
                alt="Facial Massage & Reflexology" class="w-full h-full object-cover object-center">
            </div>
          </div>
        </div>

        <!-- Service Card 8 -->
        <div class="group" data-anim-child>
          <div class="relative overflow-hidden rounded-lg card-hover">
            <div
              class="absolute top-0 left-0 right-0 z-10 px-4 py-3 text-center text-white text-sm md:text-base font-medium  bg-primary">
              LED Therapy
            </div>
            <div class="aspect-[4/3] mt-11 md:mt-12 img-hover">
              <img loading='lazy'
                src="<?php echo esc_url('https://cdn.jsdelivr.net/gh/khoale9098/reyoungskin@main/imgs/LED%20Therapy.jpeg'); ?>"
                alt="LED Therapy" class="w-full h-full object-cover object-center">
            </div>
          </div>
        </div>

        <!-- Service Card 9 -->
        <div class="group" data-anim-child>
          <div class="relative overflow-hidden rounded-lg card-hover">
            <div
              class="absolute top-0 left-0 right-0 z-10 px-4 py-3 text-center text-white text-sm md:text-base font-medium  bg-primary">
              Microdermabrasion
            </div>
            <div class="aspect-[4/3] mt-11 md:mt-12 img-hover">
              <img
                src="<?php echo esc_url('https://cdn.jsdelivr.net/gh/khoale9098/reyoungskin@main/imgs/Microdermabrasion.jpeg'); ?>"
                alt="Microdermabrasion" class="w-full h-full object-cover object-center">
            </div>
          </div>
        </div>

      </div>

      <!-- See Pricing Button Row 3 -->
      <div class="flex justify-center" data-anim="fade-up">
        <a href="<?php echo esc_url(home_url('/pricing')); ?>"
          class="btn-cta inline-block px-12 md:px-16 py-3 md:py-4 !no-underline text-base md:text-lg font-semibold text-white rounded-full"
          style="background: linear-gradient(135deg, #58A19E 0%, #82BF9D 50%, #BAD4C0 100%);"
          aria-label="See pricing for Massage, LED Therapy and Microdermabrasion">
          See Pricing
        </a>
      </div>

    </div>

  </div>
</section>