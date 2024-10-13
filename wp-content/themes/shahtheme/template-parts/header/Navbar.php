<?php
$top_header_details = get_theme_mod('top_header_details', '');
$custom_logo_url = get_theme_mod('custom_logo');
$site_title = get_bloginfo('name');

?>

<header class=" desktop-header" id="header">
    <div class="topheader_wrapper">
        <div class="top_header_ar_mi">
            <div class="container_mi_ar">
                <div class="topheaderbtn_ar">
                    <div class="login_btn">
                        <p class="font_12_400 text_white_ar"><?php echo (!empty($top_header_details)) ? $top_header_details : 'Top Header Details'; ?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container_mi_ar" id="container_ar_mi_navheader">
            <nav>
                <div class="straight_logo_header_ar">
                    <?php
                    // Check if the custom logo is set
                    if (!empty($custom_logo_url)) {
                        echo '<a href="' . home_url() . '"><img src="' . $custom_logo_url . '" alt="' . $site_title . '"></a>';
                    } else {
                        echo '<a href="' . home_url() . '">' . $site_title . '</a>';
                    }
                    ?>
                </div>
                <div class="header_menu_ar hide_mobile_ar" id="mobile_nav_ar">
                    <div class="close_btn_ar" id="close_btn_ar">
                        &times;
                    </div>
                    <div class="dropdown">

                        <!-- Call the dropdown menu function -->
                        <?php render_custom_dropdown_menu('header_menu'); ?>

                    </div>
                </div>

                <div class="cta_header_ar show_mobile_ar">
                    <a href="#" id="search_btn_ar">
                        <img src="<?php echo get_template_directory_uri() . '/assets/img/search.svg'; ?>" alt="">
                    </a>
                    <div class="mobile_menu_toggler_ar" id="mobile_menu_toggler_ar">
                        <i class="fa-solid fa-bars"></i>
                    </div>
                    <div class="search-form-container" id="search_form_ar">
                        <div class="close_btn_ar" id="searchclose_btn_ar">
                            &times;
                        </div>
                        <?php get_search_form(); ?>
                    </div>
                </div>
            </nav>
        </div>
</header>