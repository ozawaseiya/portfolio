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

<!doctype html>
<html lang="ja">
<head>
	<meta charset="UTF-8N">
	<title>お問い合わせ一覧</title>
	<link href="inquiryList.css" rel="stylesheet" type="text/css">
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
					<li><a href="inquiryList.php">お問い合わせ一覧</a>
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
			<p>お問い合わせ一覧</p>
		</div>
		<div id="textZone">
			<?php

			try {

				$dsn = 'mysql:dbname=aichi1990_shop;host=mysql7075.xserver.jp;charset=utf8';
				$user = 'aichi1990_shop';
				$password = 'a31706105';
				$dbh = new PDO( $dsn, $user, $password );
				$dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

				$sql = 'SELECT code,kanji,furigana,tel,email1,inquiry FROM dat_inquiry WHERE 1';
				$stmt = $dbh->prepare( $sql );
				$stmt->execute();

				$dbh = null;

				print '<form method="post" action="inquiryBranch.php">';
				while ( true ) {
					$rec = $stmt->fetch( PDO::FETCH_ASSOC );
					if ( $rec == false ) {
						break;
					}
					print '<input type="radio" name="code" value="' . $rec[ 'code' ] . '">';
					print '①氏名:' . $rec[ 'kanji' ];
					print '&nbsp;②ふりがな:' . $rec[ 'furigana' ];
					print '<br/>③電話番号:' . $rec[ 'tel' ];
					print '<br/>④メールアドレス:' . $rec[ 'email1' ] . '<br/>';
					print '⑤お問い合わせ内容:<br/>' . $rec[ 'inquiry' ];
					print '<br/><br/>';
				}
				print '<div id="buttonZone">';
				print '<input type="submit" id="button1" name="add" value="追加する">';
				print '<input type="submit" id="button2" name="delete" value="削除する">';
				print '</div>';
				print '</form>';

			} catch ( Exception $e ) {
				print 'ただいま障害により大変ご迷惑をおかけしております。';
				exit();
			}

			?>

			<br/>
			<a href="../../adminBranch.php">東三河幸せ宅配便管理トップメニューへ</a><br>
		</div>
	</div>
	<footer>
	</footer>
</body>
</html>