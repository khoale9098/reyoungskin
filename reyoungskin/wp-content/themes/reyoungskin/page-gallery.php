<?php

/**
 * Template Name: Gallery Page
 * Template Post Type: page
 * 
 * @package ReyoungSkin
 */

// Get logo - try custom logo first, then fallback to default
$custom_logo_id = get_theme_mod('custom_logo');
if ($custom_logo_id) {
  $logo_image = wp_get_attachment_image_src($custom_logo_id, 'full');
  $hero_logo = $logo_image ? $logo_image[0] : 'https://cdn.jsdelivr.net/gh/khoale9098/reyoungskin@main/imgs/logo.png';
} else {
  $hero_logo = 'https://cdn.jsdelivr.net/gh/khoale9098/reyoungskin@main/imgs/logo.png';
}

// Gallery images
$gallery_images = array(
  'https://cdn.jsdelivr.net/gh/khoale9098/reyoungskin@main/imgs/gallery/1.jpeg',
  'https://cdn.jsdelivr.net/gh/khoale9098/reyoungskin@main/imgs/gallery/2.jpeg',
  'https://cdn.jsdelivr.net/gh/khoale9098/reyoungskin@main/imgs/gallery/3.jpeg',
  'https://cdn.jsdelivr.net/gh/khoale9098/reyoungskin@main/imgs/gallery/4.jpeg',
  'https://cdn.jsdelivr.net/gh/khoale9098/reyoungskin@main/imgs/gallery/5.jpeg',
  'https://cdn.jsdelivr.net/gh/khoale9098/reyoungskin@main/imgs/gallery/6.jpeg',
  'https://cdn.jsdelivr.net/gh/khoale9098/reyoungskin@main/imgs/gallery/7.jpeg',
  'https://cdn.jsdelivr.net/gh/khoale9098/reyoungskin@main/imgs/gallery/8.jpeg',
  'https://cdn.jsdelivr.net/gh/khoale9098/reyoungskin@main/imgs/gallery/9.jpeg',
  'https://cdn.jsdelivr.net/gh/khoale9098/reyoungskin@main/imgs/gallery/10.jpeg',
);

get_header();
?>

<style>
  .gallery-hero::before {
    content: '';
    position: absolute;
    inset: 0;
    background:
      radial-gradient(ellipse 60% 40% at 15% 80%, rgba(200, 216, 180, 0.5) 0%, transparent 70%),
      radial-gradient(ellipse 50% 50% at 85% 20%, rgba(200, 216, 180, 0.35) 0%, transparent 70%);
    pointer-events: none;
  }

  /* ── Keyframe Animations (giữ CSS) ─────────────────────────────── */
  @keyframes fadeUp {
    to {
      opacity: 1;
      transform: translateY(0);
    }
  }

  @keyframes fadeIn {
    to {
      opacity: 1;
    }
  }

  .gallery-hero__logo {
    opacity: 0;
    transform: translateY(16px);
    animation: fadeUp 0.8s ease forwards 0.1s;
  }

  .gallery-hero__eyebrow {
    opacity: 0;
    transform: translateY(12px);
    animation: fadeUp 0.8s ease forwards 0.25s;
  }

  .gallery-hero__title {
    opacity: 0;
    transform: translateY(16px);
    animation: fadeUp 0.9s ease forwards 0.35s;
  }

  .gallery-hero__divider {
    opacity: 0;
    animation: fadeIn 0.8s ease forwards 0.5s;
  }

  .gallery-hero__subtitle {
    opacity: 0;
    transform: translateY(10px);
    animation: fadeUp 0.8s ease forwards 0.55s;
  }

  /* ── Gallery Item Scroll Reveal (giữ CSS cho stagger animation) ─── */
  .gallery-item {
    opacity: 0;
    transform: translateY(24px);
    transition: opacity 0.6s ease, transform 0.6s ease;
  }

  .gallery-item.is-visible {
    opacity: 1;
    transform: translateY(0);
  }

  .gallery-item__img {
    transition: transform 0.55s cubic-bezier(0.25, 0.46, 0.45, 0.94);
  }

  .gallery-item:hover .gallery-item__img {
    transform: scale(1.04);
  }

  /* ── Gallery Overlay Gradient (giữ CSS) ────────────────────────── */
  .gallery-item__overlay {
    background: linear-gradient(160deg, transparent 40%, rgba(44, 44, 44, 0.45) 100%);
    transition: opacity 0.4s ease;
  }

  .gallery-item:hover .gallery-item__overlay {
    opacity: 1;
  }

  /* ── Zoom Icon Effect (backdrop-filter, giữ CSS) ───────────────── */
  .gallery-item__zoom {
    backdrop-filter: blur(4px);
    transform: scale(0.7) rotate(-10deg);
    transition: transform 0.35s cubic-bezier(0.34, 1.56, 0.64, 1);
  }

  .gallery-item:hover .gallery-item__zoom {
    transform: scale(1) rotate(0deg);
  }

  /* ── Lightbox (giữ CSS cho backdrop-filter và state) ────────────── */
  .lightbox {
    backdrop-filter: blur(6px);
    transition: opacity 0.35s ease;
  }

  .lightbox.is-open {
    opacity: 1;
    pointer-events: all;
  }

  .lightbox__img-wrap {
    transform: scale(0.93);
    transition: transform 0.4s cubic-bezier(0.34, 1.3, 0.64, 1);
  }

  .lightbox.is-open .lightbox__img-wrap {
    transform: scale(1);
  }

  /* Lightbox button hover rotate effect */
  #lightboxClose:hover {
    transform: rotate(90deg);
  }
