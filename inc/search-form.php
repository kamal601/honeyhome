<?php 


/**
 * Display search form.
 *
 * Will first attempt to locate the searchform.php file in either the child or
 * the parent, then load it. If it doesn't exist, then the default search form
 * will be displayed. The default search form is HTML, which will be displayed.
 * There is a filter applied to the search form HTML in order to edit or replace
 * it. The filter is {@see 'get_search_form'}.
 *
 * This function is primarily used by themes which want to hardcode the search
 * form into the sidebar and also by the search widget in WordPress.
 *
 * There is also an action that is called whenever the function is run called,
 * {@see 'pre_get_search_form'}. This can be useful for outputting JavaScript that the
 * search relies on or various formatting that applies to the beginning of the
 * search. To give a few examples of what it can be used for.
 *
 * @since 2.7.0
 * @since 5.2.0 The $args array parameter was added in place of an $echo boolean flag.
 *
 * @param array $args {
 *     Optional. Array of display arguments.
 *
 *     @type bool   $echo       Whether to echo or return the form. Default true.
 *     @type string $aria_label ARIA label for the search form. Useful to distinguish
 *                              multiple search forms on the same page and improve
 *                              accessibility. Default empty.
 * }
 * @return string|void String when the $echo param is false.
 */
function honeyhome_get_search_form( $args = array() ) {
	/**
	 * Fires before the search form is retrieved, at the start of get_search_form().
	 *
	 * @since 2.7.0 as 'get_search_form' action.
	 * @since 3.6.0
	 *
	 * @link https://core.trac.wordpress.org/ticket/19321
	 */
	do_action( 'pre_get_search_form' );

	$echo = true;

	if ( ! is_array( $args ) ) {
		/*
		 * Back compat: to ensure previous uses of get_search_form() continue to
		 * function as expected, we handle a value for the boolean $echo param removed
		 * in 5.2.0. Then we deal with the $args array and cast its defaults.
		 */
		$echo = (bool) $args;

		// Set an empty array and allow default arguments to take over.
		$args = array();
	}

	// Defaults are to echo and to output no custom label on the form.
	$defaults = array(
		'echo'       => $echo,
		'aria_label' => '',
	);

	$args = wp_parse_args( $args, $defaults );

	/**
	 * Filters the array of arguments used when generating the search form.
	 *
	 * @since 5.2.0
	 *
	 * @param array $args The array of arguments for building the search form.
	 */
	$args = apply_filters( 'search_form_args', $args );

	$format = current_theme_supports( 'html5', 'search-form' ) ? 'html5' : 'xhtml';

	/**
	 * Filters the HTML format of the search form.
	 *
	 * @since 3.6.0
	 *
	 * @param string $format The type of markup to use in the search form.
	 *                       Accepts 'html5', 'xhtml'.
	 */
	$format = apply_filters( 'search_form_format', $format );

	$search_form_template = locate_template( 'searchform.php' );
	if ( '' != $search_form_template ) {
		ob_start();
		require( $search_form_template );
		$form = ob_get_clean();
	} else {
		// Build a string containing an aria-label to use for the search form.
		if ( isset( $args['aria_label'] ) && $args['aria_label'] ) {
			$aria_label = 'aria-label="' . esc_attr( $args['aria_label'] ) . '" ';
		} else {
			/*
			 * If there's no custom aria-label, we can set a default here. At the
			 * moment it's empty as there's uncertainty about what the default should be.
			 */
			$aria_label = '';
		}
		if ( 'html5' == $format ) {
			$form = '<form role="search" ' . $aria_label . 'method="get" class="search-form nav-menu-css" action="' . esc_url( home_url( '/' ) ) . '">
				<label>
					<div class="search_item_holder">
					<input type="search" class="search-field" placeholder="' . esc_attr_x( 'Search &hellip;', 'placeholder' ) . '" value="' . get_search_query() . '" name="s" />
					<button class="p-color-bg"><i class="fa fa-search" aria-hidden="true"></i>
                    </button>
				</div>
				</label>
				
			</form>';
		} else {
			$form = '<form role="search" ' . $aria_label . 'method="get" id="searchform" class="searchform" action="' . esc_url( home_url( '/' ) ) . '">
				<div>
					<label class="screen-reader-text" for="s">' . _x( 'Search for:', 'label' ) . '</label>
					<input type="text" value="' . get_search_query() . '" name="s" id="s" />
					<input type="submit" id="searchsubmit" value="' . esc_attr_x( 'Search', 'submit button' ) . '" />
				</div>
			</form>';
		}
	}

	/**
	 * Filters the HTML output of the search form.
	 *
	 * @since 2.7.0
	 *
	 * @param string $form The search form HTML output.
	 */
	$result = apply_filters( 'get_search_form', $form );

	if ( null === $result ) {
		$result = $form;
	}

	if ( isset( $args['echo'] ) && $args['echo'] ) {
		echo $result;
	} else {
		return $result;
	}
}