<?php
namespace UnlimitedMianAddon;

use UnlimitedMianAddon\Widgets\uae_addon_animation_box;
use UnlimitedMianAddon\Widgets\uae_addon_info_box;
use UnlimitedMianAddon\Widgets\uae_addon_counter;
use UnlimitedMianAddon\Widgets\uae_addon_logo_slider;
use UnlimitedMianAddon\Widgets\uae_addon_call_to_action;
use UnlimitedMianAddon\Widgets\uae_addon_pricing_table;
use UnlimitedMianAddon\Widgets\uae_addon_tabs;
use UnlimitedMianAddon\Widgets\uae_addon_accordions;
use UnlimitedMianAddon\Widgets\uae_addon_team_member;
use UnlimitedMianAddon\Widgets\uae_addon_testimonial;
use UnlimitedMianAddon\Widgets\uae_addon_business_hour;
use UnlimitedMianAddon\Widgets\uae_addon_card;
use UnlimitedMianAddon\Widgets\uae_addon_heading;
use UnlimitedMianAddon\Widgets\uae_addon_progressBar;
use UnlimitedMianAddon\Widgets\uae_addon_flipbox;
use UnlimitedMianAddon\Widgets\uae_addon_table;
use UnlimitedMianAddon\Widgets\uae_addon_timeline;
use UnlimitedMianAddon\Widgets\uae_addon_image_carousel;
use UnlimitedMianAddon\Widgets\uae_addon_testimonial_carousel;
use UnlimitedMianAddon\Widgets\uae_addon_interactive_banner;
use UnlimitedMianAddon\Widgets\uae_addon_blog_post;
use UnlimitedMianAddon\Widgets\uae_addon_contact_form;
use UnlimitedMianAddon\Widgets\uae_addon_filterable_gallery;
use UnlimitedMianAddon\Widgets\uae_addon_ninja_form;
use UnlimitedMianAddon\Widgets\uae_addon_duel_heading;
use UnlimitedMianAddon\Widgets\uae_counterdown_Widget;
use UnlimitedMianAddon\Widgets\uae_Clock_Widget;
use UnlimitedMianAddon\Widgets\uae_addon_icon_box;
use UnlimitedMianAddon\Widgets\uae_addon_duel_button;
use UnlimitedMianAddon\Widgets\uae_addon_logo_gird;
use UnlimitedMianAddon\Widgets\uae_addon_team_carousel;
use UnlimitedMianAddon\Widgets\uae_addon_card_carousel;
use UnlimitedMianAddon\Widgets\uae_addon_service_box;
use UnlimitedMianAddon\Widgets\uae_addon_service_carousel;
use UnlimitedMianAddon\Widgets\uae_addon_icon_carousel;

/**
 * Class Plugin
 *
 * Main Plugin class
 * @since 1.2.0
 */
class Uae_UnlimitedAddon {

	/**
	 * Instance
	 *
	 * @since 1.2.0
	 * @access private
	 * @static
	 *
	 * @var Plugin The single instance of the class.
	 */
	private static $_instance = null;

