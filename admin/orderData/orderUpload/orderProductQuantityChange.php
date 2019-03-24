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

<!doctype html>
<html lang="ja">
<head>
	<meta charset="UTF-8N">
	<title>注文情報追加</title>
	<link href="orderProductQuantityChange.css" rel="stylesheet" type="text/css">
</head>

<body>
	<header>
		<div id="headerInner">
			<a href="../../../index/index.php"><img src="../../../common/logo.png" alt="東三河幸せ宅配便" id="mainPhoto"></a>
			<img src="../../../common/motto.png" alt="地元のおいしさと楽しみをご自宅にお届けいたします" id="mainMotto"/>
			<nav id="gnav">
				<ul id="gNavi">
					<li><a href="../../adminBranch.php">トップメニュー</a>
					</li>
					<li><a href="../../staff/staffList.php">管理者情報一覧</a>
					</li>
					<li><a href="../../memberData/memberList/memberList.php">会員登録一覧</a>
					</li>
					<li><a href="../../inquiryData/inquiryList/inquiryList.php">お問い合わせ一覧</a>
					</li>
					<li><a href="../../productData/productList/productList.php">商品管理情報一覧</a>
					</li>
					<li><a href="../orderList/orderList.php">注文管理情報一覧</a>
					</li>
				</ul>
			</nav>
		</div>
	</header>
	<div id="contents">
		<div id="mainTitle">
			<p>注文情報追加</p>
		</div>
		<div id="inputBox">
			<?php

			require_once( '../../../common/common.php' );

			$post = sanitize( $_POST );

			$max = $post[ 'max' ];
			for ( $i = 0; $i < $max; $i++ ) {
				if ( preg_match( "/[+-]?\d+/", $post[ 'cnt' . $i ] ) == 0 ) {
					print '<p>数量に誤りがあります。</p>';
					print '<form action="productCartLook.php" method="get">';
					print '<input type="submit" id="wrongButton" value="前のページへ戻る">';
					print '</form>';
					exit();
				}
				if ( $post[ 'cnt' . $i ] < 1 || 10 < $post[ 'cnt' . $i ] ) {
					print '<p>数量は最大10個までです。</p>';
					print '<form action="productCartLook.php" method="get">';
					print '<input type="submit" id="numberButton" value="前のページへ戻る">';
					print '</form>';
					exit();
				}
				$orderquantity[] = $post[ 'cnt' . $i ];
			}

			$cart = $_SESSION[ 'cart' ];

			for ( $i = $max; 0 <= $i; $i-- ) {
				if ( isset( $_POST[ 'delete' . $i ] ) == true ) {
					array_splice( $cart, $i, 1 );
					array_splice( $orderquantity, $i, 1 );
				}
			}

			$_SESSION[ 'cart' ] = $cart;
			$_SESSION[ 'cnt' ] = $orderquantity;

			header( 'Location:orderProductCartLook.php' );
			exit();
			?>

		</div>
	</div>
	<footer>
	</footer>
</body>
</html>