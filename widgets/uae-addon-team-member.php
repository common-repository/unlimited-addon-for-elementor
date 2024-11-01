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
class uae_addon_team_member extends Widget_Base {

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
		return 'team-member';
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
		return esc_html__( 'Team Member', 'unlimited-addon' );
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
		return 'eicon-slider-3d';
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
				'default' => esc_html__( 'Jhony Vino', 'unlimited-addon' ),
			]
		);
		
		$this->add_control(
			'designation',
			[
				'label' => esc_html__( 'Designation', 'unlimited-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'CEO & Founder', 'unlimited-addon' ),
			]
		);

		$this->add_control(
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

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'icon',
			[
				'label' => esc_html__( 'Social Icon', 'unlimited-addon' ),
				'type' => \Elementor\Controls_Manager::ICONS,
			]
		);

		$repeater->add_control( 'button_url', [
			'label' => esc_html__( 'Button URL', 'unlimited-addon' ),
			'type'  => \Elementor\Controls_Manager::URL,
		] );

		$this->add_control(
			'social_icons',
			[
				'label' => esc_html__( 'Social Icon', 'unlimited-addon' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
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

		$this->start_controls_section(
			'social_style',
			[
				'label' => esc_html__( 'Social Icon', 'unlimited-addon' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'social_color',
			[
				'label' => esc_html__( 'Social Color', 'unlimited-addon' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ts-member.ts-style1 .ts-member-social a' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'social_border
			_color',
			[
				'label' => esc_html__( 'Social Border Color', 'unlimited-addon' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ts-member.ts-style1 .ts-member-social' => 'border-color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'social_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'unlimited-addon' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ts-member.ts-style1 .ts-member-social' => 'background: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'social_typography',
				'label' => esc_html__( 'Social Typography', 'unlimited-addon' ),
				'selector' => '{{WRAPPER}} .ts-member.ts-style1 .ts-member-social, {{WRAPPER}} .team-section a i'
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
		$social_icons = $settings['social_icons'];
		$img =  $settings['image'];
	?>
	<?php
    switch ($style) {
      case 'style1': default: ?>
		<div class="ts-member ts-style1">
			<div class="ts-member-img"><img src="<?php echo esc_url($img['url'],'thumbnail'); ?>" alt=""></div>
			<h2 class="ts-member-name"><?php echo  esc_html($settings['title']); ?></h2>
			<div class="ts-member-designation"><?php echo  esc_html($settings['designation']); ?></div>
			<div class="ts-member-social">
			<?php 
			foreach($social_icons as $social_icon){ ?>
				<a href="<?php echo esc_url( $social_icon['button_url']['url'] ); ?>"><i class="<?php echo esc_attr($social_icon['icon']['value']); ?>"></i></a>
			<?php } ?>
			</div>
         </div>
		 <?php
        # code...
        break;
      
      case 'style2': ?>
		<div class="ts-member ts-style1">
			<div class="ts-member-img2"><img src="<?php echo esc_url($img['url']); ?>" alt=""></div>
			<h2 class="ts-member-name"><?php echo  esc_html($settings['title']); ?></h2>
			<div class="ts-member-designation"><?php echo  esc_html($settings['designation']); ?></div>
			<p> <?php echo do_shortcode($settings['description']); ?></p>
			<div class="ts-member-social">
			<?php 
			foreach($social_icons as $social_icon){ ?>
				<a href="<?php echo esc_url( $social_icon['button_url']['url'] ); ?>"><i class="<?php echo esc_attr($social_icon['icon']['value']); ?>"></i></a>
			<?php } ?>
			</div>
		 </div>
		 
		 <?php
        # code...
        break;
      
	  case 'style3': ?>
	  <div class="text-center">
		<div class="team-section">
			<div class="avatar mx-auto">
			<img src="<?php echo esc_url($img['url']); ?>" class="rounded z-depth-1-half" alt="Sample avatar">
			</div>
			<h4 class="font-weight-bold dark-grey-text mb-2 mt-4"><?php echo  esc_html($settings['title']); ?></h4>
			<h6 class="text-uppercase grey-text mb-3"><strong><?php echo  esc_html($settings['designation']); ?></strong></h6>
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
