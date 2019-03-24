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
	<title>会員登録一覧</title>
	<link href="memberList.css" rel="stylesheet" type="text/css">
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
					<li><a href="memberList.php">会員登録一覧</a>
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
			<p>会員登録一覧</p>
		</div>
		<div id="messageZone">
			<?php

			try {

				$dsn = 'mysql:dbname=aichi1990_shop;host=mysql7075.xserver.jp;charset=utf8';
				$user = 'aichi1990_shop';
				$password = 'a31706105';
				$dbh = new PDO( $dsn, $user, $password );
				$dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

				$sql = 'SELECT code,password,kanji,furigana,tel,email1,postal1,postal2,prefecture,address FROM dat_member WHERE 1';
				$stmt = $dbh->prepare( $sql );
				$stmt->execute();

				$dbh = null;

				print '<form method="post" action="memberBranch.php">';
				while ( true ) {
					$rec = $stmt->fetch( PDO::FETCH_ASSOC );
					if ( $rec == false ) {
						break;
					}
					print '<input type="radio" name="code" value="' . $rec[ 'code' ] . '">';
					print '会員番号:' . $rec[ 'code' ] . '&nbsp;';
					print '①' . $rec[ 'kanji' ] . '&nbsp;';
					print '②' . $rec[ 'furigana' ] . '<br/>';
					print '③電話番号:' . $rec[ 'tel' ] . '<br/>';
					print '④メールアドレス:' . $rec[ 'email1' ] . '<br/>';
					print '⑤〒' . $rec[ 'postal1' ];
					print '-' . $rec[ 'postal2' ];
					print '&nbsp;⑥都道府県名:' . $rec[ 'prefecture' ] . '<br/>';
					print '⑦住所:' . $rec[ 'address' ];
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

			<br/><br/>
			<a href="../../adminBranch.php">東三河幸せ宅配便管理トップメニューへ</a><br>

		</div>
	</div>
	<footer>
	</footer>
</body>
</html>