</style>

<main class="w-full">

  <!-- Hero Section -->
  <section class="gallery-hero w-full bg-[#edf7db] py-20 px-6 text-center relative overflow-hidden">
    <div class="relative z-10 max-w-2xl mx-auto">
      <h1 class="gallery-hero__title text-5xl sm:text-6xl font-serif lg:text-7xl font-light leading-tight text-black mb-5 tracking-tight">
        Our<span class=" text-primary ml-2">Gallery</span>
      </h1>
      <div class="gallery-hero__divider w-12 h-px bg-[#8aab70] mx-auto mb-5"></div>
      <p class="gallery-hero__subtitle text-sm font-light text-[#7a7469] leading-relaxed">
        Radiant moments from your skincare journey.
      </p>
    </div>
  </section>

  <!-- Gallery Section -->
  <section class="w-full bg-[#f9f4ee] py-18 px-6">
    <div class="max-w-screen-xl mx-auto">

      <div class="columns-1 sm:columns-2 lg:columns-3 gap-5" id="galleryGrid">
        <?php foreach ($gallery_images as $index => $image_url): ?>
          <div
            class="gallery-item break-inside-avoid mb-5 relative rounded overflow-hidden cursor-pointer"
            data-index="<?php echo $index; ?>"
            data-src="<?php echo esc_url($image_url); ?>"
            style="transition-delay: <?php echo min($index * 80, 500); ?>ms;"
            tabindex="0"
            role="button"
            aria-label="View image <?php echo ($index + 1); ?>">

            <img
              src="<?php echo esc_url($image_url); ?>"
              alt="Gallery image <?php echo ($index + 1); ?>"
              class="gallery-item__img block w-full h-auto object-cover"
              loading="lazy">

            <div class="gallery-item__overlay absolute inset-0 opacity-0 flex items-end justify-end p-[18px]">
              <div class="gallery-item__zoom w-9 h-9 rounded-full border-[1.5px] border-white/85 bg-white/15 flex items-center justify-center text-white">
                <svg class="w-4 h-4 stroke-white fill-none stroke-2" viewBox="0 0 24 24">
                  <circle cx="11" cy="11" r="8" />
                  <line x1="21" y1="21" x2="16.65" y2="16.65" />
                  <line x1="11" y1="8" x2="11" y2="14" />
                  <line x1="8" y1="11" x2="14" y2="11" />
                </svg>
              </div>
            </div>

          </div>
        <?php endforeach; ?>
      </div>

    </div>
  </section>

  <!-- Lightbox -->
  <div class="lightbox fixed inset-0 z-[9999] bg-[rgba(20,18,16,0.96)] flex items-center justify-center p-6 opacity-0 pointer-events-none"
    id="lightbox" role="dialog" aria-modal="true" aria-label="Image lightbox">

    <button class="fixed top-5 right-5 w-11 h-11 bg-white/8 border border-white/15 rounded-full cursor-pointer flex items-center justify-center transition-all duration-200 text-white hover:bg-white/18"
      id="lightboxClose" aria-label="Close">
      <svg class="w-[18px] h-[18px] stroke-white fill-none stroke-2" viewBox="0 0 24 24">
        <line x1="18" y1="6" x2="6" y2="18" />
        <line x1="6" y1="6" x2="18" y2="18" />
      </svg>
    </button>

    <button class="lightbox__prev fixed top-1/2 -translate-y-1/2 left-4 w-12 h-12 bg-white/8 border border-white/15 rounded-full cursor-pointer flex items-center justify-center transition-colors duration-200 text-white hover:bg-white/18 max-sm:hidden"
      id="lightboxPrev" aria-label="Previous image">
      <svg class="w-[18px] h-[18px] stroke-white fill-none stroke-2" viewBox="0 0 24 24">
        <polyline points="15 18 9 12 15 6" />
      </svg>
    </button>

    <div class="lightbox__img-wrap relative max-w-[900px] w-full">
      <img src="" alt="" class="block w-full h-auto max-h-[88vh] object-contain rounded" id="lightboxImg">
      <p class="lightbox__counter text-xs tracking-[0.15em] text-white/45 text-center mt-3.5" id="lightboxCounter"></p>
    </div>

    <button class="lightbox__next fixed top-1/2 -translate-y-1/2 right-4 w-12 h-12 bg-white/8 border border-white/15 rounded-full cursor-pointer flex items-center justify-center transition-colors duration-200 text-white hover:bg-white/18 max-sm:hidden"
      id="lightboxNext" aria-label="Next image">
      <svg class="w-[18px] h-[18px] stroke-white fill-none stroke-2" viewBox="0 0 24 24">
        <polyline points="9 18 15 12 9 6" />
      </svg>
    </button>
  </div>

  <!-- Footer Contact Section -->
  <?php get_template_part('template-parts/footer-contact-section'); ?>

