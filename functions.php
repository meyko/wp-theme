<?php function enqueue_styles() {
	wp_enqueue_style( 'bootsrap-24-style', get_template_directory_uri().'/css/bootstrap.css');
	wp_enqueue_style( 'bootsrap-24-style-theme', get_template_directory_uri().'/css/bootstrap-theme.css');
	wp_enqueue_style( 'modern-new-theme-style', get_stylesheet_uri());
	wp_register_style('font-style', 'https://fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700&subset=latin,cyrillic');
	wp_enqueue_style( 'font-style');
}
add_action('wp_enqueue_scripts', 'enqueue_styles');

function enqueue_scripts () {
	wp_register_script('boostrap-js', get_template_directory_uri().'/js/bootstrap.min.js', array( 'jquery' ));
	wp_register_script('custom-js', get_template_directory_uri().'/js/custom.js',array( 'jquery','boostrap-js' ));
	wp_enqueue_script('boostrap-js');
	wp_enqueue_script('custom-js');
}
add_action('wp_enqueue_scripts', 'enqueue_scripts');
//add and remove theme settings menu
add_theme_support('menus');
function remove_menus(){
  remove_menu_page( 'index.php' );                
  remove_menu_page( 'edit-comments.php' );
}
add_action( 'admin_menu', 'remove_menus' );
$args = array(
	'width'         => 1000,
	'height'        => 1000,
	'default-image' => get_template_directory_uri().'/img/logo1.png',
	'uploads'       => true,
);
add_theme_support( 'custom-header' );
add_theme_support( 'post-thumbnails' );
if ( function_exists('register_nav_menus')) {
	register_nav_menus(array(
	  'header_menu' => 'header'
));}?>
<?php

/*
* theme Customize page  options
*/
function true_customizer_init( $wp_customize ) {
 	$wp_customize->add_section(
		'footer_settings', 
		array(
			'title'     => 'Настройки футера',
			'priority'  => 200,
		)
	);
	$wp_customize->add_setting(
		'footer_settings', 
		array(
			'label' => 'Напишите свой текст, он отобразится в футере',
			'default'    =>  'Copyright © АИБ Бизнес-Информ. 2005-2016',
			'sanitize_callback' => 'sanitize_text',
		)
	);
	$wp_customize->add_control(
    'footer_settings',
    array(
        'label' => 'Текст копирайта',
        'section' => 'footer_settings',
        'type' => 'text',
    )
);
/*
* Delete setting color
*/
 $wp_customize->remove_section('colors');
}
add_action( 'customize_register', 'true_customizer_init' );
/*
*Sidebars add
*/ 

if ( function_exists('register_sidebar') ){
    register_sidebar(array(
     'id'=>'main_page_widget',
     'name'=>'Колонка справа на главной',
     'before_widget'=>'<div id="%1$s" class="widget %2$s">',
     'after_widget'=>"</div>\n"
     ));
}
if ( function_exists('register_sidebar') ){
    register_sidebar(array(
     'id'=>'contacts',
     'name'=>'Колонка слева на главной',
     'before_widget'=>'<div id="%1$s" class="widget %2$s">',
     'after_widget'=>"</div>",
     'before_title'=>'<h2 class="widgettitle">',
     'after_title'=>'</h2>'
     ));
}
if ( function_exists('register_sidebar') ){
    register_sidebar(array(
    	'id'=>'news',
        'name'=>'Сайдбар',
     	'before_widget'=>'<div>',
     	'after_widget'=>"</div>",
     	'before_title'=>'<div class="news-header"><h3>',
     'after_title'=>'</h3></div>'
));
}
if ( function_exists('register_sidebar') ){
    register_sidebar(array(
     'id'=>'footer_sidebar',
     'name'=>'Футер',
     'before_widget'=>'<div class="col-xs-24 col-md-6 widget %2$s">',
     'after_widget'=>"</div>\n",
     'before_title'=>'<h4 class="currency">',
     'after_title'=>'</h4>'
     ));
}
if ( function_exists('register_sidebar') ){
    register_sidebar(array(
   	'id'=>'feedback_page',
     'name'=>'Сайдбар на странице обратной связи',
     'before_widget'=>'<div>',
     'after_widget'=>"</div>",
     'before_title'=>'<div class="news-header"><h3>',
     'after_title'=>'</h3></div>'
     ));
}?>
<?php

