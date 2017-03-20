<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php bloginfo('name'); wp_title(); ?></title>
        <meta name="description" content="<?php bloginfo('description'); ?>">
        <?php wp_head(); ?>
    </head>
<body <?php body_class(); ?>>

    <!-- Container fluid -->
    <div class="container-fluid">

        <!-- header -->
        <header>
            <h1>
                <a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a>
            </h1>
        </header>
        <hr>
