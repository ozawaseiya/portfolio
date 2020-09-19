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
	<title>注文管理情報一覧</title>
	<link href="orderList.css" rel="stylesheet" type="text/css">
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
					<li><a href="../../productData/productList/productList.php">商品管理情報一覧</a>
					</li>
					<li><a href="orderList.php">注文管理情報一覧</a>
					</li>
				</ul>
			</nav>
		</div>
	</header>
	<div id="contents">
		<div id="mainTitle">
			<p>注文管理情報一覧</p>
		</div>
		<div id="textZone">

			<?php

			try {
				$dbh = new PDO( 'mysql:dbname=portfolio;host=portfolio-db.clfmlox1pztr.ap-northeast-1.rds.amazonaws.com;charset=utf8', 'portfolio', 'portfolio2020' );
				$dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
				global $dbh;
				// GETをもちいて現在のページ数を取得
				if ( isset( $_GET[ 'page' ] ) ) {
					$page = ( int )$_GET[ 'page' ];
				} else {
					$page = 1;
				}

				// 開始ポジションを計算
				if ( $page > 1 ) {
					// ２ページ目の場合は、「(2 × 10) - 10 = 10」
					$start = ( $page * 10 ) - 10;
				} else {
					$start = 0;
					global $start;
				}

				$sql = "SELECT * FROM dat_order LIMIT {$start}, 10";
				$stmt = $dbh->prepare( $sql );
				$stmt->execute();


				// dat_orderテーブルのデータ件数を取得
				$pagenum = $dbh->prepare( "SELECT COUNT(*) FROM dat_order" );
				$pagenum->execute();
				$pagenum = $pagenum->fetchColumn();
				//var_dump( $pagenum );
				global $pagenum;
				$max = $pagenum;

				print '<form method="post" action="orderBranch.php">';
				for ( $i = 0; $i < $max; $i++ ) {

					$orders = $stmt->fetch( PDO::FETCH_ASSOC );
					if ( $orders == false ) {
						break;
					}
					print '<br/><br/>';
					print '<input type="radio" name="code" value="' . $orders[ 'code' ] . '">';
					print '注文番号:' . $orders[ 'code' ] . '<br/>';
					print '①注文日:' . $orders[ 'date' ] . '<br/>';
					print '②会員番号:' . $orders[ 'membercode' ] . '<br/>';
					print '③会員氏名:' . $orders[ 'name' ] . '<br/>';
					print '④配達' . $orders[ 'arrival' ] . '<br/>';
					print '⑤電話番号:' . $orders[ 'tel' ] . '<br/>';
					print '⑥メールアドレス:' . $orders[ 'email' ] . '<br/>';
					$postal = $orders[ 'postal1' ] . $orders[ 'postal2' ];
					print '⑦郵便番号:' . $postal . '<br/>';
					print '⑧都道府県:' . $orders[ 'prefecture' ] . '<br/>';
					print '⑨住所:' . $orders[ 'address' ] . '<br/>';
					print '⑩支払い方法:' . $orders[ 'payment' ] . '<br/>';
					if ( $orders[ 'cardnumber' ] == 0 ) {
						$cardnumber = 'なし';
						print '⑪カード番号:' . $cardnumber;
					} else {
						print '⑪カード番号:' . $orders[ 'cardnumber' ];
					}
				}

				// ページネーションの数を取得
				$pagination = ceil( $pagenum / 10 );
				global $pagination;
				print '<br/><br/>';
				?>

			<?php for ($x=1; $x <= $pagination ; $x++) { ?>
			<a href="?page=<?php print $x; ?>" id="pagenation">
				<?php print $x.'&nbsp;&nbsp;'; ?>
			</a>

			<?php } ?>

			

			<?php
			print '<br/>';
			print '全件数' . $pagenum . '件&nbsp;(各10件ずつ表示)'; 
			$dbh = null;
			?>

			<?php
			print '<br/><br/>';
			print '
				<div id="buttonZone">';
			print '<input type="submit" id="button1" name="detail" value="詳細を見る">';
			print '<input type="submit" id="button2" name="add" value="注文を追加する">';
			print '<input type="submit" id="button3" name="delete" value="注文を削除する">';
			print '</div>';
			print '</form>';
			} catch ( Exception $e ) {
				print 'ただいま障害により大変ご迷惑をおかけしております。';
				exit();
			}
			?>
			<br/>
			<a href="../orderUpload/orderProductCartLook.php">現在の買い物かごの中を見る</a>
			<br/><br/>
			<a href="../../adminBranch.php">東三河幸せ宅配便管理トップメニューへ</a><br>

		</div>
	</div>
	<footer>
	</footer>
</body>
</html>