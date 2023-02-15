<?php


/****************************************
 * add settings page for this plugin
****************************************/


class MySettingsPage
{
	/**
	 * Holds the values to be used in the fields callbacks
	 */
	private $options;


	/**
	 * Start up
	 */
	public function __construct()
	{
		add_action( 'admin_menu', array( $this, 'add_plugin_page' ) );
		add_action( 'admin_init', array( $this, 'page_init' ) );
	}

	/**
	 * Add options page
	 */
	public function add_plugin_page()
	{
		// This page will be under "Settings"
		add_options_page(
			'Pro Filter Settings',
			'Pro Filter Settings',
			'manage_options',
			'pro_filter',
			array( $this, 'create_admin_page' )
		);
	}

	/**
	 * Options page callback
	 */
	public function create_admin_page()
	{
		// Set class property
		$this->options = get_option( 'pro_filter' );
		?>
		<div class="wrap">
			<h1>Property Filter Settings</h1>
			<form method="post" action="options.php">
				<?php
				// This prints out all hidden setting fields
				settings_fields( 'my_option_group' );
				do_settings_sections( 'pro_filter' );
				submit_button();
				?>
			</form>
		</div>
		<?php
	}

	/**
	 * Register and add settings
	 */
	public function page_init()
	{
		register_setting(
			'my_option_group', // Option group
			'pro_filter', // Option name
			array( $this, 'sanitize' ) // Sanitize
		);

		add_settings_section(
			'setting_section_id', // ID
			'Projects Archive Settings', // Title
			array( $this, 'print_section_info' ), // Callback
			'pro_filter' // Page
		);


		add_settings_field(
			'banner_image_url',
			'Banner Image url',
			array( $this, 'banner_image_url_callback' ),
			'pro_filter',
			'setting_section_id'
		);
		
		add_settings_field(
			'projects_title',
			'Projects Title',
			array( $this, 'projects_title_callback' ),
			'pro_filter',
			'setting_section_id'
		);
	
	}

	/**
	 * Sanitize each setting field as needed
	 *
	 * @param array $input Contains all settings fields as array keys
	 */
	public function sanitize( $input )
	{
		$new_input = array();

		if( isset( $input['banner_image_url'] ) )
			$new_input['banner_image_url'] = sanitize_text_field( $input['banner_image_url'] );
		
		if( isset( $input['projects_title'] ) )
			$new_input['projects_title'] = sanitize_text_field( $input['projects_title'] );



		return $new_input;
	}

	/**
	 * Print the Section text
	 */
	public function print_section_info()
	{
		print '';
	}


	/**
	 * Get the settings option array and print one of its values
	 */
	public function banner_image_url_callback()
	{
		printf(
			'<input type="text" id="banner_image_url" name="pro_filter[banner_image_url]" value="%s" />',
			isset( $this->options['banner_image_url'] ) ? esc_attr( $this->options['banner_image_url']) : ''
		);

	}
	
	/**
	 * Get the settings option array and print one of its values
	 */
	public function projects_title_callback()
	{
		printf(
			'<input type="text" id="projects_title" name="pro_filter[projects_title]" value="%s" />',
			isset( $this->options['projects_title'] ) ? esc_attr( $this->options['projects_title']) : ''
		);

	}



}

if( is_admin() )
	$my_settings_page = new MySettingsPage();
