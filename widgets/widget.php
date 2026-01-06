<?php
if (!defined ('ABSPATH')) { exit; }

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Repeater;
use Elementor\Utils;
use Elementor\Icons_Manager;

class Elementor_Vector_Map_Widget extends Widget_Base {
  public function get_name() { return 'Vector Map'; }

  public function get_title() { return esc_html__( 'Vector Map', 'elementor-vector-map-plugin' ); }

  public function get_icon() { return 'eicon-header'; }

  public function get_categories() { return ["vector-map"]; }

  public function get_keywords() { return ['card', 'map', 'country', 'world', 'vector']; }

  protected function register_controls() {
		$this->start_controls_section(
			'section_content', [
				'label' => esc_html__( 'Content', 'elementor-vector-map-plugin' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control (
			'widget_color', [
				'label' => esc_html__( 'Map Background Color', 'elementor-vector-map-plugin' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [ '{{WRAPPER}}' => 'background-color: {{VALUE}};', ],		
			]
		);

		$this->add_control (
			'list', [
				'label' => esc_html__( 'Countries', 'elementor-vector-map-plugin' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => [
					[
						'name' => 'country_selection',
						'label' => esc_html__( 'Select Country', 'elementor-vector-map-plugin' ),
						'type' => Controls_Manager::SELECT,
						'options' => [
							'Lithuania' => esc_html__( 'Lithuania' ),
							'Poland' => esc_html__( 'Poland'),
							'Germany' => esc_html__( 'Germany' ),
							'Italy' => esc_html__( 'Italy'),
							'Spain' => esc_html__( 'Spain'),
							'France' => esc_html__( 'France' ),
							'England' => esc_html__( 'England'),
							'Norway' => esc_html__( 'Norway' ),
							'Sweden' => esc_html__( 'Sweden'),
							'Turkey' => esc_html__( 'Turkey' ),
							'Ukraine' => esc_html__( 'Ukraine'),
							'Portugal' => esc_html__( 'Portugal' ),
							'Netherlands' => esc_html__( 'Netherlands' ),
							'Belgium' => esc_html__( 'Belgium' ),
							'Latvia' => esc_html__( 'Latvia' ),
							'Ireland' => esc_html__( 'Ireland' ),
							'Estonia' => esc_html__( 'Estonia'),
							'Denmark' => esc_html__( 'Denmark'),
						],
						'default' => 'Lithuania',
					],
					[
						'name' => 'card_image',
						'label' => esc_html__( 'Choose Image', 'elementor-vector-map-plugin' ),
						'label_block' => true,
						'type' => Controls_Manager::MEDIA,
						'default' => [ 'url' => Utils::get_placeholder_image_src() ],
					],
					[
						'name' => 'card_image_description',
						'label' => esc_html__( 'Write image description', 'elementor-vector-map-plugin' ),
						'type' => Controls_Manager::TEXT,
						'default' => 'Map card image',
						'placeholder' => esc_html__( 'Enter image description', 'elementor-vector-map-plugin' ),
					],
					[
						'name' => 'image_align',
						'label' => __( 'Title Image Alignment', 'elementor-vector-map-plugin' ),
						'label_block' => true,
						'type' => Controls_Manager::CHOOSE,
						'options' => [
							'left' => [
								'title' => __( 'Left', 'elementor-vector-map-plugin' ),
								'icon' => 'eicon-text-align-left',
							],
							'center' => [
								'title' => __( 'Center', 'elementor-vector-map-plugin' ),
								'icon' => 'eicon-text-align-center',
							],
							'end' => [
								'title' => __( 'Right', 'elementor-vector-map-plugin' ),
								'icon' => 'eicon-text-align-right',
							],
						],
						'default' => 'center',
						'toggle' => false,
						'selectors' => [ '{{WRAPPER}} .map-card-image' => 'align-self: {{VALUE}};', ],
					],
					[
						'name' => 'title_text',
						'label' => esc_html__( 'Card Title', 'elementor-vector-map-plugin' ),
						'type' => Controls_Manager::TEXT,
						'default' => 'Card title',
						'placeholder' => esc_html__( 'Enter Title', 'elementor-vector-map-plugin' ),
					],
					[
						'name' => 'title_align',
						'label' => __( 'Title Text Alignment', 'elementor-vector-map-plugin' ),
						'label_block' => true,
						'type' => Controls_Manager::CHOOSE,
						'options' => [
							'left' => [
								'title' => __( 'Left', 'elementor-vector-map-plugin' ),
								'icon' => 'eicon-text-align-left',
							],
							'center' => [
								'title' => __( 'Center', 'elementor-vector-map-plugin' ),
								'icon' => 'eicon-text-align-center',
							],
							'right' => [
								'title' => __( 'Right', 'elementor-vector-map-plugin' ),
								'icon' => 'eicon-text-align-right',
							],
							'justify' => [
								'title' => __( 'Justify', 'elementor-vector-map-plugin' ),
								'icon' => 'eicon-text-align-justify',
							],
						],
						'default' => 'left',
						'toggle' => false,
						'selectors' => [ '{{WRAPPER}} .card-content-title' => 'text-align: {{VALUE}};', ],
					],
					[
						'name' => 'title_color',
						'label' => esc_html__( 'Title Color', 'elementor-vector-map-plugin' ),
						'default' => '#1D2430',
						'type' => Controls_Manager::COLOR,
						'selectors' => [ '{{WRAPPER}} .card-content-title' => 'color: {{VALUE}};', ],
					],
					[
						'name' => 'title_size',
						'label' => esc_html__( 'Title Size', 'elementor-vector-map-plugin' ),
						'label_block' => true,
						'type' => Controls_Manager::SLIDER,
						'range' => [
							'px' => [
								'min' => 8,
								'max' => 42,
							],
						],
						'default' => [
							'unit' => 'px',
							'size' => 16,
						],
						'selectors' => [ '{{WRAPPER}} .card-content-title' => 'font-size: {{SIZE}}px;', ],
					],
					[
						'name' => 'content_text',
						'label' => esc_html__( 'Card content', 'elementor-vector-map-plugin' ),
						'type' => Controls_Manager::TEXT,
						'default' => 'Description',
						'placeholder' => esc_html__( 'Enter Content', 'elementor-vector-map-plugin' ),
					],
					[
						'name' => 'content_align',
						'label' => __( 'Content Alignment', 'elementor-vector-map-plugin' ),
						'label_block' => true,
						'type' => Controls_Manager::CHOOSE,
						'options' => [
							'left' => [
								'title' => __( 'Left', 'elementor-vector-map-plugin' ),
								'icon' => 'eicon-text-align-left',
							],
							'center' => [
								'title' => __( 'Center', 'elementor-vector-map-plugin' ),
								'icon' => 'eicon-text-align-center',
							],
							'right' => [
								'title' => __( 'Right', 'elementor-vector-map-plugin' ),
								'icon' => 'eicon-text-align-right',
							],
							'justify' => [
								'title' => __( 'Justify', 'elementor-vector-map-plugin' ),
								'icon' => 'eicon-text-align-justify',
							],
						],
						'default' => 'left',
						'toggle' => false,
						'selectors' => [ '{{WRAPPER}} .card-content-text' => 'text-align: {{VALUE}};', ],
					],
					[
						'name' => 'content_color',
						'label' => esc_html__( 'Content Color', 'elementor-vector-map-plugin' ),
						'default' => '#9EA7B5',
						'type' => Controls_Manager::COLOR,
						'selectors' => [ '{{WRAPPER}} .card-content-text' => 'color: {{VALUE}};', ],
					],
					[
						'name' => 'content_size',
						'label' => esc_html__( 'Content Size', 'elementor-vector-map-plugin' ),
						'label_block' => true,
						'type' => Controls_Manager::SLIDER,
						'range' => [
							'px' => [
								'min' => 8,
								'max' => 42,
							],
						],
						'default' => [
							'unit' => 'px',
							'size' => 14,
						],
						'selectors' => [ '{{WRAPPER}} .card-content-text' => 'font-size: {{SIZE}}px;', ],
					],
					[
						'name' => 'button_text',
						'label' => esc_html__( 'Button text', 'elementor-vector-map-plugin' ),
						'type' => Controls_Manager::TEXT,
						'placeholder' => esc_html__( 'Enter Button Text', 'elementor-vector-map-plugin' ),
						'default' => 'More info',
					],
					[
						'name' => 'button_text_size',
						'label' => esc_html__( 'Button Text Size', 'elementor-vector-map-plugin' ),
						'label_block' => true,
						'type' => Controls_Manager::SLIDER,
						'range' => [
							'px' => [
								'min' => 8,
								'max' => 42,
							],
						],
						'default' => [
							'unit' => 'px',
							'size' => 14,
						],
						'selectors' => [ '{{WRAPPER}} .button-text' => 'font-size: {{SIZE}}px;', ],
					],
					[
						'name' => 'button_text_color',
						'label' => esc_html__( 'Button Text Color', 'elementor-vector-map-plugin' ),
						'default' => '#1D2430',
						'type' => Controls_Manager::COLOR,
						'selectors' => [ '{{WRAPPER}} .button-text' => 'color: {{VALUE}};', ],
					],
					[
						'name' => 'button_color',
						'label' => esc_html__( 'Button Color', 'elementor-vector-map-plugin' ),
						'default' => '#ffffff',
						'type' => Controls_Manager::COLOR,
						'selectors' => [ '{{WRAPPER}} .card-button' => 'background-color: {{VALUE}};', ],
					],
					[
						'name' => 'button_link',
						'label' => esc_html__( 'Button Link', 'elementor-vector-map-plugin' ),
						'label_block' => true,
						'type' => Controls_Manager::URL,
						'placeholder' => esc_html__( 'Enter Button Link', 'elementor-vector-map-plugin' ),
						'default' => [
							'url' => '#',
						],
					],
					[
						'name' => 'button_icon',
						'label' => esc_html__( 'Button icon', 'elementor-vector-map-plugin' ),
						'label_block' => true,
						'type' => Controls_Manager::ICONS,
						'default' => [
							'value' => 'fas fa-egg',
							'library' => 'fa-solid',
						],
					],
					[
						'name' => 'button_align',
						'label' => __( 'Button Alignment', 'elementor-vector-map-plugin' ),
						'label_block' => true,
						'type' => Controls_Manager::CHOOSE,
						'options' => [
							'left' => [
								'title' => __( 'Left', 'elementor-vector-map-plugin' ),
								'icon' => 'eicon-text-align-left',
							],
							'center' => [
								'title' => __( 'Center', 'elementor-vector-map-plugin' ),
								'icon' => 'eicon-text-align-center',
							],
							'right' => [
								'title' => __( 'Right', 'elementor-vector-map-plugin' ),
								'icon' => 'eicon-text-align-right',
							],
						],
						'default' => 'center',
						'toggle' => false,
						'selectors' => [ '{{WRAPPER}} .card-button' => 'text-align: {{VALUE}};', ],
					],
				],
				'title_field' => '{{{ country_selection }}}',
			]
		);
		$this->end_controls_section();
	}

  protected function render() { 
		$settings = $this->get_settings_for_display();
		if ( !$settings['list'] ) { return; }
		$map = plugin_dir_path(__FILE__) . '../assets/images/europe.svg'
		?>
		<div class="map-container">
			<?php
				if (file_exists($map)) { echo file_get_contents($map); }
			?>
		</div>
		<?php foreach ( $settings['list'] as $index => $item ) : ?>
			<div class="map-card <?php echo $item['country_selection']; ?>" >
				<div class="image-container">
					<img src="<?php echo esc_url($item['card_image']['url'] )?>"
					alt="<?php echo ($item['card_image_description'] )?>"
					class="map-card-image"/>
				</div>
				<div class="card-content">
					<div class="card-text">
						<div class="card-content-title" >
							<?php echo $item['title_text']; ?>
						</div>
						<div class="card-content-text">
							<?php echo $item['content_text']; ?>
						</div>
					</div>
					<div class="card-button">
						<a class="button-text" href="<?php echo esc_attr($item['button_link']['url']); ?>">
							<?php echo $item['button_text']; ?>
							<?php Icons_Manager::render_icon( $item['button_icon'], ['aria-hidden' => 'true'] ); ?>
						</a>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
		<?
  }
}