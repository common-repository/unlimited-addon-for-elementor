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
class uae_addon_image_carousel extends Widget_Base {

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
		return 'imageCarousel';
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
		return esc_html__( 'Image Carousel ', 'unlimited-addon' );
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
		return 'eicon-slider-push';
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
				'label' => esc_html__( 'Image Slider', 'unlimited-addon' ),
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
			'image',
			[
				'label' => esc_html__( 'Choose Image', 'unlimited-addon' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$repeater->add_control( 'button_url', [
			'label' => esc_html__( 'Button URL', 'unlimited-addon' ),
			'type'  => \Elementor\Controls_Manager::URL,
		] );

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
			'dcontent_style',
			[
				'label' => esc_html__( 'Arrow', 'unlimited-addon' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'arrow_bg_color',
			[
				'label' => esc_html__( 'Arrow Bg Color', 'unlimited-addon' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default'=>'#000000',
				'selectors' => [
					'{{WRAPPER}} .swipe-arrow.ts-style1.ts-type1 .swiper-arrow-left, {{WRAPPER}} .swipe-arrow.ts-style1.ts-type1 .swiper-arrow-right' => 'background: {{VALUE}}',
				],
			]
		);
		

		$this->add_control(
			'arrow_color',
			[
				'label' => esc_html__( 'Arrow Color', 'unlimited-addon' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default'=>'#ffffff',
				'selectors' => [
					'{{WRAPPER}} .swipe-arrow.ts-style1.ts-type1 .swiper-arrow-left, {{WRAPPER}} .swipe-arrow.ts-style1.ts-type1 .swiper-arrow-right' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'arrow_border_color',
			[
				'label' => esc_html__( 'Border Color', 'unlimited-addon' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default'=>'#ffffff',
				'selectors' => [
					'{{WRAPPER}} .swipe-arrow.ts-style1.ts-type1 .swiper-arrow-left, {{WRAPPER}} .swipe-arrow.ts-style1.ts-type1 .swiper-arrow-right' => 'border-color: {{VALUE}}',
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
	<div class="ts-slider ts-slider-left-right-shadow">
        <div class="swiper-container" data-autoplay="<?php echo esc_attr($autoplay); ?>" data-loop="<?php echo esc_attr($loop); ?>" data-speed="<?php echo esc_attr($speed); ?>" data-slides-per-view="responsive"
          data-xs-slides="1" data-sm-slides="2" data-md-slides="3" data-lg-slides="<?php echo esc_attr($settings['display_coulmn']); ?>" data-add-slides="5">
          <div class="swiper-wrapper">
		  <?php
		  	foreach($settings['image_slider'] as $images){
			$image = $images['image'];
			$btn_url = $images['button_url']['url'];
		  ?>
            <div class="swiper-slide">
              <a href="<?php echo esc_url($btn_url); ?>" class="ts-case-study ts-style1 ts-zoom-effect">
			  	<img src="<?php echo esc_url($image['url']); ?>" alt="">
                <div class="ts-study-plus">
                  <span></span>
                </div>
              </a>
            </div>
			<?php } ?>
          </div>
        </div>
		
        <div class="swipe-arrow ts-style1 ts-type1">
          <div class="swiper-arrow-left"><i class="fas fa-chevron-left"></i></div>
          <div class="swiper-arrow-right"><i class="fas fa-chevron-right"></i></div>
        </div>
        <div class="pagination ts-style1 hidden"></div> 
      </div>
	  <?php
        # code...
        break;
      case 'style2': ?>	
	<div class="ts-slider">
        <div class="swiper-container" data-autoplay="<?php echo esc_attr($autoplay); ?>" data-loop="<?php echo esc_attr($loop); ?>" data-speed="<?php echo esc_attr($speed); ?>" data-slides-per-view="responsive"
          data-xs-slides="1" data-sm-slides="2" data-md-slides="3" data-lg-slides="<?php echo esc_attr($settings['display_coulmn']); ?>" data-add-slides="5">
          <div class="swiper-wrapper">
		  <?php
		  	foreach($settings['image_slider'] as $images){
			$image = $images['image'];
			$btn_url = $images['button_url']['url'];
		  ?>
            <div class="swiper-slide">
              <a href="<?php echo esc_url($btn_url); ?>" class="ts-case-study ts-style1 ts-zoom-effect">
			  	<img src="<?php echo esc_url($image['url']); ?>" alt="">
                <div class="ts-study-plus">
                  <span></span>
                </div>
              </a>
            </div>
			<?php } ?>
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
