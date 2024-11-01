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
class uae_addon_team_carousel extends Widget_Base {

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
		return 'team-carousel';
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
		return esc_html__( 'Team Carousel', 'unlimited-addon' );
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
		return 'eicon-user-circle-o';
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
				'default' => esc_html__( 'Jhony Vino', 'unlimited-addon' ),
			]
		);
		
		$repeater->add_control(
			'designation',
			[
				'label' => esc_html__( 'Designation', 'unlimited-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'CEO & Founder', 'unlimited-addon' ),
			]
		);

		$repeater->add_control(
			'description',
			[
				'label' => esc_html__( 'Content', 'unlimited-addon' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'rows' => 10,
				'condition' => [
					'style' => 'style2'
				]
			]
		);

		$this->add_control(
			'team_slider',
			[
				'label' => esc_html__( 'Team Slider', 'unlimited-addon' ),
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
					'{{WRAPPER}} .ts-member.ts-style1 .ts-member-name' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => esc_html__( 'Title Typography', 'unlimited-addon' ),
				'selector' => '{{WRAPPER}} .ts-member.ts-style1 .ts-member-name'
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
					'{{WRAPPER}} .ts-member.ts-style1 .ts-member-designation' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'designation_typography',
				'label' => esc_html__( 'Designation Typography', 'unlimited-addon' ),
				'selector' => '{{WRAPPER}} .ts-member.ts-style1 .ts-member-designation'
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
      	<div class="ts-slider">
            <div class="swiper-container" data-autoplay="1" data-loop="1" data-speed="600" data-slides-per-view="responsive" data-xs-slides="1" data-sm-slides="1" data-md-slides="3" data-lg-slides="3" data-add-slides="3"  >
                <div class="swiper-wrapper">
                   <?php
            			foreach($settings['team_slider'] as $teams){
            			$image = $teams['image'];
            		?>
            		<div class="swiper-slide">
                		<div class="ts-member ts-style1">
                			<div class="ts-member-img"><img src="<?php echo esc_url($image['url'],'thumbnail'); ?>" alt=""></div>
                			<h2 class="ts-member-name"><?php echo esc_html($teams['title']); ?></h2>
                			<div class="ts-member-designation"><?php echo esc_html($teams['designation']); ?></div>
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
            <div class="swiper-container" data-autoplay="1" data-loop="1" data-speed="600" data-slides-per-view="responsive" data-xs-slides="1" data-sm-slides="1" data-md-slides="3" data-lg-slides="3" data-add-slides="3"  >
                <div class="swiper-wrapper">
                   <?php
            			foreach($settings['team_slider'] as $teams){
            			$image = $teams['image'];
            		?>
            		<div class="swiper-slide">      
            		
                		<div class="ts-member ts-style1">
                			<div class="ts-member-img2"><img src="<?php echo esc_url($image['url']); ?>" alt=""></div>
                			<h2 class="ts-member-name"><?php echo  esc_html($teams['title']); ?></h2>
                			<div class="ts-member-designation"><?php echo  esc_html($teams['designation']); ?></div>
                			<p> <?php echo do_shortcode($teams['description']); ?></p>
 
                		 </div>
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
            			foreach($settings['team_slider'] as $teams){
            			$image = $teams['image'];
            		?>
            		<div class="swiper-slide">   	  
                	  
                	  <div class="text-center">
                		<div class="team-section">
                			<div class="avatar mx-auto">
                			<img src="<?php echo esc_url($image['url']); ?>" class="rounded z-depth-1-half" alt="Sample avatar">
                			</div>
                			<h4 class="font-weight-bold dark-grey-text mb-2 mt-4"><?php echo  esc_html($teams['title']); ?></h4>
                			<h6 class="text-uppercase grey-text mb-3"><strong><?php echo  esc_html($teams['designation']); ?></strong></h6>
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
