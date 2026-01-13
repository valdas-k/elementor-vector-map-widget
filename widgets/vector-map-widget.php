<?php
if ( ! defined ( 'ABSPATH' )) { exit; }

use Elementor\Controls_Manager;

class Elementor_Vector_Map_Widget extends Elementor\Widget_Base {
	public function get_name(): string { return 'Vector Map'; }
	public function get_title(): string { return esc_html__( 'Vector Map', 'elementor-vector-map-widget' ); }
	public function get_icon(): string { return 'eicon-map-pin'; }
	public function get_categories(): array { return ['layout']; }
	public function get_keywords(): array { return ['card', 'map', 'country', 'world', 'vector']; }
	public function get_custom_help_url(): string { return 'https://github.com/valdas-kr'; }
	public function has_widget_inner_wrapper(): bool { return false; }
	protected function is_dynamic_content(): bool { return false; }

  protected function register_controls() {
		$this->start_controls_section(
			'countries_repeater', [
				'label' => esc_html__( 'Countries', 'elementor-vector-map-widget' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control (
			'list', [
				'type' => Controls_Manager::REPEATER,
				'fields' => [
					[
						'name' => 'country_selection',
						'label' => esc_html__( 'Select Country', 'elementor-vector-map-widget' ),
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
							'Netherlands' => esc_html__( 'Netherlands' ),
							'Belgium' => esc_html__( 'Belgium' ),
							'Latvia' => esc_html__( 'Latvia' ),
							'Estonia' => esc_html__( 'Estonia'),
							'Denmark' => esc_html__( 'Denmark'),
							'Finland' => esc_html__( 'Finland'),
						],
						'default' => 'Lithuania',
					],
					[
						'name' => 'title_text',
						'label' => esc_html__( 'Card Title', 'elementor-vector-map-widget' ),
						'type' => Controls_Manager::TEXT,
						'label_block' => true,
						'default' => 'Card title',
						'placeholder' => esc_html__( 'Enter Title', 'elementor-vector-map-widget' ),
					],
					[
						'name' => 'content_text',
						'label' => esc_html__( 'Card content', 'elementor-vector-map-widget' ),
						'type' => Controls_Manager::TEXT,
						'label_block' => true,
						'default' => 'Description',
						'placeholder' => esc_html__( 'Enter Content', 'elementor-vector-map-widget' ),
					],
					[
						'name' => 'button_link',
						'label' => esc_html__( 'Button Link', 'elementor-vector-map-widget' ),
						'label_block' => true,
						'type' => Controls_Manager::URL,
						'placeholder' => esc_html__( 'Enter Button Link', 'elementor-vector-map-widget' ),
						'default' => [
							'url' => '#',
						],
					],
						[
						'name' => 'card_image_description',
						'label' => esc_html__( 'Card Image description', 'elementor-vector-map-widget' ),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => 'Map card image',
						'placeholder' => esc_html__( 'Image description', 'elementor-vector-map-widget' ),
					],
					[
						'name' => 'card_image',
						'label' => esc_html__( 'Country Image', 'elementor-vector-map-widget' ),
						'label_block' => true,
						'type' => Controls_Manager::MEDIA,
						'default' => [ 'url' => Elementor\Utils::get_placeholder_image_src() ],
					],
				],
				'title_field' => '{{{ country_selection }}}',
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'countries_settings', [
				'label' => esc_html__( 'Countries Settings', 'elementor-vector-map-widget' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control (
			'enable_country_color', [
				'label' => esc_html__( 'Enable Country Borders', 'elementor-vector-map-widget' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'elementor-vector-map-widget'),
				'label_off' => esc_html__( 'No', 'elementor-vector-map-widget'),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);

		$this->add_control (
			'country_borders_color', [
				'label' => esc_html__( 'Country Borders Color', 'elementor-vector-map-widget' ),
				'type' => Controls_Manager::COLOR,
				'condition' => [
					'enable_country_color' => 'yes',
				],
				'default' => '#ffffff',
				'selectors' => [ '{{WRAPPER}} #europe-map' => 'stroke: {{VALUE}};', ],		
			]
		);

		$this->add_control (
			'title_color', [
				'label' => esc_html__( 'Title Text Alignment', 'elementor-vector-map-widget' ),
				'label' => esc_html__( 'Title Color', 'elementor-vector-map-widget' ),
				'default' => '#1D2430',
				'type' => Controls_Manager::COLOR,
				'selectors' => [ '{{WRAPPER}} .card-content-title' => 'color: {{VALUE}};', ],
			]
		);

		$this->add_control (
			'content_color', [
				'label' => esc_html__( 'Content Text Alignment', 'elementor-vector-map-widget' ),
				'label' => esc_html__( 'Title Color', 'elementor-vector-map-widget' ),
				'default' => '#1D2430',
				'type' => Controls_Manager::COLOR,
				'selectors' => [ '{{WRAPPER}} .card-content-text' => 'color: {{VALUE}};', ],
			]
		);

		$this->add_control (
			'button_text_color', [
				'label' => esc_html__( 'Button Text Color', 'elementor-vector-map-widget' ),
				'default' => '#1D2430',
				'type' => Controls_Manager::COLOR,
				'selectors' => [ '{{WRAPPER}} .button-text' => 'color: {{VALUE}};', ],
			]
		);

		$this->add_control (
			'button_color', [
			'label' => esc_html__( 'Button Color', 'elementor-vector-map-widget' ),
			'default' => '#ffffff',
			'type' => Controls_Manager::COLOR,
			'selectors' => [ '{{WRAPPER}} .card-button' => 'background-color: {{VALUE}};', ],
			]
		);

		$this->add_control (
		'image_align', [
			'label' => esc_html__( 'Title Image Alignment', 'elementor-vector-map-widget' ),
			'label_block' => true,
			'type' => Controls_Manager::CHOOSE,
			'options' => [
				'left' => [
					'title' => esc_html__( 'Left', 'elementor-vector-map-widget' ),
					'icon' => 'eicon-text-align-left',
				],
				'center' => [
					'title' => esc_html__( 'Center', 'elementor-vector-map-widget' ),
					'icon' => 'eicon-text-align-center',
				],
				'end' => [
					'title' => esc_html__( 'Right', 'elementor-vector-map-widget' ),
					'icon' => 'eicon-text-align-right',
				],
			],
			'default' => 'center',
			'toggle' => false,
			'selectors' => [ '{{WRAPPER}} .map-card-image' => 'align-self: {{VALUE}};', ],
		]
		);

		$this->add_control (
			'title_align', [
				'label' => esc_html__( 'Title Text Alignment', 'elementor-vector-map-widget' ),
				'label_block' => true,
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'elementor-vector-map-widget' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'elementor-vector-map-widget' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'elementor-vector-map-widget' ),
						'icon' => 'eicon-text-align-right',
					],
					'justify' => [
						'title' => esc_html__( 'Justify', 'elementor-vector-map-widget' ),
						'icon' => 'eicon-text-align-justify',
					],
				],
				'default' => 'left',
				'toggle' => false,
				'selectors' => [ '{{WRAPPER}} .card-content-title' => 'text-align: {{VALUE}};', ],
			]
		);

		$this->add_control (
		'content_align', [
			'label' => esc_html__( 'Content Text Alignment', 'elementor-vector-map-widget' ),
			'label_block' => true,
			'type' => Controls_Manager::CHOOSE,
			'options' => [
				'left' => [
					'title' => esc_html__( 'Left', 'elementor-vector-map-widget' ),
					'icon' => 'eicon-text-align-left',
				],
				'center' => [
					'title' => esc_html__( 'Center', 'elementor-vector-map-widget' ),
					'icon' => 'eicon-text-align-center',
				],
				'right' => [
					'title' => esc_html__( 'Right', 'elementor-vector-map-widget' ),
					'icon' => 'eicon-text-align-right',
				],
				'justify' => [
					'title' => esc_html__( 'Justify', 'elementor-vector-map-widget' ),
					'icon' => 'eicon-text-align-justify',
				],
			],
			'default' => 'left',
			'toggle' => false,
			'selectors' => [ '{{WRAPPER}} .card-content-text' => 'text-align: {{VALUE}};', ],
			]
		);

		$this->add_control (
			'button_align', [
			'label' => esc_html__( 'Button Alignment', 'elementor-vector-map-widget' ),
			'label_block' => true,
			'type' => Controls_Manager::CHOOSE,
			'options' => [
				'left' => [
					'title' => esc_html__( 'Left', 'elementor-vector-map-widget' ),
					'icon' => 'eicon-text-align-left',
				],
				'center' => [
					'title' => esc_html__( 'Center', 'elementor-vector-map-widget' ),
					'icon' => 'eicon-text-align-center',
				],
				'right' => [
					'title' => esc_html__( 'Right', 'elementor-vector-map-widget' ),
					'icon' => 'eicon-text-align-right',
				],
			],
			'default' => 'center',
			'toggle' => false,
			'selectors' => [ '{{WRAPPER}} .card-button' => 'text-align: {{VALUE}};', ],
			]
		);

		$this->add_control (
			'title_size', [
				'label' => esc_html__( 'Title Size', 'elementor-vector-map-widget' ),
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
			]
		);

		$this->add_control (
			'content_size', [
				'label' => esc_html__( 'Content Size', 'elementor-vector-map-widget' ),
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
				'selectors' => [ '{{WRAPPER}} .card-content-text' => 'font-size: {{SIZE}}px;', ],
			]
		);

		$this->add_control (
			'button_text_size', [
				'label' => esc_html__( 'Button Text Size', 'elementor-vector-map-widget' ),
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
			]
		);

		$this->add_control (
			'button_text', [
				'label' => esc_html__( 'Button text', 'elementor-vector-map-widget' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Enter Button Text', 'elementor-vector-map-widget' ),
				'default' => 'More info',
			]
		);

		$this->add_control (
			'button_icon', [
				'label_block' => true,
				'type' => Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-arrow-right',
					'library' => 'fa-solid',
				],
			]
		);
		$this->end_controls_section();
	}

  protected function render() { 
		$settings = $this->get_settings_for_display();
		if ( ! $settings['list'] ) { return; }
		$map = plugin_dir_path( __FILE__ ) . '../assets/images/europe.svg'
		?>
		<?php if ( file_exists($map) ) { echo file_get_contents($map); } ?>
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
							<?php echo $settings['button_text']; ?>
							<?php Elementor\Icons_Manager::render_icon( $settings['button_icon'], ['aria-hidden' => 'true'] ); ?>
						</a>
					</div>
				</div>
			</div>
		<?php endforeach; ?>		
	<?
  }
}