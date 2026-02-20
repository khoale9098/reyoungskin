/**
 * ReYoung Skin - Animation System
 * 
 * A lightweight, accessible scroll-reveal animation system using
 * IntersectionObserver and CSS transitions. No external dependencies.
 * 
 * @see docs/motion-spec.md for animation specifications
 */

(function() {
  'use strict';

  // ============================================
  // Configuration (Single Source of Truth)
  // ============================================
  
  const CONFIG = {
    // IntersectionObserver threshold (0-1)
    threshold: 0.15,
    
    // Root margin for earlier triggering
    rootMargin: '0px 0px -50px 0px',
    
    // Default timings (can be overridden via data attributes)
    defaultDuration: 700,
    defaultDelay: 0,
    defaultStagger: 100,
    
    // Selectors
    animSelector: '[data-anim]',
    childSelector: '[data-anim-child]',
    
    // Classes
    visibleClass: 'anim-visible',
    reducedMotionClass: 'anim-reduced-motion'
  };

  // ============================================
  // Utility Functions
  // ============================================

  /**
   * Check if user prefers reduced motion
   */
  function prefersReducedMotion() {
    return window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  }

  /**
   * Get numeric attribute or default
   */
  function getNumAttr(el, attr, defaultVal) {
    const val = el.getAttribute(attr);
    return val !== null ? parseInt(val, 10) : defaultVal;
  }

  /**
   * Apply initial hidden state to element
   */
  function setInitialState(el) {
    // Skip if already processed or reduced motion
    if (el.classList.contains('anim-initialized')) return;
    
    const animType = el.getAttribute('data-anim');
    
    // Set initial opacity
    el.style.opacity = '0';
    
    // Set initial transform based on animation type
    switch (animType) {
      case 'fade-up':
        el.style.transform = 'translateY(var(--anim-distance, 24px))';
        break;
      case 'fade-down':
        el.style.transform = 'translateY(calc(var(--anim-distance, 24px) * -1))';
        break;
      case 'fade-left':
        el.style.transform = 'translateX(var(--anim-distance, 24px))';
        break;
      case 'fade-right':
        el.style.transform = 'translateX(calc(var(--anim-distance, 24px) * -1))';
        break;
      case 'zoom-in':
        el.style.transform = 'scale(0.9)';
        break;
      case 'zoom-out':
        el.style.transform = 'scale(1.1)';
        break;
      case 'fade':
        // No transform, just opacity
        break;
      case 'stagger':
        // Parent container - handle children
        const children = el.querySelectorAll(CONFIG.childSelector);
        children.forEach(child => {
          child.style.opacity = '0';
          child.style.transform = 'translateY(var(--anim-distance, 24px))';
        });
        // Parent itself is visible
        el.style.opacity = '1';
        break;
      default:
        // Default to fade-up
        el.style.transform = 'translateY(var(--anim-distance, 24px))';
    }
    
    el.classList.add('anim-initialized');
  }

  /**
   * Animate element to visible state
   */
  function animateIn(el, delay = 0) {
    const duration = getNumAttr(el, 'data-anim-duration', CONFIG.defaultDuration);
    const baseDelay = getNumAttr(el, 'data-anim-delay', CONFIG.defaultDelay);
    const totalDelay = baseDelay + delay;
    const animType = el.getAttribute('data-anim');
    
    // Apply transition
    el.style.transition = `
      opacity ${duration}ms var(--anim-easing, cubic-bezier(0.16, 1, 0.3, 1)) ${totalDelay}ms,
      transform ${duration}ms var(--anim-easing, cubic-bezier(0.16, 1, 0.3, 1)) ${totalDelay}ms
    `.trim().replace(/\s+/g, ' ');
    
    // Handle stagger containers
    if (animType === 'stagger') {
      const children = el.querySelectorAll(CONFIG.childSelector);
      const staggerStep = getNumAttr(el, 'data-anim-stagger', CONFIG.defaultStagger);
      
      children.forEach((child, index) => {
        const childDuration = getNumAttr(child, 'data-anim-duration', duration);
        const childDelay = totalDelay + (index * staggerStep);
        
        child.style.transition = `
          opacity ${childDuration}ms var(--anim-easing, cubic-bezier(0.16, 1, 0.3, 1)) ${childDelay}ms,
          transform ${childDuration}ms var(--anim-easing, cubic-bezier(0.16, 1, 0.3, 1)) ${childDelay}ms
        `.trim().replace(/\s+/g, ' ');
        
        // Trigger animation
        requestAnimationFrame(() => {
          child.style.opacity = '1';
          child.style.transform = 'translateY(0) translateX(0) scale(1)';
        });
      });
    } else {
      // Trigger animation
      requestAnimationFrame(() => {
        el.style.opacity = '1';
        el.style.transform = 'translateY(0) translateX(0) scale(1)';
      });
    }
    
    el.classList.add(CONFIG.visibleClass);
  }

  /**
   * Handle reduced motion preference
   */
  function handleReducedMotion() {
    document.documentElement.classList.add(CONFIG.reducedMotionClass);
    
    // Make all animated elements instantly visible
    document.querySelectorAll(CONFIG.animSelector).forEach(el => {
      el.style.opacity = '1';
      el.style.transform = 'none';
      el.style.transition = 'none';
      el.classList.add(CONFIG.visibleClass);
      
      // Handle stagger children
      const children = el.querySelectorAll(CONFIG.childSelector);
      children.forEach(child => {
        child.style.opacity = '1';
        child.style.transform = 'none';
        child.style.transition = 'none';
      });
    });
  }

  // ============================================
  // Sticky Header
  // ============================================

  function initStickyHeader() {
    const header = document.querySelector('header.sticky');
    if (!header) return;

    const scrollThreshold = 100;
    let lastScrollY = 0;
    let ticking = false;

    function updateHeader() {
      const scrollY = window.scrollY;
      
      if (scrollY > scrollThreshold) {
        header.classList.add('header-scrolled');
      } else {
        header.classList.remove('header-scrolled');
      }
      
      lastScrollY = scrollY;
      ticking = false;
    }

    function onScroll() {
      if (!ticking) {
        requestAnimationFrame(updateHeader);
        ticking = true;
      }
    }

    // Initial check
    updateHeader();
    
    // Listen for scroll
    window.addEventListener('scroll', onScroll, { passive: true });
  }

  // ============================================
  // Main Initialization
  // ============================================

  function init() {
    // Check for reduced motion preference
    if (prefersReducedMotion()) {
      handleReducedMotion();
      initStickyHeader();
      return;
    }

    // Get all animated elements
    const animatedElements = document.querySelectorAll(CONFIG.animSelector);
    
    if (!animatedElements.length) {
      initStickyHeader();
      return;
    }

    // Separate load-triggered and scroll-triggered elements
    const loadElements = [];
    const scrollElements = [];
    
    animatedElements.forEach(el => {
      const trigger = el.getAttribute('data-anim-trigger');
      if (trigger === 'load') {
        loadElements.push(el);
      } else {
        scrollElements.push(el);
      }
    });

    // Set initial state for all elements first
    animatedElements.forEach(setInitialState);

    // Animate load-triggered elements immediately
    loadElements.forEach((el, index) => {
      const delay = index * 50; // Small stagger for load elements
      requestAnimationFrame(() => {
        animateIn(el, delay);
      });
    });

    // Set up IntersectionObserver for scroll-triggered elements
    if ('IntersectionObserver' in window) {
      const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
          if (entry.isIntersecting && !entry.target.classList.contains(CONFIG.visibleClass)) {
            animateIn(entry.target);
            observer.unobserve(entry.target);
          }
        });
      }, {
        threshold: CONFIG.threshold,
        rootMargin: CONFIG.rootMargin
      });

      scrollElements.forEach(el => observer.observe(el));
    } else {
      // Fallback for browsers without IntersectionObserver
      scrollElements.forEach(el => animateIn(el));
    }

    // Initialize sticky header
    initStickyHeader();

    // Listen for reduced motion changes
    const mediaQuery = window.matchMedia('(prefers-reduced-motion: reduce)');
    mediaQuery.addEventListener('change', () => {
      if (mediaQuery.matches) {
        handleReducedMotion();
      }
    });
  }

  // ============================================
  // Start
  // ============================================

  // Run on DOM ready
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init);
  } else {
    init();
  }

})();
