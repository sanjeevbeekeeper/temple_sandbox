<?php
// Add Metabox details
function summary_metabox(){
    add_meta_box(
        'summary_metabox_id',
        __('Summary', 'textdomain'),
        'summary_metabox_function',
        'post',
        'normal'    // normal, side, advanced
        );
    }
add_action('add_meta_boxes', 'summary_metabox');

// Using Metabox function
function summary_metabox_function($post){

    $primary_deity  = get_post_meta($post->ID, 'pri_deity', true);  // content title
    $direction  = get_post_meta($post->ID, 'direction', true);  // content title
    $location  = get_post_meta($post->ID, 'location', true);  // content title

    // nonce field
    wp_nonce_field('summary_metabox_noncefield_action', 'summary_metabox_noncefield_name');
    ?>

    <!-- content title -->
    <p>
        <label for="pri_deity">Primary Deity</label>
        <input class="widefat" type="text" name="pri_deity" id="pri_deity" value="<?php echo $primary_deity; ?>">
    </p>

    <!-- content title -->
    <p>
        <label for="direction">Direction</label>
        <input class="widefat" type="text" name="direction" id="direction" value="<?php echo $direction; ?>">
    </p>

    <!-- content title -->
    <p>
        <label for="location">Location</label>
        <input class="widefat" type="text" name="location" id="location" value="<?php echo $location; ?>">
    </p>

<?php
    } ?>

<!-- Saving the content -->
<?php

    function summary_metabox_save($post_id){

        if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE )
            return;

        // nonce field - action and name
        if(! isset( $_POST['summary_metabox_noncefield_name']) || !wp_verify_nonce($_POST['summary_metabox_noncefield_name'], 'summary_metabox_noncefield_action'))
            return;

        // primary deity
        if(isset($_POST['pri_deity']) && ($_POST['pri_deity'])) {
            update_post_meta($post_id, 'pri_deity', esc_html($_POST['pri_deity']));
            }

        // primary deity
        if(isset($_POST['direction']) && ($_POST['direction'])) {
            update_post_meta($post_id, 'direction', esc_html($_POST['direction']));
            }

        // primary deity
        if(isset($_POST['location']) && ($_POST['location'])) {
            update_post_meta($post_id, 'location', esc_html($_POST['location']));
            }

        }
    add_action('save_post', 'summary_metabox_save');
 ?>
