<?php 
/**
 * Template for all Pages on Farma website
 */
get_header();
?>
<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <div class="archive-wrapper">
            <?php
            if ( have_posts() ) : ?>
                <header class="archive-page-header">
                    <?php
                    the_archive_title('<h1 class="archive-title">', '</h1>');
                    the_archive_description('<div class="archive-description">', '</div>');
                    ?>
                </header>
                <div class="archive-posts">
                    <?php
                        //open loop
                        while( have_posts() ) :
                            the_post();
                            get_template_part( 'template-parts/content-posts'); 
                        endwhile;  
                    ?>
                </div>
                <?php
                    echo paginate_links( [
                        'prev_text' => esc_html__( 'Prev', 'herobiz'),
                        'next_text' => esc_html__( 'Next', 'herobiz'),
                    ] );  
            else : 
                get_template_part('template-parts/page/content', 'none');
            endif;    
            ?>
                    
        </div>
    </main>
</div>
<?php get_footer();
?>