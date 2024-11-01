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
class uae_addon_testimonial_carousel extends Widget_Base {

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
		return 'testimonial-carousel';
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
		return esc_html__( 'Testimonial Carousel ', 'unlimited-addon' );
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
		return [ 'logo-slider-js' ];
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
				'label' => esc_html__( 'Testimonial Slider', 'unlimited-addon' ),
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
			  )
			)
		  );	

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'description',
			[
				'label' => esc_html__( 'Description', 'unlimited-addon' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'rows' => 10,
				'default' => esc_html__( 'Default description', 'unlimited-addon' ),
			]
		);

		$repeater->add_control(
			'title',
			[
				'label' => esc_html__( 'Title', 'unlimited-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Default title', 'unlimited-addon' ),
			]
		);

		$repeater->add_control(
			'designation',
			[
				'label' => esc_html__( 'Designation', 'unlimited-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Default Designation', 'unlimited-addon' ),
			]
		);

		$repeater->add_control(
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
			'image_slider',
			[
				'label' => esc_html__( 'Image Slider', 'unlimited-addon' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'url' => \Elementor\Utils::get_placeholder_image_src(),
					]
				],
			]
		);	

		$this->end_controls_section();

		$this->start_controls_section(
			'control_content',
			[
				'label' => esc_html__( 'Slider Control', 'unlimited-addon' ),
			]
		);

		$this->add_control( 'display_coulmn', [
			'label'   => esc_html__( 'Image Coulmn', 'unlimited-addon' ),
			'type'    => \Elementor\Controls_Manager::SELECT,
			'options' => [
				'2'    => esc_html__( '2 Coulmn', 'unlimited-addon' ),
				'3'    => esc_html__( '3 Coulmn', 'unlimited-addon' ),
				'4'    => esc_html__( '4 Coulmn', 'unlimited-addon' ),
				'5'   => esc_html__( '5 Coulmn', 'unlimited-addon' ),
			],
			'default'=>'4'
		] );

		$this->add_control(
			'autoplay',
			[
			  'label'       => esc_html__('Autoplay', 'unlimited-addon'),
			  'type'        => Controls_Manager::SWITCHER,
			]
		  );
	  
		  $this->add_control(
			'loop',
			[
			  'label'     => esc_html__('Loop', 'unlimited-addon'),
			  'type'      => Controls_Manager::SWITCHER,
			  'default'   => 'yes',
			]
		  );
	  
		  $this->add_control(
			'speed',
			[
			  'label'       => esc_html__('Speed', 'unlimited-addon'),
			  'type'        => Controls_Manager::NUMBER,
			  'default'     => 600
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
					'{{WRAPPER}} .uae-testimonial-meta h3' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => esc_html__( 'Title Typography', 'unlimited-addon' ),
				'selector' => '{{WRAPPER}} .uae-testimonial-meta h3'
			]
		);	

		$this->add_control(
			'padding',
			[
				'label' => esc_html__( 'Padding', 'unlimited-addon' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .uae-testimonial-meta h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .uae-testimonial-meta span' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'designation_typography',
				'label' => esc_html__( 'Designation Typography', 'unlimited-addon' ),
				'selector' => '{{WRAPPER}} .uae-testimonial-meta span'
			]
		);	

		$this->add_control(
			'designation_padding',
			[
				'label' => esc_html__( 'Padding', 'unlimited-addon' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .uae-testimonial-meta span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .uae-testimonial-quote' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'content_typography',
				'label' => esc_html__( 'Content Typography', 'unlimited-addon' ),
				'selector' => '{{WRAPPER}} .uae-testimonial-quote'
			]
		);	

		$this->add_control(
			'content_padding',
			[
				'label' => esc_html__( 'Padding', 'unlimited-addon' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .uae-testimonial-quote' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'icon_style',
			[
				'label' => esc_html__( 'Quote Icon', 'unlimited-addon' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'quote_color',
			[
				'label' => esc_html__( 'Color', 'unlimited-addon' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .uae-testimonial-quote-icon i' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'quote_typography',
				'label' => esc_html__( 'quote Typography', 'unlimited-addon' ),
				'selector' => '{{WRAPPER}} .uae-testimonial-quote-icon i'
			]
		);	

		$this->add_control(
			'quote_padding',
			[
				'label' => esc_html__( 'Padding', 'unlimited-addon' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .uae-testimonial-quote-icon i' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
		$autoplay = $settings['autoplay'];
		$loop     = $settings['loop'];
		$speed    = $settings['speed'];
		$loop     = ($loop == 'yes') ? 1:0;
		$autoplay  = ($autoplay == 'yes') ? 1:0;
		$style    = $settings['style'];
	?>
	<?php
    switch ($style) {
      case 'style1': default: ?>
		<div class="ts-slider">
            <div class="swiper-container" data-autoplay="<?php echo esc_attr($autoplay); ?>" data-loop="<?php echo esc_attr($loop); ?>" data-speed="<?php echo esc_attr($speed); ?>" data-center="0"
                data-slides-per-view="1">
                <div class="swiper-wrapper">
				<?php
					foreach($settings['image_slider'] as $images){
					$image = $images['image'];
				?>
                  <div class="swiper-slide">
                    <div class="uae-testimonial-slider ts-style1">
                      <div class="uae-testimonial-text">
                        <div class="uae-testimonial-quote"><?php echo wp_kses_post($images['description']); ?></div>
                        <div class="uae-testimonial-meta">
                          <h3><?php echo esc_html($images['title']); ?> </h3>
                          <span><?php echo esc_html($images['designation']); ?></span>
                        </div>
                      </div>
                      <div class="uae-testmonial-img ts-bg" >
						<img src="<?php echo esc_url($image['url']); ?>" alt="">
					  </div>
                    </div>
                  </div><!-- .swiper-slide -->
				  <?php } ?>
                </div>
              </div><!-- .swiper-container -->
        </div><!-- .ts-slider -->
		<?php
        # code...
        break;
      	case 'style2': ?>
		<div class="ts-slider">
            <div class="swiper-container" data-autoplay="<?php echo esc_attr($autoplay); ?>" data-loop="<?php echo esc_attr($loop); ?>" data-speed="<?php echo esc_attr($speed); ?>" data-center="0" data-slides-per-view="responsive"
            data-xs-slides="1" data-sm-slides="1" data-md-slides="2" data-lg-slides="2" data-add-slides="2">
                <div class="swiper-wrapper">
				<?php
					foreach($settings['image_slider'] as $images){
					$image = $images['image'];
				?>
                  <div class="swiper-slide">
                    <div class="uae-testimonial-slider ts-style1">
                      <div class="uae-testimonial-text">
                      <div class="uae-testmonial-img ts-bg mb-4" >
						<img src="<?php echo esc_url($image['url']); ?>" alt="">
					  </div>
                        <div class="uae-testimonial-quote"><?php echo wp_kses_post($images['description']); ?></div>
                        <div class="uae-testimonial-meta">
                          <h3><?php echo esc_html($images['title']); ?> </h3>
                          <span><?php echo esc_html($images['designation']); ?></span>
                        </div>
                      </div>
                    </div>
                  </div><!-- .swiper-slide -->
				  <?php } ?>
                </div>
              </div><!-- .swiper-container -->
        </div><!-- .ts-slider -->

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
