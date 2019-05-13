<?php
session_start();
header( 'Expires:' );
header( 'Cache-Control:' );
header( 'Pragma:' );
if ( isset( $_SESSION[ 'staff_login' ] ) == true ) {
	print $_SESSION[ 'staff_kanji' ];
	print 'さんログイン中<br/>';
	print '<br/>';
}
?>
<!doctype html>
<html lang="ja">
<head>
	<meta charset="UTF-8N">
	<title>ログイン実行画面</title>
	<link href="staffLoginCheck.css" rel="stylesheet" type="text/css">
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
					<li><a href="../staff/staffList.php">管理者情報一覧</a>
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
			<p>ログイン実行画面</p>
		</div>
		<div id="messageBox">
			<?php
			try {

				require_once( '../../common/common.php' );

				$post = sanitize( $_POST );
				$staffname = $post[ 'name' ];
				$staffpassword = $post[ 'password' ];

				$staffpassword = md5( $staffpassword );

				$dsn = 'mysql:dbname=aichi1990_shop;host=mysql7075.xserver.jp;charset=utf8';
				$user = 'aichi1990_shop';
				$password = 'a31706105';
				$dbh = new PDO( $dsn, $user, $password );
				$dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

				$sql = 'SELECT code,name FROM dat_staff WHERE name=? AND password=?';
				$stmt = $dbh->prepare( $sql );
				$data[] = $staffname;
				$data[] = $staffpassword;
				$stmt->execute( $data );

				$dbh = null;

				$rec = $stmt->fetch( PDO::FETCH_ASSOC );

				if ( $rec == false ) {
					print '<div class="buttonZone">';
					print '<p>メールアドレスかパスワードが間違っています。</p></br>';
					print '<a href="staffLogin.php">管理者登録ページへ</a>';
					print '</div>';
				} else {
					print '<form method="post" action="../adminBranch.php">';
					$_SESSION[ 'staff_login' ] = 1;
					$_SESSION[ 'member_code' ] = $rec[ 'code' ];
					$_SESSION[ 'staff_kanji' ] = $rec[ 'name' ];
					print '<div class="buttonZone">';
					print '<input type="submit" id="loginButton" value="ログイン開始">';
					print '</div>';
					print '</form>';
				}
			} catch ( EXCEPTION $e ) {
				print 'ただいま障害により大変ご迷惑をお掛けしております。';
				exit();
			}

			?>
		</div>
	</div>
	<footer>
	</footer>
</body>
</html>