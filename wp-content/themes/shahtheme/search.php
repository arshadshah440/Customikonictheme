<?php

/**
 * Template for displaying search results.
 *
 * This template handles the search results page, displaying the matching posts
 * based on the user's query or an appropriate message if no results are found.
 *
 * @package shahwptheme
 */

get_header(); // Include the header template
?>

<div class="container_mi_ar">
    <main id="Main" class="padd_84_80 shah_main_content o_main" role="main">
        <!-- Search Results Article -->
        <article id="post_<?php the_ID(); ?>" <?php post_class(); ?>>

            <div class="shah_cms_content shah_search_content o_wrapper">
                <!-- Display the search query in the heading -->
                <h1 class="mb_ar_21">
                    <?php
                    // Display the formatted search query
                    printf(__('Search results for: "%s"', 'shahwptheme'), get_search_query());
                    ?>
                </h1>

                <?php if (have_posts()) : ?>
                    <!-- Load the post cards template part to display each search result -->
                    <?php get_template_part('template-parts/loopcards/content', 'card'); ?>

                <?php else : ?>
                    <!-- Message to display if no search results are found -->
                    <p><?php _e('No search results found.', 'shahwptheme'); ?></p>
                <?php endif; ?>
            </div>
        </article>
    </main>
</div>

<?php
get_footer(); // Include the footer template
?>