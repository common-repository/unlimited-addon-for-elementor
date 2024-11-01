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
class uae_addon_table extends Widget_Base {

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
		return 'table';
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
		return esc_html__( 'Table', 'unlimited-addon' );
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
		return 'eicon-table';
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
				'label' => esc_html__( 'Table Head', 'unlimited-addon' ),
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'table_head',
			[
				'label' => esc_html__( 'Table Head', 'unlimited-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'First', 'unlimited-addon' ),
			]
		);

		$this->add_control(
			'table_head_list',
			[
				'label' => esc_html__( 'Table Head List', 'unlimited-addon' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ table_head }}}',
			]
		);

	

		$this->end_controls_section();

		$this->start_controls_section(
			'table_body_content',
			[
				'label' => esc_html__( 'Table Body', 'unlimited-addon' ),
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'table_body',
			[
				'label' => esc_html__( 'Table Body ( If you give a new line, a new column will start
				)', 'unlimited-addon' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'First', 'unlimited-addon' ),
			]
		);

		$this->add_control(
			'table_body_list',
			[
				'label' => esc_html__( 'Table Body List', 'unlimited-addon' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'table_head_style',
			[
				'label' => esc_html__( 'Table Head', 'unlimited-addon' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'head_align', [
				'label' => esc_html__( 'Alignment', 'unlimited-addon' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
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
					'justify' => [
						'title' => esc_html__( 'Justified', 'unlimited-addon' ),
						'icon' => 'fa fa-align-justify',
					],
				],
				'default' => 'left',
				'selectors' => [
					'{{WRAPPER}} .uae-table-head tr th' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'color',
			[
				'label' => esc_html__( 'Head Color', 'unlimited-addon' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .uae-table-head tr th' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => esc_html__( 'Head Typography', 'unlimited-addon' ),
				'selector' => '{{WRAPPER}} .uae-table-head tr th'
			]
		);	

		$this->add_control(
			'padding',
			[
				'label' => esc_html__( 'Padding', 'unlimited-addon' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .uae-table-head tr th' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'bg_color',
			[
				'label' => esc_html__( 'Head Background Color', 'unlimited-addon' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .uae-table-head tr' => 'background: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'table_body_style',
			[
				'label' => esc_html__( 'Table Body', 'unlimited-addon' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'body_align', [
				'label' => esc_html__( 'Alignment', 'unlimited-addon' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
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
					'justify' => [
						'title' => esc_html__( 'Justified', 'unlimited-addon' ),
						'icon' => 'fa fa-align-justify',
					],
				],
				'default' => 'left',
				'selectors' => [
					'{{WRAPPER}} .uae-table-body tr td' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'body_content_color',
			[
				'label' => esc_html__( 'Body Content Color', 'unlimited-addon' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .uae-table-body tr td' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'body_content_typography',
				'label' => esc_html__( 'Body Typography', 'unlimited-addon' ),
				'selector' => '{{WRAPPER}} .uae-table-body tr td'
			]
		);	

		$this->add_control(
			'bd_padding',
			[
				'label' => esc_html__( 'Padding', 'unlimited-addon' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .uae-table-body tr td' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'bd_bg_color',
			[
				'label' => esc_html__( 'Body Background Color', 'unlimited-addon' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .uae-table-body tr td' => 'background: {{VALUE}}',
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
		$table_body_list = $settings['table_body_list'];
		
	?>
		<div class="uae-table-area">
			<table class="table ts-table">
				<thead class="uae-table-head"> 
					<tr>
					<?php foreach($settings['table_head_list'] as $table_output ){ ?>
						<th scope="col"><?php echo esc_html($table_output['table_head']); ?></th>
					<?php } ?>
					</tr>
				</thead>
				<tbody class="uae-table-body">
				<?php foreach ( $table_body_list as $body_output ) { ?>
					<tr>
					<?php
						$items = explode("\n",trim($body_output['table_body']));
						foreach($items as $item){
							if($item) {
								echo "<td>{$item}</td>";
							}
						}
					?>
					</tr>
				<?php } ?>
					
				</tbody>
			</table>
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
