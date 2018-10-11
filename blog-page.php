<?php 
/*
 * Template Name: Blog Page

*/
get_header();
?>

<section class="blog-banner-wrap">
    <div class="sitetitle">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h1 class="page-title">博客/BLOG</h1>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="blog-main">
    <div class="container">
        <div class="row">
            <div id="prinmar" class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                <div id="content" role="main">
                    <?php
                        $page = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
                        $args = array(
                            'post_type'         =>  'post', 
                            'posts_per_page'    => '80',
                            'paged'             =>  $page
                        );
            
                        $the_query = new WP_Query( $args );
                    ?>
                    <?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post();?>
                    <?php 
                        $feature_t = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' ); 
                        $image_url = $feature_t['0'];?>
                    <article>
                        <div class="blog-media">
                            <a href="<?php echo get_permalink($post->ID) ?>">
                                
                                <img width="870" height="370" alt="<?php the_title;?>" class="img-responsive" src="<?php bloginfo('template_url')?>/timthumb.php?src=<?php echo $image_url;?>&amp;w=870&amp;h=370;&amp;zc=1"> 
                            </a>
                        </div>
                        <div class="blog-short-text">
                            <h2 class="blog-title">
                                <a href="<?php echo get_permalink($post->ID) ?>"><?php the_title();?></a>
                            </h2>
                            <div class="blog-meta">
                                <ul class="list-unstyled">
                                    <li class="blog-date"><?php the_time('Y-m-d');?></li>
                                    <li class="zo-blog-tag">
                                         Tags: 
                                        <?php 
                                            $t = wp_get_post_tags($post->ID);
                                            
                                            
                                            foreach($t as $tag):
                                        ?> 
                                        <a href="<?php echo get_tag_link( $tag->term_id )?>" rel="tag"><?php echo $tag->name?></a>
                                        <?php endforeach;?> 
                                    </li>
                                    <li class="zo-blog-comment">
                                        <a href="http://demo.cms-theme.net/wordpress/intent/?p=242#comment">0</a> Comments 
                                    </li>
                                </ul>
                            </div>
                            <div class="blog-content">
                                <p><?php echo get_the_excerpt();?></p>
                            </div>
                            <div class="blog-link row">
                                <div class="blog-readmore col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <a title="<?php the_title();?>" href="<?php echo get_permalink($post->ID) ?>" rel="">详情 <i class="fa fa-angle-right"></i></a>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <div class="blog-category">
                                         <?php
                                            $category = get_the_category();
                                            foreach($category as $categories):
                                        ?>
                                        <a href="<?php echo get_category_link( $categories->term_id );?>"><?php echo $categories->cat_name;?></a>
                                        <?php endforeach;?>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                    <?php endwhile;endif;?>
                    <?php wp_reset_postdata();?>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" id="rightsidebar">
                <?php dynamic_sidebar('right-sidebar')?>
            </div>
        </div>
    </div>
</div>

<?php get_footer();?>