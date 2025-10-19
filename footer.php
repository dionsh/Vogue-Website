<?php
/**
 * The template for displaying the footer
 */
?>

<footer class="site-footer">
    <div class="footer-widgets">
        <div class="footer-logo">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
        <?php 
        if ( has_custom_logo() ) {
            the_custom_logo();
        } else {
            // Fallback: use theme's logo from images folder
            echo '<img src="' . esc_url( get_template_directory_uri() . '/images/vogueebardh1.png' ) . '" alt="' . get_bloginfo( 'name' ) . '">';
        }
        ?>
    </a>
        </div>

        <nav class="footer-navigation">
            <?php
            wp_nav_menu( array(
                'theme_location' => 'footer',
                'menu_class'     => 'footer-menu',
                'container'      => false,
            ) );
            ?>
        </nav>
    </div>
<br>


      
        <div class="mb-4">
            <a href="https://www.instagram.com/voguemagazine/" target="_blank" class="text-light mx-3 footer-social-link">
                <i class="bi bi-instagram fs-2 me-1"></i> 
            </a>
            <a href="https://www.facebook.com/Vogue/" target="_blank" class="text-light mx-3 footer-social-link">
                <i class="bi bi-facebook fs-2 me-1"></i> 
            </a>
            <a href="https://x.com/voguemagazine" target="_blank" class="text-light mx-3 footer-social-link">
                <i class="bi bi-twitter-x fs-2 me-1"></i> 
            </a>
             <a href="https://www.tiktok.com/@voguemagazine?lang=en" target="_blank" class="text-light mx-3 footer-social-link">
                <i class="bi bi-tiktok fs-2 me-1"></i> 
            </a>
            <a href="https://www.youtube.com/@Vogue"  target="_blank" class="text-light mx-3 footer-social-link">
                <i class="bi bi-youtube fs-2 me-1"></i> 
            </a>
        </div>

    <div class="site-info">
        <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved.</p>
        <p class="mb-0 small">
            <a href="#" class="footer-link text-decoration-none">Privacy Policy</a> |
            <a href="#" class="footer-link text-decoration-none">Terms of Use</a>
        </p>

        
    </div>
</footer>

<?php wp_footer(); ?>



<script>
document.addEventListener('DOMContentLoaded', function() {
    const slides2 = document.querySelectorAll('.hero-slider2 .slide2');
    let current2 = 0;

    setInterval(() => {
        slides2[current2].classList.remove('active2');
        current2 = (current2 + 1) % slides2.length;
        slides2[current2].classList.add('active2');
    }, 5000); // 5 seconds per slide
});
</script>

</body>
</html>



