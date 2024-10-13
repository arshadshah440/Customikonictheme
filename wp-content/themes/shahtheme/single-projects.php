<?php
/**
 * The template for displaying single project posts.
 *
 * This template handles the layout and structure for displaying individual project posts,
 * utilizing Advanced Custom Fields (ACF) to display custom project data such as project name, 
 * start date, end date, and project description.
 *
 * @package shahwptheme
 */

get_header(); // Include the header template

// Fetch the post thumbnail URL
$thumbnail_url = get_the_post_thumbnail_url();
$project_fields_group = false;

// Check if ACF is available and retrieve the project fields group
if (function_exists('get_field')) {
    $project_fields_group = get_field('project_fields_group');
}
?>

<main id="main" class="site-main" role="main">

    <div class="container">
        <!-- Project Background Image Wrapper -->
        <div class="bg_image_wrapper" style="background-image: url(<?php echo esc_url($thumbnail_url); ?>);">
            <div class="overlay_ar">
                <!-- Display the project name or fallback to 'Project' if not available -->
                <h1><?php echo (!empty($project_fields_group['project_name'])) ? esc_html($project_fields_group['project_name']) : esc_html__('Project', 'shahwptheme'); ?></h1>

                <!-- Display project start and end dates if available -->
                <?php if (!empty($project_fields_group['project_start_date'])): ?>
                    <p class="font_16_400 text_white_op60_ar">
                        <strong><?php _e('Start Date:', 'shahwptheme'); ?></strong> <?php echo esc_html($project_fields_group['project_start_date']); ?> - 
                        <strong><?php _e('End Date:', 'shahwptheme'); ?></strong> <?php echo esc_html($project_fields_group['project_end_date']); ?>
                    </p>
                <?php endif; ?>

                <!-- Display project URL if available -->
                <?php if (!empty($project_fields_group['project_url'])): ?>
                    <a href="<?php echo esc_url($project_fields_group['project_url']); ?>" target="__blank"><?php _e('Visit Project', 'shahwptheme'); ?></a>
                <?php endif; ?>
            </div>
        </div>

        <!-- Check if project fields group is available from ACF -->
        <?php if ($project_fields_group): ?>
            <div class="container_mi_ar">
                <div class="project-details padd_84_80">
                    <!-- Display project description if available -->
                    <?php if (!empty($project_fields_group['project_description'])): ?>
                        <h3 class="mb_ar_21"><?php _e('Project Description', 'shahwptheme'); ?></h3>
                        <div><?php echo wp_kses_post($project_fields_group['project_description']); ?></div>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>

</main><!-- #main -->

<?php 
get_footer(); // Include the footer template
?>
