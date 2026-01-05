<?php
if(!defined('ABSPATH')) {
  exit;
}

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Repeater;
use Elementor\Utils;
use Elementor\Icons_Manager;

class Elementor_Vector_Map_Widget extends Widget_Base {
  public function get_name() {
	return 'Vector Map';
  }

  public function get_title() {
	return esc_html__( 'Vector Map', 'custom-elementor-widget' );
  }

  public function get_icon() {
	return 'eicon-header';
  }

  public function get_categories() {
	return ["world"];
  }

  public function get_keywords() {
	return ['card', 'map', 'country', 'world', 'vector'];
  }

  protected function register_controls() {
	$this->start_controls_section(
	  'section_content',
	  [
		'label' => esc_html__( 'Content', 'custom-elementor-widget' ),
		'tab' => Controls_Manager::TAB_CONTENT,
	  ]
	);

	$this->add_control(
	  'widget_color',
	  [
		'label' => esc_html__( 'Map Background Color', 'custom-elementor-widget' ),
		'type' => Controls_Manager::COLOR,
		'default' => '#ffffff',
		'selectors' => [
	      '{{WRAPPER}}' => 'background-color: {{VALUE}};',
		],		
	  ]
	);

	$this->add_control(
	  'list',
	  [
		'label' => esc_html__( 'Countries', 'custom-elementor-widget' ),
		'type' => Controls_Manager::REPEATER,
		'fields' => [
	      [
			'name' => 'country_selection',
			'label' => esc_html__( 'Select Country', 'custom-elementor-widget' ),
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
			  'Slovakia' => esc_html__( 'Slovakia'),
			  'Slovenia' => esc_html__( 'Slovenia' ),
			  'Portugal' => esc_html__( 'Portugal' ),
			  'Netherlands' => esc_html__( 'Netherlands' ),
			  'Greece' => esc_html__( 'Greece' ),
			  'Belgium' => esc_html__( 'Belgium' ),
			  'Serbia' => esc_html__( 'Serbia' ),
			  'Romania' => esc_html__( 'Romania'),
			  'Macedonia' => esc_html__( 'Macedonia' ),
			  'Montenegro' => esc_html__( 'Montenegro' ),
			  'Moldova' => esc_html__( 'Moldova' ),
			  'Latvia' => esc_html__( 'Latvia' ),
			  'Kosovo' => esc_html__( 'Kosovo' ),
			  'Ireland' => esc_html__( 'Ireland' ),
			  'Hungary' => esc_html__( 'Hungary' ),
			  'Croatia' => esc_html__( 'Croatia' ),
			  'Georgia' => esc_html__( 'Georgia' ),
			  'Estonia' => esc_html__( 'Estonia'),
			  'Denmark' => esc_html__( 'Denmark'),
			  'CzechRepublic' => esc_html__( 'CzechRepublic' ),
			  'Switzerland' => esc_html__( 'Switzerland'),
			  'Bulgaria' => esc_html__( 'Bulgaria' ),
			  'Bosnia' => esc_html__( 'Bosnia' ),
			  'Austria' => esc_html__( 'Austria' ),
			  'Albania' => esc_html__( 'Albania' ),
			],
			  'default' => 'Lithuania',
		  ],
		  [
			'name' => 'card_image',
			'label' => esc_html__( 'Choose Image', 'custom-elementor-widget' ),
			'label_block' => true,
		      'type' => Controls_Manager::MEDIA,
			  'default' => [
				'url' => Utils::get_placeholder_image_src(),
			  ],
		  ],
		  [
			'name' => 'title_text',
			'label' => esc_html__( 'Card Title', 'custom-elementor-widget' ),
			'type' => Controls_Manager::TEXT,
			'default' => 'Pavadinimas',
			'placeholder' => esc_html__( 'Enter Title', 'custom-elementor-widget' ),
		  ],
		  [
			'name' => 'title_align',
			'label' => __( 'Title Text Alignment', 'custom-elementor-widget' ),
			'label_block' => true,
			'type' => Controls_Manager::CHOOSE,
		      'options' => [
				'left' => [
			      'title' => __( 'Left', 'custom-elementor-widget' ),
				  'icon' => 'eicon-text-align-left',
				],
				'center' => [
				  'title' => __( 'Center', 'custom-elementor-widget' ),
				  'icon' => 'eicon-text-align-center',
				],
				'right' => [
				  'title' => __( 'Right', 'custom-elementor-widget' ),
				  'icon' => 'eicon-text-align-right',
				],
				'justify' => [
				  'title' => __( 'Justify', 'custom-elementor-widget' ),
				  'icon' => 'eicon-text-align-justify',
				],
      ],
	  	'default' => 'left',
	  	'toggle' => false,
		  ],
		  [
			'name' => 'title_color',
			'label' => esc_html__( 'Title Color', 'custom-elementor-widget' ),
			'default' => '#1D2430',
			'type' => Controls_Manager::COLOR,
		  ],
		  [
		    'name' => 'title_size',
		    'label' => esc_html__( 'Title Size', 'custom-elementor-widget' ),
		    'label_block' => true,
		    'type' => Controls_Manager::SLIDER,
			  'default' => [
				'unit' => 'px',
				'size' => 16,
			  ],
		    'range' => [
		      'px' => [
				'min' => 10,
				'max' => 100,
			  ],
			],
		  ],
		  [
		    'name' => 'content_text',
		    'label' => esc_html__( 'Card content', 'custom-elementor-widget' ),
		    'type' => Controls_Manager::TEXT,
		    'default' => 'Description',
		    'placeholder' => esc_html__( 'Enter Content', 'custom-elementor-widget' ),
		  ],
		  [
		    'name' => 'content_align',
		    'label' => __( 'Content Alignment', 'custom-elementor-widget' ),
		    'label_block' => true,
		    'type' => Controls_Manager::CHOOSE,
		    'options' => [
		      'left' => [
			    'title' => __( 'Left', 'custom-elementor-widget' ),
			    'icon' => 'eicon-text-align-left',
			  ],
			  'center' => [
			    'title' => __( 'Center', 'custom-elementor-widget' ),
			    'icon' => 'eicon-text-align-center',
			  ],
			  'right' => [
			    'title' => __( 'Right', 'custom-elementor-widget' ),
			    'icon' => 'eicon-text-align-right',
			  ],
			  'justify' => [
			    'title' => __( 'Justify', 'custom-elementor-widget' ),
			    'icon' => 'eicon-text-align-justify',
			  ],
			],
			  'default' => 'left',
			  'toggle' => false,
		  ],
		  [
		    'name' => 'content_color',
		    'label' => esc_html__( 'Content Color', 'custom-elementor-widget' ),
		    'default' => '#9EA7B5',
		    'type' => Controls_Manager::COLOR,
		  ],
		  [
		    'name' => 'content_size',
		    'label' => esc_html__( 'Content Size', 'custom-elementor-widget' ),
		    'label_block' => true,
		    'type' => Controls_Manager::SLIDER,
		    'default' => [
		      'unit' => 'px',
		      'size' => 14,
		    ],
			'range' => [
			  'px' => [
			    'min' => 10,
			    'max' => 100,
			  ],
			],
		  ],
		  [
		    'name' => 'button_text',
		    'label' => esc_html__( 'Button text', 'custom-elementor-widget' ),
		    'type' => Controls_Manager::TEXT,
		    'placeholder' => esc_html__( 'Enter Button Text', 'custom-elementor-widget' ),
		    'default' => 'More info',
		  ],
		  [
		    'name' => 'button_text_size',
		    'label' => esc_html__( 'Button Text Size', 'custom-elementor-widget' ),
		    'label_block' => true,
		    'type' => Controls_Manager::SLIDER,
		    'default' => [
			  'unit' => 'px',
			  'size' => 14,
			],
			'range' => [
			  'px' => [
			    'min' => 10,
			    'max' => 100,
			  ],
			],
		  ],
		  [
		    'name' => 'button_text_color',
		    'label' => esc_html__( 'Button Text Color', 'custom-elementor-widget' ),
		    'default' => '#1D2430',
		    'type' => Controls_Manager::COLOR,
		  ],
		  [
		    'name' => 'button_color',
		    'label' => esc_html__( 'Button Color', 'custom-elementor-widget' ),
		    'default' => '#ffffff',
		    'type' => Controls_Manager::COLOR,
		  ],
		  [
		    'name' => 'button_link',
		    'label' => esc_html__( 'Button Link', 'custom-elementor-widget' ),
		    'label_block' => true,
		    'type' => Controls_Manager::URL,
		    'placeholder' => esc_html__( 'Enter Button Link', 'custom-elementor-widget' ),
		    'default' => [
              'url' => '#',
            ],
		  ],
		  [
		    'name' => 'button_icon',
		    'label' => esc_html__( 'Button icon', 'custom-elementor-widget' ),
		    'label_block' => true,
		    'type' => Controls_Manager::ICONS,
		    'default' => [
		  	  'value' => 'fas fa-egg',
			  'library' => 'fa-solid',
		    ],
		  ],
		],
		'title_field' => '{{{ country_selection }}}',
	  ]
	  );
	$this->end_controls_section();
  }

  protected function render() { 
	$settings = $this->get_settings_for_display();
	if ( ! $settings['list'] ) {
      return;
	}
	$map = plugin_dir_path(__FILE__) . '../assets/images/europe.svg'
	?>

	<div class="map-container">
	  <?php
	    if (file_exists($map)) {
		  echo file_get_contents($map);
	    }
	  ?>
	</div>
	<?php foreach ( $settings['list'] as $index => $item ) : ?>
	  <div class="map-card <?php echo $item['country_selection']; ?> " >
	    <div class="map-card-image">
		  <img src=<?php echo esc_url($item['card_image']['url'] ) ?> alt="foto" title="" />
		</div>
		<div class="card-content">
		  <div class="card-text">
			<div class="card-content-title" style="
			  color: <?php echo esc_attr( $item['title_color'] ); ?>; 
			  text-align: <?php echo esc_attr( $item['title_align'] ); ?>;
			  font-size: <?php echo esc_attr( $item['title_size']['size'] ); ?>px;">
			  <?php echo $item['title_text']; ?>
		  	</div>
			<div class="card-content-text" style="
			  color: <?php echo esc_attr( $item['content_color'] ); ?>; 
			  text-align: <?php echo esc_attr( $item['content_align'] ); ?>;
			  font-size: <?php echo esc_attr( $item['content_size']['size'] ); ?>px;">
			  <?php echo $item['content_text']; ?>
		    </div>
		  </div>
		  <div class="card-button" style="background-color:<?php echo esc_attr( $item['button_color'] ); ?>">
			<a class="button-text" style="
		      color: <?php echo esc_attr( $item['button_text_color'] ); ?>;
			  font-size: <?php echo esc_attr( $item['button_text_size']['size'] ); ?>px;"
			  href="<?php echo esc_attr($item['button_link']['url']); ?>">
			  <?php echo $item['button_text']; ?>
			  <?php Icons_Manager::render_icon( $item['button_icon'], [ 'aria-hidden' => 'true' ] ); ?>
			</a>
		  </div>
		</div>
	  </div>
	<?php endforeach; ?>
    <?
  }
}