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

        $post_number = 1;

        echo '<div class="container py-3">';
        echo '<h2>' . $category->name . '</a></h2>';
        echo '<div class="row">';
        while ($query->have_posts()) : $query->the_post();

            $id = $photo->ID;
            $author_id = $photo->post_author;

            $featured_img_url = get_the_post_thumbnail_url($id, 'large');
            $post_url = get_permalink($id);
            $author_name = get_the_author_meta('display', $author_id);
            $author_avatar = get_avatar_url($author_id);

            if ($post_number == 1) {
                echo '<div class="col-sm">';
                
            the_post_thumbnail();      

                echo '<h4> <a href="' . esc_url($post_url) . '">'. get_the_title() .'<a/> </h4>';
                echo '<img src="' . $author_avatar . '" class="img-fluid" alt="Responsive image" style="width:35px;border-radius:25px">';
                the_author();
                echo '</div>';
                echo '<div class="container col-sm">';
            } elseif ($post_number == 2 || $post_number == 3) {
                echo '<div class="SmallPost">';
                echo '<h4> <a href="' . esc_url($post_url) . '">'. get_the_title() .'<a/> </h4>';
                echo '<p> By ';
                the_author();
                '</p>';
                echo '</div>';
            } else {
                echo '<div>';
                echo '<h4> <a href="' . esc_url($post_url) . '">'. get_the_title() .'<a/> </h4>';
                echo '<p> By ';
                the_author();
                '</p>';
                echo '</div>';
            }

            $post_number++;

        endwhile;
        echo '</div>';
        echo '</div>';
        echo '</div>';
    endif;
    wp_reset_postdata(); 
}

get_footer();
?>
