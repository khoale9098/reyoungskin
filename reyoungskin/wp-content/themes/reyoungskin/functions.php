<?php

if (is_file(__DIR__ . '/vendor/autoload_packages.php')) {
    require_once __DIR__ . '/vendor/autoload_packages.php';
}

function tailpress(): TailPress\Framework\Theme
{
    return TailPress\Framework\Theme::instance()
        ->assets(
            fn($manager) => $manager
                ->withCompiler(
                    new TailPress\Framework\Assets\ViteCompiler,
                    fn($compiler) => $compiler
                        ->registerAsset('resources/css/app.css')
                        ->registerAsset('resources/js/app.js')
                        ->editorStyleFile('resources/css/editor-style.css')
                )
                ->enqueueAssets()
        )
        ->features(fn($manager) => $manager->add(TailPress\Framework\Features\MenuOptions::class))
        ->menus(fn($manager) => $manager->add('primary', __('Primary Menu', 'tailpress')))
        ->themeSupport(fn($manager) => $manager->add([
            'title-tag',
            'custom-logo',
            'post-thumbnails',
            'align-wide',
            'wp-block-styles',
            'responsive-embeds',
            'html5' => [
                'search-form',
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
            ]
        ]));
}

tailpress();

// Include Customizer settings
require_once get_template_directory() . '/inc/customizer.php';

// Include ACF fields
require_once get_template_directory() . '/inc/acf-fields.php';

// Include Custom Post Types
require_once get_template_directory() . '/inc/cpt-pricing.php';
require_once get_template_directory() . '/inc/cpt-services.php';

// Include Custom Meta Boxes
require_once get_template_directory() . '/inc/meta-box-gallery.php';

// Auto-migrate old hardcoded pricing data to new CPT (runs once)
function reyoungskin_migrate_pricing_data() {
    if (get_option('reyoungskin_pricing_migrated')) {
        return;
    }
    
    if (!file_exists(get_template_directory() . '/inc/pricing-data.php')) {
        return;
    }
    
    require_once get_template_directory() . '/inc/pricing-data.php';
    if (!function_exists('reyoungskin_get_pricing_data')) return;
    
    $pricing_data = reyoungskin_get_pricing_data();
    $menu_order = 0;
    
    // Process Left Column
    if (isset($pricing_data['left_column'])) {
        foreach ($pricing_data['left_column'] as $item) {
            $content = '';
            if (isset($item['paragraphs'])) {
                foreach ($item['paragraphs'] as $p) {
                    $content .= '<p>' . esc_html($p) . '</p>';
                }
            }
            if (isset($item['subsections'])) {
                foreach ($item['subsections'] as $sub) {
                    if (isset($sub['heading'])) {
                        $content .= '<h4>' . esc_html($sub['heading']) . '</h4>';
                    }
                    if (isset($sub['text'])) {
                        $content .= '<p>' . esc_html($sub['text']) . '</p>';
                    }
                    if (isset($sub['bullets'])) {
                        $content .= '<ul>';
                        foreach ($sub['bullets'] as $bullet) {
                            $content .= '<li>' . esc_html($bullet) . '</li>';
                        }
                        $content .= '</ul>';
                    }
                }
            }
            if (isset($item['note'])) {
                $content .= '<p><em>' . esc_html($item['note']) . '</em></p>';
            }
            
            $post_id = wp_insert_post(array(
                'post_title' => $item['title'],
                'post_content' => $content,
                'post_status' => 'publish',
                'post_type' => 'pricing_item',
                'menu_order' => $menu_order++,
            ));
            
            if ($post_id) {
                update_post_meta($post_id, 'price', isset($item['price']) ? $item['price'] : '');
                update_post_meta($post_id, 'was_price', isset($item['was_price']) ? $item['was_price'] : '');
                update_post_meta($post_id, 'extra_price', isset($item['extra_price']) ? $item['extra_price'] : '');
                update_post_meta($post_id, 'column', 'left');
            }
        }
    }
    
    // Process Right Column
    if (isset($pricing_data['right_column'])) {
        foreach ($pricing_data['right_column'] as $item) {
            $content = '';
            if (isset($item['paragraphs'])) {
                foreach ($item['paragraphs'] as $p) {
                    $content .= '<p>' . esc_html($p) . '</p>';
                }
            }
            if (isset($item['subitems'])) {
                foreach ($item['subitems'] as $sub) {
                    $sub_title = isset($sub['title']) ? $sub['title'] : '';
                    $sub_price = isset($sub['price']) ? $sub['price'] : '';
                    $sub_text = isset($sub['text']) ? $sub['text'] : '';
                    $content .= '<h4>' . esc_html($sub_title) . ' ' . esc_html($sub_price) . '</h4>';
                    if ($sub_text) {
                        $content .= '<p>' . esc_html($sub_text) . '</p>';
                    }
                }
            }
            if (isset($item['subsections'])) {
                foreach ($item['subsections'] as $sub) {
                    if (isset($sub['heading'])) {
                        $content .= '<h4>' . esc_html($sub['heading']) . '</h4>';
                    }
                    if (isset($sub['text'])) {
                        $content .= '<p>' . esc_html($sub['text']) . '</p>';
                    }
                    if (isset($sub['bullets'])) {
                        $content .= '<ul>';
                        foreach ($sub['bullets'] as $bullet) {
                            $content .= '<li>' . esc_html($bullet) . '</li>';
                        }
                        $content .= '</ul>';
                    }
                }
            }
            if (isset($item['note'])) {
                $content .= '<p><em>' . esc_html($item['note']) . '</em></p>';
            }
            
            $post_id = wp_insert_post(array(
                'post_title' => $item['title'],
                'post_content' => $content,
                'post_status' => 'publish',
                'post_type' => 'pricing_item',
                'menu_order' => $menu_order++,
            ));
            
            if ($post_id) {
                update_post_meta($post_id, 'price', isset($item['price']) ? $item['price'] : '');
                update_post_meta($post_id, 'was_price', isset($item['was_price']) ? $item['was_price'] : '');
                update_post_meta($post_id, 'extra_price', isset($item['extra_price']) ? $item['extra_price'] : '');
                update_post_meta($post_id, 'column', 'right');
            }
        }
    }
    
    update_option('reyoungskin_pricing_migrated', true);
}
add_action('admin_init', 'reyoungskin_migrate_pricing_data');

// Auto-migrate old hardcoded services data to new CPT (runs once)
function reyoungskin_migrate_services_data() {
    if (get_option('reyoungskin_services_migrated')) {
        return;
    }

    if (!file_exists(get_template_directory() . '/inc/services-data.php')) {
        return;
    }

    require_once get_template_directory() . '/inc/services-data.php';
    if (!function_exists('reyoungskin_get_services_data')) return;

    $services = reyoungskin_get_services_data();

    foreach ($services as $item) {
        $post_id = wp_insert_post(array(
            'post_title'   => $item['title'],
            'post_status'  => 'publish',
            'post_type'    => 'service_item',
            'menu_order'   => isset($item['order']) ? $item['order'] : 0,
        ));

        if ($post_id) {
            if (!empty($item['image'])) {
                update_post_meta($post_id, '_service_image_url', $item['image']);
            }
        }
    }

    update_option('reyoungskin_services_migrated', true);
}
add_action('admin_init', 'reyoungskin_migrate_services_data');

