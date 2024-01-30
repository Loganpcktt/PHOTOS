<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="styles.css">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <!--[if lt IE 9]>
    <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
    <![endif]-->
    <?php wp_head(); ?>
</head>

<?php
    // Get the ID of a given category
    $category_id = get_cat_ID( 'ARTS + MUSIC' );

    // Get the URL of this category
    $category_link = get_category_link( $category_id );
?>

<!-- NavBar -->
<nav class="navbar navbar-expand-sm navbar-light py-2 Header">
      <!-- Brand -->
      <a class="navbar-brand mr-auto pr-4" href="<?php echo esc_url( home_url( '/' ) ); ?>">The Wave</a>

      <!-- Links -->
      <div class="collapse navbar-collapse">
          <ul class="navbar-nav">
              <li class="nav-item active">
                  <a class="nav-link" href="<?php echo esc_url( $category_link ); ?>">ARTS + MUSIC</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="#">FOOD + DRINK</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="#">OPINION</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="#">EVENTS</a>
              </li>

            <!-- NOT IMPLEMENTED -->
            <?php
            $menu_items = wp_get_nav_menu_items('Primary Menu');

            foreach ($menu_items as $menu_item) {
                echo '<li class="nav-item">';
                echo '<a class="nav-link" href="' . $menu_item->url . '">' . $menu_item->title . '</a>';
                echo '</li>';
            }
            ?>
          </ul>
      </div>
</nav>

