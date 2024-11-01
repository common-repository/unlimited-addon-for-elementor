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
class uae_addon_counter extends Widget_Base {

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
		return 'counter';
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
		return esc_html__( 'Counter', 'unlimited-addon' );
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
		return 'eicon-counter';
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
		return [ 'unlimited-addon' ];
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
			'counter_number',
			[
				'label' => esc_html__( 'Counter Number', 'unlimited-addon' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 1,
				'default'=>999
			]
		);

		$this->add_control(
			'counter_symbol',
			[
				'label' => esc_html__( 'Counter Symbol', 'unlimited-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( '+', 'unlimited-addon' ),
			]
		);

		$this->add_control(
			'counter_name',
			[
				'label' => esc_html__( 'Counter Name', 'unlimited-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Default Name', 'unlimited-addon' ),
				'placeholder' => esc_html__( 'Type your Name here', 'unlimited-addon' ),
			]
		);


		$this->end_controls_section();

		$this->start_controls_section(
			'section_style',
			[
				'label' => esc_html__( 'Color', 'unlimited-addon' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'default'=>'#000'
			]
		);

		$this->add_control(
			'counter_color',
			[
				'label' => esc_html__( 'Counter Color', 'unlimited-addon' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ts-counter' => 'color: {{VALUE}}',
				],
				'default'=>'#000'
			]
		);

		$this->add_control(
			'name_color',
			[
				'label' => esc_html__( 'Name Color', 'unlimited-addon' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ts-funfact-title' => 'color: {{VALUE}}',
				],
				'default'=>'#000'
			]
		);


		$this->end_controls_section();


		$this->start_controls_section(
			'counter_style',
			[
				'label' => esc_html__( 'Counter Typography', 'unlimited-addon' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'counter_typography',
				'label' => esc_html__( 'Counter Typography', 'unlimited-addon' ),
				'selector' => '{{WRAPPER}} h2.ts-counter'
			]
		);		

		$this->end_controls_section();


		$this->start_controls_section(
			'title_style',
			[
				'label' => esc_html__( 'Name Typography', 'unlimited-addon' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => esc_html__( 'Name Typography', 'unlimited-addon' ),
				'selector' => '{{WRAPPER}} h3.ts-funfact-title'
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
	?>
	<div class="ts-funfact ts-style1 text-center">
		<h2 class="ts-funfact-number ts-counter"><?php echo esc_html($settings['counter_number']); ?><?php echo esc_html($settings['counter_symbol']); ?></h2>
		<h3 class="ts-funfact-title"><?php echo esc_html($settings['counter_name']); ?></h3>
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
