<?php 
/**
 * Template for 404 Page on Farma website
 */
get_header();
?>
<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <section class="error-404">
            <header class="page-header">
                <h1 class="page-title">
                    <?php esc_html_e( 'Page not found') ?>
                </h1>
                <div class="page-content">
                    <p>Nothing was found at this location. Try a search to find what you're looking for.</p>
                    <?php get_search_form(); ?>
                </div>
            </header>
        </section>
    </main>
</div>
<?php get_footer();
?>