<?php
// template name: Homepage

get_header();
?>

<?php
// section fields 
$homehero = get_field('hero_section');
if (is_array($homehero) && count($homehero) > 0) {
?>
    <section class="home_hero_ar grey_bg_ar" id="home_hero_ar">
        <div class="container_fluid_mi_ar">
            <div class="section_data_wrapper leftside_container_ar">
                <div class="sect_content_ar max_width_ar_440">
                    <h2 class="font_40_700 ma_ar_0"><?php echo $homehero['section_title']; ?></h2>
                    <p class="font_16_400 text_align_left_ar" id="section_tagline_ar"><?php echo $homehero['section_tagline']; ?></p>
                    <a href="<?php echo $homehero['section_cta_link']; ?>" class="colored_btn_ar"><?php echo $homehero['section_cta_text']; ?></a>
                </div>
                <div class="sect_image_ar">
                    <img src="<?php echo $homehero['section_image']; ?>" alt="hero">
                </div>
            </div>
        </div>
    </section>
<?php } ?>
<?php

// Best Sellers section
$productsectheadings = get_field('home_products_sections');
if (is_array($productsectheadings) && count($productsectheadings) > 0) {

?>
    <section class="product_seller_ar padd_84_80" id="product_seller_ar">
        <div class="container_mi_ar">
            <div class="section_data_wrapper">
                <div class="section_heading_left_ar">
                    <h3 class="font_32_700 text_align_left_ar"><?php echo $productsectheadings['best_seller_section_title']; ?></h3>
                </div>
                <div class="slider_controllers_ar">
                    <div class="prev_ar slide_control_ar">
                        <i class="fa-solid fa-chevron-left"></i>
                    </div>
                    <div class="next_ar slide_control_ar">
                        <i class="fa-solid fa-chevron-right"></i>
                    </div>
                </div>
            </div>
            <div class="best_seller_slider_ar">
                <?php
                // Arguments to fetch the latest products
                $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => 10, // Number of products to display
                    'orderby' => 'date',
                    'order' => 'ASC',
                );
                // The Query
                $loop = new WP_Query($args);

                // The Loop
                if ($loop->have_posts()) {
                    echo '<div class="best_seller_slider_ar owl-carousel" id ="best_seller_slider_ar">';

                    while ($loop->have_posts()) : $loop->the_post();
                        global $product;

                        get_template_part('template-parts/loopcards/content', 'card');

                    endwhile;

                    echo '</div>';
                } else {
                    echo __('No products found');
                }

                // Reset Post Data
                wp_reset_postdata();
                ?>

            </div>
        </div>
    </section>


    <?php
    // featured Sellers section

    ?>
    <section class="product_seller_ar padd_84_80" id="product_seller_ar">
        <div class="container_mi_ar">
            <div class="section_data_wrapper">
                <div class="section_heading_left_ar">
                    <h3 class="font_32_700 text_align_left_ar"><?php echo $productsectheadings['featured_product_section_title']; ?></h3>
                </div>
                <div class="slider_controllers_ar">
                    <div class="prev_ar slide_control_ar">
                        <i class="fa-solid fa-chevron-left"></i>
                    </div>
                    <div class="next_ar slide_control_ar">
                        <i class="fa-solid fa-chevron-right"></i>
                    </div>
                </div>
            </div>
            <div class="best_seller_slider_ar">
                <?php
                // Arguments to fetch the latest products
                $args = array(
                    'post_type'      => 'post',
                    'posts_per_page' => 10, // Number of products to display
                    'orderby'        => 'date',
                    'order'          => 'DESC',
                );

                // The Query
                $loop = new WP_Query($args);

                // The Loop
                if ($loop->have_posts()) {
                    echo '<div class="best_seller_slider_ar owl-carousel" id ="featured_slider_ar">';

                    while ($loop->have_posts()) : $loop->the_post();
                        global $product;

                        get_template_part('template-parts/loopcards/content', 'card');

                    endwhile;

                    echo '</div>';
                } else {
                    echo __('No products found');
                }

                // Reset Post Data
                wp_reset_postdata();
                ?>

            </div>
        </div>
    </section>
