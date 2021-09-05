<?php
/*
Plugin Name: Usuarios Capacitados
Description: Lista regras para usuario usando mesmo usuarios.
Version: 1.0.0
author: Negócios Digital
*/

include_once('updater.php');

function ksu_save_role( $user_id, $role ) {

	// Site 1
	// Change value if needed
	$prefix_1 = 'first_';
	
	// Site 2 prefix
	// Change value if needed
	$prefix_2 = 'second_';
	
	$caps = get_user_meta( $user_id, $prefix_1 . 'capabilities', true );
	$level = get_user_meta( $user_id, $prefix_1 . 'user_level', true );

	if ( $caps ){
		update_user_meta( $user_id, $prefix_2 . 'capabilities', $caps );
	}

	if ( $level ){
		update_user_meta( $user_id, $prefix_2 . 'user_level', $level );
	}

	
}		
add_action( 'set_user_role', 'ksu_save_role', 10, 2 );