<?php
/* 
 * Basic Loop Cards
 * @subpackage Loop Cards/templates/loopcards
 * @since 1.0.0
 * @author Arshad Shah
 * 
 * This template can be overridden by copying it to yourtheme/loopcards/BasicLoopcard.php
 */

// title of post
$title = get_the_title();
$excerpt = get_the_excerpt();
$last_updated = get_the_date();
$post_categoies = get_the_category();
$authorname = get_the_author();
$posturl = get_the_permalink();
$category_name = '';
if (! empty($post_categoies)) {
    $category_name = $post_categoies[0]->name;
}
?>

<div class="lpcd-card">
    <div class="lpcd-card-head">
        <div class="lpcd-card-product-img">
            <a href="<?php echo $posturl; ?>">
                <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="image">
            </a>

        </div>
    </div>

    <div class="lpcd-card-body">
        <a href="<?php echo $posturl; ?>">
            <h3 class="lpcd-card-title"><?php echo $title; ?></h3>
        </a>
        <p class="lpcd-card-text"><?php echo $excerpt; ?></p>

        <div class="lpcd-wrapper">
            <div class="lpcd-card-price">
                <img src="https://i.postimg.cc/DwVVRrF4/icon-ethereum.png" alt="icon" class="lpcd-card-icon">
                <span><?php echo $category_name; ?></span>
            </div>

            <div class="lpcd-card-countdown">
                <img src="https://i.postimg.cc/C5ZtQ1Q4/icon-clock.png" alt="icon" class="lpcd-card-icon">
                <span><?php echo $last_updated; ?></span>
            </div>
        </div>
    </div>

    <div class="lpcd-card-footer">
        <img src="https://i.postimg.cc/G3N6sF4g/image-avatar.png" alt="avatar" class="lpcd-card-author-img">

        <p class="lpcd-card-author-name">Creation of <a href="#"><?php echo $authorname; ?> </a></p>
    </div>
</div>