<?php
// Add Metabox details
function map_metabox(){
    add_meta_box(
        'map_metabox_id',
        __('Google Map', 'textdomain'),
        'map_metabox_function',
        'post',
        'normal'    // normal, side, advanced
        );
    }
add_action('add_meta_boxes', 'map_metabox');

// Using Metabox function
function map_metabox_function($post){

    $google_map  = get_post_meta($post->ID, 'google_map', true);  // Google map

    // nonce field
    wp_nonce_field('map_metabox_noncefield_action', 'map_metabox_noncefield_name');
    ?>

    <!-- Google map -->
    <label for="google_map"></label>
    <textarea class="widefat" name="google_map" id="google_map" rows="5" cols="80" placeholder="Copy paste the map code from google"><?php echo $google_map; ?></textarea>
    <p class="description">Enter only the source code Example src=&quot;&lt;THIS CODE&gt;&quot; here and do not copy paste the full iframe tag.</p>

<?php
    } ?>

<!-- Saving the content -->
<?php

    function map_metabox_save($post_id){

        if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE )
            return;

        // nonce field - action and name
        if(! isset( $_POST['map_metabox_noncefield_name']) || !wp_verify_nonce($_POST['map_metabox_noncefield_name'], 'map_metabox_noncefield_action'))
            return;

        // google map
        if(isset($_POST['google_map']) && ($_POST['google_map'])) {
            update_post_meta($post_id, 'google_map', esc_html($_POST['google_map']));
            }

        }
    add_action('save_post', 'map_metabox_save');
 ?>
