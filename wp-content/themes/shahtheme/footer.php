<?php

/**
 * Footer template.
 *
 * This template is used to display the footer section of the site.
 *
 * @package shahwptheme
 */

// Get the site title to display in the footer.
$site_title = get_bloginfo('name');
?>

<footer class="footer_ar">
    <div class="container_mi_ar">
        <div class="d_flex_space_between_ars">
            <div class="footer_copyright_ar">
                <!-- Display the copyright information -->
                <p class="font_12_400 text_white_60_ar mb_ar_0 text_align_center_ar">
                    <?php
                    /* Translators: %s is the site title. */
                    printf(__('Copyright © 2024 | %s | All Rights Reserved.', 'shahwptheme'), $site_title);
                    ?>
                </p>
            </div>
        </div>
    </div>
</footer>

<?php
// Include WordPress footer hooks.
wp_footer();
?>