<?php
/**
 * Template part for displaying single post.
 */

 $postID = get_the_ID();

 $auth_url = get_field('author');
 $fi = get_post($postID);
 
 $fi_title = $fi->post_title;
 $fi_caption = $fi->post_excerpt;


?>

<article id="post-<?php the_ID() ?>">

    <!-- Post thumbnail -->


    <!-- Post Content --> 
        <div class="single-entry-content">
            
            <div class="single-entry-grid">
                <div class="single-grid-1">
                <header class="entry-header">
                <?php
                    the_title(' <h1 class="entry-title">', '</h1>' );
                ?>
                <div class="entry-flex">
                    <h4 class="entry-author">
                        <?php 
                            foreach ($auth_url as $url) {
                                echo $url['user_firstname'].' '.$url['user_lastname'];
                            }
                        ?>
                    </h4>
                    <h4 class="entry-date">
                        <?php
                            $post_date = get_the_date( 'D F j, Y' ); echo $post_date;
                        ?>
                    </h4>
                </div>

            </header>
                <?php 
                if ( has_post_thumbnail() ) :
                    the_post_thumbnail();
                endif;
                ?>
                <div class="single-img-caption">
                    <?php 
                    if($fi_caption==True) {
                        echo $fi_caption; 
                    }
                    else {
                        featured_img_caption();
                    }?>
                </div>
                <div class="single-entry-content-p">
                    <?php the_content(); ?>

                </div>
                </div>
                <div class="single-grid-2">
                    <h4>Latest News</h4>
                    <?php
                        // The Query.
                        $the_query = new WP_Query( array( 'posts_per_page' => 8, 'offset' => 0) );

                        // The Loop.
                        if ( $the_query->have_posts() ) {
                            echo '<div class="sidebar-posts">';
                            while ( $the_query->have_posts() ) {
                                $the_query->the_post();
                                //add redirect as string query
                                echo '<a href="'.esc_html( get_permalink() ).'?type=redir"><div class="sidebar-post">';
                                if( has_post_thumbnail() ) :
                                    the_post_thumbnail();
                                endif;
                                echo '<h5>' . esc_html( get_the_title() ) . '</h5></div></a>';
                            }
                            echo '</div>';
                        } else {
                            esc_html_e( 'Sorry, no posts matched your criteria.' );
                        }
                        // Restore original Post Data.
                        get_template_part( 'template-parts/post/sidebar-event' );

                        ?>
                </div>
            </div>

        </div>
</article>

<style>
    body {
        background-color: #f7f8fd;
    }
</style>
