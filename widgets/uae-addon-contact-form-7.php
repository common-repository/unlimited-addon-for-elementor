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
class uae_addon_contact_form extends Widget_Base {

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
		return 'contact-form-7';
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
		return __( 'Contact From 7', 'unlimited-addon' );
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
		return 'eicon-envelope';
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

		if(!class_exists('WPCF7')) {

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
				'raw'             => __('<strong>Contact Form 7</strong> is not installed/activated on your site. Please install and activate <strong>Contact Form 7</strong>.', 'unlimited-addon'),
				'content_classes' => 'warning',
			  )
			);
	  
			$this->end_controls_section();
	  
		} else {

		$this->start_controls_section(
			'wpcf7_form_uae_Section',
			[
				'label' => esc_html__( 'Contact Form', 'unlimited-addon' )
			]
		);
	  
	  $this->add_control(
		  'uae_contact_form7',
		  [
			  'label' => esc_html__( 'Select your contact form 7', 'unlimited-addon' ),
			  'label_block' => true,
			  'type' => Controls_Manager::SELECT,
			  'options' => contact_form_select(),
		  ]
	  );
	  $this->end_controls_section();
	  
	  $this->start_controls_section(
		'uae_section_contact_form_styles',
		[
			'label' => esc_html__( 'Form Container Styles', 'unlimited-addon' ),
			'tab' => Controls_Manager::TAB_STYLE
		]
	);
	
	$this->add_control(
		'uae_contact_form_background',
		[
			'label' => esc_html__( 'Form Background Color', 'unlimited-addon' ),
			'type' => Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .uae-contact-form-container' => 'background: {{VALUE}};',
			],
		]
	);

	  $this->add_responsive_control(
		  'uae_contact_form_width',
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
				'{{WRAPPER}} .uae-contact-form-container' => 'width: {{SIZE}}{{UNIT}};',
			],
		  ]
	  );

	  $this->add_responsive_control(
		  'uae_contact_form_max_width',
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
				'{{WRAPPER}} .uae-contact-form-container' => 'max-width: {{SIZE}}{{UNIT}};',
			],
		  ]
	  );
	
	
	$this->add_responsive_control(
		'uae_contact_form_margin',
		[
			'label' => esc_html__( 'Form Margin', 'unlimited-addon' ),
			'type' => Controls_Manager::DIMENSIONS,
			'size_units' => [ 'px', 'em', '%' ],
			'selectors' => [
				'{{WRAPPER}} .uae-contact-form-container' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			],
		]
	);		
	
	$this->add_responsive_control(
		'uae_contact_form_padding',
		[
			'label' => esc_html__( 'Form Padding', 'unlimited-addon' ),
			'type' => Controls_Manager::DIMENSIONS,
			'size_units' => [ 'px', 'em', '%' ],
			'selectors' => [
				'{{WRAPPER}} .uae-contact-form-container' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			],
		]
	);
	
	
	$this->add_control(
		'uae_contact_form_border_radius',
		[
			'label' => esc_html__( 'Border Radius', 'unlimited-addon' ),
			'type' => Controls_Manager::DIMENSIONS,
			'separator' => 'before',
			'size_units' => [ 'px' ],
			'selectors' => [
				'{{WRAPPER}} .uae-contact-form-container' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			],
		]
	);
	
	
	$this->add_group_control(
		\Elementor\Group_Control_Border::get_type(),
		[
			'name' => 'uae_contact_form_border',
			'selector' => '{{WRAPPER}} .uae-contact-form-container',
		]
	);
	
	
	$this->add_group_control(
		\Elementor\Group_Control_Box_Shadow::get_type(),
		[
			'name' => 'uae_contact_form_box_shadow',
			'selector' => '{{WRAPPER}} .uae-contact-form-container',
		]
	);
	
	$this->end_controls_section();
	  

	$this->start_controls_section(
		'uae_section_contact_form_field_styles',
		[
			'label' => esc_html__( 'Form Fields Styles', 'unlimited-addon' ),
			'tab' => Controls_Manager::TAB_STYLE
		]
	);
	
	$this->add_control(
		'uae_contact_form_input_background',
		[
			'label' => esc_html__( 'Input Field Background', 'unlimited-addon' ),
			'type' => Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .uae-contact-form-container input.wpcf7-text, {{WRAPPER}} .uae-contact-form-container textarea.wpcf7-textarea' => 'background: {{VALUE}};',
			],
		]
	);
	

	  $this->add_responsive_control(
		  'uae_contact_form_input_width',
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
				'{{WRAPPER}} .uae-contact-form-container input.wpcf7-text' => 'width: {{SIZE}}{{UNIT}};',
			],
		  ]
	  );
	
	  $this->add_responsive_control(
		  'uae_contact_form_textarea_width',
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
				'{{WRAPPER}} .uae-contact-form-container textarea.wpcf7-textarea' => 'width: {{SIZE}}{{UNIT}};',
			],
		  ]
	  );	
	
	$this->add_responsive_control(
		'uae_contact_form_input_padding',
		[
			'label' => esc_html__( 'Fields Padding', 'unlimited-addon' ),
			'type' => Controls_Manager::DIMENSIONS,
			'size_units' => [ 'px', 'em', '%' ],
			'selectors' => [
				'{{WRAPPER}} .uae-contact-form-container input.wpcf7-text, {{WRAPPER}} .uae-contact-form-container textarea.wpcf7-textarea' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			],
		]
	);
	
	
	
	$this->add_control(
		'uae_contact_form_input_border_radius',
		[
			'label' => esc_html__( 'Border Radius', 'unlimited-addon' ),
			'type' => Controls_Manager::DIMENSIONS,
			'separator' => 'before',
			'size_units' => [ 'px' ],
			'selectors' => [
				'{{WRAPPER}} .uae-contact-form-container input.wpcf7-text, {{WRAPPER}} .uae-contact-form-container textarea.wpcf7-textarea' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			],
		]
	);
	
	
	$this->add_group_control(
		\Elementor\Group_Control_Border::get_type(),
		[
			'name' => 'uae_contact_form_input_border',
			'selector' => '{{WRAPPER}} .uae-contact-form-container input.wpcf7-text, {{WRAPPER}} .uae-contact-form-container textarea.wpcf7-textarea',
		]
	);
	
	
	$this->add_group_control(
		\Elementor\Group_Control_Box_Shadow::get_type(),
		[
			'name' => 'uae_contact_form_input_box_shadow',
			'selector' => '{{WRAPPER}} .uae-contact-form-container input.wpcf7-text, {{WRAPPER}} .uae-contact-form-container textarea.wpcf7-textarea',
		]
	);

	$this->add_control(
		'uae_contact_form_focus_heading',
		[
			'type' => Controls_Manager::HEADING,
			'label' => esc_html__( 'Focus State Style', 'unlimited-addon' ),
			'separator' => 'before',
		]
	);


	$this->add_group_control(
		\Elementor\Group_Control_Box_Shadow::get_type(),
		[
			'name' => 'uae_contact_form_input_focus_box_shadow',
			'selector' => '{{WRAPPER}} .uae-contact-form-container input.wpcf7-text:focus, {{WRAPPER}} .uae-contact-form-container textarea.wpcf7-textarea:focus',
		]
	);

	$this->add_control(
		'uae_contact_form_input_focus_border',
		[
			'label' => esc_html__( 'Border Color', 'unlimited-addon' ),
			'type' => Controls_Manager::COLOR,
			'selectors' => [
				'body {{WRAPPER}} .uae-contact-form-container input.wpcf7-text:focus, body {{WRAPPER}} .uae-contact-form-container textarea.wpcf7-textarea:focus' => 'border-color: {{VALUE}};',
			],
		]
	);
	
	$this->end_controls_section();

	$this->start_controls_section(
		'uae_section_contact_form_typography',
		[
			'label' => esc_html__( 'Color & Typography', 'unlimited-addon' ),
			'tab' => Controls_Manager::TAB_STYLE
		]
	);
	
	
	$this->add_control(
		'uae_contact_form_label_color',
		[
			'label' => esc_html__( 'Label Color', 'unlimited-addon' ),
			'type' => Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .uae-contact-form-container, {{WRAPPER}} .uae-contact-form-container .wpcf7-form label' => 'color: {{VALUE}};',
			],
		]
	);
	
	$this->add_control(
		'uae_contact_form_field_color',
		[
			'label' => esc_html__( 'Field Font Color', 'unlimited-addon' ),
			'type' => Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .uae-contact-form-container input.wpcf7-text, {{WRAPPER}} .uae-contact-form-container textarea.wpcf7-textarea' => 'color: {{VALUE}};',
			],
		]
	);
	
	$this->add_control(
		'uae_contact_form_placeholder_color',
		[
			'label' => esc_html__( 'Placeholder Font Color', 'unlimited-addon' ),
			'type' => Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .uae-contact-form-container ::-webkit-input-placeholder' => 'color: {{VALUE}};',
				'{{WRAPPER}} .uae-contact-form-container ::-moz-placeholder' => 'color: {{VALUE}};',
				'{{WRAPPER}} .uae-contact-form-container ::-ms-input-placeholder' => 'color: {{VALUE}};',
			],
		]
	);
	
	
	$this->add_control(
		'uae_contact_form_label_heading',
		[
			'type' => Controls_Manager::HEADING,
			'label' => esc_html__( 'Label Typography', 'unlimited-addon' ),
			'separator' => 'before',
		]
	);
	
	$this->add_group_control(
		\Elementor\Group_Control_Typography::get_type(),
		[
			'name' => 'uae_contact_form_label_typography',
			'selector' => '{{WRAPPER}} .uae-contact-form-container, {{WRAPPER}} .uae-contact-form-container .wpcf7-form label',
		]
	);
	
	
	$this->add_control(
		'uae_contact_form_heading_input_field',
		[
			'type' => Controls_Manager::HEADING,
			'label' => esc_html__( 'Input Fields Typography', 'unlimited-addon' ),
			'separator' => 'before',
		]
	);
	
	$this->add_group_control(
		\Elementor\Group_Control_Typography::get_type(),
		[
			'name' => 'uae_contact_form_input_field_typography',
			'selector' => '{{WRAPPER}} .uae-contact-form-container input.wpcf7-text, {{WRAPPER}} .uae-contact-form-container textarea.wpcf7-textarea',
		]
	);
	
	$this->end_controls_section();

	$this->start_controls_section(
		'uae_section_contact_form_submit_button_styles',
		[
			'label' => esc_html__( 'Submit Button Styles', 'unlimited-addon' ),
			'tab' => Controls_Manager::TAB_STYLE
		]
	);

	  $this->add_responsive_control(
		  'uae_contact_form_submit_btn_width',
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
				'{{WRAPPER}} .uae-contact-form-container input.wpcf7-submit' => 'width: {{SIZE}}{{UNIT}};',
			],
		  ]
	  );
	  
	$this->add_responsive_control(
		'uae_contact_form_submit_btn_alignment',
		[
			'label' => esc_html__( 'Button Alignment', 'unlimited-addon' ),
			'type' => Controls_Manager::CHOOSE,
			'label_block' => true,
			'options' => [
				'default' => [
					'title' => __( 'Default', 'unlimited-addon' ),
					'icon' => 'fa fa-ban',
				],
				'left' => [
					'title' => esc_html__( 'Left', 'unlimited-addon' ),
					'icon' => 'fa fa-align-left',
				],
				'center' => [
					'title' => esc_html__( 'Center', 'unlimited-addon' ),
					'icon' => 'fa fa-align-center',
				],
				'right' => [
					'title' => esc_html__( 'Right', 'unlimited-addon' ),
					'icon' => 'fa fa-align-right',
				],
			],
			'default' => 'default',
			'prefix_class' => 'pt-contact-form-btn-align-',
		]
	);

	$this->add_group_control(
		\Elementor\Group_Control_Typography::get_type(),
		[
		 'name' => 'uae_contact_form_submit_btn_typography',
			'selector' => '{{WRAPPER}} .uae-contact-form-container input.wpcf7-submit',
		]
	);
	
	$this->add_responsive_control(
		'uae_contact_form_submit_btn_margin',
		[
			'label' => esc_html__( 'Margin', 'unlimited-addon' ),
			'type' => Controls_Manager::DIMENSIONS,
			'size_units' => [ 'px', 'em', '%' ],
			'selectors' => [
				'{{WRAPPER}} .uae-contact-form-container input.wpcf7-submit' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			],
		]
	);
	
	
	$this->add_responsive_control(
		'uae_contact_form_submit_btn_padding',
		[
			'label' => esc_html__( 'Padding', 'unlimited-addon' ),
			'type' => Controls_Manager::DIMENSIONS,
			'size_units' => [ 'px', 'em', '%' ],
			'selectors' => [
				'{{WRAPPER}} .uae-contact-form-container input.wpcf7-submit' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			],
		]
	);

	$this->add_control(
		'uae_contact_form_submit_btn_text_color',
		[
			'label' => esc_html__( 'Text Color', 'unlimited-addon' ),
			'type' => Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .uae-contact-form-container input.wpcf7-submit' => 'color: {{VALUE}};',
			],
		]
	);
	

	
	$this->add_control(
		'uae_contact_form_submit_btn_background_color',
		[
			'label' => esc_html__( 'Background Color', 'unlimited-addon' ),
			'type' => Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .uae-contact-form-container input.wpcf7-submit' => 'background-color: {{VALUE}};',
			],
		]
	);
	
	$this->add_group_control(
		\Elementor\Group_Control_Border::get_type(),
		[
			'name' => 'uae_contact_form_submit_btn_border',
			'selector' => '{{WRAPPER}} .uae-contact-form-container input.wpcf7-submit',
		]
	);
	
	$this->add_control(
		'uae_contact_form_submit_btn_border_radius',
		[
			'label' => esc_html__( 'Border Radius', 'unlimited-addon' ),
			'type' => Controls_Manager::SLIDER,
			'range' => [
				'px' => [
					'max' => 100,
				],
			],
			'selectors' => [
				'{{WRAPPER}} .uae-contact-form-container input.wpcf7-submit' => 'border-radius: {{SIZE}}px;',
			],
		]
	);
	
	$this->end_controls_section();


	$this->start_controls_section(
		'uae_section_contact_form_submit_button_hover_styles',
		[
			'label' => esc_html__( 'Submit Button Styles', 'unlimited-addon' ),
			'tab' => Controls_Manager::TAB_STYLE
		]
	);
	$this->add_control(
		'uae_contact_form_submit_btn_hover_text_color',
		[
			'label' => esc_html__( 'Text Color', 'unlimited-addon' ),
			'type' => Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .uae-contact-form-container input.wpcf7-submit:hover' => 'color: {{VALUE}};',
			],
		]
	);

	$this->add_control(
		'uae_contact_form_submit_btn_hover_background_color',
		[
			'label' => esc_html__( 'Background Color', 'unlimited-addon' ),
			'type' => Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .uae-contact-form-container input.wpcf7-submit:hover' => 'background-color: {{VALUE}};',
			],
		]
	);

	$this->add_control(
		'uae_contact_form_submit_btn_hover_border_color',
		[
			'label' => esc_html__( 'Border Color', 'unlimited-addon' ),
			'type' => Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .uae-contact-form-container input.wpcf7-submit:hover' => 'border-color: {{VALUE}};',
			],
		]
	);

	$this->add_group_control(
		\Elementor\Group_Control_Box_Shadow::get_type(),
		[
			'name' => 'uae_contact_form_submit_btn_box_shadow',
			'selector' => '{{WRAPPER}} .uae-contact-form-container input.wpcf7-submit',
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
		if(!class_exists('WPCF7')) { return; }
		$settings = $this->get_settings();
	?>
	<?php if ( ! empty( $settings['uae_contact_form7'] ) ) : ?>
		<div class="uae-contact-form-container">		
			<?php echo do_shortcode( '[contact-form-7 id="' . $settings['uae_contact_form7'] . '" ]' ); ?>
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
