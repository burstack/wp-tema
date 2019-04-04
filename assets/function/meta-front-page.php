<?php

// PAGE ADDING META FIELDS FOR FRONT-PAGE
class frontpagesectionsMetabox {
	private $screen = array(
		'frontpage',
	);
	private $meta_fields = array(
		array(
			'label' => 'Show/Hide Title?',
			'id' => 'slct',
			'type' => 'select',
			'options' => array(
				'Show Titel on Front-page',
				'Hide Titel on Front-page',
			),
		),
		array(
			'label' => 'Add ascending placement number <br>If left empty, this section will not be shown on front-page',
			'id' => 'order',
			'type' => 'number',
		),
		array(
			'label' => 'Left side content',
			'id' => 'lefttext',
			'type' => 'wysiwyg',
		),
		array(
			'label' => 'Left side background color',
			'id' => 'leftcss',
			'type' => 'color',
		),
		array(
			'label' => 'Left side background image (overrides left color)',
			'id' => 'leftimg',
			'type' => 'media',
		),
		array(
			'label' => 'Right side content',
			'id' => 'righttext',
			'type' => 'wysiwyg',
		),
		array(
			'label' => 'Right side background color',
			'id' => 'rightcss',
			'type' => 'color',
		),
	);
	public function __construct() {
		add_action( 'add_meta_boxes', array( $this, 'add_meta_boxes' ) );
		add_action( 'admin_footer', array( $this, 'media_fields' ) );
		add_action( 'save_post', array( $this, 'save_fields' ) );
	}
	public function add_meta_boxes() {
		foreach ( $this->screen as $single_screen ) {
			add_meta_box(
				'frontpagesections',
				__( 'Front-page sections', 'skyfarms' ),
				array( $this, 'meta_box_callback' ),
				$single_screen,
				'advanced',
				'default'
			);
		}
	}
	public function meta_box_callback( $post ) {
		wp_nonce_field( 'frontpagesections_data', 'frontpagesections_nonce' );
		$this->field_generator( $post );
	}
	public function media_fields() {
		?><script>
			jQuery(document).ready(function($){
				if ( typeof wp.media !== 'undefined' ) {
					var _custom_media = true,
					_orig_send_attachment = wp.media.editor.send.attachment;
					$('.frontpagesections-media').click(function(e) {
						var send_attachment_bkp = wp.media.editor.send.attachment;
						var button = $(this);
						var id = button.attr('id').replace('_button', '');
						_custom_media = true;
							wp.media.editor.send.attachment = function(props, attachment){
							if ( _custom_media ) {
								$('input#'+id).val(attachment.url);
							} else {
								return _orig_send_attachment.apply( this, [props, attachment] );
							};
						}
						wp.media.editor.open(button);
						return false;
					});
					$('.add_media').on('click', function(){
						_custom_media = false;
					});
				}
			});
		</script><?php
	}
	public function field_generator( $post ) {
		$output = '';
		foreach ( $this->meta_fields as $meta_field ) {
			$label = '<label for="' . $meta_field['id'] . '">' . $meta_field['label'] . '</label>';
			$meta_value = get_post_meta( $post->ID, $meta_field['id'], true );
			if ( empty( $meta_value ) ) {
				$meta_value = $meta_field['default']; }
			switch ( $meta_field['type'] ) {
				case 'media':
					$input = sprintf(
						'<input style="width: 80%%" id="%s" name="%s" type="text" value="%s"> <input style="width: 19%%" class="button frontpagesections-media" id="%s_button" name="%s_button" type="button" value="Upload" />',
						$meta_field['id'],
						$meta_field['id'],
						$meta_value,
						$meta_field['id'],
						$meta_field['id']
					);
					break;
				case 'select':
					$input = sprintf(
						'<select id="%s" name="%s">',
						$meta_field['id'],
						$meta_field['id']
					);
					foreach ( $meta_field['options'] as $key => $value ) {
						$meta_field_value = !is_numeric( $key ) ? $key : $value;
						$input .= sprintf(
							'<option %s value="%s">%s</option>',
							$meta_value === $meta_field_value ? 'selected' : '',
							$meta_field_value,
							$value
						);
					}
					$input .= '</select>';
					break;
				case 'wysiwyg':
					ob_start();
					wp_editor($meta_value, $meta_field['id']);
					$input = ob_get_contents();
					ob_end_clean();
					break;
				default:
					$input = sprintf(
						'<input %s id="%s" name="%s" type="%s" value="%s">',
						$meta_field['type'] !== 'color' ? 'style="width: 100%"' : '',
						$meta_field['id'],
						$meta_field['id'],
						$meta_field['type'],
						$meta_value
					);
			}
			$output .= $this->format_rows( $label, $input );
		}
		echo '<table class="form-table"><tbody>' . $output . '</tbody></table>';
	}
	public function format_rows( $label, $input ) {
		return '<tr><th>'.$label.'</th><td>'.$input.'</td></tr>';
	}
	public function save_fields( $post_id ) {
		if ( ! isset( $_POST['frontpagesections_nonce'] ) )
			return $post_id;
		$nonce = $_POST['frontpagesections_nonce'];
		if ( !wp_verify_nonce( $nonce, 'frontpagesections_data' ) )
			return $post_id;
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
			return $post_id;
		foreach ( $this->meta_fields as $meta_field ) {
			if ( isset( $_POST[ $meta_field['id'] ] ) ) {
				switch ( $meta_field['type'] ) {
					case 'email':
						$_POST[ $meta_field['id'] ] = sanitize_email( $_POST[ $meta_field['id'] ] );
						break;
					case 'text':
						$_POST[ $meta_field['id'] ] = sanitize_text_field( $_POST[ $meta_field['id'] ] );
						break;
				}
				update_post_meta( $post_id, $meta_field['id'], $_POST[ $meta_field['id'] ] );
			} else if ( $meta_field['type'] === 'checkbox' ) {
				update_post_meta( $post_id, $meta_field['id'], '0' );
			}
		}
	}
}
if (class_exists('frontpagesectionsMetabox')) {
	new frontpagesectionsMetabox;
};
