<?php
// Add Metabox details
function contact_metabox(){
    add_meta_box(
        'contact_metabox_id',
        __('Contact Details', 'textdomain'),
        'contact_metabox_function',
        'post',
        'side'    // normal, side, advanced
        );
    }
add_action('add_meta_boxes', 'contact_metabox');

// Using Metabox function
function contact_metabox_function($post){
    $contact_contactperson  = get_post_meta($post->ID, 'contactperson', true);  // contact person
    $contact_phoneno        = get_post_meta($post->ID, 'phoneno', true);  // phone no
    $contact_websiteurl     = get_post_meta($post->ID, 'websiteurl', true);  // website url

    // nonce field
    wp_nonce_field('contact_metabox_noncefield_action', 'contact_metabox_noncefield_name');

    ?>
        <!-- contact person -->
        <label for="contactperson">Contact person</label>
        <input class="widefat" type="text" name="contactperson" id="contactperson" value="<?php echo $contact_contactperson; ?>">
        <p class="description">Mr. Ramasubramaniyam</p>

        <!-- phone no -->
        <label for="phoneno">Phone no.</label>
        <input class="widefat" type="text" name="phoneno" id="phoneno" value="<?php echo $contact_phoneno; ?>">
        <p class="description">0452-23659898</p>

        <!-- website url -->
        <label for="websiteurl">Website URL</label>
        <input class="widefat" type="text" name="websiteurl" id="websiteurl" value="<?php echo $contact_websiteurl; ?>">
        <p class="description">templename.com</p>
<?php
    } ?>

<!-- Saving the content -->
<?php

    function contact_metabox_save($post_id){

        if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE )
            return;

        // nonce field - action and name
        if(! isset( $_POST['contact_metabox_noncefield_name']) || !wp_verify_nonce($_POST['contact_metabox_noncefield_name'], 'contact_metabox_noncefield_action'))
            return;

        // contactperson
        if(isset($_POST['contactperson']) && ($_POST['contactperson'])) {
            update_post_meta($post_id, 'contactperson', esc_html($_POST['contactperson']));
            }

        // phoneno
        if(isset($_POST['phoneno']) && ($_POST['phoneno'])) {
            update_post_meta($post_id, 'phoneno', esc_html($_POST['phoneno']));
            }

        // websiteurl
        if(isset($_POST['websiteurl']) && ($_POST['websiteurl'])) {
            update_post_meta($post_id, 'websiteurl', esc_html($_POST['websiteurl']));
            }


        }
    add_action('save_post', 'contact_metabox_save');
 ?>
