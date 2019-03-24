<?php
session_start();
if ( isset( $_SESSION[ 'staff_login' ] ) == false ) {
	print 'ログインされていません。<br/>';
	print '<a href="../../staffLogin/staffLogin.php">ログイン画面へ</a>';
	exit();
} else {
	print $_SESSION[ 'staff_kanji' ];
	print 'さんログイン中';
}
?>
<?php

$code = $_POST[ 'code' ];

if ( isset( $_POST[ 'add' ] ) == true ) {
	header( 'Location:../inquiryUpload/inquiryUpload.php' );
	exit();
}


if ( isset( $_POST[ 'delete' ] ) == true ) {
	if ( isset( $_POST[ 'code' ] ) == true ) {
		header( 'Location:inquiryDelete.php?code=' . $code );
		exit();
	} else {
		header( 'Location:inquiryNg.php' );
		exit();
	}
}

?>