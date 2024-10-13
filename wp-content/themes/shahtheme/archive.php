<?php
/**
 * Template for displaying archive pages.
 *
 * @package shahwptheme
 */

get_header(); ?>

<div class="container_mi_ar">
    <div class="shah_layout padd_84_80">
        <main id="main" class="shah_main_content shah_main shah_layout__item" role="main">
            <article <?php post_class(); ?>>
                <!-- Display the archive title -->
                <h1 class="mb_ar_21"><?php the_archive_title(); ?></h1>
                
                <div class="shah_cms-content">
                    <?php if (have_posts()) : ?>
                        <div class="archive-posts-wrapper">
                            <?php
                            // Loop through posts
                            while (have_posts()) : the_post();
                                // Load the post card template part for displaying each post
                                get_template_part('template-parts/loopcards/content', 'card');
                            endwhile;
                            ?>
                        </div>

                        <!-- Pagination for navigating through the posts -->
                        <div class="pagination">
                            <?php
                            // Display pagination links if there are more posts to show
                            the_posts_pagination(array(
                                'mid_size' => 2,
                                'prev_text' => __('Previous', 'shahwptheme'),
                                'next_text' => __('Next', 'shahwptheme'),
                            ));
                            ?>
                        </div>

                    <?php else : ?>
                        <!-- Message displayed if no posts are found -->
                        <p><?php _e('No posts found.', 'shahwptheme'); ?></p>
                    <?php endif; ?>
                </div>
            </article>
        </main>
    </div>
</div>

<?php get_footer(); ?>
