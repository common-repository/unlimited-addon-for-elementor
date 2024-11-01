<?php
namespace UnlimitedMianAddon\Widgets;

use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Elementor Hello World
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class uae_addon_logo_gird extends Widget_Base {

	/**
	 * Retrieve the widget name.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'image-gird';
	}

	/**
	 * Retrieve the widget title.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Image Gird', 'unlimited-addon' );
	}

	/**
	 * Retrieve the widget icon.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-apps';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	 *
	 * Used to determine where to display the widget in the editor.
	 *
	 * Note that currently Elementor supports only one category.
	 * When multiple categories passed, Elementor uses the first one.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'unlimited-addon' ];
	}

	/**
	 * Retrieve the list of scripts the widget depended on.
	 *
	 * Used to set scripts dependencies required to run the widget.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget scripts dependencies.
	 */
	public function get_script_depends() {
		return [];
	}

	/**
	 * Register the widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function register_controls() {
		$this->start_controls_section(
			'section_content',
			[
				'label' => esc_html__( 'Content', 'unlimited-addon' ),
			]
		);

		$this->add_control(
			'gallery',
			[
				'label' => __( 'Add Images', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::GALLERY,
				'default' => [],
			]
		);


		$this->end_controls_section();

		$this->start_controls_section(
			'col_style',
			[
				'label' => esc_html__( 'Style', 'unlimited-addon' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'logo_coulmn',
			[
				'label' => esc_html__( 'Logo Gird', 'unlimited-addon' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'col-lg-4',
				'options' => [
				    'col-lg-2'  => esc_html__( 'Gird 6', 'unlimited-addon' ),
				    'col-lg-3'  => esc_html__( 'Gird 4', 'unlimited-addon' ),
					'col-lg-4'  => esc_html__( 'Gird 3', 'unlimited-addon' ),
				],
			]
		);
		

	 $this->end_controls_section();
	}

	/**
	 * Render the widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();
		$post_col = $settings['logo_coulmn'];
	?>

      <div class="row text-center text-lg-left">
        <?php foreach ( $settings['gallery'] as $image ) { ?>
        <div class="<?php echo esc_attr($post_col); ?>">
          <a href="<?php echo esc_url($image['url']); ?>" class="d-block mb-2 h-100">
                <img class="img-fluid img-thumbnail" src="<?php echo esc_url($image['url']); ?>" alt="">
              </a>
        </div>
        <?php } ?>
      </div>

	<?php
	}

	/**
	 * Render the widget output in the editor.
	 *
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function _content_template() {}
	
}
