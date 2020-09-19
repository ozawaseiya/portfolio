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
	<title>お問い合わせ情報完了</title>
	<link href="inquiryUploadDone.css" rel="stylesheet" type="text/css">
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
					<li><a href="../inquiryList/inquiryList.php">お問い合わせ一覧</a>
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
			<p>お問い合わせ情報完了</p>
		</div>
		<div id="messageBox">
			<?php
			try {

				require_once( '../../../common/common.php' );

				$post = sanitize( $_POST );

				$contactkanji = $post[ 'kanji' ];
				$contactfurigana = $post[ 'furigana' ];
				$contacttel = $post[ 'tel' ];
				$contactemail1 = $post[ 'email1' ];
				$contactinquiry = $post[ 'inquiry' ];

				$dsn = 'mysql:host=portfolio-db.clfmlox1pztr.ap-northeast-1.rds.amazonaws.com;dbname=portfolio;charset=utf8';
						$user = 'portfolio';
						$password = 'portfolio2020';
				$dbh = new PDO( $dsn, $user, $password );
				$dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

				$sql = 'INSERT INTO dat_inquiry (kanji, furigana, tel, email1, inquiry) VALUES (?,?,?,?,?)';
				$stmt = $dbh->prepare( $sql );
				$data[] = $contactkanji;
				$data[] = $contactfurigana;
				$data[] = $contacttel;
				$data[] = $contactemail1;
				$data[] = $contactinquiry;
				$stmt->execute( $data );

				$dbh = null;

				print $contactkanji . '様のお問い合わせ内容を登録しました。<br/><br/>';
				print '<a href="../inquiryList/inquiryList.php">お問い合わせ情報一覧へ</a>';


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