<?php } ?>

<?php
// wardrobe section
$wardrobe = get_field("wardrobe_section");
if (is_array($wardrobe) && count($wardrobe) > 0) {

    $bullet = $wardrobe['section_bullet_points'];
?>
    <div class="wardrobe_ar" id="wardrobe_ar">
        <div class="container-fluid_mi_ar">
            <div class="d_flex_no_gap_ar">
                <div class="leftside_img_ar">
                    <img src="<?php echo $wardrobe["section_image"]; ?>" alt="">
                </div>
                <div class="right_content_ar" id="wardrobe_right_content_ar">
                    <h3 class="font_32_700 max_width_ar_447 text_align_left_ar"><?php echo $wardrobe["section_title"]; ?></h3>
                    <?php
                    if (is_array($bullet) && count($bullet) > 0) {
                    ?>
                        <div class="bullet_wrapper_ar max_width_ar_447 mar_top_ar_40">
                            <?php
                            foreach ($bullet as $b) {
                            ?>
                                <div class="bullet_point_ar">
                                    <div class="d_flex_gaper_ar">
                                        <div class="icons">
                                            <i class="fa-solid fa-circle text_primary_ar"></i>
                                        </div>
                                        <div class="point_heading_ar">
                                            <h4 class="font_16_800 text_dark_ar"><?php echo $b["point_heading"]; ?></h4>
                                            <p class="font_14_400 text_dark_op60_ar"><?php echo $b["point_description"]; ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php
// testimonial section
$testimonialsection = get_field('testimonial_section');
if (is_array($wardrobe) && count($wardrobe) > 0) {

?>
    <section class="testimonial_section_ar padd_100_80">
        <div class="container_mi_ar">
            <div class="section_heading_center_ar">
                <h3 class="font_32_700 text_align_center_ar"><?php echo $testimonialsection['section_title']; ?></h3>
                <p class="text_align_center_ar font_16_400 mb_ar_0"><?php echo $testimonialsection['section_description']; ?></p>
            </div>
        </div>

        <div class="testimonial_slider_wraaper" id="testimonial_slider_wraaper">
            <div class="testimonial_slider_ar owl-carousel" id="testimonials_slider_ar">
                <?php
                $testimonials = $testimonialsection['testimonials'];
                if (count($testimonials) > 0) {
                    foreach ($testimonials as $t) {
                        $ratings = $t['ratings'];
                        $reviews = $t['reviews'];
                        $clientname = $t['client_name'];
                        $clientprofile = $t['client_profile_pic'];
                        $quots = get_stylesheet_directory_uri() . '/assets/img/quotes.svg';
                ?>
                        <div class="testimonial_card">
                            <div class="quotes_ar">
                                <img src="<?php echo $quots; ?>" alt="quotes">
                            </div>
                            <div class="testimonial_data_ar">
                                <div class="stars_ar padd_17_20">
                                    <?php
                                    for ($i = 0; $i < $ratings; $i++) { ?>
                                        <i class="fa-solid fa-star text_primary_ar"></i>
                                    <?php
                                    }
                                    ?>
                                </div>
                                <div class="review_ar padd_17_20">
                                    <p class="font_14_400 text_dark_ar"><?php echo $reviews; ?></p>
                                </div>
                                <div class="d_flex_gaper_ar profiles_wraaper_ar">
                                    <div class="client_profile_ar">
                                        <img src="<?php echo $clientprofile; ?>" alt="client profile">
                                    </div>
                                    <div class="client_name_ar">
                                        <h4 class="font_16_700 text_dark_ar "><?php echo $clientname; ?></h4>
                                    </div>
                                </div>
                            </div>
                        </div>

                <?php
                    }
                }
                ?>
            </div>
            <div class="slider_controllers_ar">
                <div class="prev_ar ab_slide_control_ar">
                    <i class="fa-solid fa-chevron-left"></i>
                </div>
                <div class="next_ar ab_slide_control_ar">
                    <i class="fa-solid fa-chevron-right"></i>
                </div>
            </div>
        </div>
    </section>
<?php } ?>

<?php get_footer(); ?>