/*
* Widget settings
*/
function unregister_default_wp_widgets() {
    unregister_widget('WP_Widget_Archives');
    unregister_widget('WP_Widget_Links');
    unregister_widget('WP_Widget_Meta');
    unregister_widget('WP_Widget_Recent_Comments');
    unregister_widget('WP_Widget_RSS');
    unregister_widget('WP_Widget_Tag_Cloud');
    unregister_widget('WP_Nav_Menu_Widget');
}
add_action('widgets_init', 'unregister_default_wp_widgets', 1);

class NewsWidget extends WP_Widget {
	/*
	 * Prints links in current category
	 */
	function __construct() {
		parent::__construct(
			'news_widget', 
			'Список записей из категории', // header
			array( 'description' => 'Позволяет  список ссылок из текущей категории, отсортированные по дате' )
		);
	}
 
	/*
	 * Widget view
	 */
	public function widget( $args, $instance ) {
		if (!$instance['title'])
			$title = get_the_category_by_ID( getCurrentCatID() );
		else
			$title = apply_filters( 'widget_title', $instance['title'] );
		$posts_per_page = $instance['posts_per_page'];
		echo $args['before_widget'];
 
		if ( ! empty( $title ) )
			echo $args['before_title'] . $title . $args['after_title'];
 		echo '<div class="post-link news-content"><ul class="widget-news">';
		$q = new WP_Query(array("posts_per_page"=>$posts_per_page,"cat"=>getCurrentCatID()));
		if( $q->have_posts() ):
			while( $q->have_posts() ):$q->the_post();
				?><li><a href="<?php the_permalink() ?>"><?php the_title() ?></a></li><?php
			endwhile;
			echo '</ul></div>';
		endif;
		wp_reset_postdata();
		echo $args['after_widget'];
	}
	/*
	 * Widget admin view
	 */
	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}
		if ( isset( $instance[ 'posts_per_page' ] ) ) {
			$posts_per_page = $instance[ 'posts_per_page' ];
		}
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">Заголовок</label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'posts_per_page' ); ?>">Количество постов:</label> 
			<input id="<?php echo $this->get_field_id( 'posts_per_page' ); ?>" name="<?php echo $this->get_field_name( 'posts_per_page' ); ?>" type="text" value="<?php echo ($posts_per_page) ? esc_attr( $posts_per_page ) : '5'; ?>" size="3" />
		</p>
		<?php 
	}
 
	/*
	 * Widget settings
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['posts_per_page'] = ( is_numeric( $new_instance['posts_per_page'] ) ) ? $new_instance['posts_per_page'] : '5'; // by default 5 
		return $instance;
	}
}
function news_widget_load() {
	register_widget( 'NewsWidget' );
}
add_action( 'widgets_init', 'news_widget_load' );
?>
<?php

/*** Shotcode for feedback form ***/

class form_shortcode {
  static $add_script;
  static function init () {
      add_shortcode('form', array(__CLASS__, 'insert_form'));
      add_action('init', array(__CLASS__, 'register_script'));
      add_action('wp_footer', array(__CLASS__, 'print_script'));
  }
  static function insert_form( $atts ) {
      self::$add_script = true; 
      require_once get_template_directory().'/shortcodes/form.php';
		if ($form_html)
			return $form_html;   
  }
  static function register_script() {
    wp_register_script( 'feedback.js', get_stylesheet_directory_uri().'/shortcodes/js/feedback.js');      
  }
  static function print_script () {
      if ( !self::$add_script ) return;
      wp_print_scripts('feedback.js');
  }
}
form_shortcode::init();
//allow use shortcodes in sidebar
add_filter('widget_text', 'do_shortcode');

/*
* Shotcode for money currency
*/
add_shortcode( 'currency' , 'currency' );
function currency(){
	require_once get_template_directory().'/shortcodes/money.php';
	if ($currency_result)
	return $currency_result;
}

/*
* FUNCTIONS
*/
function getCurrentCatID(){  
//current category
  global $wp_query;  
  if(is_category() || is_single()){  
		$cat_ID = get_query_var('cat'); 
		if (!$cat_ID) {
			$cur_cat=reset(get_the_category( $post->ID ));
			$cat_ID=$cur_cat->cat_ID;
		}		
  }  
  return $cat_ID;  
 }
 function sanitize_text($input) {
    return wp_kses_post(force_balance_tags($input));
}