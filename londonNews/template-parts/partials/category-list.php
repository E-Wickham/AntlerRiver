<?php
/**
 * Responsive columns for second section
 */
?>

<div class="category-posts" x-intersect="$el.classList.add('showing')">
                        <?php
                        // Featured query - five most recent published featured posts
                        $fqueryArgs = array( 'posts_per_page' => 5, 'offset' => 3);
                        $topfeatured = new WP_Query ( $fqueryArgs );
                        $firstsix_ids = array();
                        $storynum = 1;
                        while ( $topfeatured->have_posts() ) :	
                                $topfeatured->the_post();
                                echo "<div class='ft-story'>";
                                get_template_part( 'template-parts/content-posts' );
                                echo"</div>";
                        endwhile; 
                        wp_reset_query(); // End of the loop.					
                        ?>				
                </div>