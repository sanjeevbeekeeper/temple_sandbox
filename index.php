<?php get_header(); ?>
<!-- header -->

index.php

<!-- Loop start -->
<?php
    if ( have_posts() ) :
    while ( have_posts() ) : the_post();
    ?>

    <!-- Blog title -->
    <h3>
    <a href="<?php the_permalink(); ?>"> <?php the_title(); ?> </a>
    </h3>

    <!-- Loop end -->
    <?php
    endwhile;
    else:
        _e('There is no pages matches your criteria.');
    endif;
    ?>

<!-- footer -->
<?php get_footer(); ?>
