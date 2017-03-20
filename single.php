<?php get_header(); ?>
<!-- header -->

<div class="container">
    <div class="row">
        <div class="col-lg-9">

            <!-- Temple location and Contact and Google map from WordPress Dashboard -->
            <?php
                // Summary
                $direction  = get_post_meta($post->ID, 'direction', true);  // Google direction
                $primary_deity  = get_post_meta($post->ID, 'pri_deity', true);  // content title
                $location  = get_post_meta($post->ID, 'location', true);  // Google direction
                // Temple Address
                $temple_address     = get_post_meta($post->ID, 'address', true);  // address
                // Contact details
                $contact_contactperson  = get_post_meta($post->ID, 'contactperson', true);  // contact person
                $contact_phoneno        = get_post_meta($post->ID, 'phoneno', true);  // phone no
                $contact_websiteurl     = get_post_meta($post->ID, 'websiteurl', true);  // website url
                // Google map
                $google_map  = get_post_meta($post->ID, 'google_map', true);  // map person
                // direction
                // content title and url
                $content_title  = get_post_meta($post->ID, 'content_title', true);  // content title
                $content_url  = get_post_meta($post->ID, 'content_url', true);  // content url
            ?>


            <!-- Loop start -->
            <?php
            if ( have_posts() ) :
                while ( have_posts() ) : the_post();
                ?>

            <!-- Background Image -->
            <div class="more_pages_far"></div>
            <div class="more_pages_back"></div>
            <div class="content_container">

                <!-- Image container -->
                <div class="content_container_img">
                    <img src="<?php bloginfo('template_directory'); ?>/img/cover.jpg" class="card-img-top" alt="Temple Image.jpg">
                </div>

                <!-- title -->
                <h1 class="container_padding container_separator_bottom">
                    <?php the_title(); ?>
                </h1>

                <!-- Summary -->
                <div class="container_padding">
                    <!-- Primary deity -->
                    <button type="button" class="btn btn-outline-info btn-sm">
                        <i class="fa fa-universal-access"></i> <?php echo $primary_deity; ?>
                    </button>

                    <button type="button" class="btn btn-outline-location btn-sm">
                        <i class="fa fa-location-arrow"></i> <?php echo $location; ?>
                    </button>
                    <button type="button" class="btn btn-outline-direction btn-sm">
                        <i class="fa fa-arrows"></i> <?php echo $direction; ?> facing
                    </button>
                    <button type="button" class="btn btn-outline-direction btn-sm">
                        <i class="fa fa-archive"></i> Hundi
                    </button>
                </div>

                <!-- Content title -->
                <div class="container_padding container_separator_top">

                    <!-- The Content -->
                        <?php the_content(); ?>
                        <div class="">
                            Source: <a href="<?php echo $content_url; ?>" title="<?php echo $content_title; ?>"><?php echo $content_title; ?></a>
                        </div>
                </div>

                <!-- google map -->
                <div class="content_container_inner">
                    <iframe src="<?php echo $google_map; ?>" width="100%" height="250" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>

            </div>

        </div> <!-- col closing -->

        <!-- SIDEBAR -->
        <div class="col-lg-3 sidebar">

            <!-- Timing -->
            <h4 class="sub_title">Timing</h4>
            <ul class="contact_details list-group list-group-flush sidebar_panel">
                <li class="list-group-item">
                    <strong>Weekdays:</strong> <br>
                    04:00 - 09:00 / 14:00 - 21:00
                </li>
                <li class="list-group-item">
                    <strong>Weekend:</strong> <br>
                    02:00 - 10:00 / 13:00 - 21:30
                </li>
            </ul> <!-- // .list-group -->


            <!-- contact details -->
            <h4 class="sub_title">Contacts</h4>
            <ul class="contact_details list-group list-group-flush sidebar_panel">
                <li class="list-group-item">
                    <strong>Address:</strong> <br>
                    <?php echo $temple_address; ?>
                </li>
                <li class="list-group-item">
                    <strong>Contact:</strong> <br>
                    <?php echo $contact_contactperson; ?>
                </li>
                <li class="list-group-item">
                    <strong>Phone:</strong> <br>
                    <?php echo $contact_phoneno; ?>
                </li>
                <li class="list-group-item">
                    <strong>Website:</strong> <br>
                    http://www.<?php echo $contact_websiteurl; ?>
                </li>
            </ul> <!-- // .list-group -->

            <h4 class="sub_title">Other Deities in the Temple</h4>
            <ul class="list-group list-group-flush sidebar_panel">
                <!-- List -->
                <li class="list-group-item list-group-item-action">
                    <form>
                        <input class="form-control" id="godsearch" data-list=".highlight_list" type="text" placeholder="Filter Deities here">
                    </form>
                </li>
                <a href="#" class="text-primary list-group-item list-group-item-action"> Dakshinamurthy
                </a>
                <a href="#" class="text-primary list-group-item list-group-item-action"> Sundareeswarar
                </a>
                <a href="#" class="text-primary list-group-item list-group-item-action"> Jagadeeswarar
                </a>
                <a href="#" class="text-primary list-group-item list-group-item-action"> Bhairavar
                </a>
                <a href="#" class="text-primary list-group-item list-group-item-action"> Annamalaiyarar
                </a>
                <a href="#" class="text-primary list-group-item list-group-item-action"> Natarajar Sivakami Amman
                </a>
            </ul>

        </div> <!-- // .col -->
    </div> <!-- // .row -->
    <!-- // SIDEBAR -->

            <!-- Loop end -->
            <?php
            endwhile;
            else:
                _e('There is no pages matches your criteria.');
            endif;
            ?>

            <!-- advertisement -->
            <div class="card card-danger" style="height: 150px;">
                <div class="card-block">Advertisement</div>
            </div>

        </div> <!-- col 3 closing -->
    </div> <!-- // .row -->
</div> <!-- // .container -->


<!-- footer -->
<?php get_footer(); ?>
