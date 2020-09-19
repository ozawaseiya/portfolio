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
	<title>会員登録完了</title>
	<link href="memberUploadDone.css" rel="stylesheet" type="text/css">
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
					<li><a href="../memberList/memberList.php">会員登録一覧</a>
					</li>
					<li><a href="../../inquiryData/inquiryList/inquiryList.php">お問い合わせ一覧</a>
					</li>
					<li><a href="../../productData/productList/productList.php">商品管理情報一覧</a>
					</li>
					<li><a href="../../orderData/orderList/orderList.php">注文管理情報一覧</a>
					</li>
				</ul>
			</nav>
		</div>
	</header>
	<div id="contents">
		<div id="mainTitle">
			<p>会員登録完了</p>
		</div>
		<div id="messageBox">
			<?php

			try {

				require_once( '../../../common/common.php' );

				$post = sanitize( $_POST );

				$memberpassword = $post[ 'password' ];
				$memberkanji = $post[ 'kanji' ];
				$memberfurigana = $post[ 'furigana' ];
				$membertel = $post[ 'tel' ];
				$memberemail1 = $post[ 'email1' ];
				$memberpostal1 = $post[ 'postal1' ];
				$memberpostal2 = $post[ 'postal2' ];
				$memberprefecture = $post[ 'prefecture' ];
				$memberaddress = $post[ 'address' ];

				print $memberkanji . '様の';
				print '会員登録を完了しました。<br/>';
				print $memberemail1 . 'を登録完了。<br/><br/>';

				$dsn = 'mysql:host=portfolio-db.clfmlox1pztr.ap-northeast-1.rds.amazonaws.com;dbname=portfolio;charset=utf8';
						$user = 'portfolio';
						$password = 'portfolio2020';
				$dbh = new PDO( $dsn, $user, $password );
				$dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

				$sql = 'INSERT INTO dat_member(password, kanji, furigana, tel, email1, postal1, postal2, prefecture, address) VALUES (?,?,?,?,?,?,?,?,?)';
				$stmt = $dbh->prepare( $sql );
				$data[] = $memberpassword;
				$data[] = $memberkanji;
				$data[] = $memberfurigana;
				$data[] = $membertel;
				$data[] = $memberemail1;
				$data[] = $memberpostal1;
				$data[] = $memberpostal2;
				$data[] = $memberprefecture;
				$data[] = $memberaddress;
				$stmt->execute( $data );

				$dbh = null;

				print '<br/>';
				print '<form method="post" action="../memberList/memberList.php">';
				print '<a href="../memberList/memberList.php">会員登録一覧へ</a>';
				print '</form>';

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