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
class uae_addon_duel_heading extends Widget_Base {

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
		return 'duel-heading';
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
		return esc_html__( 'Duel Heading', 'unlimited-addon' );
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
		return 'eicon-heading';
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
			'content_section',
			[
				'label' => esc_html__( 'Content', 'DualHeading' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'heading_one',
			[
				'label'       => esc_html__( 'Heading One', 'lwhhedh' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'input_type'  => 'text',
				'placeholder' => esc_html__( 'Heading One', 'lwhhedh' ),
				'default'     => esc_html__( 'Quick Brown Fox', 'lwhhedh' ),
			]
		);

		$this->add_control(
			'heading_two',
			[
				'label'       => esc_html__( 'Heading Two', 'lwhhedh' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'input_type'  => 'text',
				'placeholder' => esc_html__( 'Heading Two', 'lwhhedh' ),
				'default'     => esc_html__( 'Jumps Over The Lazy Dog', 'lwhhedh' ),
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'style_section_one',
			[
				'label' => esc_html__( 'Heading One Style', 'lwhhedh' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'heading_one_color',
			[
				'label'     => esc_html__( 'Color', 'lwhhedh' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '#ff0000',
				'selectors' => [
					'{{WRAPPER}} .uae-heading_one' => 'color: {{VALUE}}'
				]
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'heading_one_typography',
				'label'    => esc_html__( 'Typography', 'lwhhedh' ),
				'selector' => '{{WRAPPER}} .uae-heading_one',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'uae_one_box_shadow',
				'selector' => '{{WRAPPER}} .uae-heading_one',
			]
		);

		$this->add_control(
			'head_one_padding',
			[
				'label' => esc_html__( 'Padding', 'unlimited-addon' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .uae-heading_one' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);	

		$this->end_controls_section();

		$this->start_controls_section(
			'style_section_two',
			[
				'label' => esc_html__( 'Heading Two Style', 'lwhhedh' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'heading_two_color',
			[
				'label'     => esc_html__( 'Color', 'lwhhedh' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '#0000ff',
				'selectors' => [
					'{{WRAPPER}} .uae-heading_two' => 'color: {{VALUE}}'
				]
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'heading_two_typography',
				'label'    => esc_html__( 'Typography', 'lwhhedh' ),
				'selector' => '{{WRAPPER}} .uae-heading_two',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'uae_two_box_shadow',
				'selector' => '{{WRAPPER}} .uae-heading_two',
			]
		);

		$this->add_control(
			'head_two_padding',
			[
				'label' => esc_html__( 'Padding', 'unlimited-addon' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .uae-heading_two' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
		$heading_one = $this->get_settings( 'heading_one' );
		$this->add_render_attribute( 'heading_one', 'class', 'uae-heading_one' );
		$this->add_inline_editing_attributes( 'heading_one' );

		$heading_two = $this->get_settings( 'heading_two' );
		$this->add_render_attribute( 'heading_two', 'class', 'uae-heading_two' );
		$this->add_inline_editing_attributes( 'heading_two' );
	?>
        <h1>
            <span <?php echo $this->get_render_attribute_string( 'heading_one' ) ?>> <?php echo esc_html( $heading_one ); ?></span>
            <span <?php echo $this->get_render_attribute_string( 'heading_two' ) ?>> <?php echo esc_html( $heading_two ); ?></span>
        </h1>
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
