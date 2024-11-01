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
class uae_addon_card_carousel extends Widget_Base {

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
		return 'card-carousel';
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
		return esc_html__( 'Card Carousel', 'unlimited-addon' );
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
		return 'eicon-testimonial-carousel';
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
				'default' => esc_html__( 'Default description', 'unlimited-addon' ),
				'placeholder' => esc_html__( 'Type your description here', 'unlimited-addon' ),
			]
		);

		$repeater->add_control( 'btn_title', [
			'label'   => esc_html__( 'Button Text', 'unlimited-addon' ),
			'type'    => \Elementor\Controls_Manager::TEXT,
			'default' => esc_html__( 'Button Text', 'unlimited-addon' )
		] );

		$repeater->add_control( 'button_url', [
			'label' => esc_html__( 'Button URL', 'unlimited-addon' ),
			'type'  => \Elementor\Controls_Manager::URL,
		] );

		$this->add_control(
			'card_slider',
			[
				'label' => esc_html__( 'Card Slider', 'unlimited-addon' ),
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
			'default' => 'text-left'
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
					'{{WRAPPER}} .eae-card .card-title' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => esc_html__( 'Title Typography', 'unlimited-addon' ),
				'selector' => '{{WRAPPER}} .eae-card .card-title'
			]
		);	

		$this->add_control(
			'padding',
			[
				'label' => esc_html__( 'Padding', 'unlimited-addon' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .eae-card .card-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .eae-card .card-text' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'content_typography',
				'label' => esc_html__( 'Content Typography', 'unlimited-addon' ),
				'selector' => '{{WRAPPER}} .eae-card .card-text'
			]
		);	

		$this->add_control(
			'content_padding',
			[
				'label' => esc_html__( 'Padding', 'unlimited-addon' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .eae-card .card-text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
			'button_color',
			[
				'label' => esc_html__( 'Button Color', 'unlimited-addon' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .eae-card .card-body a' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'button_bg',
			[
				'label' => esc_html__( 'Background Color', 'unlimited-addon' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .eae-card .card-body a' => 'background: {{VALUE}}',
				],
			]
		);		

		$this->add_control(
			'button_border',
			[
				'label' => esc_html__( 'Border Color', 'unlimited-addon' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .eae-card .card-body a' => 'border-color: {{VALUE}}',
				],
			]
		);				

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'button_typography',
				'label' => esc_html__( 'Button Typography', 'unlimited-addon' ),
				'selector' => '{{WRAPPER}} .eae-card .card-body a'
			]
		);	

		$this->add_control(
			'button_padding',
			[
				'label' => esc_html__( 'Padding', 'unlimited-addon' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .eae-card .card-body a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
	<?php
    switch ($style) {
      case 'style1': default: ?>
      	<div class="ts-slider">
            <div class="swiper-container" data-autoplay="1" data-loop="1" data-speed="600" data-slides-per-view="responsive" data-xs-slides="1" data-sm-slides="1" data-md-slides="3" data-lg-slides="3" data-add-slides="3"  >
                <div class="swiper-wrapper">
                   <?php
            			foreach($settings['card_slider'] as $cards){
            			$image = $cards['image'];
            		?>
            		<div class="swiper-slide">
                		<!-- Card -->
                		<div class="card eae-card <?php echo esc_attr($settings['display_alignment']); ?>">
                    		<!-- Card image -->
                    		<div class="view overlay">
                    			<img class="card-img-top" src="<?php echo esc_url($image['url']); ?>"
                    			alt="Card image cap">
                    			<a href="#!">
                    			<div class="mask rgba-white-slight"></div>
                    			</a>
                    		</div>
                    		<!-- Card content -->
                    		<div class="card-body">
                    			<!-- Title -->
                    			<h4 class="card-title"><?php echo esc_html($cards['title']); ?></h4>
                    			<!-- Text -->
                    			<p class="card-text"><?php echo wp_kses_post($cards['description']); ?></p>
                    			<!-- Button -->
                    			<a href="<?php echo esc_url($cards['button_url']['url']); ?>" class="btn btn-primary"><?php echo esc_html($cards['btn_title']); ?></a>
                    		</div>
                		</div>
                		<!-- Card -->
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
            <div class="swiper-container" data-autoplay="1" data-loop="1" data-speed="600" data-slides-per-view="responsive" data-xs-slides="1" data-sm-slides="1" data-md-slides="3" data-lg-slides="3" data-add-slides="3"  >
                <div class="swiper-wrapper">
                   <?php
            			foreach($settings['card_slider'] as $cards){
            			$image = $cards['image'];
            		?>
            		<div class="swiper-slide">
	
                		<!-- Card -->
                		<div class="eae-card card card-cascade wider reverse <?php echo esc_attr($settings['display_alignment']); ?>">
                		<!-- Card image -->
                		<div class="view view-cascade overlay">
                			<img class="card-img-top" src="<?php echo esc_url($image['url']); ?>"
                			alt="Card image cap">
                			<a href="#!">
                			<div class="mask rgba-white-slight"></div>
                			</a>
                		</div>
                		<!-- Card content -->
                		<div class="card-body card-body-cascade text-center">
                			<!-- Title -->
                			<h4 class="card-title"><strong><?php echo esc_html($cards['title']); ?></strong></h4>
                			<!-- Text -->
                			<p class="card-text"><?php echo wp_kses_post($cards['description']); ?>
                			</p>
                			<a href="<?php echo esc_url($cards['button_url']['url']); ?>" class="btn btn-primary"><?php echo esc_html($cards['btn_title']); ?></a>
                		</div>
                		</div>
                		<!-- Card -->
                    </div><!-- .swiper-slide -->
                     <?php } ?>
                    </div>
                </div><!-- .swiper-container -->
            </div><!-- .ts-slider -->   
		<?php
        # code...
        break;
      case 'style3': ?>	
      
           	<div class="ts-slider">
            <div class="swiper-container" data-autoplay="1" data-loop="1" data-speed="600" data-slides-per-view="responsive" data-xs-slides="1" data-sm-slides="1" data-md-slides="3" data-lg-slides="3" data-add-slides="3"  >
                <div class="swiper-wrapper">
                   <?php
            			foreach($settings['card_slider'] as $cards){
            			$image = $cards['image'];
            		?>
            		<div class="swiper-slide"> 

                		<!-- Card Light -->
                		<div class="card eae-card">
                		<!-- Card image -->
                		<div class="view overlay">
                			<img class="card-img-top"
                			src="<?php echo esc_url($image['url']); ?>" alt="Card image cap">
                			<a>
                			<div class="mask rgba-white-slight"></div>
                			</a>
                		</div>
                		<!-- Card content -->
                		<div class="card-body">
                			<!-- Title -->
                			<h4 class="card-title"><?php echo esc_html($cards['title']); ?></h4>
                			<hr>
                			<!-- Text -->
                			<p class="card-text"><?php echo wp_kses_post($cards['description']); ?></p>
                			<!-- Link -->
                			<a href="<?php echo esc_url($cards['button_url']['url']); ?>" class="black-text d-flex justify-content-end uae-icon-area">
                			<?php echo esc_html($cards['btn_title']); ?><i class="fas fa-angle-double-right"></i>
                			</a>
                		</div>
                		</div>
                		<!-- Card Light -->
                		
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
