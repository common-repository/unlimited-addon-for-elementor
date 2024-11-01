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
class uae_addon_duel_button extends Widget_Base {

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
		return 'duel-button';
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
		return esc_html__( 'Duel Button', 'unlimited-addon' );
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
		return 'eicon-dual-button';
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
				'label' => esc_html__( 'First Button', 'unlimited-addon' ),
			]
		);

		$this->add_control(
			'btn_text',
			[
				'label' => esc_html__( 'Button Text', 'unlimited-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Read Nore', 'unlimited-addon' ),			]
		);
		
		$this->add_control( 'first_button_url', [
			'label' => esc_html__( 'Button URL', 'unlimited-addon' ),
			'type'  => \Elementor\Controls_Manager::URL,
		] );
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'second_section_content',
			[
				'label' => esc_html__( 'Second Button', 'unlimited-addon' ),
			]
		);

		$this->add_control(
			'second_btn_text',
			[
				'label' => esc_html__( 'Button Text', 'unlimited-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Read Nore', 'unlimited-addon' ),			]
		);
		
		$this->add_control( 'second_button_url', [
			'label' => esc_html__( 'Button URL', 'unlimited-addon' ),
			'type'  => \Elementor\Controls_Manager::URL,
		] );
		
		$this->end_controls_section();		
		
		$this->start_controls_section(
			'alignment_style',
			[
				'label' => esc_html__( 'Alignment', 'unlimited-addon' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_control( 'display_alignment', [
			'label'   => esc_html__( 'Alignment ', 'unlimited-addon' ),
			'type'    => \Elementor\Controls_Manager::SELECT,
			'options' => [
				'text-center'    => esc_html__( 'Center', 'unlimited-addon' ),
				'text-left'   => esc_html__( 'Left', 'unlimited-addon' ),
				'text-right'   => esc_html__( 'Right', 'unlimited-addon' ),

			],
			'default' => 'text-center'
		] );
		
		$this->end_controls_section();		
		
		$this->start_controls_section(
			'first_btn_style',
			[
				'label' => esc_html__( 'First Button', 'unlimited-addon' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_control(
			'frist_btn_color',
			[
				'label' => esc_html__( 'Color', 'unlimited-addon' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .duel-button-one' => 'color: {{VALUE}}',
				],
				'default'=>'#000'
			]
		);	
		
		$this->add_control(
			'frist_btn_bg',
			[
				'label' => esc_html__( 'Background', 'unlimited-addon' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .duel-button-one' => 'background: {{VALUE}}',
				],
				'default'=>'#EDEDED'
			]
		);	
		
    	$this->add_group_control(
    		\Elementor\Group_Control_Border::get_type(),
    		[
    			'name' => 'first_btn_border',
    			'selector' => '{{WRAPPER}} .duel-button-one',
    		]
    	);
    	
    	$this->add_control(
    		'first_btn_border_radius',
    		[
    			'label' => esc_html__( 'Border Radius', 'unlimited-addon' ),
    			'type' => Controls_Manager::SLIDER,
    			'range' => [
    				'px' => [
    					'max' => 100,
    				],
    			],
    			'selectors' => [
    				'{{WRAPPER}} .duel-button-one' => 'border-radius: {{SIZE}}px;',
    			],
    		]
    	);		
		
		$this->add_group_control(
		\Elementor\Group_Control_Box_Shadow::get_type(),
		[
			'name' => 'first_btn_shadow',
			'selector' => '{{WRAPPER}} .duel-button-one',
		]
	    );
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'first_btn_typography',
				'label' => esc_html__( 'Typography', 'unlimited-addon' ),
				'selector' => '{{WRAPPER}} .duel-button-one'
			]
		);	
		
		$this->add_control(
			'first_btn_padding',
			[
				'label' => esc_html__( 'Padding', 'unlimited-addon' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .duel-button-one' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'second_btn_style',
			[
				'label' => esc_html__( 'Second Button', 'unlimited-addon' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_control(
			'second_btn_color',
			[
				'label' => esc_html__( 'Color', 'unlimited-addon' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .duel-button-two' => 'color: {{VALUE}}',
				],
				'default'=>'#000'
			]
		);	
		
		$this->add_control(
			'second_btn_bg',
			[
				'label' => esc_html__( 'Background', 'unlimited-addon' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .duel-button-two' => 'background: {{VALUE}}',
				],
				'default'=>'#EDEDED'
			]
		);	
		
    	$this->add_group_control(
    		\Elementor\Group_Control_Border::get_type(),
    		[
    			'name' => 'second_btn_border',
    			'selector' => '{{WRAPPER}} .duel-button-two',
    		]
    	);
    	
    	$this->add_control(
    		'second_btn_border_radius',
    		[
    			'label' => esc_html__( 'Border Radius', 'unlimited-addon' ),
    			'type' => Controls_Manager::SLIDER,
    			'range' => [
    				'px' => [
    					'max' => 100,
    				],
    			],
    			'selectors' => [
    				'{{WRAPPER}} .duel-button-two' => 'border-radius: {{SIZE}}px;',
    			],
    		]
    	);		
		
		$this->add_group_control(
		\Elementor\Group_Control_Box_Shadow::get_type(),
		[
			'name' => 'second_btn_shadow',
			'selector' => '{{WRAPPER}} .duel-button-two',
		]
	    );
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'second_btn_typography',
				'label' => esc_html__( 'Typography', 'unlimited-addon' ),
				'selector' => '{{WRAPPER}} .duel-button-two'
			]
		);	
		
		$this->add_control(
			'second_btn_padding',
			[
				'label' => esc_html__( 'Padding', 'unlimited-addon' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .duel-button-two' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
	?>
	<div class="uae-duel-button <?php echo esc_attr($settings['display_alignment']); ?>">
      <div class="duel-button-area">
          <a class="duel-button-one" href="<?php echo esc_url( $settings['first_button_url']['url'] ); ?>"><?php echo esc_html($settings['btn_text']); ?></a>
          <a class="duel-button-two" href="<?php echo esc_url( $settings['second_button_url']['url'] ); ?>"><?php echo esc_html($settings['second_btn_text']); ?></a>
      </div>
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
