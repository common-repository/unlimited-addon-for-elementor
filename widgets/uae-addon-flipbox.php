<?php
namespace UnlimitedMianAddon\Widgets;

use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;

/**
 * Elementor Hello World
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class uae_addon_flipbox extends Widget_Base {

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
		return 'flipbox';
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
		return esc_html__( 'Flipbox', 'unlimited-addon' );
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
		return 'eicon-flip-box';
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
				'label' => esc_html__( 'Layout', 'unlimited-addon' ),
			]
		);

		$this->add_control(
			'style',
			array(
			  'label'       => esc_html__('Style', 'unlimited-addonr'),
			  'type'        => \Elementor\Controls_Manager::SELECT,
			  'default'     => 'style1',
			  'label_block' => true,
			  'options' => array(
				'style1' => esc_html__('Style 1', 'unlimited-addonr'),
				'style2' => esc_html__('Style 2', 'unlimited-addonr'),
			  )
			)
		  );	
		$this->end_controls_section();

		$this->start_controls_section(
			'front_side_content',
			[
				'label' => esc_html__( 'Front Side Content', 'unlimited-addon' ),
			]
		);		

		$this->add_control(
			'front_title',
			[
				'label' => esc_html__( 'Title', 'unlimited-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Default title', 'unlimited-addon' ),
			]
		);

		$this->add_control(
			'front_description',
			[
				'label' => esc_html__( 'Description', 'unlimited-addon' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'rows' => 10,
				'default' => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit', 'unlimited-addon' ),
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'back_side_content',
			[
				'label' => esc_html__( 'Back Side Content', 'unlimited-addon' ),
			]
		);		

		$this->add_control(
			'back_title',
			[
				'label' => esc_html__( 'Title', 'unlimited-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Default title', 'unlimited-addon' ),
			]
		);

		$this->add_control(
			'back_description',
			[
				'label' => esc_html__( 'Description', 'unlimited-addon' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'rows' => 10,
				'default' => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit', 'unlimited-addon' ),
			]
		);

		$this->end_controls_section();


		$this->start_controls_section(
			'front_end_style',
			[
				'label' => esc_html__( 'Front Side', 'unlimited-addon' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'front_background',
				'label' => esc_html__( 'Background', 'unlimited-addon' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .uae-front-box-area',
			]
		);

		$this->add_control(
			'front_title_color',
			[
				'label' => esc_html__( 'Title Color', 'unlimited-addon' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default'=>"#000000",
				'selectors' => [
					'{{WRAPPER}} .uae-front-box-area h2' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'front_content_color',
			[
				'label' => esc_html__( 'Content Color', 'unlimited-addon' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default'=>"#000000",
				'selectors' => [
					'{{WRAPPER}} .uae-front-box-area p' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'front_title_typography',
				'label' => esc_html__( 'Title Typography', 'unlimited-addon' ),
				'selector' => '{{WRAPPER}} .uae-front-box-area h2'
			]
		);	

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'front_content_typography',
				'label' => esc_html__( 'Content Typography', 'unlimited-addon' ),
				'selector' => '{{WRAPPER}} .uae-front-box-area p'
			]
		);	

		$this->add_control(
			'front_title_padding',
			[
				'label' => esc_html__( 'Padding', 'unlimited-addon' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .uae-front-box-area h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'front_content_padding',
			[
				'label' => esc_html__( 'Content Padding', 'unlimited-addon' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .uae-front-box-area p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		
		$this->start_controls_section(
			'back_end_style',
			[
				'label' => esc_html__( 'Back Side', 'unlimited-addon' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'back_background',
				'label' => esc_html__( 'Background', 'unlimited-addon' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .uae-back-box-area',
			]
		);

		$this->add_control(
			'back_title_color',
			[
				'label' => esc_html__( 'Title Color', 'unlimited-addon' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default'=>"#ffffff",
				'selectors' => [
					'{{WRAPPER}} .uae-back-box-area h2' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'back_content_color',
			[
				'label' => esc_html__( 'Content Color', 'unlimited-addon' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default'=>"#ffffff",
				'selectors' => [
					'{{WRAPPER}} .uae-back-box-area p' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'back_title_typography',
				'label' => esc_html__( 'Title Typography', 'unlimited-addon' ),
				'selector' => '{{WRAPPER}} .uae-back-box-area h2'
			]
		);	

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'back_content_typography',
				'label' => esc_html__( 'Content Typography', 'unlimited-addon' ),
				'selector' => '{{WRAPPER}} .uae-back-box-area p'
			]
		);	

		$this->add_control(
			'back_title_padding',
			[
				'label' => esc_html__( 'Padding', 'unlimited-addon' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .uae-back-box-area h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'back_content_padding',
			[
				'label' => esc_html__( 'Content Padding', 'unlimited-addon' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .uae-back-box-area p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
		$style    = $settings['style'];
	?>
	<?php
    switch ($style) {
      case 'style1': default: ?>

		<div class="uae-flip-box ">
			<div class="uae-flip-box-inner">
				<div class="uae-flip-box-front uae-front-box-area">
					<h2><?php echo esc_html($settings['front_title']); ?></h2>
					<p><?php echo do_shortcode($settings['front_description']); ?></p>
				</div>
				<div class="uae-flip-box-back uae-back-box-area">
					<h2><?php echo esc_html($settings['back_title']); ?></h2>
					<p><?php echo do_shortcode($settings['back_description']); ?></p>
				</div>
			</div>
		</div>
	<?php
        # code...
        break;
      case 'style2': ?>	
		<div class="uae-flip-box2">
			<div class="uae-flip-box-inner2 ">
				<div class="uae-flip-box-front2 uae-front-box-area">
					<h2><?php echo esc_html($settings['front_title']); ?></h2>
					<p><?php echo do_shortcode($settings['front_description']); ?></p>
				</div>
				<div class="uae-flip-box-back2 uae-back-box-area">
					<h2><?php echo esc_html($settings['back_title']); ?></h2>
					<p><?php echo do_shortcode($settings['back_description']); ?></p>
				</div>
			</div>
		</div>
	<?php
		break;
    }	
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
