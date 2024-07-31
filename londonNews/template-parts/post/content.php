<?php
/**
 * Template part for displaying posts.
 */
?>
<div class="newsContainer">
<?php
    if ( has_post_thumbnail() ) :
        the_post_thumbnail( 'array(400, 150)' );
    else : ?>
        <div class="newsImg"></div>
    <?php
    endif;
    ?>
<article id="post-<?php the_ID() ?>">
    <header class="entry-header">
        <?php
        if ( is_singular() ) :
            the_title(' <h1 class="entry-title">', '</h1><h2>'.the_date().'</h2>' );
        else :

            the_title( '<div class="newsTitle"><h4 class="entry-title"><a class="entry-link" href="'.esc_url( get_permalink() ).'">', '</a></h4></div>' );
        endif;
        ?>
    </header>
    <!-- Post thumbnail -->


    <!-- Post Content --> 
    <?php if ( is_home() || is_archive() ) : ?>
    <div class="newsCaption entry-content">
        <?php the_excerpt();
            ?>
    </div>
    <?php elseif( is_single() ) : ?>
        <div class="entry-content">
            <?php the_content(); ?>
        </div>
    <?php endif; ?>
</article>

</div>
