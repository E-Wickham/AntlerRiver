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
                <div class="next-page">
                <?php
                    echo paginate_links( [
                        'prev_text' => esc_html__( 'Prev', 'herobiz'),
                        'next_text' => esc_html__( 'Next', 'herobiz'),
                    ] );  
                    echo '</div>';
            else : 
                get_template_part('template-parts/page/content', 'none');
            endif;    
            ?>
                    
        </div>
    </main>
</div>
<?php get_footer();
?>

<script>
    let titleOrig = document.querySelector(".archive-title").innerHTML
    let titleElem = document.querySelector(".archive-title")
    let titleNew = titleOrig.replace("Category: ",'')
    titleElem.innerHTML = titleNew
</script>

<style>
    .archive-wrapper {
        padding: 0 1rem;
        max-width: 1200px;
        margin: auto;
    }

    .archive-posts {
        display: flex;
        flex-wrap: wrap;
    }

    .archive-posts a {
        flex: 1 0 300px;
        box-shadow: 2px 4px 15px -1px rgba(77,77,77,0.3);
    }
</style>