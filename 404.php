<?php
/**
 * The template for displaying 404 pages (Not Found)
 */
get_header(); ?>

<main class="page-404">

    <section class="error-404">
        <div class="error-container">
            <h1 class="error-title">404</h1>
            <h2 class="error-subtitle">Oops! Page Not Found</h2>
            <p class="error-message">
                It looks like nothing was found at this location. Try searching or return to the homepage.
            </p>

            <!-- Search Form -->
            <div class="error-search">
                <?php get_search_form(); ?>
            </div>

            <br><br><br>

            <!-- Back to Home Button -->
            <div class="error-home">
                <a href="<?php echo home_url(); ?>" class="btn-home">Go Back Home</a>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>
