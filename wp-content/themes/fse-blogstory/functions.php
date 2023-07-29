<?php

/**
 * FSE Blogstory functions and definitions
 *
 * @package FSE Blogstory
 */

if (!function_exists('fse_blogstory_setup')) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which runs
	 * before the init hook. The init hook is too late for some features, such as indicating
	 * support post thumbnails.
	 */
	function fse_blogstory_setup()
	{

		if (!isset($content_width))
			$content_width = 640; /* pixels */

		load_theme_textdomain('fse-blogstory', get_template_directory() . '/languages');
		add_theme_support('automatic-feed-links');
		add_theme_support('post-thumbnails');
		add_theme_support('title-tag');
		add_theme_support('custom-logo', array(
			'height'      => 240,
			'width'       => 240,
			'flex-height' => true,
		));

		register_nav_menus(array(
			'primary' => __('Primary Menu', 'fse-blogstory'),
			'secondary' => __('Top Header Menu', 'fse-blogstory'),
		));
		add_theme_support('custom-background', array(
			'default-color' => 'ffffff'
		));
		// Add support for Block Styles.
		add_theme_support('wp-block-styles');

		// Add support for full and wide align images.
		add_theme_support('align-wide');

		add_filter('use_widgets_block_editor', '__return_false');

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
				'navigation-widgets',
			)
		);

		// Add support for responsive embedded content.
		add_theme_support('responsive-embeds');
	}
endif; // fse_blogstory_setup
add_action('after_setup_theme', 'fse_blogstory_setup');


