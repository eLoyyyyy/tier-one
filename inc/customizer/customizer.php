<?php
function tierone_customize_register($wp_customize)
{
	/**
	 * Header Settings Panel
	 */
	$wp_customize->add_panel( 
		'tierone_header_settings', 
		array(
			'title' => __( 'Header Settings', 'tierone' ),
			'description' => __( 'Use this panel to set your header settings', 'tierone' ),
			'priority' => 25, 
		) 
	);


	// Logo image
    $wp_customize->add_setting(
        'site_logo',
        array(
            'sanitize_callback' => 'tierone_sanitize_image'
        ) 
    ); 
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'site_logo',
            array(
                'label'         => __( 'Site Logo', 'tierone' ),
                'section'       => 'title_tagline',
                'settings'      => 'site_logo',
                'description' 	=> __( 'Upload a logo for your website. Recommended height for your logo is 135px.', 'tierone' ),
            )
        )
    );

    // Logo, title and description chooser
    $wp_customize->add_setting(
        'site_title_option',
        array (
            'default'           => 'text-only',
            'sanitize_callback' => 'tierone_sanitize_logo_title_select',
            'transport'         => 'refresh'
        )
    );
    $wp_customize->add_control(
        'site_title_option',
        array(
            'label'     	=> __( 'Display site title / logo.', 'tierone' ),
            'section'   	=> 'title_tagline',
            'type'      	=> 'radio',
            'description'	=> __( 'Choose your preferred option.', 'tierone' ),
            'choices'   => array (
                'text-only' 	=> __( 'Display site title and description only.', 'tierone' ),
                'logo-only'     => __( 'Display site logo image only.', 'tierone' ),
                'text-logo'		=> __( 'Display both site title and logo image.', 'tierone' ),
                'display-none'	=> __( 'Display none', 'tierone' )
            )
        )
    );

   /* // Site favicon
	$wp_customize->add_setting(
        'site_favicon',
        array(
            'sanitize_callback' => 'tierone_sanitize_image'
        ) 
    ); 
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'site_favicon',
            array(
                'label'         => __( 'Upload a favicon', 'tierone' ),
                'section'       => 'title_tagline',
                'settings'      => 'site_favicon',
                'description' 	=> __( 'Upload a favicon for your website.', 'tierone' ),
            )
        )
    );

    // Display site favicon?
    $wp_customize->add_setting(
		'display_site_favicon',
		array(
			'default'			=> false,
			'sanitize_callback'	=> 'tierone_sanitize_checkbox'
		)
	);
    $wp_customize->add_control(
		'display_site_favicon',
		array(
			'settings'		=> 'display_site_favicon',
			'section'		=> 'title_tagline',
			'type'			=> 'checkbox',
			'label'			=> __( 'Display site favicon?', 'tierone' ),
		)
	);*/
}
add_action( 'customize_register', 'tierone_customize_register' );




function tierone_sanitize_image( $image, $setting ) {
	/*
	 * Array of valid image file types.
	 *
	 * The array includes image mime types that are included in wp_get_mime_types()
	 */
    $mimes = array(
        'jpg|jpeg|jpe' => 'image/jpeg',
        'gif'          => 'image/gif',
        'png'          => 'image/png',
        'bmp'          => 'image/bmp',
        'tif|tiff'     => 'image/tiff',
        'ico'          => 'image/x-icon'
    );
	// Return an array with file extension and mime_type.
    $file = wp_check_filetype( $image, $mimes );
	// If $image has a valid mime_type, return it; otherwise, return the default.
    return ( $file['ext'] ? $image : $setting->default );
}

function tierone_sanitize_logo_title_select( $logo_option ) {
	if ( ! in_array( $logo_option, array( 'text-only', 'logo-only', 'text-logo', 'display-none' ) ) ) {
        $logo_option = 'text-description-only';
    } 

    return $logo_option;
}

/**
 * Checkbox sanitization.
 */
function tierone_sanitize_checkbox( $checked ) {
	// Boolean check.
	return ( ( isset( $checked ) && true == $checked ) ? true : false );
}



function my_customizer_social_media_array() {
 
    /* store social site names in array */
    $social_sites = array('facebook', 'twitter', 'pinterest', 'google-plus', 'youtube','linkedin');
 
    return $social_sites;
}

/* add settings to create various social media text areas. */
add_action('customize_register', 'my_add_social_sites_customizer');
 
function my_add_social_sites_customizer($wp_customize) {
 
    $wp_customize->add_section( 'my_social_settings', array(
            'title'    => __('Social Media Icons', 'text-domain'),
            'priority' => 35,
    ) );
 
    $social_sites = my_customizer_social_media_array();
    $priority = 5;
 
    foreach($social_sites as $social_site) {
 
        $wp_customize->add_setting( "$social_site", array(
                'type'              => 'theme_mod',
                'capability'        => 'edit_theme_options',
                'sanitize_callback' => 'esc_url_raw'
        ) );
 
        $wp_customize->add_control( $social_site, array(
                'label'    => __( "$social_site url:", 'text-domain' ),
                'section'  => 'my_social_settings',
                'type'     => 'text',
                'priority' => $priority,
        ) );
 
        $priority = $priority + 5;
    }
}

/* takes user input from the customizer and outputs linked social media icons */
function my_social_media_icons() {
 
    $social_sites = my_customizer_social_media_array();
 
    /* any inputs that aren't empty are stored in $active_sites array */
    foreach($social_sites as $social_site) {
        if( strlen( get_theme_mod( $social_site ) ) > 0 ) {
            $active_sites[] = $social_site;
        }
    }
 
    /* for each active social site, add it as a list item */
        if ( ! empty( $active_sites ) ) {
 
            echo "<ul class='social-media-icons'>";
 
            foreach ( $active_sites as $active_site ) {
 
                /* setup the class */
                $class = 'fa fa-' . $active_site;
 
                if ( $active_site == 'email' ) {
                    ?>
                    <li>
                        <a class="email" target="_blank" href="mailto:<?php echo antispambot( is_email( get_theme_mod( $active_site ) ) ); ?>">
                            <i class="fa fa-envelope" title="<?php _e('email icon', 'text-domain'); ?>"></i>
                        </a>
                    </li>
                <?php } else { ?>
                    <li>
                        <a class="<?php echo $active_site; ?>" target="_blank" href="<?php echo esc_url( get_theme_mod( $active_site) ); ?>">
                            <i class="<?php echo esc_attr( $class ); ?>" title="<?php printf( __('%s icon', 'text-domain'), $active_site ); ?>"></i>
                        </a>
                    </li>
                <?php
                }
            }
            echo "</ul>";
        }
}