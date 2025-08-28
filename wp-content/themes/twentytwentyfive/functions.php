<?php
/**
 * Twenty Twenty-Five functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_Five
 * @since Twenty Twenty-Five 1.0
 */


// Register Options
if (function_exists('acf_add_options_page')) {
	acf_add_options_page(array(
		'page_title' => 'Main menu',
		'menu_title' => 'Main menu',
		'show_in_graphql' => true,
		'icon_url' => 'dashicons-admin-post',
	));
	acf_add_options_page(array(
		'page_title'    => 'Contacts info',
        'menu_title'    => 'Contacts info',
		'show_in_graphql' => true,
        'redirect'      => false,
		'icon_url' => 'dashicons-admin-post',
    ));

}

// Даст Travelers’ Map видеть ваш CPT в настройках
// add_filter('cttm_available_post_types', function ($types) {
//   $types[] = 'board'; // slug вашего post type
//   return array_unique($types);
// });



// if (function_exists('register_graphql_object_type') && function_exists('register_graphql_field')) {
// register_graphql_object_type('MarkerImage', [
//     'fields' => [
//         'id' => ['type' => 'Int'],
//         'title' => ['type' => 'String'],
//         'uri' => ['type' => 'String'],
//         'alt' => ['type' => 'String'],
//     ]
// ]);

// register_graphql_object_type('Marker', [
//     'fields' => [
//         'latitude' => ['type' => 'String'],
//         'longitude' => ['type' => 'String'],
//         'customtitle' => ['type' => 'String'],
//         'image' => ['type' => 'MarkerImage'], // ✅ связь с объектом
//     ]
// ]);

// add_action('graphql_register_types', function () {
//     // Объект для одного маркера
//     register_graphql_object_type('TravelersMapMarker', [
//         'description' => 'Single marker from Travelers’ Map meta',
//         'fields' => [
//             'lat'     => ['type' => 'Float'],
//             'lng'     => ['type' => 'Float'],
//             'address' => ['type' => 'String'],
//             'image'   => [
//                 'type' => 'MediaItem',
//                 'description' => __('Custom thumbnail image for the marker', 'your-textdomain'),
//             ],
//         ],
//     ]);

//     // Поле для массива маркеров
//     register_graphql_field('ContentNode', 'tmMarkers', [
//         'type' => ['list_of' => 'TravelersMapMarker'],
//         'description' => 'All markers from Travelers’ Map meta (_latlngmarker)',
//         'resolve' => function ($post) {
//             $id = $post->databaseId ?? $post->ID ?? null;
//             if (!$id) return null;

//             $meta = get_post_meta($id, '_latlngmarker', true);
//             if (!$meta) return null;

//             $data = json_decode($meta, true);
//             if (!$data) return null;

//             $markers = [];

//             // Функция для генерации маркера
//             $create_marker = function($marker) {
//                 $item = [
//                     'lat'     => isset($marker['latitude']) ? (float) $marker['latitude'] : null,
//                     'lng'     => isset($marker['longitude']) ? (float) $marker['longitude'] : null,
//                     'address' => $marker['customtitle'] ?? null,
//                     'image'   => null,
//                 ];

//                 if (!empty($marker['customthumbnail'])) {
//                     $image_id = (int) $marker['customthumbnail'];

// 					if ($image_id) {
// 						$attachment_post = get_post($image_id);
// 						if ($attachment_post) {
// 							$item['image'] = [
// 								'id'    => $attachment_post->ID,
// 								'title' => get_the_title($attachment_post),
// 								'uri'   => wp_get_attachment_url($attachment_post->ID),
// 								'alt'   => get_post_meta($attachment_post->ID, '_wp_attachment_image_alt', true),
// 							];
// 						}
// 					}
//                 }

//                 return $item;
//             };

//             // Основной маркер
//             if (isset($data['latitude'], $data['longitude'])) {
//                 $markers[] = $create_marker($data);
//             }

//             // Дополнительные маркеры
//             foreach ($data as $key => $marker) {
//                 if (strpos($key, 'additional_marker_') === 0 && is_array($marker)) {
//                     $markers[] = $create_marker($marker);
//                 }
//             }

//             return $markers ?: null;
//         }
//     ]);
// });
// }




// подключение скриптов
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_script('jquery');

});




// // удаляем стили
// function remove_block_library_css() {
//     // Убираем стандартные стили блоков
//     wp_dequeue_style('wp-block-library');
//     wp_dequeue_style('wp-block-library-theme');
//     // Если используется WooCommerce, можно убрать его стили тоже
//     wp_dequeue_style('wc-block-style'); 
// }
// add_action('wp_enqueue_scripts', 'remove_block_library_css', 100);





