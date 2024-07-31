<?php
/**
 * Responsive columns for second section
 */
?>

<div class="heroGrid" x-intersect="$el.classList.add('showing')">
                        <?php
                        // Featured query - five most recent published featured posts
                        $fqueryArgs = array( 'posts_per_page' => 8, 'offset' => 0);
                        $topfeatured = new WP_Query ( $fqueryArgs );
                        $firstsix_ids = array();
                        $storynum = 1;
                        while ( $topfeatured->have_posts() ) :	
                            if ($storynum < 2) {
                                $topfeatured->the_post();
                                echo "<div class='ft-story top'>";
                                get_template_part( 'template-parts/content-posts' );
                                echo"</div>";
                            } else {
                                $topfeatured->the_post();
                                echo "<div class='ft-story'>";
                                get_template_part( 'template-parts/content-posts' );
                                echo"</div>";
                            }
                            $storynum = $storynum + 1;
                        endwhile; 
                        wp_reset_query(); // End of the loop.					
                        ?>				
                </div>