function fse_blogstory_scripts()
{
	wp_enqueue_style('fse-blogstory-basic-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'fse_blogstory_scripts');

/**
 * Use front-page.php when Front page displays is set to a static page.
 *
 *
 * @param string $template front-page.php.
 *
 * @return string The template to be used: blank if is_home() is true (defaults to index.php), else $template.
 */
function fse_blogstory_front_page_template($template)
{
	return is_home() ? '' : $template;
}
add_filter('frontpage_template',  'fse_blogstory_front_page_template');

// Block Patterns.
require get_template_directory() . '/block-patterns.php';

// Theme About Page
require get_template_directory() . '/inc/about.php';

/* Redirect on theme activation */
add_action('admin_init', 'fes_blogstory_theme_activation_redirect');

/**
 * Redirect to "Install Plugins" page on activation
 */
function fes_blogstory_theme_activation_redirect()
{
	global $pagenow;
	if ("themes.php" == $pagenow && is_admin() && isset($_GET['activated'])) {
		wp_redirect(esc_url_raw(add_query_arg('page', 'fse-blogstory-theme', admin_url('themes.php'))));
	}
}

add_filter('use_widgets_block_editor', '__return_false');

function fse_blogstoy_custom_excerpt_length($length)
{
	return 28;
}
add_filter('excerpt_length', 'fse_blogstoy_custom_excerpt_length');


function j0e_enqueue_styles()
{
	$theme_uri = get_template_directory_uri();

	//css
	wp_enqueue_style('bootstrap-css', "https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css");
	wp_enqueue_style('font-awesome-4.7', "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css");
	wp_enqueue_style('bootstrap-css', "https://pagination.js.org/dist/2.6.0/pagination.css");
	wp_enqueue_style('custom-css', $theme_uri . "/assets/classic/css/custom.css", array('bootstrap-css'));

	//js
	wp_enqueue_script('jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js');
	wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js', array('jquery'));
	wp_enqueue_script('main-js', $theme_uri . "/assets/classic/js/main.js", array('jquery'));
	wp_enqueue_script('main-js', $theme_uri . "/assets/classic/js/dist/dist/fakeLoader.min.js", array('jquery'));
	wp_enqueue_script('pagination-js', 'https://cdnjs.cloudflare.com/ajax/libs/paginationjs/2.6.0/pagination.min.js', array('jquery'));
}

add_action('wp_enqueue_scripts', 'j0e_enqueue_styles');

// require_once(get_stylesheet_directory_uri().'/classes/class-boc-demo.php');
// die(get_template_directory());

// get_template_directory_uri(): dung de goi theme goc
// get_stylesheet_directory_uri(): dung de goi child theme
// get_stylesheet_uri(): goi den style.css cua theme goc
// get_theme_root_uri(): ket qua tra ve la duong dan den thu muc wp-content/theme
// get_theme_root(): tra ve duong dan tuyet doi den wp-content/theme
// get_theme_roots(): tra ve list thu muc cac theme
// get_stylesheet_directory(): tra ve duong dan tuyet doi den thu muc chua file style.css
// get_template_directory(): tra ve duong dan tuyet doi den theme hien tai, thuong thi ket qua tuong tu nhu get_style_sheet_directory()

// add_action('init', 'gutenberg_block_register_block');

// function gutenberg_block_register_block()
// {

// 	register_block_type('hall/block-server-side-render', array(
// 		'render_callback' => 'hall_render_inner_content',
// 		'attributes' => array(
// 			'innerContent' => array(
// 				'type' => 'array'
// 			)
// 		)
// 	));
// }


// function hall_render_inner_content($attributes)
// {
// 	$innerContent = $attributes['innerContent'];
// 	return '<div class="inner-content">' . $innerContent . '</div>';
// }


add_action('template_redirect', function () {

	//login but access url login and register
	// if(strpos(get_permalink(), 'login') || strpos(get_permalink(), 'register')){
	// 	$user_id = get_current_user_id();
	// 	if($user_id != "") {
	// 		wp_redirect(get_home_url());
	// 		// exit;
	// 	}
	// }

	//not login but access url 
	// if(strpos(get_permalink(), 'showtimes') || strpos(get_permalink(), 'historyorder')){
	// 	$user_id = get_current_user_id();
	// 	if($user_id == "") {
	// 		wp_redirect(get_page_by_title('Login'));
	// 		// exit;
	// 	}
	// }

	$user_id = get_current_user_id();
	if (strpos(get_permalink(), 'login') || strpos(get_permalink(), 'register')) {
		if ($user_id) {
			wp_redirect(get_home_url());
		}
	} elseif (strpos(get_permalink(), 'showtimes') || strpos(get_permalink(), 'historyorder')) {
		if (!$user_id) {
			wp_redirect('http://book_tickets_movie2.local/login/');
		}
	}
});


add_action('init', 'reigster_block_example_01');
function reigster_block_example_01()
{
	wp_register_script(
		'gutenberg-example-01',
		get_stylesheet_directory_uri() . '/src/gutenberg-example-01.js',
		array('wp-blocks', 'wp-i18n', 'wp-element', 'wp-editor')
	);

	register_block_type('gutenberg-examples/example-11', array(
		'editor_script' => 'gutenberg-example-01',
	));
	// die("hello ca nha yeu cua ken");
}

// function test_testblock_renderer(){
// 	return "<h1>Hello ca nha yeu</h1>";
// }

add_action('init', 'register_block_example_15');
function register_block_example_15()
{
	wp_register_script(
		'gutenberg-example-15',
		get_stylesheet_directory_uri() . '/src/gutenberg-example-15.js',
		array('wp-blocks', 'wp-i18n', 'wp-element', 'wp-editor')
	);

	// die(get_stylesheet_directory_uri() . '/src/gutenberg-example-15.js');
	register_block_type('gutenberg-examples/example-15', array(
		'editor_script' => 'gutenberg-example-15',
		'render_callback' => 'display_block_list_movie',
	));
}


function display_block_list_movie()
{
	$genre = isset($_GET['query-genre']) ? $_GET['query-genre'] : "";

	if ($genre != "") {
		$arrMovie = array(
			'post_type'     => 'movie',
			'numberposts'   => -1,
			'meta_query' => array(
				array(
					'key' => '_genre',
					'compare' => '=',
					'value' => $genre,
				),
			)
		);
	} else {
		$arrMovie = array(
			'post_type'     => 'movie',
			'numberposts'   => -1,
		);
	}
	$list_movie = get_posts($arrMovie);
	$page = isset($_GET['query-page']) ? $_GET['query-page'] : 0;
	$start_position = (int)$page * 6;
	if ($start_position + 6 > count($list_movie)) {
		$end_position = count($list_movie) - 1;
	} else {
		$end_position = (int)$start_position + 6 - 1;
	}
	$html = "<h5>" . $genre . "</h5>";
	$html .= "<h5 style='color: white;'>Block nha ca nha yeu</h5>";
	$html .= '<div class="row">';
	for ($i = $start_position; $i <= $end_position; $i++) {
		$movie_id = $list_movie[$i]->ID;
		$html .= '<div class="col-md-4 mb-4">
                        <a href=' . get_the_permalink($movie_id) . '>
                            <div class="cover-image-movie">
                                ' . get_the_post_thumbnail($movie_id, "medium") . '
                            </div>
                        </a>
                        <div class="text-center mt-2">
                            <a href=' . get_the_permalink($movie_id) . ' class="limit-text movie-title-list text-center">' . get_the_title($movie_id) . '</a>
                            <a href="http://book_tickets_movie2.local/genre/?query-genre=' . get_post_meta($movie_id, '_genre', true) . '" style="cursor:pointer;text-decoration: none" class="badge bg-warning text-dark text-center my-2">' . get_post_meta($movie_id, '_genre', true) . '</a></br>
                            <a href=' . get_the_permalink($movie_id) . ' class="btn custom-btn-showtime" style="border-radius: 20px;padding: 10px 20px;">Book now</a>
                        </div> 
                    </div>';
	}

	$html .= '</div>';
	return $html;
}


//register block example 02

add_action('init', 'register_block_demo_01');
function register_block_demo_01()
{
	wp_register_script(
		'gutenberg-examples-demo-01',
		get_stylesheet_directory_uri() . '/src/gutenberg-demo-01.js',
		array(
			'wp-blocks', 'wp-i18n', 'wp-element', 'wp-editor'
		)
	);

	register_block_type('gutenberg-examples/demo-01', array(
		'editor_script' => 'gutenberg-examples-demo-01',
		// 'render_callback' => 'display_block_list_movie',
	));
}


//example 02
add_action('init', 'register_block_demo_02');
function register_block_demo_02()
{
	wp_register_script(
		'gutenbergn_block_demo_02',
		get_template_directory_uri() . '/src/gutenberg-demo-02.js',
		array(
			'wp-blocks', 'wp-i18n', 'wp-element', 'wp-editor'
		)
	);

	register_block_type(
		'gutenberg-examples/demo-02',
		array(
			'editor_script' => 'gutenbergn_block_demo_02'
		)
	);
}


//example 02_again
add_action('init', 'register_block_demo_02_again');
function register_block_demo_02_again()
{
	wp_register_script(
		'gutenberg_block_demo_02_again',
		get_template_directory_uri() . './src/gutenberg-demo-02-again.js',
		array('wp-blocks', 'wp-i18n', 'wp-element', 'wp-editor')
	);
	register_block_type(
		'gutenberg-examples/demo-2-again',
		array(
			'editor_script' => 'gutenberg_block_demo_02_again'
		)
	);
}

//register block pattern
add_action('init', 'register_block_pattern_example_01');
function register_block_pattern_example_01(){
	$display_block_pattern_01 = '<table class="table table-striped" style="background-color: white !important">
	<thead>
	  <tr>
		<th scope="col">#</th>
		<th scope="col">First</th>
		<th scope="col">Last</th>
		<th scope="col">Handle</th>
	  </tr>
	</thead>
	<tbody>
	  <tr>
		<th scope="row">1</th>
		<td>Mark</td>
		<td>Otto</td>
		<td>@mdo</td>
	  </tr>
	  <tr>
		<th scope="row">2</th>
		<td>Jacob</td>
		<td>Thornton</td>
		<td>@fat</td>
	  </tr>
	  <tr>
		<th scope="row">3</th>
		<td colspan="2">Larry the Bird</td>
		<td>@twitter</td>
	  </tr>
	</tbody>
  </table>';

//   die($display_block_pattern_01);

	register_block_pattern('wholesomecode/example-block-pattern-01', [
		'title' => 'example_block_pattern_01',
		'content' => $display_block_pattern_01,
	]);
}

//unregister block pattern
add_action('init', 'remove_register_block_pattern_01');
function remove_register_block_pattern_01(){
	unregister_block_pattern('wholesomecode/example-block-pattern-01');
}


// register category block pattern
add_action('init', 'register_category_block_pattern');
function register_category_block_pattern(){
	// die("hello ca nha yeu");
	register_block_pattern_category( 'query01', array( 'label' => _x( 'Query01', 'Block pattern category' ) ) );
}

// function register_my_block_pattern_category() {
// 	// Create a new category.
// 	$category = array(
// 	  'name' => 'My Block Patterns',
// 	  'description' => 'This category contains my custom block patterns.',
// 	);
  
// 	// Register the category.
// 	register_block_pattern_category($category);
//   }
//   add_action('init', 'register_my_block_pattern_category');