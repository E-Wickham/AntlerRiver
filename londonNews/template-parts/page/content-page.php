<?php
/**
 * Template part to display page content in page.php
 */


 ?>
<article id="post-<?php the_ID() ?>">
    <!-- Post Content --> 
        <div class="page-content">
            <header class="entry-header">
                <?php
                    the_title(' <h1 class="entry-title">', '</h1>' );

                    if ( has_post_thumbnail() ) :
                        the_post_thumbnail();
                     endif;
                ?>
            </header>
                <?php 
                    the_content(); 
                    wp_link_pages( array(
                        'before' => '<div class="page-links">'.esc_html__( 'Pages:', 'ninestars'),
                        'after' => '</div'
                    ) );
                ?>
        </div>

        <?php
            //Get edit post link in article body if signed in
            if( get_edit_post_link() ) : ?>
                <footer class="entry-footer">
                    <?php
                    edit_post_link(
                        sprintf(
                            wp_kses(
                                /*%s is name of current post. only for screen readers */
                                __( 'Edit <span class="screen-reader-text">%s</span>', 'ninestars'),
                                array(
                                    'span' => array(
                                        'class' => array(),
                                    ),
                                )
                                ),
                                get_the_title()           
                            ),
                            '<span class="edit-link">',
                            '</span>'
                    )
                    ?>
                </footer>
                <?php endif;
        ?>
</article>
