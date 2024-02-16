<?php get_header(); ?>
<main>
    <div class="container text-center">
        <div class="row row-cols-1 row-sm-2 row-cols-lg-3 g-2 g-lg-3">
            <?php
            // If there're posts
            if (have_posts()) :
                // While condition
                while (have_posts()) : the_post(); ?>
                    <div class="col d-flex align-items-center justify-content-around">
                        <div class="p-3 border my-4">
                            <h2><?php the_title(); ?></h2>
                            <p><?php the_excerpt(); ?></p>
                        </div>
                    </div>
                <?php endwhile;
            else :
                echo '<div class="col"><div class="p-3">No article available</div></div>';
            endif;
            ?>
        </div>

        <div class="container my-4">
            <section class="text-center mt-4 mb-3 py-3" style="background-color: #f2f2f2;">
                <h3 class="text-secondary text-uppercase"><?php echo get_theme_mod('h3_text', 'Lorem ipsum'); ?></h3>
                <p>Test</p>
            </section>
        </div>
    

</main>


<?php get_footer(); ?>
