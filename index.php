<?php
get_header();

if (have_posts()) :
    while (have_posts()) : the_post();

    the_ID();
    echo '<div class="col-sm">';
    $featured_img_url;
    the_content();
    echo '<h4>' . get_the_title() . '</h4>';
    the_author();
    echo '</div>';
    echo '<div class="container col-sm">';

    endwhile;
endif;

get_footer();
?>
