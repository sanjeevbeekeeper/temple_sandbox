<?php
// Add Metabox details
function address_metabox(){
    add_meta_box(
        'address_metabox_id',
        __('Temple Address', 'textdomain'),
        'address_metabox_function',
        'post',
        'side'    // normal, side, advanced
        );
    }
add_action('add_meta_boxes', 'address_metabox');

// Using Metabox function
function address_metabox_function($post){
    $temple_address     = get_post_meta($post->ID, 'address', true);  // address

    // nonce field
    wp_nonce_field('address_metabox_noncefield_action', 'address_metabox_noncefield_name');

    ?>
        <!-- address -->
        <label for="address"></label>
        <textarea class="widefat" name="address" id="address" rows="2" ><?php echo $temple_address ?></textarea>
        <!-- <input class="widefat" type="text" name="address" id="address" value="<?php //echo $address_address; ?>"> -->
        <p class="description">#23 South Mada vedhi Street</p>

<?php
    } ?>

<!-- Saving the content -->
<?php

    function save_our_custom_data($post_id){

        if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE )
            return;

        // nonce field - action and name
        if(! isset( $_POST['address_metabox_noncefield_name']) || !wp_verify_nonce($_POST['address_metabox_noncefield_name'], 'address_metabox_noncefield_action'))
            return;

        // address
        if(isset($_POST['address']) && ($_POST['address'])) {
            update_post_meta($post_id, 'address', esc_html($_POST['address']));
            }

        }
    add_action('save_post', 'save_our_custom_data');
 ?>
