<?php 
/**
 * Template for all Pages
 */
get_header();
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <?php
            while ( have_posts() ) :
                the_post();
                get_template_part( 'template-parts/page/content', 'page'); // content-page.php
                if ( comments_open() || get_comments_number() ) :
                    comments_template();
                endif;
            endwhile;
        ?>
    </main>
</div>
    <?php get_footer();
?>