<?php
/**
 * Template for content not found
 */
?>

<section class="no-results not-found">
    <header class="page-header">
        <h2 class="page-title"><?php esc_html_e('Nothing Found', 'herobiz'); ?></h2>
    </header>


<?php

if ( is_search() ) :
    ?>
    <p><?php esc_html_e( 'Nothing matched your search terms. Please try again.' );?></p>
    <?php
    get_search_form();
else : 
    ?>
    <p><?php esc_html_e( 'We can not find what you are looking for. Try a search instead' );?></p>
    <?php
    get_search_form();

endif;
?>

</section>