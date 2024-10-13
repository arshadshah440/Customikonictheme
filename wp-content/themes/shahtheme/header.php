<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <!--
    Meta tags and header information.
    
    @package shahwptheme
    -->

    <!-- Define character encoding for the HTML document -->
    <meta charset="<?php bloginfo('charset'); ?>">

    <!-- Ensure the site is responsive by setting the viewport width to the device width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Set the title of the webpage dynamically using the site name and the current page title -->
    <title><?php bloginfo('name'); ?> - <?php the_title(); ?></title>

    <!-- Hook to include scripts, styles, and other head elements dynamically -->
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <!--
    Body starts here.
    
    Dynamically adds the class attribute to the body element to help with styling based on context.
    The wp_body_open function is used to ensure proper hook support for themes.
    -->

    <!-- Hook to include scripts or actions right after opening the body tag -->
    <?php wp_body_open(); ?>

    <!-- Site Header Section -->
    <div class="header_ar" id="header">
        <?php
        // Include the navigation bar from the template parts folder
        include get_template_directory() . '/template-parts/header/Navbar.php';
        ?>
    </div>
    <!-- End of Header Section -->