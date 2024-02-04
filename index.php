<?php
get_header();

if (have_posts()) :
    while (have_posts()) : the_post();
    echo '<div class="col-sm">';
    echo '<h4>' . get_the_title() . '</h4>';
    the_post_thumbnail();      
    the_content();
    the_author();
    echo '</div>';
    echo '<div class="container col-sm">';

    endwhile;
endif;

get_footer();
?>
