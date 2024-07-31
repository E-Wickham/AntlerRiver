<?php 
/**
 * Template for Search Result page on Farma website
 */
get_header();
?>
<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <?php
        if ( have_posts() ) : 
                //open loop
                while( have_posts() ) :
                    the_post();
                    get_template_part( 'template-parts/post/content', 'search'); 
                endwhile;  
                
                echo paginate_links( [
                    'prev_text' => esc_html__( 'Prev', 'herobiz'),
                    'next_text' => esc_html__( 'Next', 'herobiz'),
                ] );  
        else : 
            get_template_part('template-parts/page/content', 'search');
        endif;    
        ?>

    </main>
</div>
<?php get_footer();
?>