	/**
	 * Instance
	 *
	 * Ensures only one instance of the class is loaded or can be loaded.
	 *
	 * @since 1.2.0
	 * @access public
	 *
	 * @return Plugin An instance of the class.
	 */
	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	/**
	 * widget_scripts
	 *
	 * Load required plugin core files.
	 *
	 * @since 1.2.0
	 * @access public
	 */
	public function widget_scripts() {

		wp_enqueue_script('jquery');
		
        wp_register_script( 'swiper-js', plugins_url( '/assets/js/swiper.min.js', __FILE__ ), [ 'jquery' ], false, true );
		 wp_enqueue_script( 'swiper-js' );
		 
		 wp_register_script( 'parallax-js', plugins_url( '/assets/js/parallax.min.js', __FILE__ ), [ 'jquery' ], false, true );
		 wp_enqueue_script( 'parallax-js' );

		 wp_register_script( 'uae-isotope', plugins_url( '/assets/js/isotope.pkg.min.js', __FILE__ ), [ 'jquery' ], false, true );
		 wp_enqueue_script( 'uae-isotope' );

		 wp_register_script( 'main-js', plugins_url( '/assets/js/main.js', __FILE__ ), [ 'jquery' ], false, true );
		 wp_enqueue_script( 'main-js' );

		 wp_register_script( 'logo-slider-js', plugins_url( '/assets/js/logo-slider.js', __FILE__ ), [ 'jquery' ], false, true );
		 wp_enqueue_script( 'logo-slider-js' );

		 wp_register_script( 'uae-progressbar', plugins_url( '/assets/js/progressbar.min.js', __FILE__ ), [ 'jquery' ], false, true );
		 wp_enqueue_script( 'uae-progressbar' );

		 wp_register_script( 'uae-flipclock', plugins_url( '/assets/js/flipclock.min.js', __FILE__ ), [ 'jquery' ], false, true );
		 wp_enqueue_script( 'uae-flipclock' );

		 wp_register_script( 'uae-scripts', plugins_url( '/assets/js/scripts.js', __FILE__ ), [ 'jquery' ], false, true );
		 wp_enqueue_script( 'uae-scripts' );
		 
		 wp_register_script( 'uae-counterdown', plugins_url( '/assets/js/uae-counterdown-script.js', __FILE__ ), [ 'jquery' ], false, true );
		 wp_enqueue_script( 'uae-counterdown' );

	}
	
	/**
	 * widget_styles
	 *
	 * Load required plugin core files.
	 *
	 * @since 1.2.0
	 * @access public
	 */
	public function widget_styles(){

		wp_register_style("ua-fontawesome",plugins_url("/assets/css/fontawesome.min.css",__FILE__));
		wp_enqueue_style( 'ua-fontawesome' );

		wp_register_style("ua-bootstrap",plugins_url("/assets/css/bootstrap.min.css",__FILE__));
		wp_enqueue_style( 'ua-bootstrap' );

		wp_register_style("ua-swiper",plugins_url("/assets/css/swiper.min.css",__FILE__));
		wp_enqueue_style( 'ua-swiper' );

		wp_register_style("ua-laticon",plugins_url("/assets/css/flaticon.css",__FILE__));
		wp_enqueue_style( 'ua-laticon' );

		wp_register_style("ua-flipclock",plugins_url("/assets/css/flipclock.css",__FILE__));
		wp_enqueue_style( 'ua-flipclock' );

		wp_register_style("ua-style",plugins_url("/assets/css/style.css",__FILE__));
		wp_enqueue_style( 'ua-style' );
	}	

