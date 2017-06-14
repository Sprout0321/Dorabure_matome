<?php
/**
 * Internationalization helper.
 *
 * @package     Kirki
 * @category    Core
 * @author      Aristeides Stathopoulos
 * @copyright   Copyright (c) 2016, Aristeides Stathopoulos
 * @license     http://opensource.org/licenses/https://opensource.org/licenses/MIT
 * @since       1.0
 */

if ( ! class_exists( 'Kirki_l10n' ) ) {

	/**
	 * Handles translations
	 */
	class Kirki_l10n {

		/**
		 * The plugin textdomain
		 *
		 * @access protected
		 * @var string
		 */
		protected $textdomain = 'kirki';

		/**
		 * The class constructor.
		 * Adds actions & filters to handle the rest of the methods.
		 *
		 * @access public
		 */
		public function __construct() {

			add_action( 'plugins_loaded', array( $this, 'load_textdomain' ) );

		}

		/**
		 * Load the plugin textdomain
		 *
		 * @access public
		 */
		public function load_textdomain() {

			if ( null !== $this->get_path() ) {
				load_textdomain( $this->textdomain, $this->get_path() );
			}
			load_plugin_textdomain( $this->textdomain, false, Kirki::$path . '/languages' );

		}

		/**
		 * Gets the path to a translation file.
		 *
		 * @access protected
		 * @return string Absolute path to the translation file.
		 */
		protected function get_path() {
			$path_found = false;
			$found_path = null;
			foreach ( $this->get_paths() as $path ) {
				if ( $path_found ) {
					continue;
				}
				$path = wp_normalize_path( $path );
				if ( file_exists( $path ) ) {
					$path_found = true;
					$found_path = $path;
				}
			}

			return $found_path;

		}

		/**
		 * Returns an array of paths where translation files may be located.
		 *
		 * @access protected
		 * @return array
		 */
		protected function get_paths() {

			return array(
				WP_LANG_DIR . '/' . $this->textdomain . '-' . get_locale() . '.mo',
				Kirki::$path . '/languages/' . $this->textdomain . '-' . get_locale() . '.mo',
			);

		}

		/**
		 * Shortcut method to get the translation strings
		 *
		 * @static
		 * @access public
		 * @param string $config_id The config ID. See Kirki_Config.
		 * @return array
		 */
		public static function get_strings( $config_id = 'global' ) {

			$translation_strings = array(
				'background-color'      => esc_attr__( 'Background Color', 'the-best-blog' ),
				'background-image'      => esc_attr__( 'Background Image', 'the-best-blog' ),
				'no-repeat'             => esc_attr__( 'No Repeat', 'the-best-blog' ),
				'repeat-all'            => esc_attr__( 'Repeat All', 'the-best-blog' ),
				'repeat-x'              => esc_attr__( 'Repeat Horizontally', 'the-best-blog' ),
				'repeat-y'              => esc_attr__( 'Repeat Vertically', 'the-best-blog' ),
				'inherit'               => esc_attr__( 'Inherit', 'the-best-blog' ),
				'background-repeat'     => esc_attr__( 'Background Repeat', 'the-best-blog' ),
				'cover'                 => esc_attr__( 'Cover', 'the-best-blog' ),
				'contain'               => esc_attr__( 'Contain', 'the-best-blog' ),
				'background-size'       => esc_attr__( 'Background Size', 'the-best-blog' ),
				'fixed'                 => esc_attr__( 'Fixed', 'the-best-blog' ),
				'scroll'                => esc_attr__( 'Scroll', 'the-best-blog' ),
				'background-attachment' => esc_attr__( 'Background Attachment', 'the-best-blog' ),
				'left-top'              => esc_attr__( 'Left Top', 'the-best-blog' ),
				'left-center'           => esc_attr__( 'Left Center', 'the-best-blog' ),
				'left-bottom'           => esc_attr__( 'Left Bottom', 'the-best-blog' ),
				'right-top'             => esc_attr__( 'Right Top', 'the-best-blog' ),
				'right-center'          => esc_attr__( 'Right Center', 'the-best-blog' ),
				'right-bottom'          => esc_attr__( 'Right Bottom', 'the-best-blog' ),
				'center-top'            => esc_attr__( 'Center Top', 'the-best-blog' ),
				'center-center'         => esc_attr__( 'Center Center', 'the-best-blog' ),
				'center-bottom'         => esc_attr__( 'Center Bottom', 'the-best-blog' ),
				'background-position'   => esc_attr__( 'Background Position', 'the-best-blog' ),
				'background-opacity'    => esc_attr__( 'Background Opacity', 'the-best-blog' ),
				'on'                    => esc_attr__( 'ON', 'the-best-blog' ),
				'off'                   => esc_attr__( 'OFF', 'the-best-blog' ),
				'all'                   => esc_attr__( 'All', 'the-best-blog' ),
				'cyrillic'              => esc_attr__( 'Cyrillic', 'the-best-blog' ),
				'cyrillic-ext'          => esc_attr__( 'Cyrillic Extended', 'the-best-blog' ),
				'devanagari'            => esc_attr__( 'Devanagari', 'the-best-blog' ),
				'greek'                 => esc_attr__( 'Greek', 'the-best-blog' ),
				'greek-ext'             => esc_attr__( 'Greek Extended', 'the-best-blog' ),
				'khmer'                 => esc_attr__( 'Khmer', 'the-best-blog' ),
				'latin'                 => esc_attr__( 'Latin', 'the-best-blog' ),
				'latin-ext'             => esc_attr__( 'Latin Extended', 'the-best-blog' ),
				'vietnamese'            => esc_attr__( 'Vietnamese', 'the-best-blog' ),
				'hebrew'                => esc_attr__( 'Hebrew', 'the-best-blog' ),
				'arabic'                => esc_attr__( 'Arabic', 'the-best-blog' ),
				'bengali'               => esc_attr__( 'Bengali', 'the-best-blog' ),
				'gujarati'              => esc_attr__( 'Gujarati', 'the-best-blog' ),
				'tamil'                 => esc_attr__( 'Tamil', 'the-best-blog' ),
				'telugu'                => esc_attr__( 'Telugu', 'the-best-blog' ),
				'thai'                  => esc_attr__( 'Thai', 'the-best-blog' ),
				'serif'                 => _x( 'Serif', 'font style', 'the-best-blog' ),
				'sans-serif'            => _x( 'Sans Serif', 'font style', 'the-best-blog' ),
				'monospace'             => _x( 'Monospace', 'font style', 'the-best-blog' ),
				'font-family'           => esc_attr__( 'Font Family', 'the-best-blog' ),
				'font-size'             => esc_attr__( 'Font Size', 'the-best-blog' ),
				'font-weight'           => esc_attr__( 'Font Weight', 'the-best-blog' ),
				'line-height'           => esc_attr__( 'Line Height', 'the-best-blog' ),
				'font-style'            => esc_attr__( 'Font Style', 'the-best-blog' ),
				'letter-spacing'        => esc_attr__( 'Letter Spacing', 'the-best-blog' ),
				'top'                   => esc_attr__( 'Top', 'the-best-blog' ),
				'bottom'                => esc_attr__( 'Bottom', 'the-best-blog' ),
				'left'                  => esc_attr__( 'Left', 'the-best-blog' ),
				'right'                 => esc_attr__( 'Right', 'the-best-blog' ),
				'center'                => esc_attr__( 'Center', 'the-best-blog' ),
				'justify'               => esc_attr__( 'Justify', 'the-best-blog' ),
				'color'                 => esc_attr__( 'Color', 'the-best-blog' ),
				'add-image'             => esc_attr__( 'Add Image', 'the-best-blog' ),
				'change-image'          => esc_attr__( 'Change Image', 'the-best-blog' ),
				'no-image-selected'     => esc_attr__( 'No Image Selected', 'the-best-blog' ),
				'add-file'              => esc_attr__( 'Add File', 'the-best-blog' ),
				'change-file'           => esc_attr__( 'Change File', 'the-best-blog' ),
				'no-file-selected'      => esc_attr__( 'No File Selected', 'the-best-blog' ),
				'remove'                => esc_attr__( 'Remove', 'the-best-blog' ),
				'select-font-family'    => esc_attr__( 'Select a font-family', 'the-best-blog' ),
				'variant'               => esc_attr__( 'Variant', 'the-best-blog' ),
				'subsets'               => esc_attr__( 'Subset', 'the-best-blog' ),
				'size'                  => esc_attr__( 'Size', 'the-best-blog' ),
				'height'                => esc_attr__( 'Height', 'the-best-blog' ),
				'spacing'               => esc_attr__( 'Spacing', 'the-best-blog' ),
				'ultra-light'           => esc_attr__( 'Ultra-Light 100', 'the-best-blog' ),
				'ultra-light-italic'    => esc_attr__( 'Ultra-Light 100 Italic', 'the-best-blog' ),
				'light'                 => esc_attr__( 'Light 200', 'the-best-blog' ),
				'light-italic'          => esc_attr__( 'Light 200 Italic', 'the-best-blog' ),
				'book'                  => esc_attr__( 'Book 300', 'the-best-blog' ),
				'book-italic'           => esc_attr__( 'Book 300 Italic', 'the-best-blog' ),
				'regular'               => esc_attr__( 'Normal 400', 'the-best-blog' ),
				'italic'                => esc_attr__( 'Normal 400 Italic', 'the-best-blog' ),
				'medium'                => esc_attr__( 'Medium 500', 'the-best-blog' ),
				'medium-italic'         => esc_attr__( 'Medium 500 Italic', 'the-best-blog' ),
				'semi-bold'             => esc_attr__( 'Semi-Bold 600', 'the-best-blog' ),
				'semi-bold-italic'      => esc_attr__( 'Semi-Bold 600 Italic', 'the-best-blog' ),
				'bold'                  => esc_attr__( 'Bold 700', 'the-best-blog' ),
				'bold-italic'           => esc_attr__( 'Bold 700 Italic', 'the-best-blog' ),
				'extra-bold'            => esc_attr__( 'Extra-Bold 800', 'the-best-blog' ),
				'extra-bold-italic'     => esc_attr__( 'Extra-Bold 800 Italic', 'the-best-blog' ),
				'ultra-bold'            => esc_attr__( 'Ultra-Bold 900', 'the-best-blog' ),
				'ultra-bold-italic'     => esc_attr__( 'Ultra-Bold 900 Italic', 'the-best-blog' ),
				'invalid-value'         => esc_attr__( 'Invalid Value', 'the-best-blog' ),
				'add-new'           	=> esc_attr__( 'Add new', 'the-best-blog' ),
				'row'           		=> esc_attr__( 'row', 'the-best-blog' ),
				'limit-rows'            => esc_attr__( 'Limit: %s rows', 'the-best-blog' ),
				'open-section'          => esc_attr__( 'Press return or enter to open this section', 'the-best-blog' ),
				'back'                  => esc_attr__( 'Back', 'the-best-blog' ),
				'reset-with-icon'       => sprintf( esc_attr__( '%s Reset', 'the-best-blog' ), '<span class="dashicons dashicons-image-rotate"></span>' ),
				'text-align'            => esc_attr__( 'Text Align', 'the-best-blog' ),
				'text-transform'        => esc_attr__( 'Text Transform', 'the-best-blog' ),
				'none'                  => esc_attr__( 'None', 'the-best-blog' ),
				'capitalize'            => esc_attr__( 'Capitalize', 'the-best-blog' ),
				'uppercase'             => esc_attr__( 'Uppercase', 'the-best-blog' ),
				'lowercase'             => esc_attr__( 'Lowercase', 'the-best-blog' ),
				'initial'               => esc_attr__( 'Initial', 'the-best-blog' ),
				'select-page'           => esc_attr__( 'Select a Page', 'the-best-blog' ),
				'open-editor'           => esc_attr__( 'Open Editor', 'the-best-blog' ),
				'close-editor'          => esc_attr__( 'Close Editor', 'the-best-blog' ),
				'switch-editor'         => esc_attr__( 'Switch Editor', 'the-best-blog' ),
				'hex-value'             => esc_attr__( 'Hex Value', 'the-best-blog' ),
			);

			// Apply global changes from the kirki/config filter.
			// This is generally to be avoided.
			// It is ONLY provided here for backwards-compatibility reasons.
			// Please use the kirki/{$config_id}/l10n filter instead.
			$config = apply_filters( 'kirki/config', array() );
			if ( isset( $config['i18n'] ) ) {
				$translation_strings = wp_parse_args( $config['i18n'], $translation_strings );
			}

			// Apply l10n changes using the kirki/{$config_id}/l10n filter.
			return apply_filters( 'kirki/' . $config_id . '/l10n', $translation_strings );

		}
	}
}
