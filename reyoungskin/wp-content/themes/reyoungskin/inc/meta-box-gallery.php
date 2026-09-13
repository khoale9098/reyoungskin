<?php
/**
 * Register Meta Box for Gallery Images
 *
 * @package ReyoungSkin
 */

// Add Meta Box only to the Gallery Page
function reyoungskin_add_gallery_meta_box() {
    global $post;
    if ( ! $post ) return;
    
    // Check if the current page uses the 'page-gallery.php' template
    $template_file = get_post_meta( $post->ID, '_wp_page_template', true );
    if ( $template_file == 'page-gallery.php' ) {
        add_meta_box(
            'reyoungskin_gallery_images_meta',
            'Gallery Images',
            'reyoungskin_gallery_meta_box_html',
            'page',
            'normal',
            'high'
        );
    }
}
add_action( 'add_meta_boxes', 'reyoungskin_add_gallery_meta_box' );

// Render the Meta Box HTML
function reyoungskin_gallery_meta_box_html( $post ) {
    wp_nonce_field( 'reyoungskin_gallery_save', 'reyoungskin_gallery_nonce' );
    $image_ids = get_post_meta( $post->ID, '_reyoungskin_gallery_images', true );
    ?>
    <style>
        .reyoungskin-gallery-container { display: flex; flex-wrap: wrap; gap: 15px; margin-bottom: 15px; }
        .reyoungskin-gallery-item { position: relative; width: 120px; height: 120px; border: 1px solid #ddd; background: #f9f9f9; border-radius: 4px; overflow: hidden; }
        .reyoungskin-gallery-item img { width: 100%; height: 100%; object-fit: cover; }
        .reyoungskin-gallery-remove { 
            position: absolute; 
            top: 5px; 
            right: 5px; 
            background: #d63638; 
            color: white; 
            border-radius: 50%; 
            width: 24px; 
            height: 24px; 
            text-align: center; 
            line-height: 22px; 
            cursor: pointer; 
            text-decoration: none; 
            font-weight: bold;
            box-shadow: 0 1px 3px rgba(0,0,0,0.3);
        }
        .reyoungskin-gallery-remove:hover { background: #b32d2e; color: white; }
    </style>
    
    <div class="reyoungskin-gallery-container" id="reyoungskin-gallery-container">
        <?php
        if ( ! empty( $image_ids ) ) {
            $ids_array = explode( ',', $image_ids );
            foreach ( $ids_array as $id ) {
                $url = wp_get_attachment_image_url( $id, 'thumbnail' );
                if ( $url ) {
                    echo '<div class="reyoungskin-gallery-item" data-id="' . esc_attr($id) . '">';
                    echo '<img src="' . esc_url($url) . '" />';
                    echo '<a href="#" class="reyoungskin-gallery-remove" title="Remove image">x</a>';
                    echo '</div>';
                }
            }
        }
        ?>
    </div>
    
    <input type="hidden" name="reyoungskin_gallery_images" id="reyoungskin_gallery_images" value="<?php echo esc_attr( $image_ids ); ?>" />
    
    <button type="button" class="button button-primary button-large" id="reyoungskin_upload_gallery_btn">Add Images</button>
    <p class="description" style="margin-top: 10px;">Click the button above to open the Media Library. You can hold <strong>Ctrl</strong> (Windows) or <strong>Command</strong> (Mac) to select multiple images at once.</p>
    
    <script>
    jQuery(document).ready(function($){
        var frame;
        $('#reyoungskin_upload_gallery_btn').on('click', function(e) {
            e.preventDefault();
            
            // If the media frame already exists, reopen it.
            if ( frame ) {
                frame.open();
                return;
            }
            
            // Create a new media frame
            frame = wp.media({
                title: 'Select Gallery Images',
                button: { text: 'Add to Gallery' },
                multiple: true
            });
            
            // When images are selected, run a callback.
            frame.on('select', function() {
                var selection = frame.state().get('selection');
                var container = $('#reyoungskin-gallery-container');
                var input = $('#reyoungskin_gallery_images');
                var current_ids = input.val() ? input.val().split(',') : [];
                
                selection.map(function(attachment) {
                    attachment = attachment.toJSON();
                    // Prevent duplicates
                    if ( current_ids.indexOf(attachment.id.toString()) === -1 ) {
                        current_ids.push(attachment.id);
                        var img_url = attachment.sizes && attachment.sizes.thumbnail ? attachment.sizes.thumbnail.url : attachment.url;
                        
                        container.append(
                            '<div class="reyoungskin-gallery-item" data-id="' + attachment.id + '">' +
                            '<img src="' + img_url + '" />' +
                            '<a href="#" class="reyoungskin-gallery-remove" title="Remove image">x</a>' +
                            '</div>'
                        );
                    }
                });
                // Update hidden input
                input.val(current_ids.join(','));
            });
            
            // Finally, open the modal
            frame.open();
        });

        // Remove image
        $('#reyoungskin-gallery-container').on('click', '.reyoungskin-gallery-remove', function(e) {
            e.preventDefault();
            var item = $(this).closest('.reyoungskin-gallery-item');
            var idToRemove = item.data('id').toString();
            item.remove();
            
            var input = $('#reyoungskin_gallery_images');
            var current_ids = input.val() ? input.val().split(',') : [];
            var index = current_ids.indexOf(idToRemove);
            if ( index > -1 ) {
                current_ids.splice(index, 1);
                input.val(current_ids.join(','));
            }
        });
    });
    </script>
    <?php
}

// Save the Meta Box data
function reyoungskin_save_gallery_meta( $post_id ) {
    if ( ! isset( $_POST['reyoungskin_gallery_nonce'] ) || ! wp_verify_nonce( $_POST['reyoungskin_gallery_nonce'], 'reyoungskin_gallery_save' ) ) {
        return;
    }
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return;
    }
    
    if ( isset( $_POST['reyoungskin_gallery_images'] ) ) {
        update_post_meta( $post_id, '_reyoungskin_gallery_images', sanitize_text_field( wp_unslash( $_POST['reyoungskin_gallery_images'] ) ) );
    } else {
        delete_post_meta( $post_id, '_reyoungskin_gallery_images' );
    }
}
add_action( 'save_post', 'reyoungskin_save_gallery_meta' );

// Enqueue WordPress media scripts
function reyoungskin_gallery_enqueue_admin_scripts( $hook ) {
    global $post;
    if ( $hook == 'post.php' || $hook == 'post-new.php' ) {
        if ( $post ) {
            $template_file = get_post_meta( $post->ID, '_wp_page_template', true );
            if ( $template_file == 'page-gallery.php' ) {
                wp_enqueue_media();
            }
        }
    }
}
add_action( 'admin_enqueue_scripts', 'reyoungskin_gallery_enqueue_admin_scripts' );
