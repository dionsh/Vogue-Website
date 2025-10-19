<?php
/**
 * Template for the front page (custom homepage layout)
 */
get_header(); ?>






    <!-- Hero Slider -->
    <section class="hero-slider2">
        <div class="slide2 active2" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/hero3.jpg');">
            <div class="hero-content2">
                
            </div>
        </div>
        <div class="slide2" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/hero4.jpg');">
            <div class="hero-content2">
                
               
            </div>
        </div>
        <div class="slide2" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/hero5.jpg');">
            <div class="hero-content2">
                
            </div>
        </div>
    </section>


    <br><br><br><br><br><br><br>




<main class="homepage">


    <!-- Hero Featured Post -->
    <section class="hero">
        <?php
        $featured = new WP_Query(array(
            'posts_per_page' => 1,
        ));
        if ($featured->have_posts()) :
            while ($featured->have_posts()) : $featured->the_post(); ?>
                <article class="hero-post">
                    <?php if (has_post_thumbnail()) : ?>
                        <a href="<?php the_permalink(); ?>" class="post-thumb">
                            <?php the_post_thumbnail('large'); ?>
                        </a>
                    <?php endif; ?>
                    <h2 class="hero-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <p class="hero-excerpt"><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
                </article>
            <?php endwhile;
            wp_reset_postdata();
        endif;
        ?>
    </section>

    <!-- Fashion Section -->
    <section class="category-block">
        <h2 class="block-title">Fashion</h2>
        <div class="post-grid">
            <?php
            $fashion = new WP_Query(array(
                'category_name' => 'fashion',
                'posts_per_page' => 3,
            ));
            if ($fashion->have_posts()) :
                while ($fashion->have_posts()) : $fashion->the_post(); ?>
                    <article class="grid-post">
                        <a href="<?php the_permalink(); ?>">
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="post-thumb">
                                    <?php the_post_thumbnail('medium'); ?>
                                </div>
                            <?php endif; ?>
                            <h3><?php the_title(); ?></h3>
                        </a>
                    </article>
                <?php endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </div>
    </section>

   <!-- What's Hot Section -->
    <section class="category-block">
        <h2 class="block-title">What's Hot</h2>
        <div class="post-grid">
            <?php
            $whatshot = new WP_Query(array(
                'category_name'   => '    whatshot   ', // slug of your category
                'posts_per_page'  => 3,
            ));
            if ($whatshot->have_posts()) :
                while ($whatshot->have_posts()) : $whatshot->the_post(); ?>
                    <article class="grid-post">
                        <a href="<?php the_permalink(); ?>">
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="post-thumb">
                                    <?php the_post_thumbnail('medium'); ?>
                                </div>
                            <?php endif; ?>
                            <h3><?php the_title(); ?></h3>
                        </a>
                    </article>
                <?php endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </div>
    </section>


    <!-- Living Section-->
    <section class="category-block">
        <h2 class="block-title">Living</h2>
        <div class="post-grid">
            <?php
            $living = new WP_Query(array(
                'category_name'   => '    living   ', // slug of your category
                'posts_per_page'  => 3,
            ));
            if ($living->have_posts()) :
                while ($living->have_posts()) : $living->the_post(); ?>
                    <article class="grid-post">
                        <a href="<?php the_permalink(); ?>">
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="post-thumb">
                                    <?php the_post_thumbnail('medium'); ?>
                                </div>
                            <?php endif; ?>
                            <h3><?php the_title(); ?></h3>
                        </a>
                    </article>
                <?php endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </div>
    </section>
</main>

<?php get_footer(); ?>
