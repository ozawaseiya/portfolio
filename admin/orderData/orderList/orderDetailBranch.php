<?php
session_start();
header( 'Expires:' );
header( 'Cache-Control:' );
header( 'Pragma:' );
if ( isset( $_SESSION[ 'staff_login' ] ) == false ) {
	print 'ログインされていません。<br/>';
	print '<a href="../../staffLogin/staffLogin.php">ログイン画面へ</a>';
	exit();
} else {
	print $_SESSION[ 'staff_kanji' ];
	print 'さんログイン中<br/>';
	print '<br/>';
}
?>

<?php

$ordercode = $_POST[ 'ordercode' ];


if ( isset( $_POST[ 'back' ] ) == true ) {
	header( 'Location:orderList.php' );
	exit();
} else {
	header( 'Location:orderNg.php' );
	exit();
}



?>