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
class uae_addon_heading extends Widget_Base {

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
		return 'uae-heading';
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
		return esc_html__( 'Heading', 'unlimited-addon' );
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
		return [ 'venus-carosle' ];
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
			'style',
			array(
			  'label'       => esc_html__('Style', 'unlimited-addonr'),
			  'type'        => \Elementor\Controls_Manager::SELECT,
			  'default'     => 'style1',
			  'label_block' => true,
			  'options' => array(
				'style1' => esc_html__('Style 1', 'unlimited-addonr'),
				'style2' => esc_html__('Style 2', 'unlimited-addonr'),
				'style3' => esc_html__('Style 3', 'unlimited-addonr'),
				'style4' => esc_html__('Style 4', 'unlimited-addonr'),
			  )
			)
		  );	

		$this->add_control(
			'uae_head_title',
			[
				'label' => esc_html__( 'Title', 'unlimited-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Default title', 'unlimited-addon' ),
			]
		);

		$this->add_control(
			'uae_head_subtitle',
			[
				'label' => esc_html__( 'Sub Title', 'unlimited-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'rows' => 10,
				'default' => esc_html__( 'Default Sub Title', 'unlimited-addon' ),
				'condition' => [
					'style' => 'style2'
				]
			]
		);

		$this->add_control(
			'icon',
			[
				'label' => esc_html__( 'Icon', 'unlimited-addon' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' =>[
					'value'   => 'fas fa-star',
					'library' => 'fa-solid',
				],
				'condition' => [
					'style' => ['style4']
				]
			]
		);

		$this->add_control(
			'uae_head_description',
			[
				'label' => esc_html__( 'Sub Title', 'unlimited-addon' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'rows' => 10,
				'default' => esc_html__( 'Default Sub Title', 'unlimited-addon' ),
				'condition' => [
					'style' => ['style1','style4']
				]
			]
		);

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
			'title_style',
			[
				'label' => esc_html__( 'Title', 'unlimited-addon' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'color',
			[
				'label' => esc_html__( 'Title Color', 'unlimited-addon' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .uae-section-title' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => esc_html__( 'Title Typography', 'unlimited-addon' ),
				'selector' => '{{WRAPPER}} .uae-section-title'
			]
		);	

		$this->add_control('stroke_text_color', 
		[
		  'label'     => esc_html__('Stroke Text Color', 'unlimited-addon'),
		  'type'      => Controls_Manager::COLOR,
		  'selectors' => [
			'{{WRAPPER}} .uae-section-title' => '-webkit-text-stroke-color: {{VALUE}};',
			],
		]
	  );
  
	  $this->add_control('stroke_fill_color', 
		[
		  'label'     => esc_html__('Stroke Fill Color', 'unlimited-addon'),
		  'type'      => Controls_Manager::COLOR,
		  'selectors' => [
			'{{WRAPPER}} .uae-section-title' => '-webkit-text-fill-color: {{VALUE}};',
			],
		]
	  );
  
	  $this->add_control('stroke_fill_width', 
		[
		  'label'     => esc_html__('Stroke Fill Width', 'unlimited-addon'),
		  'type'      => Controls_Manager::SLIDER,
		  'selectors' => [
			'{{WRAPPER}} .uae-section-title' => '-webkit-text-stroke-width: {{SIZE}}px;',
		  ],
		]
	  );

		$this->add_control(
			'padding',
			[
				'label' => esc_html__( 'Padding', 'unlimited-addon' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .uae-section-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'subtitle_style',
			[
				'label' => esc_html__( 'Sub Title', 'unlimited-addon' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'sub_color',
			[
				'label' => esc_html__( 'Sub Title Color', 'unlimited-addon' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .uae-section-subtitle' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'subtitle_typography',
				'label' => esc_html__( 'Sub Title Typography', 'unlimited-addon' ),
				'selector' => '{{WRAPPER}} .uae-section-subtitle'
			]
		);	

		$this->add_control(
			'sub_padding',
			[
				'label' => esc_html__( 'Padding', 'unlimited-addon' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .uae-section-subtitle' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'dcontent_style',
			[
				'label' => esc_html__( 'Description', 'unlimited-addon' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'subtitle_color',
			[
				'label' => esc_html__( 'Description Color', 'unlimited-addon' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .uae-section-subtitle' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'des_typography',
				'label' => esc_html__( 'Description Typography', 'unlimited-addon' ),
				'selector' => '{{WRAPPER}} .uae-section-subtitle'
			]
		);	

		$this->add_control(
			'des_padding',
			[
				'label' => esc_html__( 'Padding', 'unlimited-addon' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .uae-section-subtitle' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'icon_style',
			[
				'label' => esc_html__( 'Icon Style', 'unlimited-addon' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' =>[
					'style' => 'style4'
				],
			]
		);

		$this->add_control(
			'iconline_color',
			[
				'label' => esc_html__( 'Icon Line Color', 'unlimited-addon' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .uae-left-line, {{WRAPPER}} .uae-right-line' => 'background: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'icon_color',
			[
				'label' => esc_html__( 'Icon Color', 'unlimited-addon' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .uae-section-divider-icon' => 'color: {{VALUE}}',
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
	  		<div class="heading-area <?php echo esc_attr($settings['display_alignment']); ?>">
			<h2 class="uae-section-title"><?php echo esc_html($settings['uae_head_title']); ?></h2>
			<div class="uae-section-subtitle"><?php echo do_shortcode($settings['uae_head_description']); ?></div>		
		</div>
	<?php
        # code...
        break;
	  case 'style2': ?>	
	       <div class="heading-area <?php echo esc_attr($settings['display_alignment']); ?>">
		   <p class="uae-section-subtitle">
			   <?php echo esc_html($settings['uae_head_subtitle']); ?></p>
			<h2 class="uae-section-title"><?php echo esc_html($settings['uae_head_title']); ?></h2>	
		</div>
       <?php break;
      case 'style3': ?>	
	       <div class="heading-area <?php echo esc_attr($settings['display_alignment']); ?>">
			<h2 class="uae-section-title"><?php echo esc_html($settings['uae_head_title']); ?></h2>	
		</div>

			<?php break;
      case 'style4': ?>	
		<div class="heading-area <?php echo esc_attr($settings['display_alignment']); ?>">
			<h2 class="uae-section-title"><?php echo esc_html($settings['uae_head_title']); ?></h2>
			<div class="uae-section-divider">
              <div class="uae-left-line"></div>
              <div class="uae-section-divider-icon"><i class="<?php echo $settings['icon']['value'] ?>"></i></div>
              <div class="uae-right-line"></div>
            </div>
			<div class="uae-section-subtitle"><?php echo do_shortcode($settings['uae_head_description']); ?></div>		
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
