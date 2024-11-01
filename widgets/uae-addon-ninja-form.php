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
class uae_addon_ninja_form extends Widget_Base {

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
		return 'ninja-form';
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
		return esc_html__( 'Ninja Form', 'unlimited-addon' );
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
		return 'eicon-form-horizontal';
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

		if(!class_exists('Ninja_Forms')) {

			$this->start_controls_section(
			  'warning_notice',
			  array(
				'label' => esc_html__('Warning' , 'unlimited-addon')
			  )
			);

			$this->add_control(
			  'warning_text',
			  array(
				'type'            => Controls_Manager::RAW_HTML,
				'raw'             => esc_html__('<strong>Ninja Forms</strong> is not installed/activated on your site. Please install and activate <strong>Ninja Forms</strong>.', 'unlimited-addon'),
				'content_classes' => 'warning',
			  )
			);
	  
			$this->end_controls_section();
	  
		  }  else {

			$this->start_controls_section(
				'uae_section_ninja_form',
				[
					'label' => esc_html__( 'Add Form Shortcode', 'unlimited-addon' )
				]
			);
  
		  $this->add_control(
			  'uae_ninja_form',
			  [
				  'label' => esc_html__( 'Select ninja form', 'unlimited-addon' ),
				  'label_block' => true,
				  'type' => Controls_Manager::SELECT,
				  'options' => uae_select_ninja_form(),
			  ]
		  );
  
		  $this->end_controls_section();
	  
		  $this->start_controls_section(
			'uae_section_ninja_styles',
			[
				'label' => esc_html__( 'Form Container Styles', 'unlimited-addon' ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
			'uae_ninja_background',
			[
				'label' => esc_html__( 'Form Background Color', 'unlimited-addon' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#fff',
				'selectors' => [
					'{{WRAPPER}} .uae-ninja-container' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
  			'uae_ninja_width',
  			[
  				'label' => esc_html__( 'Form Width', 'unlimited-addon' ),
  				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em', '%' ],
				'range' => [
					'px' => [
						'min' => 10,
						'max' => 1500,
					],
					'em' => [
						'min' => 1,
						'max' => 80,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .uae-ninja-container' => 'width: {{SIZE}}{{UNIT}};',
				],
  			]
  		);

  		$this->add_responsive_control(
  			'uae_ninja_max_width',
  			[
  				'label' => esc_html__( 'Form Max Width', 'unlimited-addon' ),
  				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em', '%' ],
				'range' => [
					'px' => [
						'min' => 10,
						'max' => 1500,
					],
					'em' => [
						'min' => 1,
						'max' => 80,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .uae-ninja-container' => 'max-width: {{SIZE}}{{UNIT}};',
				],
  			]
  		);

		$this->add_responsive_control(
			'uae_ninja_margin',
			[
				'label' => esc_html__( 'Form Margin', 'unlimited-addon' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .uae-ninja-container' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'uae_ninja_padding',
			[
				'label' => esc_html__( 'Form Padding', 'unlimited-addon' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .uae-ninja-container' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'uae_ninja_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'unlimited-addon' ),
				'type' => Controls_Manager::DIMENSIONS,
				'separator' => 'before',
				'size_units' => [ 'px' ],
				'selectors' => [
					'{{WRAPPER}} .uae-ninja-container' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'uae_ninja_border',
				'selector' => '{{WRAPPER}} .uae-ninja-container',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'uae_ninja_box_shadow',
				'selector' => '{{WRAPPER}} .uae-ninja-container',
			]
		);

		$this->end_controls_section();

		/**
		 * Form Fields Styles
		 */
		$this->start_controls_section(
			'uae_section_ninja_field_styles',
			[
				'label' => esc_html__( 'Form Fields Styles', 'unlimited-addon' ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
			'uae_ninja_input_background',
			[
				'label' => esc_html__( 'Input Field Background', 'unlimited-addon' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .uae-ninja-container .nf-field .nf-field-element input[type="text"],
					 {{WRAPPER}} .uae-ninja-container .nf-field .nf-field-element input[type="password"],
					 {{WRAPPER}} .uae-ninja-container .nf-field .nf-field-element input[type="email"],
					 {{WRAPPER}} .uae-ninja-container .nf-field .nf-field-element input[type="url"],
					 {{WRAPPER}} .uae-ninja-container .nf-field .nf-field-element input[type="url"],
					 {{WRAPPER}} .uae-ninja-container .nf-field .nf-field-element input[type="number"],
					 {{WRAPPER}} .uae-ninja-container .nf-field .nf-field-element textarea' => 'background-color: {{VALUE}};',
				],
			]
		);


  		$this->add_responsive_control(
  			'uae_ninja_input_width',
  			[
  				'label' => esc_html__( 'Input Width', 'unlimited-addon' ),
  				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em', '%' ],
				'range' => [
					'px' => [
						'min' => 10,
						'max' => 1500,
					],
					'em' => [
						'min' => 1,
						'max' => 80,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .uae-ninja-container .nf-field .nf-field-element input[type="text"],
					 {{WRAPPER}} .uae-ninja-container .nf-field .nf-field-element input[type="password"],
					 {{WRAPPER}} .uae-ninja-container .nf-field .nf-field-element input[type="email"],
					 {{WRAPPER}} .uae-ninja-container .nf-field .nf-field-element input[type="url"],
					 {{WRAPPER}} .uae-ninja-container .nf-field .nf-field-element input[type="url"],
					 {{WRAPPER}} .uae-ninja-container .nf-field .nf-field-element input[type="number"]' => 'width: {{SIZE}}{{UNIT}};',
				],
  			]
  		);

  		$this->add_responsive_control(
  			'uae_ninja_textarea_width',
  			[
  				'label' => esc_html__( 'Textarea Width', 'unlimited-addon' ),
  				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em', '%' ],
				'range' => [
					'px' => [
						'min' => 10,
						'max' => 1500,
					],
					'em' => [
						'min' => 1,
						'max' => 80,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .uae-ninja-container .nf-field .nf-field-element textarea' => 'width: {{SIZE}}{{UNIT}};',
				],
  			]
  		);

		$this->add_responsive_control(
			'uae_ninja_input_padding',
			[
				'label' => esc_html__( 'Fields Padding', 'unlimited-addon' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .uae-ninja-container .nf-field .nf-field-element input[type="text"],
					 {{WRAPPER}} .uae-ninja-container .nf-field .nf-field-element input[type="password"],
					 {{WRAPPER}} .uae-ninja-container .nf-field .nf-field-element input[type="email"],
					 {{WRAPPER}} .uae-ninja-container .nf-field .nf-field-element input[type="url"],
					 {{WRAPPER}} .uae-ninja-container .nf-field .nf-field-element input[type="url"],
					 {{WRAPPER}} .uae-ninja-container .nf-field .nf-field-element input[type="number"],
					 {{WRAPPER}} .uae-ninja-container .nf-field .nf-field-element textarea' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);



		$this->add_control(
			'uae_ninja_input_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'unlimited-addon' ),
				'type' => Controls_Manager::DIMENSIONS,
				'separator' => 'before',
				'size_units' => [ 'px' ],
				'selectors' => [
					'{{WRAPPER}} .uae-ninja-container .nf-field .nf-field-element input[type="text"],
					 {{WRAPPER}} .uae-ninja-container .nf-field .nf-field-element input[type="password"],
					 {{WRAPPER}} .uae-ninja-container .nf-field .nf-field-element input[type="email"],
					 {{WRAPPER}} .uae-ninja-container .nf-field .nf-field-element input[type="url"],
					 {{WRAPPER}} .uae-ninja-container .nf-field .nf-field-element input[type="url"],
					 {{WRAPPER}} .uae-ninja-container .nf-field .nf-field-element input[type="number"],
					 {{WRAPPER}} .uae-ninja-container .nf-field .nf-field-element textarea' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);


		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'uae_ninja_input_border',
				'selector' => '
					 {{WRAPPER}} .uae-ninja-container .nf-field .nf-field-element input[type="text"],
					 {{WRAPPER}} .uae-ninja-container .nf-field .nf-field-element input[type="password"],
					 {{WRAPPER}} .uae-ninja-container .nf-field .nf-field-element input[type="email"],
					 {{WRAPPER}} .uae-ninja-container .nf-field .nf-field-element input[type="url"],
					 {{WRAPPER}} .uae-ninja-container .nf-field .nf-field-element input[type="url"],
					 {{WRAPPER}} .uae-ninja-container .nf-field .nf-field-element input[type="number"],
					 {{WRAPPER}} .uae-ninja-container .nf-field .nf-field-element textarea',
			]
		);


		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'uae_ninja_input_box_shadow',
				'selector' => '
					 {{WRAPPER}} .uae-ninja-container .nf-field .nf-field-element input[type="text"],
					 {{WRAPPER}} .uae-ninja-container .nf-field .nf-field-element input[type="password"],
					 {{WRAPPER}} .uae-ninja-container .nf-field .nf-field-element input[type="email"],
					 {{WRAPPER}} .uae-ninja-container .nf-field .nf-field-element input[type="url"],
					 {{WRAPPER}} .uae-ninja-container .nf-field .nf-field-element input[type="url"],
					 {{WRAPPER}} .uae-ninja-container .nf-field .nf-field-element input[type="number"],
					 {{WRAPPER}} .uae-ninja-container .nf-field .nf-field-element textarea',
			]
		);

		$this->add_control(
			'uae_ninja_focus_heading',
			[
				'type' => Controls_Manager::HEADING,
				'label' => esc_html__( 'Focus State Style', 'unlimited-addon' ),
				'separator' => 'before',
			]
		);


		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'uae_ninja_input_focus_box_shadow',
				'selector' => '
					 {{WRAPPER}} .uae-ninja-container .nf-field .nf-field-element input[type="text"]:focus,
					 {{WRAPPER}} .uae-ninja-container .nf-field .nf-field-element input[type="password"]:focus,
					 {{WRAPPER}} .uae-ninja-container .nf-field .nf-field-element input[type="email"]:focus,
					 {{WRAPPER}} .uae-ninja-container .nf-field .nf-field-element input[type="url"]:focus,
					 {{WRAPPER}} .uae-ninja-container .nf-field .nf-field-element input[type="url"]:focus,
					 {{WRAPPER}} .uae-ninja-container .nf-field .nf-field-element input[type="number"]:focus,
					 {{WRAPPER}} .uae-ninja-container .nf-field .nf-field-element textarea:focus',
			]
		);

		$this->add_control(
			'uae_ninja_input_focus_border',
			[
				'label' => esc_html__( 'Border Color', 'unlimited-addon' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .uae-ninja-container .nf-field .nf-field-element input[type="text"]:focus,
					 {{WRAPPER}} .uae-ninja-container .nf-field .nf-field-element input[type="password"]:focus,
					 {{WRAPPER}} .uae-ninja-container .nf-field .nf-field-element input[type="email"]:focus,
					 {{WRAPPER}} .uae-ninja-container .nf-field .nf-field-element input[type="url"]:focus,
					 {{WRAPPER}} .uae-ninja-container .nf-field .nf-field-element input[type="url"]:focus,
					 {{WRAPPER}} .uae-ninja-container .nf-field .nf-field-element input[type="number"]:focus,
					 {{WRAPPER}} .uae-ninja-container .nf-field .nf-field-element textarea:focus' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section(); 

		$this->start_controls_section(
			'uae_section_ninja_typography',
			[
				'label' => esc_html__( 'Color & Typography', 'unlimited-addon' ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
			'uae_ninja_label_color',
			[
				'label' => esc_html__( 'Label Color', 'unlimited-addon' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .uae-ninja-container, {{WRAPPER}} .uae-ninja-container .nf-field-label label' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'uae_ninja_field_color',
			[
				'label' => esc_html__( 'Field Font Color', 'unlimited-addon' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .uae-ninja-container .nf-field .nf-field-element input[type="text"],
					 {{WRAPPER}} .uae-ninja-container .nf-field .nf-field-element input[type="password"],
					 {{WRAPPER}} .uae-ninja-container .nf-field .nf-field-element input[type="email"],
					 {{WRAPPER}} .uae-ninja-container .nf-field .nf-field-element input[type="url"],
					 {{WRAPPER}} .uae-ninja-container .nf-field .nf-field-element input[type="url"],
					 {{WRAPPER}} .uae-ninja-container .nf-field .nf-field-element input[type="number"],
					 {{WRAPPER}} .uae-ninja-container .nf-field .nf-field-element textarea' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'uae_ninja_placeholder_color',
			[
				'label' => esc_html__( 'Placeholder Font Color', 'unlimited-addon' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .uae-ninja-container ::-webkit-input-placeholder' => 'color: {{VALUE}};',
					'{{WRAPPER}} .uae-ninja-container ::-moz-placeholder' => 'color: {{VALUE}};',
					'{{WRAPPER}} .uae-ninja-container ::-ms-input-placeholder' => 'color: {{VALUE}};',
				],
			]
		);


		$this->add_control(
			'uae_ninja_label_heading',
			[
				'type' => Controls_Manager::HEADING,
				'label' => esc_html__( 'Label Typography', 'unlimited-addon' ),
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'uae_ninja_label_typography',
				'selector' => '{{WRAPPER}} .uae-ninja-container, {{WRAPPER}} .uae-ninja-container .wpuf-label label',
			]
		);

		$this->add_control(
			'uae_ninja_heading_input_field',
			[
				'type' => Controls_Manager::HEADING,
				'label' => esc_html__( 'Input Fields Typography', 'unlimited-addon' ),
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'uae_ninja_input_field_typography',
				'selector' => '{{WRAPPER}} .uae-ninja-container .nf-field .nf-field-element input[type="text"],
					 {{WRAPPER}} .uae-ninja-container .nf-field .nf-field-element input[type="password"],
					 {{WRAPPER}} .uae-ninja-container .nf-field .nf-field-element input[type="email"],
					 {{WRAPPER}} .uae-ninja-container .nf-field .nf-field-element input[type="url"],
					 {{WRAPPER}} .uae-ninja-container .nf-field .nf-field-element input[type="url"],
					 {{WRAPPER}} .uae-ninja-container .nf-field .nf-field-element input[type="number"],
					 {{WRAPPER}} .uae-ninja-container .nf-field .nf-field-element textarea',
			]
		);

		$this->end_controls_section();

		/**
		 * Button Style
		 */
		$this->start_controls_section(
			'uae_section_ninja_submit_button_styles',
			[
				'label' => esc_html__( 'Submit Button Styles', 'unlimited-addon' ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);

  		$this->add_responsive_control(
  			'uae_ninja_submit_btn_width',
  			[
  				'label' => esc_html__( 'Button Width', 'unlimited-addon' ),
  				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em', '%' ],
				'range' => [
					'px' => [
						'min' => 10,
						'max' => 1500,
					],
					'em' => [
						'min' => 1,
						'max' => 80,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .uae-ninja-container .nf-field .nf-field-element input[type="submit"]' => 'width: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .uae-ninja-container .nf-field .nf-field-element input[type="button"]' => 'width: {{SIZE}}{{UNIT}};',
				],
  			]
  		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
             'name' => 'uae_ninja_submit_btn_typography',
				'selector' => '{{WRAPPER}} .uae-ninja-container .nf-field .nf-field-element input[type="button"]',
			]
		);

		$this->add_responsive_control(
			'uae_ninja_submit_btn_margin',
			[
				'label' => esc_html__( 'Margin', 'unlimited-addon' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .uae-ninja-container .nf-field .nf-field-element input[type="button"]' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'uae_ninja_submit_btn_padding',
			[
				'label' => esc_html__( 'Padding', 'unlimited-addon' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .uae-ninja-container .nf-field .nf-field-element input[type="button"]' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->start_controls_tabs( 'uae_ninja_submit_button_tabs' );

		$this->start_controls_tab( 'normal', [ 'label' => esc_html__( 'Normal', 'unlimited-addon' ) ] );

		$this->add_control(
			'uae_ninja_submit_btn_text_color',
			[
				'label' => esc_html__( 'Text Color', 'unlimited-addon' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .uae-ninja-container .nf-field .nf-field-element input[type="button"]' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'uae_ninja_submit_btn_background_color',
			[
				'label' => esc_html__( 'Background Color', 'unlimited-addon' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .uae-ninja-container .nf-field .nf-field-element input[type="button"]' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'uae_ninja_submit_btn_border',
				'selector' => '{{WRAPPER}} .uae-ninja-container .nf-field .nf-field-element input[type="button"]',
			]
		);

		$this->add_control(
			'uae_ninja_submit_btn_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'unlimited-addon' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .uae-ninja-container .nf-field .nf-field-element input[type="button"]' => 'border-radius: {{SIZE}}px;',
				],
			]
		);



		$this->end_controls_tab();

		$this->start_controls_tab( 'uae_ninja_submit_btn_hover', [ 'label' => esc_html__( 'Hover', 'unlimited-addon' ) ] );

		$this->add_control(
			'uae_ninja_submit_btn_hover_text_color',
			[
				'label' => esc_html__( 'Text Color', 'unlimited-addon' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .uae-ninja-container .nf-field .nf-field-element input[type="button"]:hover' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'uae_ninja_submit_btn_hover_background_color',
			[
				'label' => esc_html__( 'Background Color', 'unlimited-addon' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .uae-ninja-container .nf-field .nf-field-element input[type="button"]:hover' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'uae_ninja_submit_btn_hover_border_color',
			[
				'label' => esc_html__( 'Border Color', 'unlimited-addon' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .uae-ninja-container .nf-field .nf-field-element input[type="button"]:hover' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();


		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'uae_ninja_submit_btn_box_shadow',
				'selector' => '{{WRAPPER}} .uae-ninja-container .nf-field .nf-field-element input[type="button"]',
			]
		);

		$this->end_controls_section();

	 }
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
		if(!class_exists('Ninja_Forms')) { return; }
		$settings = $this->get_settings();
	?>
	<?php if ( ! empty( $settings['uae_ninja_form'] ) ) : ?>
		<div class="uae-ninja-container">
			<?php echo do_shortcode( '[ninja_form id="'.$settings['uae_ninja_form'].'"]' ); ?>
		</div>
	<?php endif; ?>
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
