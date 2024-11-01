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
class uae_addon_pricing_table extends Widget_Base {

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
		return 'pricing-table';
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
		return esc_html__( 'Pricing Table', 'unlimited-addon' );
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
		return 'eicon-price-table';
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
			'price_title',
			[
				'label' => esc_html__( 'Price Title', 'unlimited-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Default title', 'unlimited-addon' ),
			]
		);

		$this->add_control(
			'price_amount',
			[
				'label' => esc_html__( 'Price Amount', 'unlimited-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__( '$10/Month', 'unlimited-addon' ),
			]
		);

		$this->add_control( 'items', [
			'label' => esc_html__( 'Items ( Create New Line Enter Space )', 'unlimited-addon' ),
			'type'  => \Elementor\Controls_Manager::TEXTAREA,
		] );

		$this->add_control( 'button_title', [
			'label'   => esc_html__( 'Button Title', 'unlimited-addon' ),
			'type'    => \Elementor\Controls_Manager::TEXT,
			'default' => esc_html__( 'BUY NOW', 'unlimited-addon' )
		] );

		$this->add_control( 'button_url', [
			'label' => esc_html__( 'Button URL', 'unlimited-addon' ),
			'type'  => \Elementor\Controls_Manager::URL,
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
				'label' => esc_html__( 'Title color', 'unlimited-addon' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ts-pricing-title' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'amount_color',
			[
				'label' => esc_html__( 'Amount color', 'unlimited-addon' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ts-pricing' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'border_top_color',
			[
				'label' => esc_html__( 'Border Top color', 'unlimited-addon' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ts-pricing-card.ts-style1' => 'border-top-color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'button_color',
			[
				'label' => esc_html__( 'Button  Color', 'unlimited-addon' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ts-color3.ts-border-style' => 'border-color: {{VALUE}}',
					'{{WRAPPER}} .ts-btn.ts-color3' => 'color: {{VALUE}}',
				],
			]
		);	
		
		$this->add_control(
			'buttom_hober_color',
			[
				'label' => esc_html__( 'Button hover Color', 'unlimited-addon' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}}:hover .ts-color3.ts-border-style' => 'background-color: {{VALUE}}',
					'{{WRAPPER}}:hover .ts-btn.ts-color3' => 'color: {{VALUE}}',
				],
			]
		);			

		$this->add_control(
			'hover_color',
			[
				'label' => esc_html__( 'Hover Color', 'unlimited-addon' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default'=>'#ffffff',
				'selectors' => [
					'{{WRAPPER}}:hover .ts-btn.ts-color3' => 'color: {{VALUE}}',
				],
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
				'selector' => '{{WRAPPER}} .ts-pricing-title'
			]
		);		

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'amount_typography',
				'label' => esc_html__( 'Amount Typography', 'unlimited-addon' ),
				'selector' => '{{WRAPPER}} .ts-pricing'
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
				'selector' => '{{WRAPPER}} .ts-pricing-feature'
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
	<div class="ts-pricing-card ts-style1 text-center">
		<h3 class="ts-pricing-title"><?php echo esc_html($settings['price_title']); ?></h3>
		<div class="ts-pricing"><?php echo esc_html($settings['price_amount']); ?></div>
		<ul class="ts-pricing-feature ts-mp0">
		<?php
			$items = explode("\n",trim($settings['items']));
			foreach($items as $item){
				if($item) {
					echo "<li>{$item}</li>";
				}
			}
		?>
		</ul>
		<div class="ts-pricing-btn"><a href="<?php echo esc_url( $settings['button_url']['url'] ); ?>" class="ts-btn ts-style1 ts-size-medium ts-color3 ts-border-style"><?php echo esc_html( $settings['button_title'] ) ?><i class="fas fa-angle-right"></i></a></div>
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
