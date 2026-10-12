<?php
/**
 * Register Services Custom Post Type & Meta Boxes
 *
 * @package ReyoungSkin
 */

// 1. Register Custom Post Type
function reyoungskin_register_services_cpt() {
    $labels = array(
        'name'                  => _x( 'Services', 'Post Type General Name', 'reyoungskin' ),
        'singular_name'         => _x( 'Service', 'Post Type Singular Name', 'reyoungskin' ),
        'menu_name'             => __( 'Services', 'reyoungskin' ),
        'name_admin_bar'        => __( 'Service', 'reyoungskin' ),
        'archives'              => __( 'Service Archives', 'reyoungskin' ),
        'attributes'            => __( 'Service Attributes', 'reyoungskin' ),
        'parent_item_colon'     => __( 'Parent Service:', 'reyoungskin' ),
        'all_items'             => __( 'All Services', 'reyoungskin' ),
        'add_new_item'          => __( 'Add New Service', 'reyoungskin' ),
        'add_new'               => __( 'Add New', 'reyoungskin' ),
        'new_item'              => __( 'New Service', 'reyoungskin' ),
        'edit_item'             => __( 'Edit Service', 'reyoungskin' ),
        'update_item'           => __( 'Update Service', 'reyoungskin' ),
        'view_item'             => __( 'View Service', 'reyoungskin' ),
        'view_items'            => __( 'View Services', 'reyoungskin' ),
        'search_items'          => __( 'Search Service', 'reyoungskin' ),
        'not_found'             => __( 'No services found', 'reyoungskin' ),
        'not_found_in_trash'    => __( 'No services found in Trash', 'reyoungskin' ),
        'featured_image'        => __( 'Service Image', 'reyoungskin' ),
        'set_featured_image'    => __( 'Set service image', 'reyoungskin' ),
        'remove_featured_image' => __( 'Remove service image', 'reyoungskin' ),
        'use_featured_image'    => __( 'Use as service image', 'reyoungskin' ),
        'items_list'            => __( 'Services list', 'reyoungskin' ),
        'items_list_navigation' => __( 'Services list navigation', 'reyoungskin' ),
        'filter_items_list'     => __( 'Filter services list', 'reyoungskin' ),
    );

    $args = array(
        'label'                 => __( 'Service', 'reyoungskin' ),
        'description'           => __( 'Services displayed on homepage Our Services section', 'reyoungskin' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'thumbnail', 'page-attributes' ),
        'taxonomies'            => array(),
        'hierarchical'          => false,
        'public'                => false,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 21,
        'menu_icon'             => 'dashicons-sparkles',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => false,
        'can_export'            => true,
        'has_archive'           => false,
        'exclude_from_search'   => true,
        'publicly_queryable'    => false,
        'capability_type'       => 'page',
        'show_in_rest'          => true,
    );

    register_post_type( 'service_item', $args );
}
add_action( 'init', 'reyoungskin_register_services_cpt', 0 );


