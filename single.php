<?php get_header(); ?> 

<main class="single-post-wrapper" role="main" aria-label="Single post">
  <div class="single-content-with-sidebar">

    <!-- Main Post Content -->
    <div class="single-main-content">
      <?php 
      if ( have_posts() ) :
        while ( have_posts() ) : the_post(); ?>
          
          <article id="post-<?php the_ID(); ?>" <?php post_class('single-article'); ?> itemscope itemtype="http://schema.org/Article">
            
            <!-- Post Title (centered with CSS) -->
            <h1 class="post-title" itemprop="headline"><?php the_title(); ?></h1>

            <!-- Meta -->
            <div class="post-meta">
              <span class="posted-on">Published on 
                <time datetime="<?php echo esc_attr( get_the_date('c') ); ?>">
                  <?php echo get_the_date(); ?>
                </time>
              </span>
              <span class="meta-sep"> | </span>
              <span class="posted-in">In <?php the_category(', '); ?></span>
            </div>

            <br>

            <!-- Content -->
            <div class="post-content" itemprop="articleBody">
              <?php the_content(); ?>
            </div>

          </article>

        <?php endwhile;
      endif;
      ?>
    </div><!-- .single-main-content -->

    <!-- Sidebar -->
    <aside class="single-sidebar widget-area">
      <?php if ( is_active_sidebar( 'right-sidebar' ) ) : ?>
        <?php dynamic_sidebar( 'right-sidebar' ); ?>
      <?php endif; ?>
    </aside><!-- .single-sidebar -->

  </div><!-- .single-content-with-sidebar -->
</main>


<?php get_footer(); ?>



