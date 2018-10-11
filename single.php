<?php 
get_header();
?>
<section class="blog-banner-wrap">
    <div class="sitetitle">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<!--                    <h1 class="page-title"><?php //the_title()?></h1>-->
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
                    <?php while ( have_posts() ) : the_post();?> 
                    <?php 
                        $feature_t = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' ); 
                        $image_url = $feature_t['0'];?>
                    <article>
                        <div class="blog-media">
                            <img width="848" height="435" alt="<?php the_title();?>" class="img-responsive" src="<?php bloginfo('template_url')?>/timthumb.php?src=<?php echo $image_url;?>&amp;w=848&amp;h=435;&amp;zc=1"> 
                        </div>
                        <div class="blog-short-text">
                            <h1 class="blog-title">
                                <?php the_title();?>
                            </h1>
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
                                        <a href="#">0</a> Comments 
                                    </li>
                                </ul>
                            </div>
                            <div class="blog-content">
                                <?php the_content();?>
                            </div>
                            <div class="blog-link row">
                                
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <div class="blog-category">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                    <?php endwhile;?>
                    <?php wp_reset_query();?>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" id="rightsidebar">
                <?php dynamic_sidebar('right-sidebar')?>
            </div>
        </div>
    </div>
</div>

<?php get_footer();?>