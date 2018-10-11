<?php
/**
 * The template for displaying pages
 *
 */
get_header(); ?>
<div class="container">
    <div class="col-lg-12">
        <?php while ( have_posts() ) : the_post(); ?>    

            <div class="page-content">
                <div class="col-md-12 col-sm-12 col-xs-12 contactLeft">
                    <?php the_content();?>
                </div>  
            </div>         
                    
            <?php endwhile;?>
            <?php wp_reset_query();?>
    </div>
</div>

<?php
get_footer();
?>
