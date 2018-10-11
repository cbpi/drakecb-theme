<?php
/**
 * Functions.php
 *
 * @since Drakecb.me 2016
 */


@ini_set( 'upload_max_size' , '64M' );
@ini_set( 'post_max_size', '64M');
@ini_set( 'max_execution_time', '300' );


/**
 * 清理 wp_head 代码
 */
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'start_post_rel_link');
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'adjacent_posts_rel_link');

/**
 * 自定义编辑器字体选项
 */
function custum_fontfamily($initArray){
   $initArray['font_formats'] = "Arial=arial;Arial Black=arial black;Helvetica=helvetica;Tahoma=tahoma;Times New Roman=times new roman,times;Verdana=verdana;微软雅黑='微软雅黑';宋体='宋体';黑体='黑体';仿宋='仿宋';楷体='楷体';隶书='隶书';幼圆='幼圆';";
   return $initArray;
}
add_filter('tiny_mce_before_init', 'custum_fontfamily');

/**
 * 开启编辑器隐藏按钮
 */
function enable_more_buttons($buttons) {
     $buttons[] = 'hr';
     $buttons[] = 'del';
     $buttons[] = 'sub';
     $buttons[] = 'sup';
     $buttons[] = 'fontselect';
     $buttons[] = 'fontsizeselect';
     $buttons[] = 'cleanup';
     $buttons[] = 'styleselect';
     $buttons[] = 'wp_page';
     $buttons[] = 'anchor';
     $buttons[] = 'backcolor';
     return $buttons;
}
add_filter("mce_buttons_3", "enable_more_buttons");

/**
 * 上传文件自动重命名
 */
function new_filename($filename) {
    $info = pathinfo($filename);
    $ext = empty($info['extension']) ? '' : '.' . $info['extension'];
    $name = basename($filename, $ext);
    return substr(md5($name), 0, 15) . $ext;
}

add_filter('sanitize_file_name', 'new_filename', 10);

/**
 * 自定义编辑器文字尺寸选项
 */
if ( ! function_exists( 'wpex_mce_text_sizes' ) ) {
    function wpex_mce_text_sizes( $initArray ){
        $initArray['fontsize_formats'] = "9px 10px 12px 13px 14px 16px 18px 21px 24px 28px 32px 36px";
        return $initArray;
    }
}
add_filter( 'tiny_mce_before_init', 'wpex_mce_text_sizes' );

/**
 * 编辑器直接预览文章 CSS 样式
 */
add_editor_style('editor-style.css'); //多个 CSS 参照格式新增

/**
 * 文章摘要
 */
function dm_strimwidth($str ,$start , $width ,$trimmarker ){
    $output = preg_replace('/^(?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){0,'.$start.'}((?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){0,'.$width.'}).*/s','\1',$str);
    return $output.$trimmarker;
}


/**
 * 替换底部 Wordpress 信息
 */
function remove_footer_admin () {
    echo '&copy; 2011 - '. date("Y") .' Designed & Developed by Bo Chen. <a href="http://drakecb.me" target="_blank" title="Drakecb.me的WORDPRESS">Drakecb.me</a> | <a href="http://weibo.com/bo0918" target="_blank" title="Sina Weibo">Sina Weibo</a> | <a href="mailto:chenbo9018@gmail.com" target="_blank" title="Email to BoChen">Email to me</a>';
}
add_filter('admin_footer_text', 'remove_footer_admin');


/**
 * 屏蔽版本更新
 */
function wpbeginner_remove_version() {
    return '';
}
add_filter('the_generator', 'wpbeginner_remove_version');


/**
 * 后台登陆地址改写
 */
add_action('login_enqueue_scripts','login_protection');  
function login_protection(){  
    if($_GET['shuizuishuai'] != 'chenbozuishuai')header('Location: http://drakecb.me/');  
}
/**
 * 支持特色图片
 */
add_theme_support( 'post-thumbnails' ); 

/**
 * 注册菜单
 */
register_nav_menus( array(
		'primary'               => __( 'Top primary menu', 'drakecbme' ),
		'product-category-list-menu' => __( 'Product category list menu', 'drakecbme' ),
        'about-us-sidebar'      => __( 'About us menu', 'drakecbme'),
	) );

/**
 * 小工具调用
 */
register_sidebar( array(
		'name' => __( 'Rightsidebar', 'drakecbme' ),
		'id' => 'right-sidebar',
		'description' => __( 'Appears  right', 'drakecbme' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
) );


add_filter('wp_list_categories', 'cat_count_span');
function cat_count_span($links) {
  $links = str_replace('</a> (', '</a> <span class="count">', $links);
  $links = str_replace(')', '</span>', $links);
  return $links;
}