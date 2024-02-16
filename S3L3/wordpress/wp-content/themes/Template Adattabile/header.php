<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo get_theme_mod('custom_title', wp_title('|', false, 'right')); ?></title>
    <?php wp_head(); ?>
</head>
<body>
    <header class="px-5 pt-2 pb-3" style="background-color: #f2f2f2">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand" href="<?php esc_url( home_url('/') ); ?>"><?php bloginfo( 'name' ); ?></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <!-- 
                        wp_nav_menu( array('theme_location' => 'header-menu') );
                    -->
                    <?php
                        wp_nav_menu(array(
                            'theme_location' => 'primary-menu',
                            'container' => false,
                            'menu_class' => 'navbar-nav me-auto mb-2 mb-md-0',
                            'fallback_cb' => '__return_false',
                            'items_wrap' => '<ul id="%1$s" class="%2$s d-flex">%3$s</ul>',
                            'depth' => 2,
                            'walker' => new bootstrap_5_wp_nav_menu_walker()
                        ));
                    ?>
                </div>
            </div>
        </nav>
    </header>