	/**
	 * Include Widgets files
	 *
	 * Load widgets files
	 *
	 * @since 1.2.0
	 * @access private
	 */
	private function include_widgets_files() {
		require_once( __DIR__ . '/widgets/uae-addon-animation-box.php' );
		require_once( __DIR__ . '/widgets/uae-addon-info-box.php' );
		require_once( __DIR__ . '/widgets/uae-addon-counter.php' );
		require_once( __DIR__ . '/widgets/uae-addon-logo-slider.php' );
		require_once( __DIR__ . '/widgets/uae-addon-call-to-action.php' );
		require_once( __DIR__ . '/widgets/uae-addon-pricing-table.php' );
		require_once( __DIR__ . '/widgets/uae-addon-tabs.php' );
		require_once( __DIR__ . '/widgets/uae-addon-accordions.php' );
		require_once( __DIR__ . '/widgets/uae-addon-team-member.php' );
		require_once( __DIR__ . '/widgets/uae-addon-testimonials.php' );
		require_once( __DIR__ . '/widgets/uae-addon-business-hour.php' );
		require_once( __DIR__ . '/widgets/uae-addon-card.php' );
		require_once( __DIR__ . '/widgets/uae-addon-heading.php' );
		require_once( __DIR__ . '/widgets/uae-addon-progressbar.php' );
		require_once( __DIR__ . '/widgets/uae-addon-flipbox.php' );
		require_once( __DIR__ . '/widgets/uae-addon-table.php' );
		require_once( __DIR__ . '/widgets/uae-addon-timeline.php' );
		require_once( __DIR__ . '/widgets/uae-addon-image-carousel.php' );
		require_once( __DIR__ . '/widgets/uae-addon-testimonial-carousel.php' );
		require_once( __DIR__ . '/widgets/uae-addon-interactive-banner.php' );
		require_once( __DIR__ . '/widgets/uae-addon-blog-post.php' );
		require_once( __DIR__ . '/widgets/uae-addon-contact-form-7.php' );
		require_once( __DIR__ . '/widgets/uae-addon-filterable-gallery.php' );
		require_once( __DIR__ . '/widgets/uae-addon-ninja-form.php' );
		require_once( __DIR__ . '/widgets/uae-addon-duel-heading.php' );
		require_once( __DIR__ . '/widgets/uae-addon-counterdown.php' );
		require_once( __DIR__ . '/widgets/uae-addon-clock.php' );
		require_once( __DIR__ . '/widgets/uae-addon-icon-box.php' );
		require_once( __DIR__ . '/widgets/uae-addon-duel-button.php' );
		require_once( __DIR__ . '/widgets/uae-addon-logo-gird.php' );
		require_once( __DIR__ . '/widgets/uae-addon-team-carousel.php' );
		require_once( __DIR__ . '/widgets/uae-addon-card-carousel.php' );
		require_once( __DIR__ . '/widgets/uae-addon-service-box.php' );
		require_once( __DIR__ . '/widgets/uae-addon-service-carousel.php' );
		require_once( __DIR__ . '/widgets/uae-addon-icon-carousel.php' );
	}
	
	
	/**
	 * Register Widgets
	 *
	 * Register new Elementor widgets.
	 *
	 * @since 1.2.0
	 * @access public
	 */
	public function register_widgets() {
		// Its is now safe to include Widgets files
		$this->include_widgets_files();

		require_once plugin_dir_path( __FILE__ ) . 'inc/uae-helper.php';

		// Register Widgets
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\uae_addon_animation_box() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\uae_addon_info_box() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\uae_addon_counter() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\uae_addon_logo_slider() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\uae_addon_call_to_action() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\uae_addon_pricing_table() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\uae_addon_tabs() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\uae_addon_accordions() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\uae_addon_team_member() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\uae_addon_testimonial() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\uae_addon_business_hour() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\uae_addon_card() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\uae_addon_heading() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\uae_addon_progressBar() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\uae_addon_flipbox() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\uae_addon_table() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\uae_addon_timeline() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\uae_addon_image_carousel() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\uae_addon_testimonial_carousel() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\uae_addon_interactive_banner() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\uae_addon_blog_post() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\uae_addon_contact_form() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\uae_addon_filterable_gallery() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\uae_addon_ninja_form() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\uae_addon_duel_heading() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\uae_counterdown_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\uae_Clock_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\uae_addon_icon_box() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\uae_addon_duel_button() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\uae_addon_logo_gird() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\uae_addon_team_carousel() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\uae_addon_card_carousel() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\uae_addon_service_box() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\uae_addon_service_carousel() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\uae_addon_icon_carousel() );   
	}
	
	//category registered
	public function add_elementor_widget_categories( $elements_manager ) {

		$elements_manager->add_category(
			'unlimited-addon',
			[
				'title' => __( 'Unlimited Addon', 'unlimited-addon' ),
				'icon' => 'fa fa-plug',
			]
		);
	}

	/**
	 *  Plugin class constructor
	 *
	 * Register plugin action hooks and filters
	 *
	 * @since 1.2.0
	 * @access public
	 */
	public function __construct() {

		// Enqueue widget styles
        add_action( 'elementor/frontend/after_register_styles', [ $this, 'widget_styles' ] , 100 );
        add_action( 'admin_enqueue_scripts', [ $this, 'widget_styles' ] , 100 );

		// Enqueue widget scripts
        add_action( 'elementor/frontend/after_register_scripts', [ $this, 'widget_scripts' ], 100 );

		// Register widgets
		add_action( 'elementor/widgets/widgets_registered', [ $this, 'register_widgets' ] );

		//category registered
		add_action( 'elementor/elements/categories_registered',  [ $this,'add_elementor_widget_categories' ]);

	}
}

// Instantiate Plugin Class
Uae_UnlimitedAddon::instance();