// Adds theme support for post formats.
if ( ! function_exists( 'twentytwentyfive_post_format_setup' ) ) :
	/**
	 * Adds theme support for post formats.
	 *
	 * @since Twenty Twenty-Five 1.0
	 *
	 * @return void
	 */
	function twentytwentyfive_post_format_setup() {
		add_theme_support( 'post-formats', array( 'aside', 'audio', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video' ) );
	}
endif;
add_action( 'after_setup_theme', 'twentytwentyfive_post_format_setup' );

// Enqueues editor-style.css in the editors.
if ( ! function_exists( 'twentytwentyfive_editor_style' ) ) :
	/**
	 * Enqueues editor-style.css in the editors.
	 *
	 * @since Twenty Twenty-Five 1.0
	 *
	 * @return void
	 */
	function twentytwentyfive_editor_style() {
		add_editor_style( 'assets/css/editor-style.css' );
	}
endif;
add_action( 'after_setup_theme', 'twentytwentyfive_editor_style' );

// Enqueues style.css on the front.
if ( ! function_exists( 'twentytwentyfive_enqueue_styles' ) ) :
	/**
	 * Enqueues style.css on the front.
	 *
	 * @since Twenty Twenty-Five 1.0
	 *
	 * @return void
	 */
	function twentytwentyfive_enqueue_styles() {
		wp_enqueue_style(
			'twentytwentyfive-style',
			get_parent_theme_file_uri( 'style.css' ),
			array(),
			wp_get_theme()->get( 'Version' )
		);
	}
endif;
add_action( 'wp_enqueue_scripts', 'twentytwentyfive_enqueue_styles' );

// Registers custom block styles.
if ( ! function_exists( 'twentytwentyfive_block_styles' ) ) :
	/**
	 * Registers custom block styles.
	 *
	 * @since Twenty Twenty-Five 1.0
	 *
	 * @return void
	 */
	function twentytwentyfive_block_styles() {
		register_block_style(
			'core/list',
			array(
				'name'         => 'checkmark-list',
				'label'        => __( 'Checkmark', 'twentytwentyfive' ),
				'inline_style' => '
				ul.is-style-checkmark-list {
					list-style-type: "\2713";
				}

				ul.is-style-checkmark-list li {
					padding-inline-start: 1ch;
				}',
			)
		);
	}
endif;
add_action( 'init', 'twentytwentyfive_block_styles' );

// Registers pattern categories.
if ( ! function_exists( 'twentytwentyfive_pattern_categories' ) ) :
	/**
	 * Registers pattern categories.
	 *
	 * @since Twenty Twenty-Five 1.0
	 *
	 * @return void
	 */
	function twentytwentyfive_pattern_categories() {

		register_block_pattern_category(
			'twentytwentyfive_page',
			array(
				'label'       => __( 'Pages', 'twentytwentyfive' ),
				'description' => __( 'A collection of full page layouts.', 'twentytwentyfive' ),
			)
		);

		register_block_pattern_category(
			'twentytwentyfive_post-format',
			array(
				'label'       => __( 'Post formats', 'twentytwentyfive' ),
				'description' => __( 'A collection of post format patterns.', 'twentytwentyfive' ),
			)
		);
	}
endif;
add_action( 'init', 'twentytwentyfive_pattern_categories' );

// Registers block binding sources.
if ( ! function_exists( 'twentytwentyfive_register_block_bindings' ) ) :
	/**
	 * Registers the post format block binding source.
	 *
	 * @since Twenty Twenty-Five 1.0
	 *
	 * @return void
	 */
	function twentytwentyfive_register_block_bindings() {
		register_block_bindings_source(
			'twentytwentyfive/format',
			array(
				'label'              => _x( 'Post format name', 'Label for the block binding placeholder in the editor', 'twentytwentyfive' ),
				'get_value_callback' => 'twentytwentyfive_format_binding',
			)
		);
	}
endif;
add_action( 'init', 'twentytwentyfive_register_block_bindings' );

// Registers block binding callback function for the post format name.
if ( ! function_exists( 'twentytwentyfive_format_binding' ) ) :
	/**
	 * Callback function for the post format name block binding source.
	 *
	 * @since Twenty Twenty-Five 1.0
	 *
	 * @return string|void Post format name, or nothing if the format is 'standard'.
	 */
	function twentytwentyfive_format_binding() {
		$post_format_slug = get_post_format();

		if ( $post_format_slug && 'standard' !== $post_format_slug ) {
			return get_post_format_string( $post_format_slug );
		}
	}
endif;
