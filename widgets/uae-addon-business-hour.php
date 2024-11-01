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
class uae_addon_business_hour extends Widget_Base {

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
		return 'businesshour';
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
		return esc_html__( 'Business Hour', 'unlimited-addon' );
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
		return 'eicon-frame-expand';
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
			'business_title',
			[
				'label' => esc_html__( 'Header Title', 'unlimited-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Opening Hour', 'unlimited-addon' ),
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'business_day',
			[
				'label' => esc_html__( 'Business Day', 'unlimited-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Monday', 'unlimited-addon' ),
			]
		);


		$repeater->add_control(
			'business_hour',
			[
				'label' => esc_html__( 'Business Hour', 'unlimited-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( '10:00 AM - 7:00 PM', 'unlimited-addon' ),
			]
		);

		$this->add_control(
			'business_list',
			[
				'label' => esc_html__( 'Hour List', 'unlimited-addon' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default'=>[
					[
						'business_day'=>esc_html__( 'Monday', 'unlimited-addon' ),
						'business_hour'=>esc_html__( '10:00 AM - 7:00 PM', 'unlimited-addon' ),
					]
				],
				'title_field' => '{{{ business_day }}}',
			]
		);

		$this->add_control( 'contact_number', [
			'label'   => esc_html__( 'Contact Number', 'unlimited-addon' ),
			'type'    => \Elementor\Controls_Manager::TEXT,
			'default' => esc_html__( '+88-879-9857', 'unlimited-addon' )
		] );

		$this->add_control( 'btn_title', [
			'label'   => esc_html__( 'Button Text', 'unlimited-addon' ),
			'type'    => \Elementor\Controls_Manager::TEXT,
			'default' => esc_html__( 'Button Text', 'unlimited-addon' )
		] );

		$this->add_control( 'button_url', [
			'label' => esc_html__( 'Button URL', 'unlimited-addon' ),
			'type'  => \Elementor\Controls_Manager::URL,
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
					'{{WRAPPER}} .business-title h3' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => esc_html__( 'Title Typography', 'unlimited-addon' ),
				'selector' => '{{WRAPPER}} .business-title h3'
			]
		);	

		$this->add_control(
			'padding',
			[
				'label' => esc_html__( 'Padding', 'unlimited-addon' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .business-title h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'thead_style',
			[
				'label' => esc_html__( 'Table Head', 'unlimited-addon' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'head_color',
			[
				'label' => esc_html__( 'Head Color', 'unlimited-addon' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .uae-table tr th' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'head_typography',
				'label' => esc_html__( 'Head Typography', 'unlimited-addon' ),
				'selector' => '{{WRAPPER}} .uae-table tr th'
			]
		);	

		$this->end_controls_section();

		$this->start_controls_section(
			'tdata_style',
			[
				'label' => esc_html__( 'Table Data', 'unlimited-addon' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'tdata_color',
			[
				'label' => esc_html__( 'Data Color', 'unlimited-addon' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .uae-table tr td' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'tdata_typography',
				'label' => esc_html__( 'Data Typography', 'unlimited-addon' ),
				'selector' => '{{WRAPPER}} .uae-table tr td'
			]
		);	

		$this->end_controls_section();

		$this->start_controls_section(
			'footer_style',
			[
				'label' => esc_html__( 'Contact Text', 'unlimited-addon' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'footer_color',
			[
				'label' => esc_html__( 'Contact Color', 'unlimited-addon' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .business-footer p' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'footer_typography',
				'label' => esc_html__( 'Contact Typography', 'unlimited-addon' ),
				'selector' => '{{WRAPPER}} .business-footer p'
			]
		);	

		$this->end_controls_section();

		$this->start_controls_section(
			'footerb_style',
			[
				'label' => esc_html__( 'Button', 'unlimited-addon' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'button_color',
			[
				'label' => esc_html__( 'Button Color', 'unlimited-addon' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .business-footer p a' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'button_bg',
			[
				'label' => esc_html__( 'Background Color', 'unlimited-addon' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .business-footer p a' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'footerb_typography',
				'label' => esc_html__( 'Button Typography', 'unlimited-addon' ),
				'selector' => '{{WRAPPER}} .business-footer p a'
			]
		);	

		$this->add_control(
			'bpadding',
			[
				'label' => esc_html__( 'Button Padding', 'unlimited-addon' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .business-footer p a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
		<div class="business-title text-center">
			<h3><?php echo esc_html($settings['business_title']); ?></h3>
		</div>
		<table class="table uae-table">
		  <?php foreach($settings['business_list'] as $business_output ){ ?>
            <tr>
			 <th scope="col"><?php echo esc_html($business_output['business_day']); ?></th>
              <td class="text-right"><?php echo wp_kses_post($business_output['business_hour']); ?></td>
            </tr>
			<?php } ?>
          </tbody>
        </table>
		
		<div class="business-footer text-center">
			<p><?php echo wp_kses_post($settings['contact_number']); ?> <a href="<?php echo esc_url($settings['button_url']['url']); ?>"><?php echo esc_html($settings['btn_title']); ?></a></p>
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
