<?php
// Add Metabox details
function content_url_metabox(){
    add_meta_box(
        'content_url_metabox_id',
        __('Content URL', 'textdomain'),
        'content_url_metabox_function',
        'post',
        'normal'    // normal, side, advanced
        );
    }
add_action('add_meta_boxes', 'content_url_metabox');

// Using Metabox function
function content_url_metabox_function($post){

    $content_title  = get_post_meta($post->ID, 'content_title', true);  // content title
    $content_url  = get_post_meta($post->ID, 'content_url', true);  // content url

    // nonce field
    wp_nonce_field('content_url_metabox_noncefield_action', 'content_url_metabox_noncefield_name');
    ?>

    <!-- content title -->
    <p>
        <label for="content_title">Link Title</label>
        <input class="widefat" type="text" name="content_title" id="content_title" value="<?php echo $content_title; ?>">
    </p>

    <!-- content url -->
    <p>
        <label for="content_url">URL</label>
        <input class="widefat" type="text" name="content_url" id="content_url" value="<?php echo $content_url; ?>">
        <span class="description">Ex: www.content.com</span>
    </p>

<?php
    } ?>

<!-- Saving the content -->
<?php

    function content_url_metabox_save($post_id){

        if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE )
            return;

        // nonce field - action and name
        if(! isset( $_POST['content_url_metabox_noncefield_name']) || !wp_verify_nonce($_POST['content_url_metabox_noncefield_name'], 'content_url_metabox_noncefield_action'))
            return;

        // google content_url
        if(isset($_POST['content_title']) && ($_POST['content_title'])) {
            update_post_meta($post_id, 'content_title', esc_html($_POST['content_title']));
            }

        // google content_url
        if(isset($_POST['content_url']) && ($_POST['content_url'])) {
            update_post_meta($post_id, 'content_url', esc_html($_POST['content_url']));
            }

        }
    add_action('save_post', 'content_url_metabox_save');
 ?>
