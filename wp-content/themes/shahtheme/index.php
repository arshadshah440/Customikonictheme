<?php

/**
 * Template for displaying a single post or page.
 *
 * This template fetches and displays the content of the current post or page.
 * It ensures that the header, main content, and footer are included correctly.
 *
 * @package shahwptheme
 */

get_header(); // Include the header template
?>

<div class="container_mi_ar">
    <main id="Mains" class="c-main-content o-main" role="main">
        <?php
        // Check if there are posts to display and loop through the available posts
        if (have_posts()) :
            while (have_posts()) : the_post(); // Start the loop for each post
        ?>

                <!-- Article section for the current post/page -->
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                    <!-- Main content of the post/page -->
                    <div class="c-cms-content o-wrapper">
                        <!-- Display the title of the post/page -->
                        <h1><?php the_title(); ?></h1>

                        <!-- Display the content of the post/page -->
                        <?php the_content(); ?>
                    </div>

                    <!-- Display pagination if the post/page is split into multiple pages -->
                    <?php wp_link_pages(); ?>
                </article>

        <?php
            endwhile; // End the loop
        endif; // End if statement checking for posts
        ?>
    </main>
</div>

<?php
get_footer(); // Include the footer template
?>