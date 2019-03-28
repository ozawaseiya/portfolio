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
	<title>商品管理情報一覧</title>
	<link href="productList.css" rel="stylesheet" type="text/css">
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
					<li><a href="productList.php">商品管理情報一覧</a>
					</li>
					<li><a href="../../orderData/orderList/orderList.php">注文管理情報一覧</a>
					</li>
				</ul>
			</nav>
		</div>
	</header>
	<div id="contents">
		<div id="mainTitle">
			<p>商品管理情報一覧</p>
		</div>
		<div id="infoZone">
			<?php

			try {

				$dsn = 'mysql:dbname=aichi1990_shop;host=mysql7075.xserver.jp;charset=utf8';
				$user = 'aichi1990_shop';
				$password = 'a31706105';
				$dbh = new PDO( $dsn, $user, $password );
				$dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

				$sql = 'SELECT code,productname,companyname,price,imagecart FROM dat_product WHERE 1';
				$stmt = $dbh->prepare( $sql );
				$stmt->execute();


				$dbh = null;

				print '<form method="post" action="productBranch.php">';
				while ( true ) {
					$rec = $stmt->fetch( PDO::FETCH_ASSOC );
					if ( $rec == false ) {
						break;
					}
					print '<table>';
					print '<tr>';
					print '<th class="wide">選択</th><th class="wide">商品番号</th><th>商品名</th><th>販売店名</th><th>価格</th><th>画像</th>';
					print '</tr>';
					print '<tr>';
					print '<td><input type="radio" name="code" value="' . $rec[ 'code' ] . '"></td>';
                                        print '<td class="wide" align="center">' . $rec[ 'code' ] . '</td>';
                                        print '<td>' . $rec[ 'productname' ] . '</td>';
					print '<td>' . $rec[ 'companyname' ] . '</td>';
					print '<td class="wide">' . $rec[ 'price' ] . '円' . '</td>';
					$rec[ 'imagecart' ] = '<img src="../../../common/' . $rec[ 'imagecart' ] . '">';
					print '<td id="imagecart">' . $rec[ 'imagecart' ] . '</td>';
					print '</tr>';
					print '</table>';
					print '<br/>';
				}

				print '<div id="buttonZone">';
				print '<input type="submit" id="button1" name="add" value="商品を追加する">';
				print '<input type="submit" id="button2" name="delete" value="削除する">';
				print '<input type="button" id="button3" onclick="history.back()" value="前のページへ戻る">';
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