<?php

/**
 * Custom WP Theme functions and definitions.
 *
 * This file contains the main functions and theme setup for shahwptheme.
 * 
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package shahwptheme
 * @since 1.0.0
 */

if (!defined('WPINC')) {
    die('Please do not load this file directly. Thanks!');
}

class Shahwptheme
{
    const VERSION = '1.0.0';

    public function __construct()
    {
        // Include necessary files for theme functionality
        $this->include_all_files();

        // Add theme support for post thumbnails
        add_theme_support('post-thumbnails');

        // Enqueue front-end styles and scripts
        add_action('wp_enqueue_scripts', [$this, 'enqueue_assets']);

        // Enqueue admin styles
        add_action('admin_enqueue_scripts', [$this, 'enqueue_admin_styles']);

        // Register custom navigation menu
        add_action('init', [$this, 'register_menu']);

        // Add settings to the theme customizer
        add_action('customize_register', [$this, 'customize_register']);

        // Register custom REST API endpoints
        add_action('rest_api_init', [$this, 'register_endpoints']);

        // Add support for SVG file uploads
        add_filter('upload_mimes', [$this, 'cc_mime_types']);
    }

    /**
     * Register custom REST API endpoints.
     */
    public function register_endpoints()
    {
        // Register endpoint for fetching closest pickup points
        register_rest_route('smart-send-logistics/v1', '/get-closest-pickup-points', [
            'methods' => 'POST',
            'callback' => [$this, 'get_pickup_points_callback'],
            'permission_callback' => '__return_true',
        ]);

        // Register endpoint for fetching projects
        register_rest_route('shahwptheme/v1', '/projects', [
            'methods'  => 'GET',
            'callback' => [$this, 'shahwptheme_get_projects'],
            'permission_callback' => '__return_true',
        ]);
    }

    /**
     * Add SVG support in the WordPress media uploader.
     *
     * @param array $mimes Allowed mime types.
     * @return array Updated mime types.
     */
    public function cc_mime_types($mimes)
    {
        $mimes['svg'] = 'image/svg+xml';
        return $mimes;
    }

    /**
     * Callback function to retrieve projects with ACF fields via REST API.
     *
     * @return WP_REST_Response JSON response of projects.
     */
    public function shahwptheme_get_projects(WP_REST_Request $request)
    {
        // Initialize an empty array to hold the projects
        $projects = [];

        // Query all posts of type 'projects'
        $args = [
            'post_type'      => 'project', // Use the correct custom post type slug
            'posts_per_page' => -1,         // Get all posts
            'post_status'    => 'publish',   // Ensure only published posts are retrieved
        ];

        $projects_query = new WP_Query($args);

        // Check if the query has posts
        if ($projects_query->have_posts()) {
            while ($projects_query->have_posts()) {
                $projects_query->the_post();

                // Fetch the project title and publish date
                $project_title = get_the_title(); // Get the project title
                $publish_date  = get_the_date();  // Get the publish date

                // Initialize project data with title and publish date
                $project_data = [
                    'title'        => esc_html($project_title), // Sanitize output
                    'publish_date' => esc_html($publish_date),  // Sanitize output
                ];

                // Fetch ACF fields if ACF plugin is active
                if (function_exists('get_field')) {
                    $project_fields_group = get_field('project_fields_group');

                    // If the project fields group exists and is an array, add custom fields
                    if (is_array($project_fields_group)) {
                        $project_data['url']        = !empty($project_fields_group['project_url']) ? esc_url($project_fields_group['project_url']) : '';
                        $project_data['start_date'] = !empty($project_fields_group['project_start_date']) ? esc_html($project_fields_group['project_start_date']) : '';
                        $project_data['end_date']   = !empty($project_fields_group['project_end_date']) ? esc_html($project_fields_group['project_end_date']) : '';
                        $project_data['project_name'] = !empty($project_fields_group['project_name']) ? esc_html($project_fields_group['project_name']) : '';
                    }
                }

                // Store project data in the projects array
                $projects[] = $project_data;
            }
            // Reset post data after the custom query
            wp_reset_postdata();
        } else {
            // If no projects are found, return a 404 response with a custom message
            return new WP_REST_Response(
                ['message' => 'No projects found.'],
                404
            );
        }

        // Check if projects array is empty and return a message if so
        if (empty($projects)) {
            return new WP_REST_Response(
                ['message' => 'No project data available.'],
                204  // HTTP 204 No Content
            );
        }

        // Return the project data as a JSON response
        return new WP_REST_Response($projects, 200);  // HTTP 200 OK
    }


