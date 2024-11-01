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
class uae_addon_interactive_banner extends Widget_Base {

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
		return 'interactive-banner';
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
		return esc_html__( 'Interactive Banner', 'unlimited-addon' );
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
		return 'eicon-banner';
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
			  )
			)
		  );	

		  $this->add_control(
			'title',
			[
				'label' => esc_html__( 'Title', 'unlimited-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Default title', 'unlimited-addon' ),
			]
		);

		$this->add_control(
			'description',
			[
				'label' => esc_html__( 'Description', 'unlimited-addon' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'rows' => 10,
				'default' => esc_html__( 'Provide all kind of seo services and help to improve seo ranking.', 'unlimited-addon' ),
			]
		);

		$this->add_control( 'button_title', [
			'label'   => esc_html__( 'Button Title', 'unlimited-addon' ),
			'type'    => \Elementor\Controls_Manager::TEXT,
			'default' => esc_html__( 'Learn More', 'unlimited-addon' )
		] );

		$this->add_control( 'button_url', [
			'label' => esc_html__( 'Button URL', 'unlimited-addon' ),
			'type'  => \Elementor\Controls_Manager::URL,
		] );

		$this->add_control(
			'image',
			[
				'label' => esc_html__( 'Choose Image', 'unlimited-addon' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'background_style',
			[
				'label' => esc_html__( 'Background', 'unlimited-addon' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'background',
				'label' => esc_html__( 'Background', 'plugin-domain' ),
				'types' => [ 'gradient','video','classic'],
				'default'=>'#4054B2',
				'selector' => '{{WRAPPER}} .ts-hero-slide.ts-style1',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'alignment_style',
			[
				'label' => esc_html__( 'Text Alignment', 'unlimited-addon' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control( 'display_alignment', [
			'label'   => esc_html__( 'Text Alignment ', 'unlimited-addon' ),
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
			'text_bg_style',
			[
				'label' => esc_html__( 'Text Background Color', 'unlimited-addon' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'style' => 'style3'
				]
			]
		);

		$this->add_control(
			'banner_text_bg',
			[
				'label' => esc_html__( 'Text Background Color', 'unlimited-addon' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .bannaer-style-bg' => 'background: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'height_style',
			[
				'label' => esc_html__( 'Height', 'unlimited-addon' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'sec_height',
			[
				'label' => esc_html__( 'Height', 'unlimited-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( '700', 'unlimited-addon' ),
				'selectors' => [
					'{{WRAPPER}} .ts-hero-slide.ts-style1' => 'height: {{VALUE}}px',
				],
			]
		);

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
					'{{WRAPPER}} .ts-hero-text.ts-style1 .ts-hero-title' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => esc_html__( 'Title Typography', 'unlimited-addon' ),
				'selector' => '{{WRAPPER}} .ts-hero-text.ts-style1 .ts-hero-title'
			]
		);	

		$this->add_control(
			'padding',
			[
				'label' => esc_html__( 'Padding', 'unlimited-addon' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .ts-hero-text.ts-style1 .ts-hero-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'dcontent_style',
			[
				'label' => esc_html__( 'Content', 'unlimited-addon' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'content_color',
			[
				'label' => esc_html__( 'Content Color', 'unlimited-addon' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ts-hero-text.ts-style1 .ts-hero-subtitle' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'content_typography',
				'label' => esc_html__( 'Content Typography', 'unlimited-addon' ),
				'selector' => '{{WRAPPER}} .ts-hero-text.ts-style1 .ts-hero-subtitle'
			]
		);	

		$this->add_control(
			'content_padding',
			[
				'label' => esc_html__( 'Padding', 'unlimited-addon' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .ts-hero-text.ts-style1 .ts-hero-subtitle' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'button_style',
			[
				'label' => esc_html__( 'Button', 'unlimited-addon' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'btn_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'unlimited-addon' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ts-btn.ts-style1' => 'background: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'btn_color',
			[
				'label' => esc_html__( 'Color', 'unlimited-addon' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ts-btn.ts-style1' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'btn_border_color',
			[
				'label' => esc_html__( 'Border Color', 'unlimited-addon' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ts-btn.ts-style1' => 'border-color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'btn_typography',
				'label' => esc_html__( 'Typography', 'unlimited-addon' ),
				'selector' => '{{WRAPPER}} .ts-btn.ts-style1'
			]
		);	

		$this->add_control(
			'btn_padding',
			[
				'label' => esc_html__( 'Padding', 'unlimited-addon' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .ts-btn.ts-style1' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
		$img = $settings['image'];
	?>
	<?php
    switch ($style) {
      case 'style1': default: ?>
		<div class="ts-hero ts-style1">
			<div class="ts-hero-slide ts-style1 ts-flex">
				<div class="container">
				<div class="ts-hero-text ts-style1">
					<h1 class="ts-hero-title"><?php echo wp_kses_post($settings['title']); ?></h1>
					<div class="ts-hero-subtitle"><?php echo wp_kses_post($settings['description']); ?></div>
					<div class="ts-btn-group">
					<a href="<?php echo esc_url( $settings['button_url']['url'] ); ?>" class="ts-btn ts-style1 ts-size-large ts-color1"><?php echo esc_html( $settings['button_title'] ) ?><i class="fas fa-angle-right"></i></a>
					</div>
				</div>
				<div class="ts-hero-img"> <img src="<?php echo esc_url($img['url']); ?>" alt=""></div>
				</div>
			</div>
		</div>
	<?php
        # code...
        break;
      case 'style2': ?>	
		<div class="ts-hero ts-style1">
			<div class="ts-hero-slide ts-style1 ts-flex">
				<div class="container">
				
				<div class="ts-hero-text ts-style1 <?php echo esc_attr($settings['display_alignment']); ?>">
					<h1 class="ts-hero-title"><?php echo wp_kses_post($settings['title']); ?></h1>
					<div class="ts-hero-subtitle"><?php echo wp_kses_post($settings['description']); ?></div>
					<div class="ts-btn-group">
					<a href="<?php echo esc_url( $settings['button_url']['url'] ); ?>" class="ts-btn ts-style1 ts-size-large ts-color1"><?php echo esc_html( $settings['button_title'] ) ?><i class="fas fa-angle-right"></i></a>
					</div>
				</div>
				
				</div>
			</div>
		</div>
		<?php
        # code...
        break;
      case 'style3': ?>	
		<div class="ts-hero ts-style1">
			<div class="ts-hero-slide ts-style1 ts-flex">
				<div class="container">
				<div class="ts-hero-text ts-style1 bannaer-style-bg <?php echo esc_attr($settings['display_alignment']); ?>">
					<h1 class="ts-hero-title"><?php echo wp_kses_post($settings['title']); ?></h1>
					<div class="ts-hero-subtitle"><?php echo wp_kses_post($settings['description']); ?></div>
					<div class="ts-btn-group">
					<a href="<?php echo esc_url( $settings['button_url']['url'] ); ?>" class="ts-btn ts-style1 ts-size-large ts-color1"><?php echo esc_html( $settings['button_title'] ) ?><i class="fas fa-angle-right"></i></a>
					</div>
				</div>
				
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
