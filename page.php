<?php
/**
 * The template for displaying all standard pages
 */
get_header(); ?>

<main class="page-template">

    <header class="page-header">
        <h1 class="page-title"><?php the_title(); ?></h1>
    </header>

    <div class="page-content">
        <?php
        while (have_posts()) : the_post();
            the_content();
        endwhile;
        ?>
    </div>

</main>

<?php get_footer(); ?>
