<?php
session_start();
if ( isset( $_SESSION[ 'staff_login' ] ) == false ) {
	print 'ログインされていません。<br/>';
	print '<a href="../staffLogin/staffLogin.php">ログイン画面へ</a>';
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
	<title>管理者削除</title>
	<link href="staffDelete.css" rel="stylesheet" type="text/css">
</head>

<body>
	<header>
		<div id="headerInner">
			<a href="../../index/index.php"><img src="../../common/logo.png" alt="東三河幸せ宅配便" id="mainPhoto"></a>
			<img src="../../common/motto.png" alt="地元のおいしさと楽しみをご自宅にお届けいたします" id="mainMotto"/>
			<nav id="gnav">
				<ul id="gNavi">
					<li><a href="../adminBranch.php">トップメニュー</a>
					</li>
					<li><a href="staffList.php">管理者情報一覧</a>
					</li>
					<li><a href="../memberData/memberList/memberList.php">会員登録一覧</a>
					</li>
					<li><a href="../inquiryData/inquiryList/inquiryList.php">お問い合わせ一覧</a>
					</li>
					<li><a href="../productData/productList/productList.php">商品管理情報一覧</a>
					</li>
					<li><a href="../orderData/orderList/orderList.php">注文管理情報一覧</a>
					</li>
				</ul>
			</nav>
		</div>
	</header>
	<div id="contents">
		<div id="mainTitle">
			<p>管理者削除</p>
		</div>
		<div id="messageBox">
			<?php

			try {

				$staffcode = $_GET[ 'code' ];

				$dsn = 'mysql:host=portfolio-db.clfmlox1pztr.ap-northeast-1.rds.amazonaws.com;dbname=portfolio;charset=utf8';
						$user = 'portfolio';
						$password = 'portfolio2020';
				$dbh = new PDO( $dsn, $user, $password );
				$dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

				$sql = 'SELECT name FROM dat_staff WHERE code=?';
				$stmt = $dbh->prepare( $sql );
				$data[] = $staffcode;
				$stmt->execute( $data );

				$rec = $stmt->fetch( PDO::FETCH_ASSOC );
				$staffname = $rec[ 'name' ];

				$dbh = null;
			} catch ( Exception $e ) {
				print 'ただいま障害により大変ご迷惑をお掛けしております。';
				exit();
			}


			?> 管理者番号:
			<?php print $staffcode; ?>
			<br/> 管理者名:
			<?php print $staffname; ?>
			<br/><br/> この管理者を削除してよろしいですか？
			<br/>
			<br/>
			<div id="buttonZone">
				<form method="get" action="staffDeleteDone.php">
					<input type="hidden" name="code" value="<?php print $staffcode; ?>">
					<input type="submit" id="button1" value="削除する">
					<input type="button" id="button2" onclick="history.back()" value="前のページへ戻る">
				</form>
			</div>
		</div>
	</div>
	<footer>
	</footer>
</body>
</html>