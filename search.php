<?php
get_header(); 
?>



<main class="search-results">

    <!-- Search Heading -->
    <section class="search-header">
        <h1 class="search-title">
            <?php printf(__('Search results for: %s', 'Vogue-theme'), '<span>' . get_search_query() . '</span>'); ?>
        </h1>
    </section>

    <!-- Search Results Loop -->
    <section class="search-posts">
        <div class="search-grid">

            <?php
            // Custom query to show only posts
            $search_query = new WP_Query(array(
                's' => get_search_query(),
                'post_type' => 'post',           // Only posts, no pages
                'posts_per_page' => -1,          // All matching posts
            ));

            if ($search_query->have_posts()) :
                while ($search_query->have_posts()) : $search_query->the_post(); ?>
                    
                    <div class="search-card">
                        <a href="<?php the_permalink(); ?>" class="search-link">
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="search-thumbnail">
                                    <?php the_post_thumbnail('medium'); ?>
                                </div>
                            <?php endif; ?>
                            <h2 class="search-post-title"><?php the_title(); ?></h2>
                            <p class="search-post-excerpt"><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
                        </a>
                    </div>

                <?php endwhile;
                wp_reset_postdata();
            else : ?>
                <p><?php _e('No results found.', 'Vogue-theme'); ?></p>
            <?php endif; ?>

        </div>
    </section>

</main>



<?php get_footer(); ?>
