<?php
session_start();
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

require_once( '../../../common/common.php' );
$post = sanitize( $_POST );
$code = $_POST[ 'code' ];

if ( isset( $_POST[ 'add' ] ) == true ) {
	header( 'Location:../memberUpload/memberUpload.php' );
	exit();
}

if ( isset( $_POST[ 'delete' ] ) == true ) {
	if ( isset( $_POST[ 'code' ] ) == true ) {
		header( 'Location:memberDelete.php?code=' . $code );
		exit();
	} else {
		header( 'Location:memberNg.php' );
		exit();
	}
}

?>