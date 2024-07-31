<?php 

// Custom post display
?>
<a href="<?php echo esc_url(get_permalink()); ?>" target="_blank">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php 

        // get perma link
        $postID = $post->ID;

        //keep post id for specific queries
        $post_id = $post->ID;

        $curryear = date('Y');
        $postyr = get_the_date('Y');
        if ($curryear == $postyr) {
            $poststamp = get_the_date('M j, Y');
        } else {
            $poststamp = get_the_date('m j, Y');
        }

        // finding the featured image in a very heavy-handed way
        $args = array(
            'post_type'      => 'attachment',
            'post_mime_type' => 'image',
            'post_parent'    => get_the_ID(),
            'posts_per_page' => 1,
            'order'          => 'ASC',
        );
        $attachments = get_posts($args);
        
        $thumbnail_url = "";
        if ($attachments) {
            $thumbnail_url = wp_get_attachment_url($attachments[0]->ID, 'news-thumb');
        } else{
            $thumbnail_url = get_the_post_thumbnail_url();
        }

        ?>        

            <div class="post-thumbnail">
                    <?php if ( has_post_thumbnail() ) {
                                    the_post_thumbnail();
                                } 
                        else if ($thumbnail_url != NULL) {
                            ?><img src="<?php echo $thumbnail_url?>">
                        <?php }
                        ?>
                
                </div>
                <div class="entry-content-holder">
                <header class="entry-header">		
                    <div class="entry-meta">
                        <span class="cat-links">
                            <?php
                                $post_categories = wp_get_post_categories( $post_id );
                                echo '<span class="date">'.$poststamp.'</span><h6 class="post_author red-font">';
                                    the_author();
                                echo '</h6>';
                                //CATEGORY NAMES INCLUDED
                                foreach($post_categories as $cat) {
                                    $catname = get_cat_name($cat);
                                    //echo '<a class="category-color-'.$cat.'" href="'. esc_url(get_category_link($cat)) .'">'.$catname.'</a>';
                                };
                                

                                ?>
                        </span>
                    </div>
        <?php the_title('<h2 class="entry-title">', '</h2>');
        ?>
                </header>
                <div class="entry-footer"></div>
                </div>
                        
    </article>
</a> 