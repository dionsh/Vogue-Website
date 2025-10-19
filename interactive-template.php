<?php
/*
Template Name: Statistics Template
*/

get_header();
?>

<main class="vogue-info-template">

    <div class="main-wrapper">

        <!-- Main Content Area -->
        <section class="vogue-main-content">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <article class="vogue-article">
                    <h1><?php the_title(); ?></h1>
                    <?php the_content(); ?>
                </article>
            <?php endwhile; else : ?>
                <p>No content found.</p>
            <?php endif; ?>
        </section>

        <!-- Sidebar Info Boxes -->
        <aside class="vogue-sidebar">

            <br><br>

            <!-- Model Number Box -->
            <div class="info-box">
                <h3>Number of Vogue Models</h3>
                <div class="counter" id="model-number">0</div>
            </div>

            <!-- Territories Published Box -->
            <div class="info-box">
                <h3>Countries Published</h3>
                <div class="counter" id="territories-number">0</div>
            </div>

            <!-- Users Box -->
            <div class="info-box">
                <h3>Users</h3>
                <div class="counter" id="users-number">0</div>
                <span class="million-text">Million</span>
            </div>

        </aside>

    </div>

</main>



<script>
document.addEventListener("DOMContentLoaded", function() {

    function animateCounter(id, start, end, duration) {
        const el = document.getElementById(id);
        let current = start;
        const increment = end > start ? 1 : -1;
        const stepTime = Math.abs(Math.floor(duration / (end - start)));

        const timer = setInterval(() => {
            el.textContent = current;
            if (current === end) clearInterval(timer);
            current += increment;
        }, stepTime);
    }

    // Vogue Model Number: flicking effect 1-300
    (function modelNumberFlick() {
        const el = document.getElementById("model-number");
        const finalNumber = 400;
        const flickDuration = 2000;
        const intervalTime = 50;
        let elapsed = 0;
        const flickInterval = setInterval(() => {
            el.textContent = Math.floor(Math.random() * finalNumber) + 1;
            elapsed += intervalTime;
            if (elapsed >= flickDuration) {
                clearInterval(flickInterval);
                el.textContent = finalNumber;
            }
        }, intervalTime);
    })();

    // Territories Published: 0-25
    animateCounter("territories-number", 0, 50, 1500, 354);

    // Users: 0-120 (million)
    animateCounter("users-number", 0, 150, 2000, 3, 343);

});
</script>


<?php get_footer(); ?>
