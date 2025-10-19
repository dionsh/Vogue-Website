<?php
/**
 * Template for displaying archive pages
 */
get_header(); ?>




<main class="archive-page">

    <!-- Archive Header -->
    <section class="archive-header">
        <h1 class="archive-title">
            <?php
            if (is_category()) {
                single_cat_title();
            } elseif (is_tag()) {
                single_tag_title();
            } elseif (is_author()) {
                the_author();
            } elseif (is_day()) {
                echo 'Daily Archives: ' . get_the_date();
            } elseif (is_month()) {
                echo 'Monthly Archives: ' . get_the_date('F Y');
            } elseif (is_year()) {
                echo 'Yearly Archives: ' . get_the_date('Y');
            } else {
                echo 'Archives';
            }
            ?>
        </h1>
        <?php
        if (is_category() || is_tag()) {
            echo '<p class="archive-description">' . category_description() . '</p>';
        }
        ?>
    </section>

    <!-- Post Grid -->
    <section class="post-grid">
        <?php if (have_posts()) :
            while (have_posts()) : the_post(); ?>
                <article class="post-card">
                    <a href="<?php the_permalink(); ?>" class="post-link">
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="post-thumbnail">
                                <?php the_post_thumbnail('medium'); ?>
                            </div>
                        <?php endif; ?>
                        <h2 class="post-title"><?php the_title(); ?></h2>
                        <p class="post-excerpt"><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
                    </a>
                </article>
            <?php endwhile;
            wp_reset_postdata();
        else : ?>
            <p>No posts found.</p>
        <?php endif; ?>
    </section>

    <!-- Pagination -->
    <section class="pagination">
        <?php
        the_posts_pagination(array(
            'mid_size' => 2,
            'prev_text' => __('« Previous', 'textdomain'),
            'next_text' => __('Next »', 'textdomain'),
        ));
        ?>
    </section>

</main>

<?php get_footer(); ?>
