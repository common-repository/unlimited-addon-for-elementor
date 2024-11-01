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
class uae_addon_icon_carousel extends Widget_Base {

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
		return 'icon-carousel';
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
		return esc_html__( 'Icon Box Carosuel', 'unlimited-addon' );
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
		return 'eicon-slides';
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
		return ['logo-slider-js'];
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
				'default' => esc_html__( 'Default title', 'unlimited-addon' ),			]
		);
		
		$this->add_control(
			'icon_slider',
			[
				'label' => esc_html__( 'Icon Box Slider', 'unlimited-addon' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
			]
		);		
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'bg_box_style',
			[
				'label' => esc_html__( 'Box Style', 'unlimited-addon' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'front_background',
				'label' => esc_html__( 'Background', 'unlimited-addon' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .ts-iconbox-area',
			]
		);	
		
    	$this->add_group_control(
    		\Elementor\Group_Control_Border::get_type(),
    		[
    			'name' => 'uae_box_border',
    			'selector' => '{{WRAPPER}} .ts-iconbox-area',
    		]
    	);
    	
    	$this->add_control(
    		'uae_border_radius',
    		[
    			'label' => esc_html__( 'Border Radius', 'unlimited-addon' ),
    			'type' => Controls_Manager::SLIDER,
    			'range' => [
    				'px' => [
    					'max' => 100,
    				],
    			],
    			'selectors' => [
    				'{{WRAPPER}} .ts-iconbox-area' => 'border-radius: {{SIZE}}px;',
    			],
    		]
    	);		
		
		$this->add_group_control(
		\Elementor\Group_Control_Box_Shadow::get_type(),
		[
			'name' => 'uae_box_shadow',
			'selector' => '{{WRAPPER}} .ts-iconbox-area',
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

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'icon_typography',
				'label' => esc_html__( 'Icon Typography', 'unlimited-addon' ),
				'selector' => '{{WRAPPER}} .ts-icon'
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
				'label' => esc_html__( 'Title Color', 'unlimited-addon' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} h3.ts-iconbox-title' => 'color: {{VALUE}}',
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
        			foreach($settings['icon_slider'] as $icons){
        		?>
        		<div class="swiper-slide">
	
                	<div class="ts-iconbox-area <?php echo esc_attr($settings['display_alignment']); ?>">
                		<div class="ts-icon"><i class="<?php echo $icons['icon']['value'] ?>"></i></div>
                		<div class="ts-iconbox-info">
                		<h3 class="ts-iconbox-title"><?php echo esc_html($icons['title']); ?></h3>
                		</div>
                	</div>
                	
                    </div><!-- .swiper-slide -->
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
