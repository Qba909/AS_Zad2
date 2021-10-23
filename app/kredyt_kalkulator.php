<?php

require_once dirname(__FILE__).'/../config.php';

include _ROOT_PATH.'/app/security/check.php';

function getParams(&$x,&$y,&$z){
	$x = isset($_REQUEST['x']) ? $_REQUEST['x'] : null;
	$y = isset($_REQUEST['y']) ? $_REQUEST['y'] : null;
	$z = isset($_REQUEST['z']) ? $_REQUEST['z'] : null;	
}


if ( ! (isset($x) && isset($y) && isset($z))) {
	return false;
}


if ( $x == "") {
	$messages [] = 'Nie podano kwoty';
}
if ( $y == "") {
	$messages [] = 'Nie podano oprocentowania';
}
if ( $z == "") {
	$messages [] = 'Nie podano ilosci rat';
}
if (count ( $messages ) != 0) return false;

if (empty( $messages )) {
	
	if (! is_numeric( $x )) {
		$messages [] = 'Pierwsza wartość nie jest liczbą całkowitą';
	}
	
	if (! is_numeric( $y )) {
		$messages [] = 'Druga wartość nie jest liczbą całkowitą';
	}
        
        if (! is_numeric( $z )) {
		$messages [] = 'Trzecia wartość nie jest liczbą całkowitą';
	}	

}

if (empty ( $messages )) {
	
	$x = intval($x);
	$y = intval($y);
        $z = intval($z);

        $result = ($x + ($x * $y / 100)) / $z;
}

$x = null;
$y = null;
$z = null;
$result = null;
$messages = array();

getParams($x,$y,$z);
if ( validate($x,$y,$z,$messages) ) {
	process($x,$y,$z,$messages,$result);
}

include 'kredyt_kalkulator_view.php';