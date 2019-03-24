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
	<title>商品追加完了</title>
	<link href="productAddDone.css" rel="stylesheet" type="text/css">
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
			<p>商品追加完了</p>
		</div>
		<div id="messageBox">
			<?php

			try {

				require_once( '../../../common/common.php' );

				$post = sanitize( $_POST );
				$productname = $_POST[ 'productname' ];
				$companyname = $_POST[ 'companyname' ];
				$productprice = $_POST[ 'price' ];
				$productimage = $_POST[ 'image' ];
				$productimagecart = $_POST[ 'imagecart' ];
				$rankingimage = $_POST[ 'rankingimage' ];

				$dsn = 'mysql:dbname=aichi1990_shop;host=mysql7075.xserver.jp;charset=utf8';
				$user = 'aichi1990_shop';
				$password = 'a31706105';
				$dbh = new PDO( $dsn, $user, $password );
				$dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

				$sql = 'INSERT INTO dat_product(productname, companyname, price, image, imagecart, rankingimage) VALUES (?,?,?,?,?,?)';
				$stmt = $dbh->prepare( $sql );
				$data[] = $productname;
				$data[] = $companyname;
				$data[] = $productprice;
				$data[] = $productimage;
				$data[] = $productimagecart;
				$data[] = $rankingimage;
				$stmt->execute( $data );

				$dbh = null;

				print $productname;
				print 'を追加しました。<br/><br/>';
				print '<a href="../productList/productList.php">商品管理情報一覧へ</a>';

			} catch ( Exception $e ) {
				print 'ただいま障害により大変ご迷惑をおかけしております。';
				exit();
			}

			?>

		</div>
	</div>
	<footer>
	</footer>
</body>
</html>