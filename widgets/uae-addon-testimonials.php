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
class uae_addon_testimonial extends Widget_Base {

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
		return 'testimonial';
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
		return esc_html__( 'Testimonial', 'unlimited-addon' );
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
		return 'eicon-testimonial';
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
			'image',
			[
				'label' => esc_html__( 'Choose Image', 'unlimited-addon' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_control(
			'title',
			[
				'label' => esc_html__( 'Title', 'unlimited-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Your Name', 'unlimited-addon' ),
			]
		);

		$this->add_control(
			'description',
			[
				'label' => esc_html__( 'Description', 'unlimited-addon' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'rows' => 10,
				'default' => esc_html__( 'Default description', 'unlimited-addon' ),
			]
		);

		$this->add_control(
			'designation',
			[
				'label' => esc_html__( 'designation', 'unlimited-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Designation', 'unlimited-addon' )
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
					'{{WRAPPER}} .uae-testtimonial-title' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => esc_html__( 'Title Typography', 'unlimited-addon' ),
				'selector' => '{{WRAPPER}} .uae-testtimonial-title'
			]
		);	

		$this->add_control(
			'padding',
			[
				'label' => esc_html__( 'Padding', 'unlimited-addon' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .uae-testtimonial-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();


		$this->start_controls_section(
			'designation_style',
			[
				'label' => esc_html__( 'Designation', 'unlimited-addon' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'designation_color',
			[
				'label' => esc_html__( 'Designation Color', 'unlimited-addon' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .uae-testtimonial-designation' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'designation_typography',
				'label' => esc_html__( 'Designation Typography', 'unlimited-addon' ),
				'selector' => '{{WRAPPER}} .uae-testtimonial-designation'
			]
		);	

		$this->add_control(
			'designation_padding',
			[
				'label' => esc_html__( 'Padding', 'unlimited-addon' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .uae-testtimonial-designation' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .uae-testtimonial-content' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'content_typography',
				'label' => esc_html__( 'Content Typography', 'unlimited-addon' ),
				'selector' => '{{WRAPPER}} p.uae-testtimonial-content'
			]
		);	

		$this->add_control(
			'content_padding',
			[
				'label' => esc_html__( 'Padding', 'unlimited-addon' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .uae-testtimonial-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
		$img =  $settings['image'];
	?>
	<?php
    switch ($style) {
      case 'style1': default: ?>

	<div class="uae-testimonial  text-center">
		<!--Avatar-->
		<div class="avatar mx-auto">
		<img src="<?php echo esc_url($img['url']); ?>" class="img-fluid">
		</div>
		<!--Content-->
		<h4 class="font-weight-bold mt-3 mb-2 uae-testtimonial-title"><?php echo esc_html($settings['title']); ?></h4>
		<h6 class="blue-text font-weight-bold mb-4 uae-testtimonial-designation"><?php echo esc_html($settings['designation']); ?></h6>
		<p class="font-weight-normal uae-testtimonial-content"><i class="fas fa-quote-left pr-2"></i><?php echo wp_kses_post($settings['description']); ?></p>
		<!--Review-->
	</div>
	
	<?php
        # code...
        break;
      case 'style2': ?>	
	        <div class="card">
          <div class="card-body m-3">
            <div class="row">
              <div class="col-lg-4 d-flex mb-2 align-items-center">
                <div class="avatar mx-4 w-100 white d-flex justify-content-center align-items-center">
                  <img src="<?php echo esc_url($img['url']); ?>" class="rounded-circle img-fluid z-depth-1" alt="woman avatar">
                </div>
              </div>
              <div class="col-lg-8">
                <p class="font-weight-light mb-4 uae-testtimonial-content"><?php echo wp_kses_post($settings['description']); ?></p>
                <p class="font-weight-bold lead mb-2 uae-testtimonial-title"><strong><?php echo esc_html($settings['title']); ?></strong></p>
              	<p class="font-weight-bold text-muted mb-0 uae-testtimonial-designation"><?php echo esc_html($settings['designation']); ?></p>
              </div>
            </div>
          </div>
        </div>
		<?php
        # code...
        break;
      case 'style3': ?>	
        <div class="card">
          <div class="card-body m-1">
            <div class="row mb-4">
              <div class="col-lg-4 d-flex mb-2 align-items-center">
                <div
                  class="avatar w-100 white d-flex justify-content-center align-items-center"
                >
                  <img
                    src="<?php echo esc_url($img['url']); ?>"
                    class="img-fluid z-depth-1"
                    alt="woman avatar"
                  />
                </div>
              </div>
              <div
                class="col-lg-8 text-muted d-flex flex-column pt-2"
              >
                <p class="mb-1 uae-testtimonial-title"><strong><?php echo esc_html($settings['title']); ?></strong></p>
                <p class="mb-1 uae-testtimonial-designation"><i><?php echo esc_html($settings['designation']); ?></i></p>
              </div>
            </div>
            <hr />
            <div class="row">
              <p class="card-text mt-2 px-4 mb-2 uae-testtimonial-content">
			  <?php echo wp_kses_post($settings['description']); ?>
              </p>
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
