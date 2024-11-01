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
class uae_addon_service_carousel extends Widget_Base {

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
		return 'service-carousel';
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
		return esc_html__( 'Service Carousel', 'unlimited-addon' );
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
		return 'eicon-post-slider';
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
				'label' => esc_html__( 'Content', 'unlimited-addon' ),
			]
		);
		
        $repeater = new \Elementor\Repeater();
        
		$repeater->add_control(
			'icon',
			[
				'label' => esc_html__( 'Icon', 'unlimited-addon' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' =>[
                  'value'   => 'fa fa-star',
                  'library' => 'fa-solid',
                ],
			]
		);

		$repeater->add_control(
			'title',
			[
				'label' => esc_html__( 'Title', 'unlimited-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Default title', 'unlimited-addon' ),
				'placeholder' => esc_html__( 'Type your title here', 'unlimited-addon' ),
			]
		);

		$repeater->add_control(
			'description',
			[
				'label' => esc_html__( 'Description', 'unlimited-addon' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'rows' => 10,
				'default' => esc_html__( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'unlimited-addon' ),
				'placeholder' => esc_html__( 'Type your description here', 'unlimited-addon' ),
			]
		);

		$repeater->add_control(
			'read_more',
			[
				'label' => esc_html__( 'Raed More', 'unlimited-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Read More', 'unlimited-addon' ),
			]
		);

		$repeater->add_control(
			'read_more_link',
			[
				'label' => esc_html__( 'Raed More Link', 'unlimited-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( '#', 'unlimited-addon' ),
			]
		);

		$this->add_control(
			'service_slider',
			[
				'label' => esc_html__( 'Service Slider', 'unlimited-addon' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default'   => [
        			  [
        				'title'   => esc_html__('Default title', 'unlimited-addonr'),
        				'description' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 'unlimited-addonr'),
        				'read_more'   => esc_html__('Read More', 'unlimited-addonr'),
        			  ],
			    ],
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

			],
			'default' => 'text-center'
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
			'icon_color',
			[
				'label' => esc_html__( 'Icon Color', 'unlimited-addon' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ts-icon' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'btn_color',
			[
				'label' => esc_html__( 'Button Color', 'unlimited-addon' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ts-btn.ts-color2' => 'color: {{VALUE}}',
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
				'selector' => '{{WRAPPER}} h3.ts-iconbox-title'
			]
		);		

		$this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Button Color', 'unlimited-addon' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ts-iconbox.ts-style3 .ts-iconbox-title' => 'color: {{VALUE}}',
				],
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
				'selector' => '{{WRAPPER}} .ts-iconbox-text'
			]
		);

		$this->add_control(
			'content_color',
			[
				'label' => esc_html__( 'Button Color', 'unlimited-addon' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ts-iconbox.ts-style3 .ts-iconbox-text' => 'color: {{VALUE}}',
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
      <div class="ts-slider">
        <div class="swiper-container" data-autoplay="1" data-loop="1" data-speed="600" data-slides-per-view="responsive" data-xs-slides="1" data-sm-slides="1" data-md-slides="3" data-lg-slides="3" data-add-slides="3"  >
            <div class="swiper-wrapper">
               <?php
        			foreach($settings['service_slider'] as $services){
        		?>
        		<div class="swiper-slide">

                	<div class="ts-iconbox ts-style3 <?php echo esc_attr($settings['display_alignment']); ?>">
                		<div class="ts-icon"><i class="<?php echo $services['icon']['value'] ?>"></i></div>
                		<h3 class="ts-iconbox-title"><?php echo esc_html($services['title']); ?></h3>
                		<div class="ts-iconbox-text"><?php echo esc_html($services['description']); ?></div>
                		<div class="ts-iconbox-btn"><a href="<?php echo esc_url($services['read_more_link']); ?>" class="ts-btn ts-style2 ts-color2"><?php echo esc_html($services['read_more']); ?> <i class="fas fa-angle-right"></i></a></div>
                	</div>
                	
                 </div><!--swiper-slide -->
                 <?php } ?>
                </div>
            </div><!-- .swiper-container -->
        </div><!-- .ts-slider -->            	
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
