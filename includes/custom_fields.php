<?php
	$staff_field_role = array(
		'title'   => 'Staff Members Role',
		'type'    => 'text',
	);

	$staff_field_year_started = array(
		'title'   => 'Year Staff Member Started',
		'type'    => 'number',
	);

	$staff_fields = array(
		$staff_field_role,
		$staff_field_year_started,
	);

	$staff = array(
		'title'           => 'Staff Info',
		'applicableto'    => 'staff',
		'location'        => 'normal',
		'priority'        => 'high',
		'fields'          => $staff_fields,
	);

	$metaboxes = array(
		'staff' => $staff
	);

	function add_custom_fields() {
		global $metaboxes;

		if ( !empty( $metaboxes ) ) {
			foreach ( $metaboxes as $id => $metabox ) {
				// add_meta_box( string $id, string $title, callable $callback, string|array|WP_Screen $screen = null, string $context = 'advanced', string $priority = 'default', array $callback_args = null )
            	add_meta_box( $id, $metabox['title'], 'show_metaboxes', $metabox['applicableto'], $metabox['location'], $metabox['priority'], $id );
			}
		}
	}

	add_action( 'admin_init', 'add_custom_fields' );

	function show_metaboxes( $post, $args ) {
		global $metaboxes;

		$fields = $metaboxes[$args['id']]['fields'];

		$custom_values = get_post_custom( $post->ID );

		$output = '<input type="hidden" name="post_format_meta_box_nonce" value="'.wp_create_nonce( basename(__FILE__) ).'">';

		if( !empty( $fields ) ) {
			foreach ( $fields as $id => $field ) {
				switch ( $field['type'] ) {
					case 'text':
						$output .= '<label for="'.$id.'" class="custom-label">'.$field['title'].'</label>';
						$output .= '<input type="text" name="'.$id.'" class="custom-field" value="'.$custom_values[$id][0].'">';

						break;
					case 'number':
						$output .= '<label for="'.$id.'" class="custom-label">'.$field['title'].'</label>';
						$output .= '<input type="number" name="'.$id.'" class="custom-field" value="'.$custom_values[$id][0].'">';

						break;
					case 'select':
						$output .= '<label class="custom-label">'.$field['title'].'</label>';
						$output .= '<select></select>';

						break;
					default:
						$output .= '<label class="custom-label">'.$field['title'].'</label>';
						$output .= '<input type="text" name="'.$id.'">';

						break;
				}
			}
		}

		echo $output;
	}

	function save_metaboxes( $post_id ) {
		global $metaboxes;

		if ( !wp_verify_nonce( $_POST['post_format_meta_box_nonce'], basename(__FILE__) ) ) {
			return $post_id;
		}

		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return $post_id;
		}

		if ( $_POST['post_type'] == 'page' ) {
			if ( !current_user_can( 'edit_page', $post_id ) ) {
				return $post_id;
			}
		} elseif ( !current_user_can( 'edit_page', $post_id ) ) {
			return $post_id;
		}

		$post_type = get_post_type();

		foreach ($metaboxes as $id => $metabox ) {
			if ( $metabox['applicableto'] == $post_type ) {
				$fields = $metaboxes[$id]['fields'];

				foreach ( $fields as $id => $field ) {
					$old_value = get_post_meta( $post_id, $id, true );
					$new_value = $_POST[$id];

					if ( $new_value && $new_value != $old_value ) {
						update_post_meta( $post_id, $id, $new_value );
					} elseif ( $new_value == '' && $old_value || !isset( $_POST[$id] ) ) {
						delete_post_meta( $post_id, $id, $old_value );
					}
				}
			}
		}
	}

	add_action( 'save_post', 'save_metaboxes' );
