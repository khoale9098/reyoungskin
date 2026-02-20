<section class="w-full py-24 lg:py-28" style="background-color: #DDE5CF;">
  <div class="max-w-screen-2xl mx-auto px-6 lg:px-10">


    <h2
      class="text-center mb-12 md:mb-16 lg:mb-20 font-serif text-5xl md:text-6xl lg:text-7xl font-light "
      data-anim="fade-down" data-anim-duration="800">
      What Our Customers Are Saying
    </h2>


    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 lg:gap-6 mb-12" data-anim="stagger" data-anim-stagger="120">


      <div class="flex flex-col items-center" data-anim-child>
        <!-- Rating Stars for Review 1 -->
        <div class="flex gap-1.5 mb-6">
          <?php for ($i = 0; $i < 5; $i++): ?>
            <svg class="w-8 h-8" fill="#F2D36B" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
            </svg>
          <?php endfor; ?>
        </div>
        
        <div class="relative w-full max-w-sm">

          <div
            class="absolute -top-6 left-1/2 -translate-x-1/2 z-10 w-14 h-14 rounded-full flex items-center justify-center"
            style="background-color: #AFC7A9;">
            <svg class="w-7 h-7" fill="#6E8F87" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path d="M6 17h3l2-4V7H5v6h3zm8 0h3l2-4V7h-6v6h3z" />
            </svg>
          </div>


          <div class="rounded-xl p-6 pt-10 pb-8 flex items-center justify-center"
            style="background-color: #6E8F87; min-height: 260px;">

            <div class="bg-white rounded-lg shadow-md p-2 w-full">
              <img
                src="<?php echo esc_url('https://cdn.jsdelivr.net/gh/khoale9098/reyoungskin@main/imgs/review-1.png'); ?>"
                alt="Customer Review 1" class="w-full h-auto rounded">
            </div>
          </div>
        </div>
      </div>


      <div class="flex flex-col items-center" data-anim-child>
        <!-- Rating Stars for Review 2 -->
        <div class="flex gap-1.5 mb-6">
          <?php for ($i = 0; $i < 5; $i++): ?>
            <svg class="w-8 h-8" fill="#F2D36B" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
            </svg>
          <?php endfor; ?>
        </div>
        
        <div class="relative w-full max-w-sm">

          <div
            class="absolute -top-6 left-1/2 -translate-x-1/2 z-10 w-14 h-14 rounded-full flex items-center justify-center"
            style="background-color: #AFC7A9;">
            <svg class="w-7 h-7" fill="#6E8F87" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path d="M6 17h3l2-4V7H5v6h3zm8 0h3l2-4V7h-6v6h3z" />
            </svg>
          </div>


          <div class="rounded-xl p-6 pt-10 pb-8 flex items-center justify-center"
            style="background-color: #6E8F87; min-height: 260px;">

            <div class="bg-white rounded-lg shadow-md p-2 w-full">
              <img
                src="<?php echo esc_url('https://cdn.jsdelivr.net/gh/khoale9098/reyoungskin@main/imgs/review-2.png'); ?>"
                alt="Customer Review 2" class="w-full h-auto rounded">
            </div>
          </div>
        </div>
      </div>


      <div class="flex flex-col items-center" data-anim-child>
        <!-- Rating Stars for Review 3 -->
        <div class="flex gap-1.5 mb-6">
          <?php for ($i = 0; $i < 5; $i++): ?>
            <svg class="w-8 h-8" fill="#F2D36B" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
            </svg>
          <?php endfor; ?>
        </div>
        
        <div class="relative w-full max-w-sm">

          <div
            class="absolute -top-6 left-1/2 -translate-x-1/2 z-10 w-14 h-14 rounded-full flex items-center justify-center"
            style="background-color: #AFC7A9;">
            <svg class="w-7 h-7" fill="#6E8F87" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path d="M6 17h3l2-4V7H5v6h3zm8 0h3l2-4V7h-6v6h3z" />
            </svg>
          </div>


          <div class="rounded-xl p-6 pt-10 pb-8 flex items-center justify-center"
            style="background-color: #6E8F87; min-height: 260px;">

            <div class="bg-white rounded-lg shadow-md p-2 w-full">
              <img
                src="<?php echo esc_url('https://cdn.jsdelivr.net/gh/khoale9098/reyoungskin@main/imgs/review-3.png'); ?>"
                alt="Customer Review 3" class="w-full h-auto rounded">
            </div>
          </div>
        </div>
      </div>

    </div>


    <div class="flex justify-center" data-anim="fade-up" data-anim-delay="100">
      <a href="<?php echo esc_url(home_url('/reviews')); ?>"
        class="btn-cta inline-block px-8 py-3 text-white font-medium text-sm tracking-wide"
        style="background-color: #6E8F87; border-radius: 999px;" aria-label="See more customer reviews">
        See More
      </a>
    </div>

  </div>
</section>