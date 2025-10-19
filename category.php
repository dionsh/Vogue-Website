<?php
/**
 * Template for category archive pages with a featured top post
 */
get_header(); ?>

<main class="category-archive">

    <!-- Category Hero -->
    <section class="category-hero">
        <h1 class="category-title">
            <?php single_cat_title(); ?>
        </h1>
        <?php if (category_description()) : ?>
            <p class="category-description"><?php echo category_description(); ?></p>
        <?php endif; ?>
    </section>

    <!-- Featured Top Post -->
    <?php
    $top_post = new WP_Query(array(
        'posts_per_page' => 1,
        'cat' => get_queried_object_id(), // current category
    ));
    if ($top_post->have_posts()) :
        while ($top_post->have_posts()) : $top_post->the_post(); ?>
            <section class="featured-post">
                <a href="<?php the_permalink(); ?>">
                    <?php if (has_post_thumbnail()) : ?>
                        <?php the_post_thumbnail('large'); ?>
                    <?php endif; ?>
                    <h2 class="featured-title"><?php the_title(); ?></h2>
                    <p class="featured-excerpt"><?php echo wp_trim_words(get_the_excerpt(), 25); ?></p>
                </a>
            </section>
        <?php endwhile;
        wp_reset_postdata();
    endif;
    ?>

    <br><br><br>

    <!-- Remaining Posts Grid -->
    <section class="category-posts">

        <div class="posts-grid">
            <?php
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

            $posts_grid = new WP_Query(array(
                'posts_per_page' => 9,
                'cat' => get_queried_object_id(),
                'post__not_in' => array($top_post->posts[0]->ID),
                'paged' => $paged
            ));

            if ($posts_grid->have_posts()) :
                while ($posts_grid->have_posts()) : $posts_grid->the_post(); ?>




                    <article class="grid-post">
  <a href="<?php the_permalink(); ?>">
    <?php if (has_post_thumbnail()) : ?>
      <div class="post-thumb">
        <?php the_post_thumbnail('grid-thumb'); ?>
      </div>
    <?php else: ?>
      <div class="post-thumb">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/placeholder.png" alt="placeholder">
      </div>
    <?php endif; ?>
    <h2 class="post-title"><?php the_title(); ?></h2>
    <p class="post-excerpt"><?php echo wp_trim_words(get_the_excerpt(), 15, '...'); ?></p>
  </a>
</article>



                <?php endwhile;
                // Pagination
                the_posts_pagination(array(
                    'mid_size' => 2,
                    'prev_text' => __('« Prev', 'your-theme'),
                    'next_text' => __('Next »', 'your-theme'),
                ));
                wp_reset_postdata();
            else : ?>
                <p>No more posts found in this category.</p>
            <?php endif; ?>
        </div>
    </section>

</main>

<?php get_footer(); ?>