</main>

<script>
  (function() {
    // ── Scroll-reveal ──────────────────────────────────────
    const items = document.querySelectorAll('.gallery-item');

    const observer = new IntersectionObserver(function(entries) {
      entries.forEach(function(entry) {
        if (entry.isIntersecting) {
          entry.target.classList.add('is-visible');
          observer.unobserve(entry.target);
        }
      });
    }, {
      threshold: 0.08,
      rootMargin: '0px 0px -40px 0px'
    });

    items.forEach(function(item) {
      observer.observe(item);
    });

    // ── Lightbox ───────────────────────────────────────────
    const lightbox = document.getElementById('lightbox');
    const lightboxImg = document.getElementById('lightboxImg');
    const lightboxCounter = document.getElementById('lightboxCounter');
    const closeBtn = document.getElementById('lightboxClose');
    const prevBtn = document.getElementById('lightboxPrev');
    const nextBtn = document.getElementById('lightboxNext');

    const srcs = Array.from(items).map(function(el) {
      return el.dataset.src;
    });
    var current = 0;

    function openLightbox(index) {
      current = index;
      lightboxImg.src = srcs[current];
      lightboxImg.alt = 'Gallery image ' + (current + 1);
      lightboxCounter.textContent = (current + 1) + ' / ' + srcs.length;
      lightbox.classList.add('is-open');
      document.body.style.overflow = 'hidden';
    }

    function closeLightbox() {
      lightbox.classList.remove('is-open');
      document.body.style.overflow = '';
    }

    function showNext() {
      current = (current + 1) % srcs.length;
      lightboxImg.src = srcs[current];
      lightboxCounter.textContent = (current + 1) + ' / ' + srcs.length;
    }

    function showPrev() {
      current = (current - 1 + srcs.length) % srcs.length;
      lightboxImg.src = srcs[current];
      lightboxCounter.textContent = (current + 1) + ' / ' + srcs.length;
    }

    items.forEach(function(item) {
      item.addEventListener('click', function() {
        openLightbox(parseInt(item.dataset.index));
      });
      item.addEventListener('keydown', function(e) {
        if (e.key === 'Enter' || e.key === ' ') {
          e.preventDefault();
          openLightbox(parseInt(item.dataset.index));
        }
      });
    });

    closeBtn.addEventListener('click', closeLightbox);
    nextBtn.addEventListener('click', showNext);
    prevBtn.addEventListener('click', showPrev);

    lightbox.addEventListener('click', function(e) {
      if (e.target === lightbox) closeLightbox();
    });

    document.addEventListener('keydown', function(e) {
      if (!lightbox.classList.contains('is-open')) return;
      if (e.key === 'Escape') closeLightbox();
      if (e.key === 'ArrowRight') showNext();
      if (e.key === 'ArrowLeft') showPrev();
    });

    // Touch swipe support
    var touchStartX = 0;
    lightbox.addEventListener('touchstart', function(e) {
      touchStartX = e.changedTouches[0].screenX;
    }, {
      passive: true
    });
    lightbox.addEventListener('touchend', function(e) {
      var diff = touchStartX - e.changedTouches[0].screenX;
      if (Math.abs(diff) > 50) {
        diff > 0 ? showNext() : showPrev();
      }
    }, {
      passive: true
    });
  })();
</script>

<?php
get_footer();
?>