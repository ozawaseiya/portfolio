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
	<title>商品追加確認</title>
	<link href="productAddCheck.css" rel="stylesheet" type="text/css">
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
					<li><a href="../productList/productList.php">商品管理情報一覧</a>
					</li>
					<li><a href="../../orderData/orderList/orderList.php">注文管理情報一覧</a>
					</li>
				</ul>
			</nav>
		</div>
	</header>
	<div id="contents">
		<div id="mainTitle">
			<p>商品追加確認</p>
		</div>
		<div id="dataBox">
			<?php

			require_once( '../../../common/common.php' );

			$post = sanitize( $_POST );
			$productname = $post[ 'productname' ];
			$companyname = $post[ 'companyname' ];
			$productprice = $post[ 'price' ];
			$productimage = $_FILES[ 'image' ];
			$productimagecart = $_FILES[ 'imagecart' ];
			$rankingimage = $_FILES[ 'rankingimage' ];

			error_reporting(0);

			$productname = utf8_decode($productname);
			$companyname = utf8_decode($companyname);

			$okflg = true;

			if ( isset( $post[ 'productname' ] ) && $post[ 'productname' ] == NULL ) {
				print '商品名が入力されていません。<br/>';
				$okflg = false;
			} else {
				print '商品名：';
				print $productname;
				print '<br/>';
			}

			if ( isset( $post[ 'companyname' ] ) && $post[ 'companyname' ] == NULL ) {
				print '販売店名が入力されていません。<br/>';
				$okflg = false;
			} else {
				print '販売店名：';
				print $companyname;
				print '<br/>';
			}

			if ( preg_match( '/\A[0-9]+\z/', $productprice ) == 0 ) {
				print '価格を正しく入力してください。<br/>';
				$okflg = false;
			} else {
				print '価格：';
				print $productprice;
				print '円<br/><br/><br/>';
			}

			if ( $productimage[ 'size' ] > 0 ) {
				if ( $productimage[ 'size' ] > 1000000 ) {
					print '画像が大き過ぎます';
				} else {
					move_uploaded_file( $productimage[ 'tmp_name' ], '../../../common/' . $productimage[ 'name' ] );
					print '商品画像<br/>';
					print '<img src="../../../common/' . $productimage[ 'name' ] . '">';
					print '<br/>';
				}
			}

			if ( $rankingimage[ 'size' ] > 0 ) {
				if ( $rankingimage[ 'size' ] > 1000000 ) {
					print 'ランキング画像が大き過ぎます';
				} else {
					move_uploaded_file( $rankingimage[ 'tmp_name' ], '../../../common/' . $rankingimage[ 'name' ] );
					print '<div id="ranking">';
					print 'ランキング画像<br/>';
					print '<img src="../../../common/' . $rankingimage[ 'name' ] . '">';
					print '<br/>';
					print '</div>';
				}
			}

			if ( $productimagecart[ 'size' ] > 0 ) {
				if ( $productimagecart[ 'size' ] > 1000000 ) {
					print '商品画像が大き過ぎます';
				} else {
					move_uploaded_file( $productimagecart[ 'tmp_name' ], '../../../common/' . $productimagecart[ 'name' ] );
					print '<div id="cart">';
					print '商品カート画像<br/>';
					print '<img src="../../../common/' . $productimagecart[ 'name' ] . '">';
					print '<br/>';
					print '</div>';
				}
			}



			if ( $productname == '' || preg_match( '/\A[0-9]+\z/', $productprice ) == 0 || $productimage[ 'size' ] > 1000000 || $productimagecart[ 'size' ] > 1000000 || $rankingimage[ 'size' ] > 1000000 ) {
				print '<div id="returnBox">';
				print '<form>';
				print '<input type="button" class="button2" onclick="history.back()" value="前のページへ戻る">';
				print '</form>';
				print '</div>';
			} else {
				print '<div id="finalZone">';
				print '上記の商品を追加します。<br/>';
				print '<form method="post" action="productAddDone.php">';
				print '<input type="hidden" name="productname" value="' . $productname . '">';
				print '<input type="hidden" name="companyname" value="' . $companyname . '">';
				print '<input type="hidden" name="price" value="' . $productprice . '">';
				print '<input type="hidden" name="image" value="' . $productimage[ 'name' ] . '">';
				print '<input type="hidden" name="imagecart" value="' . $productimagecart[ 'name' ] . '">';
				print '<input type="hidden" name="rankingimage" value="' . $rankingimage[ 'name' ] . '">';
				print '<br/>';
				print '<div id="buttonZone">';
				print '<input type="submit" id="button1" value="商品登録完了へ">';
				print '<input type="button" class="button2" onclick="history.back()" value="前のページへ戻る">';
				print '</div>';
				print '</div>';
				print '</form>';
			}

			?>
		</div>
	</div>
	<footer>
	</footer>
</body>
</html>
