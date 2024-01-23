<?php
get_header();

// Get all categories
$categories = get_categories();

// Loop through each category
foreach ($categories as $category) {
    $args = array(
        'post_type'      => 'post',
        'posts_per_page' => 4,
        'category_name'  => $category->slug,
        'orderby'        => 'date',
        'order'          => 'DESC',
    );

    $query = new WP_Query($args);

    if ($query->have_posts()) :

        $post_number = 1; // Initialize post number counter

        echo '<div class="container py-3">';
        echo '<h2>' . $category->name . '</h2>';
        echo '<div class="row">';
        while ($query->have_posts()) : $query->the_post();

            $id = $photo->ID;
            $author_id = $photo->post_author;

            $featured_img_url = get_the_post_thumbnail_url($id, 'large');
            $post_url = get_permalink($id);
            $author_name = get_the_author_meta('display', $author_id);
            $author_avatar = get_avatar_url($author_id);

            if ($post_number == 1) {
                the_ID();
                echo '<div class="col-sm">';
                $featured_img_url;
                the_content();
                echo '<h4>' . get_the_title() . '</h4>';
                the_author();
                echo '</div>';
                echo '<div class="container col-sm">';
            } elseif ($post_number == 2 || $post_number == 3) {
                the_ID();
                echo '<div class="SmallPost">';
                the_post_thumbnail();
                echo '<h4>' . get_the_title() . '</h4>';
                echo '<p> By ';
                the_author();
                '</p>';
                echo '</div>';
            } else {
                the_ID();
                echo '<div>';
                the_post_thumbnail();
                echo '<h4>' . get_the_title() . '</h4>';
                echo '<p> By ';
                the_author();
                '</p>';
                echo '</div>';
            }

            $post_number++; // Increment post number

        endwhile;
        echo '</div>';
        echo '</div>';
        echo '</div>';
    endif;
    wp_reset_postdata(); // Reset the query to the main loop
}

get_footer();
?>
