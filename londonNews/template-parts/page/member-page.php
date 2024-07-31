<?php
/**
 * Template part for displaying single post.
 */

/* 
Apply this to the Unrigged Site 

All this does is create a counter to help us keep track of what posts are doing well. 

changes to do: 
    change link on splash page to a post link
    create a single post page that won't break the site
    create a redirect that will allow you plug in the correct site
*/ 



 if(isset($_GET['type'])){

    $type = (string) $_GET['type'];
    $postID = $post->ID;
    $url = 'https://google.ca';
    $acf = get_field('clickthroughs', $postID);
    if ($acf == NULL){
        $acf = 1;
    }
    $acf++;
    update_field('clickthroughs', $acf, $postID);
    ?><script>
    setTimeout(() => {
        window.location.href = <?php echo '"'.$url.'"'; ?>
    }, 2000);
    </script><?php
 }
?>

<article id="post-<?php the_ID() ?>">

    <!-- Post thumbnail -->


    <!-- Post Content --> 
        <div class="single-entry-content">
            <header class="entry-header">
                <h4>Member Section</h4>
            </header>
            <div class="single-entry-grid">
                <div class="single-grid-1">

                <?php 
                if ( has_post_thumbnail() ) :
                    the_post_thumbnail();
                endif;
                ?>

                    <?php the_content(); ?>
                </div>
                <div class="single-grid-2">
                    <h4>Farma News</h4>
                    <?php
                        // The Query.
                        $the_query = new WP_Query( array( 'category_name' => 'news') );

                        // The Loop.
                        if ( $the_query->have_posts() ) {
                            echo '<div class="sidebar-posts">';
                            while ( $the_query->have_posts() ) {
                                $the_query->the_post();
                                //add redirect as string query
                                echo '<a href="'.esc_html( get_permalink() ).'"><div class="sidebar-post">';
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