    /**
     * Include necessary PHP files for theme functionality.
     */
    private function include_all_files()
    {
        // Include custom post type file for 'project'
        include get_template_directory() . '/admin/cpt/projectcpt.php';

        // Include theme options file
        include get_template_directory() . '/admin/themeoptions/rendermenu.php';
    }

    /**
     * Enqueue front-end styles and scripts.
     */
    public function enqueue_assets()
    {
        // Array of assets to enqueue
        $enqueued_files = [
            ['handle' => 'GlobalCss', 'src' => '/assets/css/global.css', 'type' => 'style', 'loc' => 'internal'],
            ['handle' => 'Globalsections', 'src' => '/assets/css/globalsections.css', 'type' => 'style', 'loc' => 'internal'],
            ['handle' => 'home', 'src' => '/assets/css/home.css', 'type' => 'style', 'loc' => 'internal'],
            ['handle' => 'basicloopcards', 'src' => '/assets/css/basicloopcards.css', 'type' => 'style', 'loc' => 'internal'],
            ['handle' => 'FontCss', 'src' => 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css', 'type' => 'style', 'loc' => 'external'],
            ['handle' => 'sliderjs', 'src' => '/assets/js/sliders.js', 'type' => 'script', 'dep' => ['jquery'], 'loc' => 'internal'],
            ['handle' => 'owljs', 'src' => 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js', 'type' => 'script', 'dep' => ['jquery'], 'loc' => 'external'],
            ['handle' => 'owlcss', 'src' => 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css', 'type' => 'style', 'loc' => 'external'],
            ['handle' => 'mainjs', 'src' => '/assets/js/main.js', 'type' => 'script', 'dep' => ['jquery'], 'loc' => 'internal'],
        ];

        // Enqueue each file based on type (style or script)
        foreach ($enqueued_files as $file) {
            $src = $file['loc'] === 'internal' ? get_template_directory_uri() . $file['src'] : $file['src'];
            $ver = $file['loc'] === 'internal' ? filemtime(get_template_directory() . $file['src']) : '1.0.0';
            $dep = $file['dep'] ?? [];

            if ($file['type'] === 'style') {
                wp_enqueue_style($file['handle'], $src, $dep, $ver);
            } else {
                wp_enqueue_script($file['handle'], $src, $dep, $ver, true);
            }
        }
    }

    /**
     * Enqueue admin styles.
     */
    public function enqueue_admin_styles()
    {
        wp_enqueue_style('custom_admin_css', get_template_directory_uri() . '/assets/css/admin/style.css', [], '1.0.0');
    }

    /**
     * Register custom navigation menu.
     */
    public function register_menu()
    {
        register_nav_menu('header_menu', __('Header Menu', 'shahwptheme'));
    }

    /**
     * Register custom settings in the WordPress Customizer.
     *
     * @param WP_Customize_Manager $wp_customize Theme customizer object.
     */
    public function customize_register($wp_customize)
    {
        // Add a setting for the custom logo
        $wp_customize->add_setting('custom_logo', [
            'default'   => '',
            'transport' => 'refresh',
        ]);

        // Add a control for the custom logo (media control)
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'custom_logo', [
            'label'    => __('Logo', 'shahwptheme'),
            'section'  => 'title_tagline',
            'settings' => 'custom_logo',
            'priority' => 1,
        ]));

        // Add a setting for top header details
        $wp_customize->add_setting('top_header_details', [
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'refresh',
        ]);

        // Add a control for top header details input field
        $wp_customize->add_control('top_header_details', [
            'label'    => __('Top Header Details', 'shahwptheme'),
            'section'  => 'title_tagline',
            'settings' => 'top_header_details',
            'type'     => 'text',
            'priority' => 50,
        ]);
    }
}

// Instantiate the theme class
new Shahwptheme();
