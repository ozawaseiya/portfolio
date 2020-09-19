<?php

function sanitize( $form1 ) {
	$_form1 = array();
	foreach ( $form1 as $key => $value ) {
		if ( is_array( $value ) ) {
			$key = htmlspecialchars( $key, ENT_QUOTES, 'UTF-8' );
			$_form1[ $key ] = sanitize( $value );
		} else {
			$key = htmlspecialchars( $key );
			$_form1[ $key ] = htmlspecialchars( $value );
		}
	}
	return $_form1;
}
?>