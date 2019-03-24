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
	<title>お問い合わせ情報削除</title>
	<link href="inquiryDelete.css" rel="stylesheet" type="text/css">
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
			<p>お問い合わせ情報削除</p>
		</div>
		<div id="messageBox">
			<?php

			try {

				$code = $_GET[ 'code' ];

				$dsn = 'mysql:dbname=aichi1990_shop;host=mysql7075.xserver.jp;charset=utf8';
				$user = 'aichi1990_shop';
				$password = 'a31706105';
				$dbh = new PDO( $dsn, $user, $password );
				$dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

				$sql = 'SELECT code,kanji,furigana,inquiry FROM dat_inquiry WHERE code=?';
				$stmt = $dbh->prepare( $sql );
				$data[] = $code;
				$stmt->execute( $data );

				$rec = $stmt->fetch( PDO::FETCH_ASSOC );
				$code = $rec[ 'code' ];
				$namekanji = $rec[ 'kanji' ];
				$namefurigana = $rec[ 'furigana' ];
				$inquiry = $rec[ 'inquiry' ];

				$dbh = null;
			} catch ( Exception $e ) {
				print 'ただいま障害により大変ご迷惑をお掛けしております。';
				exit();
			}

			?> お問い合わせ番号：
			<?php print $code; ?>
			<br/> 管理者名：
			<?php print $namekanji; ?>
			<br/> 管理者名（ふりがな）：
			<?php print $namefurigana; ?>
			<br/><br/> お問い合わせ内容:
			<br/>
			<?php print $inquiry; ?>
			<br/><br/> このお問い合わせ内容を削除してよろしいですか？
			<br/>
			<br/>
			<form method="get" action="inquiryDeleteDone.php">
				<input type="hidden" name="code" value="<?php print $code; ?>">
				<div id="buttonZone">
					<input type="submit" id="button1" value="削除する">
					<input type="button" id="button2" onclick="history.back()" value="前のページへ戻る">
				</div>
			</form>

		</div>
	</div>
	<footer>
	</footer>
</body>
</html>