// 2. Add Meta Box for Service Image Upload
function reyoungskin_add_service_meta_box() {
    add_meta_box(
        'reyoungskin_service_details_meta',
        __( 'Service Image', 'reyoungskin' ),
        'reyoungskin_service_meta_box_html',
        'service_item',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'reyoungskin_add_service_meta_box' );


// 3. Render Meta Box HTML
function reyoungskin_service_meta_box_html( $post ) {
    wp_nonce_field( 'reyoungskin_service_save', 'reyoungskin_service_nonce' );

    $image_id  = get_post_meta( $post->ID, '_service_image_id', true );
    $image_url = get_post_meta( $post->ID, '_service_image_url', true );

    // If thumbnail exists, sync with image_id
    $thumbnail_id = get_post_thumbnail_id( $post->ID );
    if ( ! empty( $thumbnail_id ) && empty( $image_id ) ) {
        $image_id = $thumbnail_id;
    }

    // Resolve current preview URL
    $preview_url = '';
    if ( ! empty( $image_id ) ) {
        $preview_url = wp_get_attachment_image_url( $image_id, 'medium' );
    }
    if ( empty( $preview_url ) && ! empty( $image_url ) ) {
        $preview_url = $image_url;
    }
    ?>
    <style>
        .service-meta-field { margin-bottom: 15px; }
        .service-image-preview-wrapper { 
            width: 260px; 
            height: 195px; 
            border: 2px dashed #ccd0d4; 
            border-radius: 8px; 
            overflow: hidden; 
            display: flex; 
            align-items: center; 
            justify-content: center; 
            background: #f0f0f1; 
            position: relative; 
            margin-bottom: 12px;
        }
        .service-image-preview-wrapper img { width: 100%; height: 100%; object-fit: cover; }
        .service-image-preview-wrapper .placeholder-text { color: #8c8f94; font-size: 13px; text-align: center; }
        .service-image-actions { display: flex; gap: 10px; align-items: center; }
    </style>

    <div class="service-meta-field">
        <div class="service-image-preview-wrapper" id="service_image_preview">
            <?php if ( ! empty( $preview_url ) ) : ?>
                <img src="<?php echo esc_url( $preview_url ); ?>" alt="Service Preview" />
            <?php else : ?>
                <span class="placeholder-text"><?php _e( 'No image selected', 'reyoungskin' ); ?></span>
            <?php endif; ?>
        </div>

        <input type="hidden" name="service_image_id" id="service_image_id" value="<?php echo esc_attr( $image_id ); ?>" />
        <input type="hidden" name="service_image_url" id="service_image_url" value="<?php echo esc_attr( $image_url ); ?>" />

        <div class="service-image-actions">
            <button type="button" class="button button-primary" id="service_upload_image_btn">
                <?php _e( 'Upload / Select Image', 'reyoungskin' ); ?>
            </button>
            <button type="button" class="button" id="service_remove_image_btn" style="<?php echo empty( $preview_url ) ? 'display:none;' : ''; ?>">
                <?php _e( 'Remove Image', 'reyoungskin' ); ?>
            </button>
        </div>
        <p class="description" style="margin-top: 8px;">
            <?php _e( 'Recommended ratio: 4:3 (e.g. 800x600px). You can also upload directly using the "Featured Image" box on the right.', 'reyoungskin' ); ?>
        </p>
    </div>

    <script>
    jQuery(document).ready(function($) {
        var mediaFrame;

        $('#service_upload_image_btn').on('click', function(e) {
            e.preventDefault();

            if (mediaFrame) {
                mediaFrame.open();
                return;
            }

            mediaFrame = wp.media({
                title: '<?php _e( "Select or Upload Service Image", "reyoungskin" ); ?>',
                button: { text: '<?php _e( "Use this Image", "reyoungskin" ); ?>' },
                multiple: false
            });

            mediaFrame.on('select', function() {
                var attachment = mediaFrame.state().get('selection').first().toJSON();
                $('#service_image_id').val(attachment.id);
                var url = attachment.sizes && attachment.sizes.medium ? attachment.sizes.medium.url : attachment.url;
                $('#service_image_url').val(attachment.url);

                $('#service_image_preview').html('<img src="' + url + '" alt="Service Preview" />');
                $('#service_remove_image_btn').show();

                // Also sync with WordPress core featured image if available
                if (wp.media.featuredImage) {
                    wp.media.featuredImage.set(attachment.id);
                }
            });

            mediaFrame.open();
        });

        $('#service_remove_image_btn').on('click', function(e) {
            e.preventDefault();
            $('#service_image_id').val('');
            $('#service_image_url').val('');
            $('#service_image_preview').html('<span class="placeholder-text"><?php _e( "No image selected", "reyoungskin" ); ?></span>');
            $(this).hide();

            if (wp.media.featuredImage) {
                wp.media.featuredImage.remove();
            }
        });
    });
    </script>
    <?php
}


// 4. Save Service Meta Box Data
function reyoungskin_save_service_meta( $post_id ) {
    if ( ! isset( $_POST['reyoungskin_service_nonce'] ) ) {
        return;
    }
    if ( ! wp_verify_nonce( $_POST['reyoungskin_service_nonce'], 'reyoungskin_service_save' ) ) {
        return;
    }
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return;
    }

    if ( isset( $_POST['service_image_id'] ) ) {
        $img_id = absint( $_POST['service_image_id'] );
        update_post_meta( $post_id, '_service_image_id', $img_id );
        if ( $img_id > 0 ) {
            set_post_thumbnail( $post_id, $img_id );
        }
    }

    if ( isset( $_POST['service_image_url'] ) ) {
        update_post_meta( $post_id, '_service_image_url', esc_url_raw( $_POST['service_image_url'] ) );
    }
}
add_action( 'save_post_service_item', 'reyoungskin_save_service_meta' );


// 5. Enqueue Media Scripts in Admin
function reyoungskin_admin_service_scripts( $hook ) {
    global $post_type;
    if ( ( 'post.php' === $hook || 'post-new.php' === $hook ) && 'service_item' === $post_type ) {
        wp_enqueue_media();
    }
}
add_action( 'admin_enqueue_scripts', 'reyoungskin_admin_service_scripts' );


// 6. Customize Admin Columns for Service List Table
function reyoungskin_service_columns( $columns ) {
    $new_columns = array();
    $new_columns['cb']          = $columns['cb'];
    $new_columns['service_img'] = __( 'Image', 'reyoungskin' );
    $new_columns['title']       = __( 'Service Title', 'reyoungskin' );
    $new_columns['menu_order']  = __( 'Order', 'reyoungskin' );
    $new_columns['date']        = $columns['date'];
    return $new_columns;
}
add_filter( 'manage_service_item_posts_columns', 'reyoungskin_service_columns' );

function reyoungskin_service_column_content( $column, $post_id ) {
    if ( 'service_img' === $column ) {
        $image_url = '';
        if ( has_post_thumbnail( $post_id ) ) {
            $image_url = get_the_post_thumbnail_url( $post_id, 'thumbnail' );
        } else {
            $img_id = get_post_meta( $post_id, '_service_image_id', true );
            if ( $img_id ) {
                $image_url = wp_get_attachment_image_url( $img_id, 'thumbnail' );
            } else {
                $image_url = get_post_meta( $post_id, '_service_image_url', true );
            }
        }

        if ( ! empty( $image_url ) ) {
            echo '<img src="' . esc_url( $image_url ) . '" style="width: 50px; height: 50px; object-fit: cover; border-radius: 4px; box-shadow: 0 1px 3px rgba(0,0,0,0.1);" />';
        } else {
            echo '<span style="color: #999;">' . __( 'No image', 'reyoungskin' ) . '</span>';
        }
    } elseif ( 'menu_order' === $column ) {
        $post = get_post( $post_id );
        echo esc_html( $post->menu_order );
    }
}
add_action( 'manage_service_item_posts_custom_column', 'reyoungskin_service_column_content', 10, 2 );

function reyoungskin_service_sortable_columns( $columns ) {
    $columns['menu_order'] = 'menu_order';
    return $columns;
}
add_filter( 'manage_edit-service_item_sortable_columns', 'reyoungskin_service_sortable_columns' );
