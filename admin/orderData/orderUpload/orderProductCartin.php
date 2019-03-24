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
	<title>注文確認</title>
	<link href="orderProductCartin.css" rel="stylesheet" type="text/css">
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
			<p>注文確認</p>
		</div>
		<div id="inputBox">
			<?php

			try {
				require_once( '../../../common/common.php' );

				$get = sanitize( $_GET );

				$productcode = $get[ 'code' ];
				$productquantity = $get[ 'cnt' ];

				if ( isset( $_SESSION[ 'cart' ] ) == true ) {
					$cart = $_SESSION[ 'cart' ];
					$quantity = $_SESSION[ 'cnt' ];
					if ( in_array( $productcode, $cart ) == true ) {
						print '<p>その商品はすでに買い物かごに入っています。</p><br/>';
						print '<input id="cartFullButton" type="button" onclick="history.back()" value="前のページへ戻る">';
						exit();
					}
				}

				$cart[] = $productcode;
				$quantity[] = $productquantity;
				$_SESSION[ 'cart' ] = $cart;
				$_SESSION[ 'cnt' ] = $quantity;


			} catch ( Exception $e ) {
				print '<p>ただいま障害により大変ご迷惑をお掛けしております。</p>';
				exit();
			}

			?>

			<div id="buttonZone">
				<p>買い物かごに指定した商品を追加しました。</p><br/>
				<?php
				print '<form method="get" action="orderProductCartLook.php">';
				print '<input type="submit" id="button1" value="買い物かごの中を見る">';
				print '</form>'
				?>
				<input type="button" id="button2" onclick="location.href='orderProductAdd.php';" value="商品購入ページへ戻る"/>

			</div>
		</div>
	</div>
	<footer>
	</footer>
</body>
</html>