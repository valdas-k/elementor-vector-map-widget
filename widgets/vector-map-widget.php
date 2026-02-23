<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

class Elementor_Vector_Map_Widget extends Elementor\Widget_Base {
	public function get_name(): string { return 'Vector Map'; }
	public function get_title(): string { return esc_html__( 'Vector Map', 'elementor-vector-map-widget' ); }
	public function get_icon(): string { return 'eicon-map-pin'; }
	public function get_categories(): array { return [ 'layout' ]; }
	public function get_keywords(): array { return [ 'card', 'map', 'country', 'world', 'vector' ]; }
	public function get_custom_help_url(): string { return 'https://github.com/valdas-k'; }
	public function has_widget_inner_wrapper(): bool { return false; }
	protected function is_dynamic_content(): bool { return false; }

  protected function register_controls(): void {
		$this->start_controls_section(
			'countries_content', [
				'label' => esc_html__( 'Countries', 'elementor-vector-map-widget' ),
				'tab' => Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'countries_repeater', [
				'type' => Elementor\Controls_Manager::REPEATER,
				'fields' => [
					[
						'name' => 'country',
						'label' => esc_html__( 'Country', 'elementor-vector-map-widget' ),
						'type' => Elementor\Controls_Manager::SELECT,
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
							'Latvia' => esc_html__( 'Latvia' ),
							'Estonia' => esc_html__( 'Estonia'),
							'Denmark' => esc_html__( 'Denmark'),
							'Finland' => esc_html__( 'Finland'),
						],
						'default' => 'Lithuania',
					],
					[
						'name' => 'title',
						'label' => esc_html__( 'Title', 'elementor-vector-map-widget' ),
						'type' => Elementor\Controls_Manager::TEXT,
						'default' => esc_html__( 'Title', 'elementor-vector-map-widget' ),
						'placeholder' => esc_html__( 'Title', 'elementor-vector-map-widget' ),
					],
					[
						'name' => 'description',
						'label' => esc_html__( 'Description', 'elementor-vector-map-widget' ),
						'type' => Elementor\Controls_Manager::TEXT,
						'default' => esc_html__( 'Description', 'elementor-vector-map-widget' ),
						'placeholder' => esc_html__( 'Description', 'elementor-vector-map-widget' ),
					],
					[
						'name' => 'link',
						'label' => esc_html__( 'Button link', 'elementor-vector-map-widget' ),
						'type' => Elementor\Controls_Manager::URL,
						'placeholder' => esc_html__( 'Button link', 'elementor-vector-map-widget' ),
						'default' => [
							'url' => 'https://google.com',
						],
					],
						[
						'name' => 'image_description',
						'label' => esc_html__( 'Image description', 'elementor-vector-map-widget' ),
						'type' => Elementor\Controls_Manager::TEXT,
						'default' => esc_html__( 'Image description', 'elementor-vector-map-widget' ),
						'placeholder' => esc_html__( 'Image description', 'elementor-vector-map-widget' ),
					],
					[
						'name' => 'image',
						'label' => esc_html__( 'Image', 'elementor-vector-map-widget' ),
						'type' => Elementor\Controls_Manager::MEDIA,
						'default' => [ 'url' => Elementor\Utils::get_placeholder_image_src() ],
					],
				],
				'title_field' => '{{{ country }}}',
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'countries_settings', [
				'label' => esc_html__( 'Countries Settings', 'elementor-vector-map-widget' ),
				'tab' => Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'enable_borders', [
				'label' => esc_html__( 'Enable country borders', 'elementor-vector-map-widget' ),
				'type' => Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'elementor-vector-map-widget' ),
				'label_off' => esc_html__( 'No', 'elementor-vector-map-widget' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);

		$this->add_control(
			'borders_color', [
				'label' => esc_html__( 'Country borders color', 'elementor-vector-map-widget' ),
				'type' => Elementor\Controls_Manager::COLOR,
				'condition' => [
					'enable_borders' => 'yes',
				],
				'default' => 'azure',
				'selectors' => [ '{{WRAPPER}} #europe-map' => 'stroke: {{VALUE}};', ],		
			]
		);

		$this->add_control(
			'title_color', [
				'label' => esc_html__( 'Title color', 'elementor-vector-map-widget' ),
				'default' => '#25282eff',
				'type' => Elementor\Controls_Manager::COLOR,
				'selectors' => [ '{{WRAPPER}} .pin-title' => 'color: {{VALUE}};', ],
			]
		);

		$this->add_control(
			'description_color', [
				'label' => esc_html__( 'Description color', 'elementor-vector-map-widget' ),
				'default' => '#25282eff',
				'type' => Elementor\Controls_Manager::COLOR,
				'selectors' => [ '{{WRAPPER}} .pin-description' => 'color: {{VALUE}};', ],
			]
		);

		$this->add_control(
			'button_text_color', [
				'label' => esc_html__( 'Button text color', 'elementor-vector-map-widget' ),
				'default' => '#25282eff',
				'type' => Elementor\Controls_Manager::COLOR,
				'selectors' => [ '{{WRAPPER}} .pin-button' => 'color: {{VALUE}};', ],
			]
		);

		$this->add_control(
			'image_align', [
				'label' => esc_html__( 'image alignment', 'elementor-vector-map-widget' ),
				'type' => Elementor\Controls_Manager::CHOOSE,
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
				'selectors' => [ '{{WRAPPER}} .pin-image' => 'align-self: {{VALUE}};', ],
			]
		);

		$this->add_control(
			'title_align', [
				'label' => esc_html__( 'Title alignment', 'elementor-vector-map-widget' ),
				'type' => Elementor\Controls_Manager::CHOOSE,
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
				'selectors' => [ '{{WRAPPER}} .pin-title' => 'text-align: {{VALUE}};', ],
			]
		);

		$this->add_control(
			'description_align', [
				'label' => esc_html__( 'Description alignment', 'elementor-vector-map-widget' ),
				'type' => Elementor\Controls_Manager::CHOOSE,
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
				'selectors' => [ '{{WRAPPER}} .pin-description' => 'text-align: {{VALUE}};', ],
			]
		);

		$this->add_control(
			'button_align', [
				'label' => esc_html__( 'Button alignment', 'elementor-vector-map-widget' ),
				'type' => Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'start' => [
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
				'default' => 'start',
				'toggle' => false,
				'selectors' => [ '{{WRAPPER}} .pin-button' => 'justify-content: {{VALUE}};', ],
			]
		);

		$this->add_control(
			'title_size', [
				'label' => esc_html__( 'Title size', 'elementor-vector-map-widget' ),
				'type' => Elementor\Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 8,
						'max' => 36,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 18,
				],
				'selectors' => [ '{{WRAPPER}} .pin-title' => 'font-size: {{SIZE}}px;', ],
			]
		);

		$this->add_control(
			'description_size', [
				'label' => esc_html__( 'Description size', 'elementor-vector-map-widget' ),
				'type' => Elementor\Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 8,
						'max' => 36,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 16,
				],
				'selectors' => [ '{{WRAPPER}} .pin-description' => 'font-size: {{SIZE}}px;', ],
			]
		);

		$this->add_control(
			'button_text_size', [
				'label' => esc_html__( 'Button text size', 'elementor-vector-map-widget' ),
				'type' => Elementor\Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 8,
						'max' => 36,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 14,
				],
				'selectors' => [ '{{WRAPPER}} .pin-button' => 'font-size: {{SIZE}}px;', ],
			]
		);

		$this->add_control(
			'button_text', [
				'label' => esc_html__( 'Button text', 'elementor-vector-map-widget' ),
				'type' => Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Button text', 'elementor-vector-map-widget' ),
				'default' => esc_html__( 'More info', 'elementor-vector-map-widget' ),
			]
		);

		$this->add_control(
			'button_icon', [
				'label' => esc_html__( 'Button icon', 'elementor-vector-map-widget' ),
				'type' => Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-arrow-right',
					'library' => 'fa-solid',
				],
			]
		);
		$this->end_controls_section();
	}

  protected function render(): void { 
		$settings = $this->get_settings_for_display();
		if ( ! $settings['countries_repeater'] ) { return; }
		$map = plugin_dir_path( __FILE__ ) . '../assets/images/europe-vector-map.svg';
		?>
		<?php if ( file_exists( $map ) ) { echo file_get_contents( $map ); } ?>
		<?php foreach ( $settings['countries_repeater'] as $index => $pin ) : ?>
			<div class="map-pin <?php echo $pin['country']; ?>" >
				<img src="<?php echo esc_url( $pin['image']['url'] )?>"
					alt="<?php echo $pin['image_description']; ?>"
					class="pin-image"/>
				<div class="pin-content">
					<p class="pin-title"><?php echo $pin['title']; ?></p>
					<p class="pin-description"><?php echo $pin['description']; ?></p>
					<a class="pin-button" href="<?php echo esc_attr( $pin['link']['url'] ); ?>">
						<?php echo $settings['button_text']; ?>
						<?php Elementor\Icons_Manager::render_icon( $settings['button_icon'], ['aria-hidden' => 'true'] ); ?>
					</a>
				</div>
			</div>
		<?php endforeach; ?>		
	<?
  }
}