<?php 
/**
 * Custom Search Form Template.
 *
 * This template defines the structure of the search form used throughout the theme.
 * It includes the search input field and submit button with proper accessibility support.
 *
 * @package shahwptheme
 */
?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
    <label for="custom-search-id">
        <!-- Accessible label for screen readers -->
        <span class="screen-reader-text">
            <?php echo _x('Search for:', 'label', 'shahwptheme'); ?>
        </span>
    </label>

    <!-- Search input field -->
    <input type="search" id="search-field" class="search-field custom-class"
        placeholder="<?php echo esc_attr_x('Search …', 'placeholder', 'shahwptheme'); ?>"
        value="<?php echo get_search_query(); ?>" name="s" />

    <!-- Submit button for the search form -->
    <button type="submit" class="search-submit">
        <?php echo esc_html_x('Search', 'submit button', 'shahwptheme'); ?>
    </button>
</form>
