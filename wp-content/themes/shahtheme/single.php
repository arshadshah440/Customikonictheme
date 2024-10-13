<?php

/**
 * The template for displaying single post posts.
 *
 * This template handles the layout and structure for displaying individual post posts,
 * utilizing Advanced Custom Fields (ACF) to display custom post data such as post name, 
 * start date, end date, and post description.
 *
 * @package shahwptheme
 */

// Include the header template
get_header();

// Fetch the post thumbnail URL
$thumbnail_url = get_the_post_thumbnail_url();
?>

<main id="main" class="site-main" role="main">
    <div class="container">
        <!-- Post Background Image Wrapper -->
        <div class="bg_image_wrapper" style="background-image: url(<?php echo esc_url($thumbnail_url); ?>);">
            <div class="overlay_ar">
                <!-- Display the post name or fallback to 'Post' if not available -->
                <h1><?php echo get_the_title(); ?></h1>

                <!-- Display post URL if available -->
                <a href="<?php echo esc_url(get_the_permalink()); ?>" target="__blank"><?php _e('Visit Post', 'shahwptheme'); ?></a>
            </div>
        </div>

        <!-- Check if post fields group is available from ACF -->
        <div class="container_mi_ar">
            <div class="post-details padd_84_80">
                <!-- Display post description if available -->
                <h3 class="mb_ar_21"><?php _e('Post Description', 'shahwptheme'); ?></h3>
                <div><?php echo wp_kses_post(get_the_content()); ?></div>
            </div>
        </div>
    </div>
</main><!-- #main -->

<?php
// Include the footer template
get_footer();
?>