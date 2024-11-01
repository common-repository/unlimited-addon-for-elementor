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
class uae_addon_call_to_action extends Widget_Base {

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
		return 'call-to-action';
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
		return esc_html__( 'Call To Action', 'unlimited-addon' );
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
		return ' eicon-call-to-action';
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
			'title',
			[
				'label' => esc_html__( 'Title', 'unlimited-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Default title', 'unlimited-addon' ),
				'placeholder' => esc_html__( 'Type your title here', 'unlimited-addon' ),
			]
		);

		$this->add_control(
			'description',
			[
				'label' => esc_html__( 'Description', 'unlimited-addon' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'rows' => 10,
				'default' => esc_html__( 'Default description', 'unlimited-addon' ),
				'placeholder' => esc_html__( 'Type your description here', 'unlimited-addon' ),
			]
		);

		$this->add_control(
			'read_more',
			[
				'label' => esc_html__( 'Contact Us', 'unlimited-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Contact Us', 'unlimited-addon' ),
			]
		);

		$this->add_control(
			'read_more_link',
			[
				'label' => esc_html__( 'Contact Us Link', 'unlimited-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( '#', 'unlimited-addon' ),
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'bg_style',
			[
				'label' => esc_html__( 'Background', 'unlimited-addon' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'background',
				'label' => esc_html__( 'Background', 'unlimited-addon' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .ts-cta',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'allignment_style',
			[
				'label' => esc_html__( 'Alignment', 'unlimited-addon' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control( 'display_alignment', [
			'label'   => esc_html__( 'Alignment ', 'unlimited-addon' ),
			'type'    => \Elementor\Controls_Manager::SELECT,
			'options' => [
				'text-left'   => esc_html__( 'Left', 'unlimited-addon' ),
				'text-center'    => esc_html__( 'Center', 'unlimited-addon' ),
				'text-right'   => esc_html__( 'Right', 'unlimited-addon' ),

			],
			'default' => 'text-left'
		] );

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style',
			[
				'label' => esc_html__( 'Color', 'unlimited-addon' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Title Color', 'unlimited-addon' ),
				'type' => \Elementor\Controls_Manager::COLOR,	
				'selectors' => [
					'{{WRAPPER}} .ts-cta-title' => 'color: {{VALUE}}',
				],
				'default'=>'#000'
			]
		);

		$this->add_control(
			'content_color',
			[
				'label' => esc_html__( 'Backgrond Color', 'unlimited-addon' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ts-cta-text' => 'color: {{VALUE}}',
				],
				'default'=>'#000'
			]
		);

		$this->add_control(
			'contact_color',
			[
				'label' => esc_html__( 'Contact Color', 'unlimited-addon' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ts-style1.ts-color1' => 'color: {{VALUE}}',
				],
				'default'=>'#000'
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'title_style',
			[
				'label' => esc_html__( 'Title Typography', 'unlimited-addon' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => esc_html__( 'Title Typography', 'unlimited-addon' ),
				'selector' => '{{WRAPPER}} .ts-cta-title'
			]
		);		

		$this->end_controls_section();

		$this->start_controls_section(
			'content_style',
			[
				'label' => esc_html__( 'Content Typography', 'unlimited-addon' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'content_typography',
				'label' => esc_html__( 'Content Typography', 'unlimited-addon' ),
				'selector' => '{{WRAPPER}} .ts-cta-text'
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
	<div class="ts-cta ts-style1 <?php echo esc_attr($settings['display_alignment']); ?>">
		<h2 class="ts-cta-title"><?php echo esc_html($settings['title']); ?></h2>
		<div class="ts-cta-text"><?php echo wp_kses_post($settings['description']); ?></div>
		<div class="ts-cta-btn"><a href="<?php echo esc_url($settings['read_more_link']); ?>" class="ts-btn ts-style1 ts-size-medium ts-color1"><?php echo esc_html($settings['read_more']); ?><i class="fas fa-angle-right"></i></a></div>
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
